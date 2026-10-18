const cp = require('child_process');
const fs = require('fs');
const path = require('path');

// 1. Fetch complete base CSS from commit 9451636
const oldCss = cp.execSync('git show 9451636:flatsome-child/style.css').toString('utf8');

// 2. Read current CSS from flatsome-child/style.css
const curCss = fs.readFileSync(path.join(__dirname, 'flatsome-child', 'style.css'), 'utf8');

// Strip top theme comments
const oldBody = oldCss.replace(/\/\*[\s\S]*?\*\//, '').trim();
const curBody = curCss.replace(/\/\*[\s\S]*?\*\//, '').trim();

// Ensure mega-dropdown-panel has display: none !important; by default
let refinedOldBody = oldBody.replace(
  /\.mega-dropdown-panel\s*\{[\s\S]*?display:\s*none;/,
  `.mega-dropdown-panel {
  display: none !important;
  visibility: hidden !important;
  opacity: 0 !important;`
);

// If not replaced, make sure .mega-dropdown-panel { display: none !important; } is explicitly enforced
const enforcementRule = `
/* STRICT MEGA DROPDOWN PROTECTION: HIDE WHEN NOT HOVERED */
.mega-dropdown-panel,
.mega {
  display: none !important;
  visibility: hidden !important;
  opacity: 0 !important;
  pointer-events: none !important;
}

.has-mega-dropdown:hover > .mega-dropdown-panel,
.has-mega-dropdown:focus-within > .mega-dropdown-panel,
.has-mega-dropdown.open > .mega-dropdown-panel,
.mi:hover > .mega,
.mi.open > .mega {
  display: block !important;
  visibility: visible !important;
  opacity: 1 !important;
  pointer-events: auto !important;
}
`;

const themeHeader = `/*
Theme Name: Flatsome Child
Theme URI: https://vivaazgems.com
Template: flatsome
Author: UX-Themes & Vivaaz Gems
Description: Custom Luxury Child Theme for Vivaaz Gems & Jewellery matching 100% Client Brief & Demos.
Version: 4.5.1
Text Domain: flatsome-child
*/`;

const mergedCss = [
  themeHeader,
  refinedOldBody,
  enforcementRule,
  '/* ==========================================================================\n   DEMO UTILITY & NEW COMPONENT CLASSES (100% DEMO FIDELITY)\n   ========================================================================== */',
  curBody,
  enforcementRule, // re-enforce at the end to override any cascade quirks
  `
/* STRICT DESKTOP CLEANUP */
@media (min-width: 769px) {
  .mobile-fixed-bottom-bar,
  .bb,
  #mobile-fixed-bottom-bar,
  .mobile-product-buybar,
  .buybar,
  .ph-h,
  .mdr,
  .fsl,
  .sheet,
  .footer-mobile-rows {
    display: none !important;
    visibility: hidden !important;
    pointer-events: none !important;
    height: 0 !important;
    min-height: 0 !important;
    opacity: 0 !important;
  }
}
`
].join('\n\n');

fs.writeFileSync(path.join(__dirname, 'flatsome-child', 'style.css'), mergedCss, 'utf8');
console.log('Successfully written merged CSS to flatsome-child/style.css!');
console.log('Final Size:', mergedCss.length, 'bytes');
console.log('Line Count:', mergedCss.split('\n').length);
