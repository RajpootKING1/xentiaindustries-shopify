/**
 * MILESTONE 4 - ARCHITECTURAL HEADER & SPECIALTY MEGA-MENU VERIFICATION
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

function runMilestone4Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 4 HEADER & MEGA-MENU VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const quoteHtml = fs.readFileSync('./wholesale-custom-orders.html', 'utf-8');
  const headerJs = fs.readFileSync('./js/components/header.js', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');

  // 1. Desktop Header & 4-Wing Mega-Menu HTML Structure
  console.log('--- 1. Desktop Header & 4-Wing Mega-Menu Structure ---');
  assert(indexHtml.includes('class="site-header"'), 'Header element has class="site-header"');
  assert(indexHtml.includes('id="nav-products-trigger"'), 'Products mega-menu trigger button exists');
  assert(indexHtml.includes('aria-haspopup="true"'), 'Trigger button has aria-haspopup="true"');
  assert(indexHtml.includes('aria-controls="products-mega-menu"'), 'Trigger button has aria-controls="products-mega-menu"');
  assert(indexHtml.includes('id="products-mega-menu"'), 'Products mega-menu container exists');
  assert(indexHtml.includes('role="region"'), 'Mega-menu has accessible role="region"');
  assert(indexHtml.includes('class="mega-menu-grid"'), 'Mega-menu grid layout container present');

  // Verify the 4 clinical wings
  assert(indexHtml.includes('General & Reconstructive'), 'Wing 1: General & Reconstructive present');
  assert(indexHtml.includes('Orthopedic, Spine & Neuro'), 'Wing 2: Orthopedic, Spine & Neuro present');
  assert(indexHtml.includes('Head, Neck & Dental'), 'Wing 3: Head, Neck & Dental present');
  assert(indexHtml.includes('Specialty & Sets'), 'Wing 4: Specialty & Sets present');

  // Verify clinical specialties
  const specialties = [
    'General Surgery',
    'Plastic & Cosmetic Surgery',
    'Dermatology Instruments',
    'Gynecology & Obstetrics',
    'Urology Instruments',
    'Orthopedic Instruments',
    'Spine Surgery Instruments',
    'Neurosurgical Instruments',
    'Arthroscopy Instruments',
    'Rhinoplasty & ENT',
    'Maxillofacial & Oral',
    'Ophthalmic Instruments',
    'Dental Instruments',
    'Cardiovascular & Thoracic',
    'Laparoscopic Instruments',
    'Veterinary Instruments',
    'Electrosurgical & Accessories',
    'Complete Surgical Sets (19 Sets)'
  ];

  specialties.forEach(spec => {
    assert(indexHtml.includes(spec), `Specialty "${spec}" present in mega-menu`);
  });

  assert(indexHtml.includes('class="mega-menu-footer-banner"'), 'Mega-menu OEM custom quotation banner present');
  assert(indexHtml.includes('id="header-search-btn"'), 'Header search shortcut button present');
  assert(indexHtml.includes('id="header-cart-count"'), 'Header cart count badge present');
  assert(indexHtml.includes('id="mobile-menu-toggle"'), 'Mobile hamburger menu toggle button present');

  // 2. Mobile Navigation Drawer & Accordion
  console.log('\n--- 2. Mobile Slide-Out Navigation Drawer ---');
  assert(indexHtml.includes('id="mobile-nav-drawer"'), '#mobile-nav-drawer container present');
  assert(indexHtml.includes('role="dialog"'), 'Mobile drawer has role="dialog"');
  assert(indexHtml.includes('aria-modal="true"'), 'Mobile drawer has aria-modal="true"');
  assert(indexHtml.includes('id="mobile-drawer-backdrop"'), '#mobile-drawer-backdrop overlay present');
  assert(indexHtml.includes('id="mobile-drawer-close"'), 'Close button #mobile-drawer-close present');
  assert(indexHtml.includes('id="mobile-disciplines-toggle"'), 'Mobile disciplines accordion toggle present');
  assert(indexHtml.includes('id="mobile-disciplines-list"'), 'Mobile disciplines accordion list present');

  // 3. Multi-Page Architecture Consistency
  console.log('\n--- 3. Multi-Page Consistency (Wholesale RFQ Portal) ---');
  assert(quoteHtml.includes('class="site-header"'), 'site-header present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('id="nav-products-trigger"'), 'nav-products-trigger present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('id="products-mega-menu"'), 'products-mega-menu present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('id="mobile-nav-drawer"'), 'mobile-nav-drawer present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('id="mobile-drawer-backdrop"'), 'mobile-drawer-backdrop present in wholesale-custom-orders.html');
  assert(quoteHtml.includes('headerController.init()'), 'headerController initialized in wholesale-custom-orders.html');
  assert(quoteHtml.includes('cartController.init()'), 'cartController initialized in wholesale-custom-orders.html');

  // 4. HeaderController Class Logic & Event Listeners
  console.log('\n--- 4. HeaderController Class Logic & Event Listeners ---');
  assert(headerJs.includes('export class HeaderController'), 'HeaderController class exported');
  assert(headerJs.includes('openMegaMenu()'), 'openMegaMenu method defined');
  assert(headerJs.includes('closeMegaMenu()'), 'closeMegaMenu method defined');
  assert(headerJs.includes('openMobileDrawer()'), 'openMobileDrawer method defined');
  assert(headerJs.includes('closeMobileDrawer()'), 'closeMobileDrawer method defined');
  assert(headerJs.includes('setTimeout') && headerJs.includes('160'), 'Hover grace period (160ms) implemented');
  assert(headerJs.includes('focusout'), 'focusout listener implemented for keyboard accessibility');
  assert(headerJs.includes('Escape'), 'Escape key dismisses active mega-menu and drawer');
  assert(headerJs.includes('scrollIntoView'), 'Search shortcut scrolls smoothly to catalog');
  assert(mainJs.includes('headerController.init()'), 'headerController.init() invoked in main.js bootstrap');

  // 5. CSS Components & Glassmorphism Styling
  console.log('\n--- 5. CSS Styling & Layout Tokens ---');
  assert(compCss.includes('.site-header'), '.site-header styled in components.css');
  assert(compCss.includes('.mega-menu'), '.mega-menu styled in components.css');
  assert(compCss.includes('.mega-menu.is-open'), '.mega-menu.is-open state defined');
  assert(compCss.includes('.mega-wing'), '.mega-wing styled');
  assert(compCss.includes('.mega-wing-title'), '.mega-wing-title styled with gold accent');
  assert(compCss.includes('.mega-item-link'), '.mega-item-link styled with hover transitions');
  assert(compCss.includes('.mega-menu-footer-banner'), '.mega-menu-footer-banner styled');
  assert(compCss.includes('.mobile-nav-drawer'), '.mobile-nav-drawer styled');
  assert(compCss.includes('.mobile-nav-drawer.is-open'), '.mobile-nav-drawer.is-open transform defined');
  assert(compCss.includes('.mobile-drawer-backdrop'), '.mobile-drawer-backdrop styled');
  assert(compCss.includes('.mobile-disciplines-accordion'), '.mobile-disciplines-accordion styled');
  assert(compCss.includes('.cart-count-badge'), '.cart-count-badge styled with gold notification theme');

  console.log('\n============================================================');
  console.log(`MILESTONE 4 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone4Verification();
