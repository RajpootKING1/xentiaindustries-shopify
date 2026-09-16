/**
 * MILESTONE 10 - TURNKEY SURGICAL SETS SHOWCASE & MODULAR TRAYS CONFIGURATOR VERIFICATION
 */

import fs from 'fs';
import { SURGICAL_SETS_CATALOG, TRAY_OPTIONS, SurgicalSetsController } from './js/components/surgical-sets.js';

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

function runMilestone10Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 10 SURGICAL SETS & TRAY CONFIGURATOR VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');
  const setsJs = fs.readFileSync('./js/components/surgical-sets.js', 'utf-8');

  // 1. HTML Section Structure
  console.log('--- 1. Section Structure in index.html ---');
  assert(indexHtml.includes('id="surgical-sets"'), 'Section #surgical-sets exists in index.html');
  assert(indexHtml.includes('HOSPITAL-READY PROCEDURAL SOLUTIONS'), 'Section eyebrow: HOSPITAL-READY PROCEDURAL SOLUTIONS present');
  assert(indexHtml.includes('Turnkey Surgical Sets'), 'Title: Turnkey Surgical Sets present');
  assert(indexHtml.includes('class="section-title-highlight">&amp; Modular Trays'), 'Title highlight: & Modular Trays present');
  assert(indexHtml.includes('Nineteen procedure-specific surgical instrument assemblies'), 'Subtitle explains 19-set procedural assemblies');

  // 2. Category Filter Navigation
  console.log('\n--- 2. Category Filter Navigation ---');
  assert(indexHtml.includes('id="sets-filter-nav"'), 'Filter nav #sets-filter-nav present');
  assert(indexHtml.includes('data-category="all"'), 'All Sets filter pill present');
  assert(indexHtml.includes('data-category="plastic"'), 'Plastic & Aesthetic filter pill present');
  assert(indexHtml.includes('data-category="ortho-spine"'), 'Orthopedic & Spine filter pill present');
  assert(indexHtml.includes('data-category="general"'), 'General & Ward filter pill present');
  assert(indexHtml.includes('data-category="ent-dental"'), 'ENT & Dental filter pill present');
  assert(indexHtml.includes('data-category="specialty"'), 'Veterinary & Specialty filter pill present');

  // 3. Surgical Sets Grid
  console.log('\n--- 3. Surgical Sets Grid ---');
  assert(indexHtml.includes('id="surgical-sets-grid"'), 'Surgical sets grid #surgical-sets-grid present');
  assert(indexHtml.includes('class="sets-grid"'), 'Sets grid has .sets-grid class');

  // 4. Complete 19-Set Directory
  console.log('\n--- 4. Complete 19-Set Directory in index.html ---');
  assert(indexHtml.includes('COMPLETE PROCEDURAL SET DIRECTORY'), 'Directory section heading present');
  assert(indexHtml.includes('01 — General Surgery Sets'), 'Set 01: General Surgery Sets listed');
  assert(indexHtml.includes('02 — Plastic Surgery Sets'), 'Set 02: Plastic Surgery Sets listed');
  assert(indexHtml.includes('03 — Rhinoplasty Sets'), 'Set 03: Rhinoplasty Sets listed');
  assert(indexHtml.includes('04 — ENT Sets'), 'Set 04: ENT Sets listed');
  assert(indexHtml.includes('05 — Orthopedic Sets'), 'Set 05: Orthopedic Sets listed');
  assert(indexHtml.includes('06 — Neurosurgery Sets'), 'Set 06: Neurosurgery Sets listed');
  assert(indexHtml.includes('07 — Ophthalmic Sets'), 'Set 07: Ophthalmic Sets listed');
  assert(indexHtml.includes('08 — Dental Sets'), 'Set 08: Dental Sets listed');
  assert(indexHtml.includes('09 — Veterinary Sets'), 'Set 09: Veterinary Sets listed');
  assert(indexHtml.includes('10 — Gynecology Sets'), 'Set 10: Gynecology Sets listed');
  assert(indexHtml.includes('11 — Urology Sets'), 'Set 11: Urology Sets listed');
  assert(indexHtml.includes('12 — Maxillofacial Sets'), 'Set 12: Maxillofacial Sets listed');
  assert(indexHtml.includes('13 — Cardiovascular'), 'Set 13: Cardiovascular & Thoracic Sets listed');
  assert(indexHtml.includes('14 — Arthroscopy Sets'), 'Set 14: Arthroscopy Sets listed');
  assert(indexHtml.includes('15 — Spine Surgery Sets'), 'Set 15: Spine Surgery Sets listed');
  assert(indexHtml.includes('16 — Laparoscopic Sets'), 'Set 16: Laparoscopic Sets listed');
  assert(indexHtml.includes('17 — BBL Sets'), 'Set 17: BBL Sets listed');
  assert(indexHtml.includes('18 — Liposuction Sets'), 'Set 18: Liposuction Sets listed');
  assert(indexHtml.includes('19 — Mommy Makeover Sets'), 'Set 19: Mommy Makeover Sets listed');
  assert(indexHtml.includes('Custom Sets Available on Request'), 'Custom Sets Available note present');
  assert(indexHtml.includes('id="sets-directory-rfq-btn"'), 'Directory RFQ CTA button present');
  assert(indexHtml.includes('wa.me/923497400818'), 'WhatsApp Factory Desk CTA present in directory');

  // 5. Tray Configurator
  console.log('\n--- 5. Tray Configurator Section ---');
  assert(indexHtml.includes('INTERACTIVE INSTRUMENT CASSETTE BUILDER'), 'Tray configurator eyebrow present');
  assert(indexHtml.includes('Modular DIN Tray'), 'Tray configurator section title present');
  assert(indexHtml.includes('id="tray-configurator-container"'), 'Tray configurator container present');

  // 6. Manifest Modal
  console.log('\n--- 6. Manifest Inspection Modal ---');
  assert(indexHtml.includes('id="manifest-modal"'), 'Manifest modal #manifest-modal present');
  assert(indexHtml.includes('role="dialog"'), 'Modal has role="dialog"');
  assert(indexHtml.includes('aria-modal="true"'), 'Modal has aria-modal="true"');
  assert(indexHtml.includes('aria-labelledby="manifest-modal-heading"'), 'Modal has aria-labelledby');
  assert(indexHtml.includes('class="manifest-modal-overlay"'), 'Manifest modal overlay class present');
  assert(indexHtml.includes('id="manifest-modal-content"'), 'Modal content container present');
  assert(indexHtml.includes('class="manifest-modal-close"'), 'Modal close button present');
  assert(indexHtml.includes('surgicalSetsController.closeManifest()'), 'Close button calls closeManifest()');

  // 7. SURGICAL_SETS_CATALOG Data Integrity
  console.log('\n--- 7. SURGICAL_SETS_CATALOG Data Integrity (19 sets) ---');
  assert(SURGICAL_SETS_CATALOG.length === 19, `Catalog contains exactly 19 sets (got ${SURGICAL_SETS_CATALOG.length})`);
  const setIds = SURGICAL_SETS_CATALOG.map(s => s.id);
  assert(setIds.includes('ss-01'), 'Set ss-01: General Surgery Set defined');
  assert(setIds.includes('ss-02'), 'Set ss-02: Plastic Surgery Set defined');
  assert(setIds.includes('ss-03'), 'Set ss-03: Rhinoplasty Specialist Set defined');
  assert(setIds.includes('ss-15'), 'Set ss-15: Spine Surgery Set defined');
  assert(setIds.includes('ss-17'), 'Set ss-17: BBL Body Contouring Set defined');
  assert(setIds.includes('ss-19'), 'Set ss-19: Mommy Makeover Combination Set defined');

  // Verify all sets have required fields
  const allValid = SURGICAL_SETS_CATALOG.every(s =>
    s.id && s.name && s.category && s.pieces > 0 && s.traySize && s.keyInstruments.length > 0 && s.whatsappMsg
  );
  assert(allValid, 'All 19 sets have required fields (id, name, category, pieces, traySize, keyInstruments, whatsappMsg)');

  // Check highlighted sets
  const highlightedSets = SURGICAL_SETS_CATALOG.filter(s => s.highlight);
  assert(highlightedSets.length >= 5, `At least 5 sets are marked as featured highlights (got ${highlightedSets.length})`);

  // 8. TRAY_OPTIONS Data
  console.log('\n--- 8. Tray Configurator Options Data ---');
  assert(TRAY_OPTIONS.sizes.length === 4, 'Tray sizes: 4 DIN size options defined');
  assert(TRAY_OPTIONS.colors.length === 4, 'Tray colors: 4 anodizing color options defined');
  assert(TRAY_OPTIONS.silicone.length === 4, 'Tray silicone: 4 layout options defined');
  assert(TRAY_OPTIONS.engraving.length === 4, 'Tray engraving: 4 laser marking options defined');
  const sizeIds = TRAY_OPTIONS.sizes.map(s => s.id);
  assert(sizeIds.includes('din-full'), 'DIN 1/1 Full size option defined');
  assert(sizeIds.includes('din-half'), 'DIN 1/2 Half size option defined');
  assert(sizeIds.includes('din-3q'), 'DIN 3/4 size option defined');
  assert(sizeIds.includes('din-mini'), 'Mini Cassette size option defined');

  // 9. SurgicalSetsController Class
  console.log('\n--- 9. SurgicalSetsController Class & Methods ---');
  assert(setsJs.includes('class SurgicalSetsController'), 'SurgicalSetsController class defined');
  assert(setsJs.includes('init()'), 'init() method defined');
  assert(setsJs.includes('_renderSetsGrid()'), '_renderSetsGrid() method defined');
  assert(setsJs.includes('_getFilteredSets()'), '_getFilteredSets() method defined');
  assert(setsJs.includes('_renderSetCard('), '_renderSetCard() method defined');
  assert(setsJs.includes('openManifest('), 'openManifest() method defined');
  assert(setsJs.includes('closeManifest()'), 'closeManifest() method defined');
  assert(setsJs.includes('_bindManifestModal()'), '_bindManifestModal() method defined');
  assert(setsJs.includes('_renderTrayConfigurator()'), '_renderTrayConfigurator() method defined');
  assert(setsJs.includes('_renderConfigSummary()'), '_renderConfigSummary() method defined');
  assert(setsJs.includes('_bindTrayConfigurator()'), '_bindTrayConfigurator() method defined');
  assert(setsJs.includes('_bindFilterNav()'), '_bindFilterNav() method defined');

  // 10. Accessibility & ARIA on Controller
  console.log('\n--- 10. Accessibility & ARIA Implementation ---');
  assert(setsJs.includes("e.key === 'Escape'"), 'ESC key dismiss implemented for modal');
  assert(setsJs.includes('e.target === modal'), 'Backdrop click dismiss implemented');
  assert(setsJs.includes("e.key !== 'Tab'"), 'Focus trap implemented in modal');
  assert(setsJs.includes('document.body.style.overflow'), 'Body scroll lock on modal open');
  assert(setsJs.includes("role=\"radiogroup\""), 'Tray option groups have role="radiogroup"');
  assert(setsJs.includes("aria-checked"), 'Tray options have aria-checked attributes');
  assert(setsJs.includes("aria-label=\"Instrument manifest"), 'Manifest list has accessible aria-label');
  assert(setsJs.includes("aria-live=\"polite\""), 'Config summary has aria-live="polite" for screen readers');
  assert(setsJs.includes("'ArrowRight'"), 'Arrow key nav implemented for filter pills');
  assert(setsJs.includes("'ArrowLeft'"), 'Arrow key left nav implemented for filter pills');

  // 11. WhatsApp Integration
  console.log('\n--- 11. WhatsApp & RFQ Integration ---');
  assert(setsJs.includes('wa.me/923497400818'), 'WhatsApp Factory Desk URL in controller');
  assert(setsJs.includes('wholesale-custom-orders.html'), 'RFQ routing to wholesale-custom-orders.html');
  assert(setsJs.includes('encodeURIComponent'), 'WhatsApp messages are URI-encoded');
  assert(setsJs.includes('SUBMIT TRAY RFQ'), 'Tray configurator Submit RFQ button present');
  assert(setsJs.includes('WHATSAPP FACTORY DESK'), 'WhatsApp button present in summary');

  // 12. main.js Integration
  console.log('\n--- 12. main.js Integration ---');
  assert(mainJs.includes("from './components/surgical-sets.js'"), 'surgical-sets.js imported in main.js');
  assert(mainJs.includes('new SurgicalSetsController'), 'SurgicalSetsController instantiated in main.js');
  assert(mainJs.includes('surgicalSets.init()'), 'surgicalSets.init() called in main.js');
  assert(mainJs.includes('window.surgicalSetsController = surgicalSets'), 'window.surgicalSetsController exposed');

  // 13. CSS Definitions
  console.log('\n--- 13. CSS Styling Definitions in components.css ---');
  assert(compCss.includes('.surgical-sets-section'), '.surgical-sets-section defined');
  assert(compCss.includes('.sets-filter-bar'), '.sets-filter-bar defined');
  assert(compCss.includes('.set-filter-pill'), '.set-filter-pill defined');
  assert(compCss.includes('.set-filter-pill.is-active'), '.set-filter-pill.is-active defined');
  assert(compCss.includes('.set-filter-pill:focus-visible'), 'WCAG focus-visible on filter pills');
  assert(compCss.includes('.sets-grid'), '.sets-grid defined');
  assert(compCss.includes('.set-card'), '.set-card defined');
  assert(compCss.includes('.set-card:hover'), '.set-card:hover lift effect defined');
  assert(compCss.includes('.set-highlight-badge'), '.set-highlight-badge defined');
  assert(compCss.includes('.set-piece-count-badge'), '.set-piece-count-badge defined');
  assert(compCss.includes('.set-tray-badge'), '.set-tray-badge defined');
  assert(compCss.includes('.set-manifest-preview'), '.set-manifest-preview defined');
  assert(compCss.includes('.sets-directory-section'), '.sets-directory-section defined');
  assert(compCss.includes('.sets-directory-grid'), '.sets-directory-grid defined');
  assert(compCss.includes('.sets-directory-list'), '.sets-directory-list defined');
  assert(compCss.includes('.tray-configurator-card'), '.tray-configurator-card defined');
  assert(compCss.includes('.tray-config-steps'), '.tray-config-steps defined');
  assert(compCss.includes('.tray-option-btn'), '.tray-option-btn defined');
  assert(compCss.includes('.tray-option-btn.is-active'), '.tray-option-btn.is-active defined');
  assert(compCss.includes('.tray-option-btn:focus-visible'), 'WCAG focus-visible on tray buttons');
  assert(compCss.includes('.tray-color-btn'), '.tray-color-btn defined');
  assert(compCss.includes('.tray-color-swatch'), '.tray-color-swatch defined');
  assert(compCss.includes('.tray-config-summary'), '.tray-config-summary defined');
  assert(compCss.includes('.tray-summary-heading'), '.tray-summary-heading defined');
  assert(compCss.includes('.manifest-modal-overlay'), '.manifest-modal-overlay defined');
  assert(compCss.includes('.manifest-modal-overlay[hidden]'), '.manifest-modal-overlay[hidden] display:none defined');
  assert(compCss.includes('.manifest-modal-dialog'), '.manifest-modal-dialog defined');
  assert(compCss.includes('.manifest-modal-close'), '.manifest-modal-close defined');
  assert(compCss.includes('.manifest-instruments-list'), '.manifest-instruments-list defined');
  assert(compCss.includes('.manifest-modal-specs'), '.manifest-modal-specs defined');
  assert(compCss.includes('@media (max-width: 768px)'), 'Mobile responsive breakpoint defined');

  // 14. Card Rendering Test
  console.log('\n--- 14. Dynamic Card Rendering Verification ---');
  const ctrl = new SurgicalSetsController({ sectionId: 'surgical-sets' });
  const allSets = ctrl._getFilteredSets();
  assert(allSets.length === 19, 'getFilteredSets(all) returns all 19 sets');
  ctrl.activeCategory = 'plastic';
  const plasticSets = ctrl._getFilteredSets();
  assert(plasticSets.length >= 4, `Plastic & Aesthetic category returns at least 4 sets (got ${plasticSets.length})`);
  ctrl.activeCategory = 'ortho-spine';
  const orthoSets = ctrl._getFilteredSets();
  assert(orthoSets.length >= 3, `Orthopedic & Spine category returns at least 3 sets (got ${orthoSets.length})`);

  // Verify card HTML output
  const rhinoSet = SURGICAL_SETS_CATALOG.find(s => s.id === 'ss-03');
  const cardHtml = ctrl._renderSetCard(rhinoSet);
  assert(cardHtml.includes('Rhinoplasty Specialist Set'), 'Card renders correct set name');
  assert(cardHtml.includes('32 PIECES'), 'Card renders correct piece count');
  assert(cardHtml.includes('FEATURED'), 'Featured badge rendered on highlighted set');
  assert(cardHtml.includes('INSPECT MANIFEST'), 'Inspect Manifest button present on card');
  assert(cardHtml.includes('REQUEST SET RFQ'), 'Request Set RFQ button present on card');
  assert(cardHtml.includes('wa.me/923497400818'), 'WhatsApp link present on card');
  assert(cardHtml.includes('surgicalSetsController.openManifest'), 'openManifest() called from card button');

  console.log('\n============================================================');
  console.log(`MILESTONE 10 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================\n');
}

runMilestone10Verification();
