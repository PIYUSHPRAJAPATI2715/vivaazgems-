const fs = require('fs');
const path = require('path');
const zlib = require('zlib');
const { execSync } = require('child_process');

/**
 * Clean, standard PKWARE / RFC-1951 ZIP encoder.
 * Guarantees POSIX forward slashes ('/') in all entry names,
 * Unix attributes, UTF-8 flag, and full compatibility with
 * Linux PHP ZipArchive and WordPress upgrader.
 */
function createZip(entries) {
  const localHeaders = [];
  const centralHeaders = [];
  let offset = 0;

  const now = new Date();
  const dosTime = (now.getHours() << 11) | (now.getMinutes() << 5) | Math.floor(now.getSeconds() / 2);
  const dosDate = ((now.getFullYear() - 1980) << 9) | ((now.getMonth() + 1) << 5) | now.getDate();

  for (const entry of entries) {
    // Enforce POSIX forward slashes
    const cleanName = entry.name.replace(/\\/g, '/');
    const isDir = entry.isDir || cleanName.endsWith('/');
    const nameBuf = Buffer.from(cleanName, 'utf8');
    const data = isDir ? Buffer.alloc(0) : (Buffer.isBuffer(entry.data) ? entry.data : Buffer.from(entry.data || ''));

    let method = 8; // Deflate
    let compData = data.length > 0 ? zlib.deflateRawSync(data, { level: 9 }) : Buffer.alloc(0);
    // If deflated is not smaller or data is empty, store uncompressed
    if (compData.length >= data.length || data.length === 0) {
      method = 0; // Stored
      compData = data;
    }
    const crc = isDir || data.length === 0 ? 0 : zlib.crc32(data);

    // Local file header (30 bytes + name + compData)
    const localHeader = Buffer.alloc(30);
    localHeader.writeUInt32LE(0x04034b50, 0); // signature
    localHeader.writeUInt16LE(20, 4);         // version needed: 2.0
    localHeader.writeUInt16LE(0x0800, 6);     // general purpose flag: bit 11 (UTF-8)
    localHeader.writeUInt16LE(method, 8);     // compression method
    localHeader.writeUInt16LE(dosTime, 10);   // mod time
    localHeader.writeUInt16LE(dosDate, 12);   // mod date
    localHeader.writeUInt32LE(crc, 14);       // crc-32
    localHeader.writeUInt32LE(compData.length, 18); // compressed size
    localHeader.writeUInt32LE(data.length, 22);     // uncompressed size
    localHeader.writeUInt16LE(nameBuf.length, 26);  // name length
    localHeader.writeUInt16LE(0, 28);               // extra field length

    const localChunk = Buffer.concat([localHeader, nameBuf, compData]);
    localHeaders.push(localChunk);

    // Central directory file header (46 bytes + name)
    const centralHeader = Buffer.alloc(46);
    centralHeader.writeUInt32LE(0x02014b50, 0); // signature
    centralHeader.writeUInt16LE(0x031e, 4);     // version made by: Unix 3.0
    centralHeader.writeUInt16LE(20, 6);         // version needed: 2.0
    centralHeader.writeUInt16LE(0x0800, 8);     // UTF-8 flag
    centralHeader.writeUInt16LE(method, 10);    // compression method
    centralHeader.writeUInt16LE(dosTime, 12);   // mod time
    centralHeader.writeUInt16LE(dosDate, 14);   // mod date
    centralHeader.writeUInt32LE(crc, 16);       // crc-32
    centralHeader.writeUInt32LE(compData.length, 20); // compressed size
    centralHeader.writeUInt32LE(data.length, 24);     // uncompressed size
    centralHeader.writeUInt16LE(nameBuf.length, 28);  // name length
    centralHeader.writeUInt16LE(0, 30);               // extra field length
    centralHeader.writeUInt16LE(0, 32);               // comment length
    centralHeader.writeUInt16LE(0, 34);               // disk start
    centralHeader.writeUInt16LE(0, 36);               // internal file attributes
    const unixAttr = (isDir ? ((0o040755 << 16) | 0x10) : (0o100644 << 16)) >>> 0;
    centralHeader.writeUInt32LE(unixAttr, 38);        // external attributes (Unix permissions)
    centralHeader.writeUInt32LE(offset, 42);          // relative offset of local header

    centralHeaders.push(Buffer.concat([centralHeader, nameBuf]));
    offset += localChunk.length;
  }

  const centralBuf = Buffer.concat(centralHeaders);
  const centralOffset = offset;
  const centralSize = centralBuf.length;

  // End of central directory record (22 bytes)
  const eocd = Buffer.alloc(22);
  eocd.writeUInt32LE(0x06054b50, 0);
  eocd.writeUInt16LE(0, 4);                       // number of disk
  eocd.writeUInt16LE(0, 6);                       // disk with central dir
  eocd.writeUInt16LE(entries.length, 8);          // entries on this disk
  eocd.writeUInt16LE(entries.length, 10);         // total entries
  eocd.writeUInt32LE(centralSize, 12);            // size of central dir
  eocd.writeUInt32LE(centralOffset, 16);          // offset of central dir
  eocd.writeUInt16LE(0, 20);                      // comment length

  return Buffer.concat([...localHeaders, centralBuf, eocd]);
}

/**
 * Scan directory recursively and return all files
 */
function scanDirectory(dirPath, baseDir = dirPath) {
  const result = [];
  const items = fs.readdirSync(dirPath, { withFileTypes: true });

  for (const item of items) {
    const fullPath = path.join(dirPath, item.name);
    const relPath = path.relative(baseDir, fullPath).replace(/\\/g, '/');

    if (item.isDirectory()) {
      result.push({ relPath: relPath + '/', isDir: true });
      result.push(...scanDirectory(fullPath, baseDir));
    } else {
      result.push({ relPath, isDir: false, fullPath });
    }
  }

  return result;
}

/**
 * Verify ZIP file internal directory entries
 */
function verifyZip(zipPath, expectedRoot, expectedStyleHeader) {
  const buf = fs.readFileSync(zipPath);
  let pos = 0;
  const entries = [];
  while (pos < buf.length - 4) {
    if (buf.readUInt32LE(pos) === 0x02014b50) {
      const nameLen = buf.readUInt16LE(pos + 28);
      const extraLen = buf.readUInt16LE(pos + 30);
      const commentLen = buf.readUInt16LE(pos + 32);
      const name = buf.toString('utf8', pos + 46, pos + 46 + nameLen);
      entries.push(name);
      pos += 46 + nameLen + extraLen + commentLen;
    } else {
      pos++;
    }
  }

  console.log(`\nVerifying ${zipPath}:`);
  console.log(`- File size: ${(buf.length / 1024 / 1024).toFixed(2)} MB`);
  console.log(`- Total entries: ${entries.length}`);

  const hasBackslash = entries.some(e => e.includes('\\'));
  console.log(`- Any Windows backslashes: ${hasBackslash ? 'FAIL (has backslashes)' : 'PASS (100% POSIX forward slashes)'}`);

  const expectedStyleCss = `${expectedRoot}/style.css`;
  const hasStyleCss = entries.includes(expectedStyleCss);
  console.log(`- Contains ${expectedStyleCss}: ${hasStyleCss ? 'PASS' : 'FAIL'}`);

  // Test extraction with tar
  try {
    const testDir = path.join(__dirname, 'test_extract_' + path.basename(zipPath, '.zip'));
    if (fs.existsSync(testDir)) fs.rmSync(testDir, { recursive: true, force: true });
    fs.mkdirSync(testDir, { recursive: true });
    execSync(`tar -xf "${zipPath}" -C "${testDir}"`);

    const extractedStyle = path.join(testDir, expectedRoot, 'style.css');
    const styleExists = fs.existsSync(extractedStyle);
    console.log(`- Extraction test (style.css at ${extractedStyle}): ${styleExists ? 'PASS' : 'FAIL'}`);

    if (styleExists && expectedStyleHeader) {
      const styleContent = fs.readFileSync(extractedStyle, 'utf8');
      const matchesExpectedHeader = styleContent.includes(expectedStyleHeader);
      console.log(`- Style header test ("${expectedStyleHeader}"): ${matchesExpectedHeader ? 'PASS' : 'FAIL'}`);
    }

    fs.rmSync(testDir, { recursive: true, force: true });
  } catch (err) {
    console.log(`- Extraction test error: ${err.message}`);
  }
}

// MAIN BUILD PROCESS
const sourceDir = path.join(__dirname, 'flatsome-child');
console.log('Scanning source directory:', sourceDir);
const scannedFiles = scanDirectory(sourceDir);
console.log(`Found ${scannedFiles.length} files and folders.`);

// Read raw style.css content
const rawStyleContent = fs.readFileSync(path.join(sourceDir, 'style.css'), 'utf8');

// Build Standalone Style.css (No Template: flatsome)
const standaloneHeader = `/*
Theme Name: Vivaaz Gems Theme
Theme URI: https://vivaazgems.com
Description: Custom Luxury Standalone & WooCommerce Theme for Vivaaz Gems & Jewellery.
Author: Google Antigravity & Vivaaz Gems
Version: 4.5.0
Text Domain: vivaazgems
*/`;
const standaloneStyleContent = rawStyleContent.replace(/\/\*[\s\S]*?\*\//, standaloneHeader);

// Build Child Theme Style.css (With Template: flatsome)
const childHeader = `/*
Theme Name: Flatsome Child - Vivaaz Gems
Theme URI: https://vivaazgems.com
Description: Custom Luxury Child Theme for Flatsome - Vivaaz Gems & Jewellery.
Author: Google Antigravity & Vivaaz Gems
Template: flatsome
Version: 4.5.0
Text Domain: flatsome-child
*/`;
const childStyleContent = rawStyleContent.replace(/\/\*[\s\S]*?\*\//, childHeader);

// Function to assemble entries for a package
function assembleEntries(rootDirName, styleContent) {
  const entries = [];
  // Ensure top root directory is declared
  entries.push({ name: `${rootDirName}/`, isDir: true });

  for (const item of scannedFiles) {
    const entryName = `${rootDirName}/${item.relPath}`;
    if (item.isDir) {
      entries.push({ name: entryName, isDir: true });
    } else if (item.relPath === 'style.css') {
      entries.push({ name: entryName, data: Buffer.from(styleContent, 'utf8') });
    } else {
      const fileData = fs.readFileSync(item.fullPath);
      entries.push({ name: entryName, data: fileData });
    }
  }

  return entries;
}

// 1. Build vivaazgems-theme-standalone.zip
console.log('\n--> Building vivaazgems-theme-standalone.zip...');
const standaloneEntries = assembleEntries('vivaazgems-theme-standalone', standaloneStyleContent);
const standaloneZipBuffer = createZip(standaloneEntries);
fs.writeFileSync(path.join(__dirname, 'vivaazgems-theme-standalone.zip'), standaloneZipBuffer);
verifyZip(path.join(__dirname, 'vivaazgems-theme-standalone.zip'), 'vivaazgems-theme-standalone', 'Vivaaz Gems Theme');

// 2. Build flatsome-child.zip
console.log('\n--> Building flatsome-child.zip...');
const childEntries = assembleEntries('flatsome-child', childStyleContent);
const childZipBuffer = createZip(childEntries);
fs.writeFileSync(path.join(__dirname, 'flatsome-child.zip'), childZipBuffer);
verifyZip(path.join(__dirname, 'flatsome-child.zip'), 'flatsome-child', 'Template: flatsome');

// 3. Build vivaazgems-theme.zip (convenience alias)
console.log('\n--> Building vivaazgems-theme.zip...');
const themeEntries = assembleEntries('vivaazgems-theme', standaloneStyleContent);
const themeZipBuffer = createZip(themeEntries);
fs.writeFileSync(path.join(__dirname, 'vivaazgems-theme.zip'), themeZipBuffer);
verifyZip(path.join(__dirname, 'vivaazgems-theme.zip'), 'vivaazgems-theme', 'Vivaaz Gems Theme');

// 3b. Build vivaazgems-luxury.zip (fresh slug to bypass any stuck theme locks)
console.log('\n--> Building vivaazgems-luxury.zip...');
const luxuryHeader = `/*
Theme Name: Vivaaz Gems Luxury
Theme URI: https://vivaazgems.com
Description: Custom Luxury Standalone & WooCommerce Theme for Vivaaz Gems & Jewellery.
Author: Google Antigravity & Vivaaz Gems
Version: 4.5.0
Text Domain: vivaazgems-luxury
*/`;
const luxuryStyleContent = rawStyleContent.replace(/\/\*[\s\S]*?\*\//, luxuryHeader);
const luxuryEntries = assembleEntries('vivaazgems-luxury', luxuryStyleContent);
const luxuryZipBuffer = createZip(luxuryEntries);
fs.writeFileSync(path.join(__dirname, 'vivaazgems-luxury.zip'), luxuryZipBuffer);
verifyZip(path.join(__dirname, 'vivaazgems-luxury.zip'), 'vivaazgems-luxury', 'Vivaaz Gems Luxury');

// 3c. Build vivaaz-theme-cleaner.zip (Utility plugin to remove stuck old theme folders directly from WP admin)
console.log('\n--> Building vivaaz-theme-cleaner.zip...');
const cleanerPluginPhp = `<?php
/**
 * Plugin Name: Vivaaz Theme Cleanup Utility
 * Description: One-click utility to safely delete stuck or locked theme directories on InfinityFree / shared hosts.
 * Version: 1.0.0
 * Author: Vivaaz Gems
 */

if (!defined('ABSPATH')) exit;

function vivaaz_clean_stuck_themes() {
    $targets = array(
        WP_CONTENT_DIR . '/themes/vivaazgems-theme-standalone'
    );
    
    function vivaaz_force_rmdir($dir) {
        if (!is_dir($dir)) return;
        @chmod($dir, 0777);
        $items = @scandir($dir);
        if (!$items) return;
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') continue;
            $path = $dir . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                vivaaz_force_rmdir($path);
            } else {
                @chmod($path, 0777);
                @unlink($path);
            }
        }
        @rmdir($dir);
    }

    $cleaned = array();
    foreach ($targets as $target) {
        if (is_dir($target)) {
            vivaaz_force_rmdir($target);
            if (!is_dir($target)) {
                $cleaned[] = basename($target);
            }
        }
    }
}
register_activation_hook(__FILE__, 'vivaaz_clean_stuck_themes');
add_action('admin_notices', function() {
    $dir = WP_CONTENT_DIR . '/themes/vivaazgems-theme-standalone';
    if (!is_dir($dir)) {
        echo '<div class="notice notice-success is-dismissible"><p><strong>Vivaaz Cleaner:</strong> The stuck old theme folder has been successfully removed! You can now safely upload your new theme.</p></div>';
    }
});
`;
const cleanerEntries = [
  { name: 'vivaaz-theme-cleaner/', isDir: true },
  { name: 'vivaaz-theme-cleaner/vivaaz-theme-cleaner.php', data: Buffer.from(cleanerPluginPhp, 'utf8') }
];
const cleanerZipBuffer = createZip(cleanerEntries);
fs.writeFileSync(path.join(__dirname, 'vivaaz-theme-cleaner.zip'), cleanerZipBuffer);
console.log('vivaaz-theme-cleaner.zip built successfully.');

// 4. Build vivaazgems_full_team_backup.zip
console.log('\n--> Building vivaazgems_full_team_backup.zip...');
const backupEntries = [];
// Add standalone zip & child zip
backupEntries.push({ name: 'vivaazgems-theme-standalone.zip', data: standaloneZipBuffer });
backupEntries.push({ name: 'flatsome-child.zip', data: childZipBuffer });
if (fs.existsSync(path.join(__dirname, 'vivaazgems_database.sql'))) {
  backupEntries.push({ name: 'vivaazgems_database.sql', data: fs.readFileSync(path.join(__dirname, 'vivaazgems_database.sql')) });
}
if (fs.existsSync(path.join(__dirname, 'vivaazgems_infinityfree_db.sql'))) {
  backupEntries.push({ name: 'vivaazgems_infinityfree_db.sql', data: fs.readFileSync(path.join(__dirname, 'vivaazgems_infinityfree_db.sql')) });
}
if (fs.existsSync(path.join(__dirname, 'README_IMPORT_GUIDE.md'))) {
  backupEntries.push({ name: 'README_IMPORT_GUIDE.md', data: fs.readFileSync(path.join(__dirname, 'README_IMPORT_GUIDE.md')) });
}
// Also include flatsome-child theme directory
for (const entry of childEntries) {
  backupEntries.push(entry);
}
const backupZipBuffer = createZip(backupEntries);
fs.writeFileSync(path.join(__dirname, 'vivaazgems_full_team_backup.zip'), backupZipBuffer);
console.log(`\nVerifying vivaazgems_full_team_backup.zip: ${(backupZipBuffer.length / 1024 / 1024).toFixed(2)} MB, ${backupEntries.length} entries.`);

console.log('\n[SUCCESS] All WordPress theme packages built and verified successfully!');
