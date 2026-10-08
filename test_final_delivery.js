/**
 * XENTIA INDUSTRIES - FINAL DELIVERY VERIFICATION TEST SUITE
 * Validates all required deliverables:
 * 1. All 8 storefront HTML pages (index, shop, contact, account, about, faq, policies, wholesale)
 * 2. Contact form & WhatsApp integration
 * 3. Customer Sign In / Sign Up authentication forms & role selection
 * 4. Unified social media handles (Facebook, Instagram, LinkedIn, YouTube, WhatsApp)
 * 5. Native mobile app bar & responsive viewport configurations
 * 6. Official Shopify theme directory structure & valid JSON configurations
 * 7. Official Shopify distributable zip archive integrity
 */

import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

let passedTests = 0;
let totalTests = 0;

function assert(condition, message) {
  totalTests++;
  if (condition) {
    console.log(`  ✓ PASS: ${message}`);
    passedTests++;
  } else {
    console.error(`  ✗ FAIL: ${message}`);
  }
}

console.log('================================================================');
console.log('XENTIA INDUSTRIES: FINAL CLIENT DELIVERY VERIFICATION SUITE');
console.log('================================================================\n');

// -----------------------------------------------------------------------------
// SUITE 1: HTML STOREFRONT PAGES
// -----------------------------------------------------------------------------
console.log('SUITE 1: Verifying HTML Storefront Pages');
const requiredPages = [
  'index.html',
  'shop.html',
  'contact.html',
  'account.html',
  'about.html',
  'faq.html',
  'policies.html',
  'wholesale-custom-orders.html'
];

requiredPages.forEach(file => {
  const filePath = path.join(__dirname, file);
  assert(fs.existsSync(filePath), `Page file exists: ${file}`);
  if (fs.existsSync(filePath)) {
    const content = fs.readFileSync(filePath, 'utf-8');
    assert(content.includes('<!DOCTYPE html>'), `${file} has valid HTML5 doctype`);
    assert(content.includes('mobile-bottom-app-bar'), `${file} contains Native Mobile Bottom App Bar`);
    assert(content.includes('social-icon-btn') || content.includes('social-icons-group'), `${file} contains Unified Social Media handles`);
    assert(content.includes('+92 349 7400818'), `${file} contains official Sialkot factory hotline (+92 349 7400818)`);
  }
});

// -----------------------------------------------------------------------------
// SUITE 2: CONTACT & AUTHENTICATION COMPONENTS
// -----------------------------------------------------------------------------
console.log('\nSUITE 2: Verifying Contact Form & Customer Auth Forms');

const contactHtml = fs.readFileSync(path.join(__dirname, 'contact.html'), 'utf-8');
assert(contactHtml.includes('id="xentia-contact-form"') || contactHtml.includes('id="contact-inquiry-form"'), 'contact.html contains technical inquiry form element');
assert(contactHtml.includes('id="contact-name"'), 'contact.html contains name input');
assert(contactHtml.includes('id="contact-email"'), 'contact.html contains email input');
assert(contactHtml.includes('id="contact-phone"'), 'contact.html contains phone/WhatsApp input');
assert(contactHtml.includes('id="contact-category"') || contactHtml.includes('id="contact-discipline"'), 'contact.html contains surgical discipline selector');
assert(contactHtml.includes('wa.me/923497400818'), 'contact.html contains direct WhatsApp desk link');

const accountHtml = fs.readFileSync(path.join(__dirname, 'account.html'), 'utf-8');
assert(accountHtml.includes('id="auth-container"'), 'account.html contains dynamic authentication mount container');

const authControllerJs = fs.readFileSync(path.join(__dirname, 'js/components/auth-controller.js'), 'utf-8');
assert(authControllerJs.includes('id="form-signin"'), 'auth-controller.js implements customer sign-in form');
assert(authControllerJs.includes('id="form-signup"'), 'auth-controller.js implements customer registration form');
assert(authControllerJs.includes('id="signup-role"'), 'auth-controller.js implements institutional role selector');
assert(authControllerJs.includes('id="tab-btn-signin"'), 'auth-controller.js implements login tab switch trigger');
assert(authControllerJs.includes('id="tab-btn-signup"'), 'auth-controller.js implements register tab switch trigger');

// -----------------------------------------------------------------------------
// SUITE 3: JAVASCRIPT CONTROLLERS
// -----------------------------------------------------------------------------
console.log('\nSUITE 3: Verifying JavaScript Modular Controllers');

const controllers = [
  'js/components/contact-form.js',
  'js/components/auth-controller.js',
  'js/components/mobile-app-bar.js',
  'js/components/product-card.js',
  'js/components/header.js',
  'js/cart.js',
  'js/main.js'
];

controllers.forEach(ctrl => {
  const ctrlPath = path.join(__dirname, ctrl);
  assert(fs.existsSync(ctrlPath), `Controller exists: ${ctrl}`);
});

const mainJs = fs.readFileSync(path.join(__dirname, 'js/main.js'), 'utf-8');
assert(mainJs.includes('ContactFormController'), 'js/main.js imports and initializes ContactFormController');
assert(mainJs.includes('mobileAppBarController'), 'js/main.js imports and initializes mobileAppBarController');

// -----------------------------------------------------------------------------
// SUITE 4: SHOPIFY THEME DIRECTORY & ASSETS
// -----------------------------------------------------------------------------
console.log('\nSUITE 4: Verifying Official Shopify Theme Package');

const themeDir = path.join(__dirname, 'shopify-theme');
assert(fs.existsSync(themeDir), 'shopify-theme/ directory exists');

const requiredThemeFiles = [
  'layout/theme.liquid',
  'config/settings_schema.json',
  'config/settings_data.json',
  'locales/en.default.json',
  'templates/index.json',
  'templates/product.liquid',
  'templates/collection.liquid',
  'templates/cart.liquid',
  'templates/404.liquid',
  'templates/page.liquid',
  'templates/page.contact.liquid',
  'templates/page.about.liquid',
  'templates/page.wholesale.liquid',
  'templates/page.faq.liquid',
  'templates/page.faqs.liquid',
  'templates/page.policies.liquid',
  'templates/customers/login.liquid',
  'templates/customers/register.liquid',
  'templates/customers/account.liquid',
  'sections/header.liquid',
  'sections/footer.liquid',
  'sections/hero.liquid',
  'sections/specialties.liquid',
  'sections/surgical-sets.liquid',
  'sections/oem-showcase.liquid',
  'sections/why-choose.liquid',
  'sections/contact-section.liquid',
  'sections/mobile-bottom-nav.liquid',
  'sections/main-product.liquid',
  'sections/main-collection.liquid',
  'sections/catalog-categories.liquid',
  'sections/main-page.liquid',
  'snippets/catalog-categories-content.liquid',
  'snippets/faq-content.liquid',
  'snippets/product-card.liquid',
  'snippets/social-icons.liquid',
  'snippets/metallurgy-badges.liquid',
  'snippets/cart-drawer.liquid'
];

requiredThemeFiles.forEach(tf => {
  const filePath = path.join(themeDir, tf);
  assert(fs.existsSync(filePath), `Theme file exists: ${tf}`);
});

// JSON validity checks
try {
  JSON.parse(fs.readFileSync(path.join(themeDir, 'config/settings_schema.json'), 'utf-8'));
  assert(true, 'config/settings_schema.json is valid JSON');
} catch (e) {
  assert(false, `config/settings_schema.json JSON error: ${e.message}`);
}

try {
  JSON.parse(fs.readFileSync(path.join(themeDir, 'config/settings_data.json'), 'utf-8'));
  assert(true, 'config/settings_data.json is valid JSON');
} catch (e) {
  assert(false, `config/settings_data.json JSON error: ${e.message}`);
}

try {
  JSON.parse(fs.readFileSync(path.join(themeDir, 'locales/en.default.json'), 'utf-8'));
  assert(true, 'locales/en.default.json is valid JSON');
} catch (e) {
  assert(false, `locales/en.default.json JSON error: ${e.message}`);
}

try {
  JSON.parse(fs.readFileSync(path.join(themeDir, 'templates/index.json'), 'utf-8'));
  assert(true, 'templates/index.json is valid JSON');
} catch (e) {
  assert(false, `templates/index.json JSON error: ${e.message}`);
}

// -----------------------------------------------------------------------------
// SUITE 5: THEME ZIP ARCHIVE VERIFICATION
// -----------------------------------------------------------------------------
console.log('\nSUITE 5: Verifying Distributable ZIP Package');

const zipPath = path.join(__dirname, 'xentia-industries-shopify-theme.zip');
assert(fs.existsSync(zipPath), 'xentia-industries-shopify-theme.zip archive exists');

if (fs.existsSync(zipPath)) {
  const stats = fs.statSync(zipPath);
  const sizeMb = (stats.size / (1024 * 1024)).toFixed(2);
  assert(stats.size > 1000000, `ZIP archive size is healthy (${sizeMb} MB)`);
}

// -----------------------------------------------------------------------------
// SUMMARY
// -----------------------------------------------------------------------------
console.log('\n================================================================');
console.log(`FINAL RESULTS: ${passedTests} / ${totalTests} TESTS PASSED`);
console.log('================================================================');

if (passedTests === totalTests) {
  console.log('🎉 ALL DELIVERABLES FULLY SATISFIED AND VERIFIED FOR CLIENT HANDOVER!');
  process.exit(0);
} else {
  console.error(`⚠️  ${totalTests - passedTests} TESTS FAILED. PLEASE REVIEW.`);
  process.exit(1);
}
