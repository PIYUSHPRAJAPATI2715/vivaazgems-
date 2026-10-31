const fs = require('fs');
const path = require('path');
const vm = require('vm');

function checkDir(dir) {
  const files = fs.readdirSync(dir);
  for (const f of files) {
    const full = path.join(dir, f);
    if (fs.statSync(full).isDirectory()) {
      if (f !== 'node_modules' && f !== '.git') checkDir(full);
    } else if (f.endsWith('.php')) {
      const content = fs.readFileSync(full, 'utf8');
      // Remove external script tags first
      let cleanContent = content.replace(/<script\b[^>]*src=[\s\S]*?<\/script>/gi, '');
      const scriptRegex = /<script\b[^>]*>([\s\S]*?)<\/script>/gi;
      let match;
      let count = 0;
      while ((match = scriptRegex.exec(cleanContent)) !== null) {
        count++;
        let js = match[1];
        // Replace <?php ... ?> with spaces/newlines of same length so line numbers match and syntax inside strings or expressions isn't broken
        js = js.replace(/<\?(?:php|=)[\s\S]*?\?>/g, (m) => {
          return '/* php */ 0 /* end */';
        });
        try {
          new vm.Script(js, { filename: full + ' [script ' + count + ']' });
        } catch (e) {
          // If syntax error is around our replacement in string, try replacing with clean string
          let js2 = match[1].replace(/<\?(?:php|=)[\s\S]*?\?>/g, 'PHP_VAR');
          try {
            new vm.Script(js2, { filename: full + ' [script ' + count + ']' });
          } catch(e2) {
            console.error('REAL JS Syntax Error in ' + full + ' (script #' + count + '):', e2.message);
          }
        }
      }
    }
  }
}

checkDir('flatsome-child');
console.log('JS syntax check complete.');
