/**
 * MILESTONE 3 - BRANDED INDUSTRIAL LOADING SCREEN VERIFICATION
 */

import fs from 'fs';

let passed = 0;
let failed = 0;

function assert(condition, message) {
  if (condition) {
    console.log(`  ✓ PASS: ${message}`);
    passed++;
  } else {
    console.error(`  ✗ FAIL: ${message}`);
    failed++;
  }
}

function runMilestone3Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 3 LOADER VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const quoteHtml = fs.readFileSync('./wholesale-custom-orders.html', 'utf-8');
  const loaderJs = fs.readFileSync('./js/components/loader.js', 'utf-8');
  const animCss = fs.readFileSync('./css/animations.css', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');

  // 1. HTML Markup Presence & ARIA
  console.log('--- 1. Preloader HTML & Accessible ARIA Verification ---');
  assert(indexHtml.includes('id="xentia-loader"'), '#xentia-loader markup present in index.html');
  assert(indexHtml.includes('role="status"'), 'Preloader has role="status"');
  assert(indexHtml.includes('aria-live="polite"'), 'Preloader has aria-live="polite" for screen readers');
  assert(indexHtml.includes('id="loader-progress"'), 'Progress bar element #loader-progress present');
  assert(indexHtml.includes('id="loader-status-text"'), 'Calibration status text element present');
  assert(indexHtml.includes('id="loader-percentage"'), 'Percentage counter element present');
  assert(indexHtml.includes('id="loader-tip"'), 'Quality notice element #loader-tip present');
  assert(indexHtml.includes('class="loader-scan-sheen"'), 'Emblem scanning sheen element present');

  // Multi-page consistency
  assert(quoteHtml.includes('id="xentia-loader"'), '#xentia-loader markup present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('loaderController.init()'), 'Loader script initialized in wholesale-custom-orders.html');

  // 2. Controller Logic & Safeguards
  console.log('\n--- 2. Loader Controller Logic & Safety Safeguards ---');
  assert(loaderJs.includes('sessionStorage.getItem'), 'Session storage checked for returning visitors');
  assert(loaderJs.includes('prefers-reduced-motion'), 'prefers-reduced-motion media query supported');
  assert(loaderJs.includes('maxTimeoutMs'), 'Hard safety timeout ceiling configured');
  assert(loaderJs.includes('ASTM F899') && loaderJs.includes('German Grade Stainless Steel'), 'Authentic manufacturing metallurgical quality tips configured');
  assert(loaderJs.includes('loader-dismissed'), 'loader-dismissed CSS class applied on dismissal');
  assert(loaderJs.includes('window.dispatchEvent'), 'Custom event "xentia:loader:dismissed" dispatched');

  // 3. Styling & Reduced Motion Overrides
  console.log('\n--- 3. Styling & Motion Rules Verification ---');
  assert(compCss.includes('.xentia-loader'), '.xentia-loader class styled in components.css');
  assert(compCss.includes('z-index: 100000'), 'Loader displays at maximum z-index overlay');
  assert(compCss.includes('.loader-scan-sheen'), '.loader-scan-sheen styled');
  assert(animCss.includes('@keyframes loaderSheen'), 'loaderSheen keyframes defined in animations.css');
  assert(animCss.includes('prefers-reduced-motion') && animCss.includes('.loader-scan-sheen'), 'Reduced motion disables sheen animation');

  console.log('\n============================================================');
  console.log(`MILESTONE 3 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone3Verification();
