/**
 * MILESTONE 7 - SPECIALTY CATEGORY EXPLORER (17 CLINICAL DISCIPLINES & SETS) VERIFICATION
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

function runMilestone7Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 7 SPECIALTY CATEGORY EXPLORER VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');

  // 1. Semantic Section Structure & Accessibility
  console.log('--- 1. Section Structure & Accessibility ---');
  assert(indexHtml.includes('id="specialties"'), 'Section #specialties exists in index.html');
  assert(indexHtml.includes('class="section specialty-section"'), 'Section has class="section specialty-section"');
  assert(indexHtml.includes('aria-label="Surgical Disciplines & Instrument Specialties"'), 'Section has descriptive aria-label');
  assert(indexHtml.includes('Comprehensive Instrumentation Catalog'), 'Eyebrow contains Comprehensive Instrumentation Catalog');
  assert(indexHtml.includes('Specialty Category'), 'Main title contains Specialty Category');
  assert(indexHtml.includes('class="section-title-highlight">Explorer<'), 'Title highlight contains Explorer');
  assert(indexHtml.includes('class="specialty-grid"'), '.specialty-grid container present');
  assert(indexHtml.includes('aria-label="17 Clinical Disciplines Grid"'), 'Grid has role="region" and aria-label');

  // 2. Verification of all 17 Canonical Disciplines
  console.log('\n--- 2. All 17 Canonical Clinical Disciplines Present ---');
  const disciplines = [
    {
      handle: 'general-surgery-instruments',
      name: 'General Surgery',
      badge: 'General & Recon'
    },
    {
      handle: 'plastic-cosmetic-surgery-instruments',
      name: 'Plastic & Cosmetic',
      badge: 'Aesthetic Recon'
    },
    {
      handle: 'rhinoplasty-ent-instruments',
      name: 'Rhinoplasty & ENT',
      badge: 'Head & Neck'
    },
    {
      handle: 'orthopedic-instruments',
      name: 'Orthopedic Instruments',
      badge: 'Ortho & Neuro'
    },
    {
      handle: 'spine-surgery-instruments',
      name: 'Spine Surgery',
      badge: 'Spine & Ortho'
    },
    {
      handle: 'neurosurgical-instruments',
      name: 'Neurosurgical',
      badge: 'Neuroscience'
    },
    {
      handle: 'maxillofacial-oral-surgery-instruments',
      name: 'Maxillofacial & Oral',
      badge: 'Oral & Cranio'
    },
    {
      handle: 'ophthalmic-instruments',
      name: 'Ophthalmic',
      badge: 'Microsurgery'
    },
    {
      handle: 'dental-instruments',
      name: 'Dental Instruments',
      badge: 'Dental & Oral'
    },
    {
      handle: 'arthroscopy-instruments',
      name: 'Arthroscopy',
      badge: 'Joint & Sports'
    },
    {
      handle: 'gynecology-obstetrics-instruments',
      name: 'Gynecology & OB',
      badge: "Women's Health"
    },
    {
      handle: 'urology-instruments',
      name: 'Urology Instruments',
      badge: 'Urological'
    },
    {
      handle: 'veterinary-instruments',
      name: 'Veterinary Instruments',
      badge: 'Veterinary'
    },
    {
      handle: 'laparoscopic-instruments',
      name: 'Laparoscopic',
      badge: 'Minimally Invasive'
    },
    {
      handle: 'cardiovascular-thoracic-instruments',
      name: 'Cardiovascular & Thoracic',
      badge: 'Cardiothoracic'
    },
    {
      handle: 'dermatology-instruments',
      name: 'Dermatology',
      badge: 'Dermatology'
    },
    {
      handle: 'electrosurgical-surgical-accessories',
      name: 'Electrosurgical & Accessories',
      badge: 'Electrosurgery'
    }
  ];

  disciplines.forEach((disc, idx) => {
    const num = idx + 1;
    const hasHandle = indexHtml.includes(`data-handle="${disc.handle}"`);
    const hasClick = indexHtml.includes(`onclick="window.filterBySpecialty('${disc.handle}');"`);
    const hasKeydown = indexHtml.includes(`window.filterBySpecialty('${disc.handle}');}`);
    const hasTitle = indexHtml.includes(disc.name);
    const hasBadge = indexHtml.includes(disc.badge);

    assert(hasHandle, `Discipline ${num} (${disc.name}): data-handle="${disc.handle}" present`);
    assert(hasClick, `Discipline ${num} (${disc.name}): onclick trigger present`);
    assert(hasKeydown, `Discipline ${num} (${disc.name}): onkeydown accessibility handler present`);
    assert(hasTitle, `Discipline ${num} (${disc.name}): title rendered`);
    assert(hasBadge, `Discipline ${num} (${disc.name}): wing badge "${disc.badge}" rendered`);
  });

  // 3. Featured 19 Complete Specialized Surgical Sets Banner
  console.log('\n--- 3. Complete Surgical Sets & Modular Trays Banner ---');
  assert(indexHtml.includes('class="specialty-sets-banner"'), '.specialty-sets-banner present');
  assert(indexHtml.includes('Complete Surgical Sets &'), 'Banner title contains Complete Surgical Sets');
  assert(indexHtml.includes('Modular Sterilization Trays'), 'Banner title contains Modular Sterilization Trays');
  assert(indexHtml.includes('19 pre-configured institutional operating sets'), 'Catalog count (19 pre-configured sets) specified');
  assert(indexHtml.includes('onclick="window.filterBySpecialty(\'surgical-sets\');"'), 'Banner filter button calls window.filterBySpecialty(\'surgical-sets\')');
  assert(indexHtml.includes('FILTER 19 SURGICAL SETS'), 'Banner filter button label present');
  assert(indexHtml.includes('href="wholesale-custom-orders.html"') && indexHtml.includes('CUSTOM SET RFQ'), 'Custom Set RFQ button routes to wholesale-custom-orders.html');

  // 4. Global Functionality & Storefront Filter Integration
  console.log('\n--- 4. Storefront Filter Integration in main.js ---');
  assert(mainJs.includes('window.filterController = filterController;'), 'window.filterController exposed globally');
  assert(mainJs.includes('window.filterBySpecialty = (handle) => {') || mainJs.includes('window.filterBySpecialty = function'), 'window.filterBySpecialty declared');
  assert(mainJs.includes('window.filterController.setCollection(handle);'), 'filterBySpecialty invokes setCollection(handle)');
  assert(mainJs.includes('catalogSection.scrollIntoView({ behavior: \'smooth\' });'), 'filterBySpecialty scrolls smoothly to #categories');

  // 5. CSS Styling & Layout Tokens
  console.log('\n--- 5. CSS Styling & Responsive Grid Tokens ---');
  assert(compCss.includes('.specialty-section'), '.specialty-section styled in components.css');
  assert(compCss.includes('.specialty-grid'), '.specialty-grid defined');
  assert(compCss.includes('grid-template-columns: repeat(1, 1fr)'), 'Mobile 1-column layout defined');
  assert(compCss.includes('grid-template-columns: repeat(2, 1fr)'), 'Tablet 2-column layout defined');
  assert(compCss.includes('grid-template-columns: repeat(3, 1fr)'), 'Desktop 3-column layout defined');
  assert(compCss.includes('grid-template-columns: repeat(4, 1fr)'), 'Wide 4-column layout defined');
  assert(compCss.includes('.specialty-card'), '.specialty-card defined');
  assert(compCss.includes('.specialty-card:hover'), '.specialty-card:hover styles defined with translateY');
  assert(compCss.includes('.specialty-card:focus-visible'), '.specialty-card:focus-visible outline defined for WCAG keyboard nav');
  assert(compCss.includes('.specialty-icon-wrapper'), '.specialty-icon-wrapper defined');
  assert(compCss.includes('.specialty-card-wing-badge'), '.specialty-card-wing-badge styled');
  assert(compCss.includes('.specialty-title'), '.specialty-title styled');
  assert(compCss.includes('.specialty-desc'), '.specialty-desc styled');
  assert(compCss.includes('.specialty-card-footer'), '.specialty-card-footer styled');
  assert(compCss.includes('.specialty-sets-banner'), '.specialty-sets-banner styled with metallic gradient');
  assert(compCss.includes('.specialty-sets-banner-title'), '.specialty-sets-banner-title styled');
  assert(compCss.includes('.specialty-sets-banner-desc'), '.specialty-sets-banner-desc styled');

  console.log('\n============================================================');
  console.log(`MILESTONE 7 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone7Verification();
