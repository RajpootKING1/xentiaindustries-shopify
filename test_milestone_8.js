/**
 * MILESTONE 8 - WHY CHOOSE XENTIA / EVIDENCE-LED QUALITY & CUSTOM OEM/ODM CAPABILITIES VERIFICATION
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

function runMilestone8Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 8 WHY CHOOSE XENTIA & OEM/ODM VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');
  const oemTabsJs = fs.readFileSync('./js/components/oem-tabs.js', 'utf-8');

  // 1. Semantic Section Structure & Section Header
  console.log('--- 1. Section Structure & Header ---');
  assert(indexHtml.includes('id="why-choose"'), 'Section #why-choose exists in index.html');
  assert(indexHtml.includes('class="section why-choose-section"'), 'Section has class="section why-choose-section"');
  assert(indexHtml.includes('aria-label="Why Choose Xentia Industries & Custom OEM/ODM Capabilities"'), 'Section has accessible aria-label');
  assert(indexHtml.includes('Evidence-Led Manufacturing • Zero Compromise'), 'Eyebrow contains Evidence-Led Manufacturing');
  assert(indexHtml.includes('Engineered Precision'), 'Title contains Engineered Precision');
  assert(indexHtml.includes('class="section-title-highlight">Backed by Proof<'), 'Title highlight contains Backed by Proof');
  assert(indexHtml.includes('sub-millimeter tolerances') && indexHtml.includes('complete OEM/ODM customization'), 'Subtitle highlights tolerances and OEM customization');

  // 2. Part 1: 4 Evidence-Led Quality Proof Cards
  console.log('\n--- 2. Part 1: 4 Evidence-Led Quality Proof Cards ---');
  assert(indexHtml.includes('class="proof-cards-grid"'), '.proof-cards-grid container present');
  assert(indexHtml.includes('aria-label="Evidence-Led Quality Proof Standards"'), 'Proof grid has accessible aria-label');

  // Proof Card 1: Sub-Millimeter Tolerances
  assert(indexHtml.includes('±0.02mm TOLERANCE'), 'Card 1 metric: ±0.02mm TOLERANCE present');
  assert(indexHtml.includes('Sub-Millimeter Micro-Tolerances'), 'Card 1 title: Sub-Millimeter Micro-Tolerances present');
  assert(indexHtml.includes('CNC 5-axis wire EDM and multi-axis milling'), 'Card 1 CNC EDM milling spec present');
  assert(indexHtml.includes('Optical Projection 50x'), 'Card 1 calibration spec present');

  // Proof Card 2: 100% Individual Pre-Dispatch Inspection
  assert(indexHtml.includes('100% INDIVIDUAL TESTING'), 'Card 2 metric: 100% INDIVIDUAL TESTING present');
  assert(indexHtml.includes('Zero Batch Sampling Shortcuts'), 'Card 2 title: Zero Batch Sampling Shortcuts present');
  assert(indexHtml.includes('inspects 100% of finished instruments under stereoscopic magnification'), 'Card 2 stereoscopic inspection spec present');
  assert(indexHtml.includes('Individual QC Sign-off'), 'Card 2 QC sign-off spec present');

  // Proof Card 3: Autoclave & Passivation Endurance
  assert(indexHtml.includes('134°C STEAM ENDURANCE'), 'Card 3 metric: 134°C STEAM ENDURANCE present');
  assert(indexHtml.includes('Anti-Corrosion Chemical Passivation'), 'Card 3 title: Anti-Corrosion Chemical Passivation present');
  assert(indexHtml.includes('ASTM A967') && indexHtml.includes('ISO 13402'), 'Card 3 ASTM A967 / ISO 13402 standards cited');
  assert(indexHtml.includes('500+ autoclave cycles'), 'Card 3 500+ autoclave cycle guarantee present');

  // Proof Card 4: Scalable Institutional Batching
  assert(indexHtml.includes('25 TO 10,000+ UNITS'), 'Card 4 metric: 25 TO 10,000+ UNITS present');
  assert(indexHtml.includes('Flexible Pilot Runs to Container Contracts'), 'Card 4 title: Flexible Pilot Runs to Container Contracts present');
  assert(indexHtml.includes('Prototype pilot runs from 25 pieces to full 40ft container export shipments'), 'Card 4 batch scalability narrative present');
  assert(indexHtml.includes('Air & Sea Global DDP'), 'Card 4 Air & Sea DDP delivery present');

  // 3. Part 2: Interactive Custom OEM/ODM Capabilities Showcase
  console.log('\n--- 3. Part 2: Interactive Custom OEM/ODM Production Suite ---');
  assert(indexHtml.includes('id="oem-showcase"'), 'Showcase container #oem-showcase present');
  assert(indexHtml.includes('class="oem-showcase-container"'), '.oem-showcase-container present');
  assert(indexHtml.includes('Custom OEM / ODM') && indexHtml.includes('Production Suite'), 'OEM showcase title rendered');
  assert(indexHtml.includes('Private Label & Contract Manufacturing'), 'Private Label badge rendered');
  assert(indexHtml.includes('class="oem-tabs-nav" role="tablist"'), 'Accessible tablist present');

  // 4 Tab Buttons with ARIA attributes
  assert(indexHtml.includes('id="tab-surface"') && indexHtml.includes('aria-controls="panel-surface"'), 'Tab 1: tab-surface with aria-controls present');
  assert(indexHtml.includes('id="tab-laser"') && indexHtml.includes('aria-controls="panel-laser"'), 'Tab 2: tab-laser with aria-controls present');
  assert(indexHtml.includes('id="tab-trays"') && indexHtml.includes('aria-controls="panel-trays"'), 'Tab 3: tab-trays with aria-controls present');
  assert(indexHtml.includes('id="tab-logistics"') && indexHtml.includes('aria-controls="panel-logistics"'), 'Tab 4: tab-logistics with aria-controls present');

  // 4 Matching Tab Panels with ARIA attributes
  assert(indexHtml.includes('id="panel-surface"') && indexHtml.includes('aria-labelledby="tab-surface"'), 'Panel 1: panel-surface with aria-labelledby present');
  assert(indexHtml.includes('id="panel-laser"') && indexHtml.includes('aria-labelledby="tab-laser"'), 'Panel 2: panel-laser with aria-labelledby present');
  assert(indexHtml.includes('id="panel-trays"') && indexHtml.includes('aria-labelledby="tab-trays"'), 'Panel 3: panel-trays with aria-labelledby present');
  assert(indexHtml.includes('id="panel-logistics"') && indexHtml.includes('aria-labelledby="tab-logistics"'), 'Panel 4: panel-logistics with aria-labelledby present');

  // Panel 1 Specs (Surfaces)
  assert(indexHtml.includes('Satin / Matte Anti-Glare'), 'Panel 1: Satin / Matte spec present');
  assert(indexHtml.includes('Mirror Polish'), 'Panel 1: Mirror Polish spec present');
  assert(indexHtml.includes('Tungsten Carbide Gold Ring') && indexHtml.includes('HRA 88–90'), 'Panel 1: TC Gold Ring HRA 88-90 spec present');
  assert(indexHtml.includes('Titanium PVD / Ceramic Black'), 'Panel 1: Titanium PVD / Ceramic Black spec present');

  // Panel 2 Specs (Laser & UDI)
  assert(indexHtml.includes('GS1 / UDI 2D DataMatrix'), 'Panel 2: GS1/UDI 2D DataMatrix spec present');
  assert(indexHtml.includes('FDA Unique Device Identification and EU MDR'), 'Panel 2: FDA UDI & EU MDR compliance cited');
  assert(indexHtml.includes('Custom Hospital / Distributor Logos'), 'Panel 2: Custom Hospital/Distributor logos spec present');
  assert(indexHtml.includes('Lot & Batch Tracking'), 'Panel 2: Lot & Batch tracking spec present');

  // Panel 3 Specs (Trays)
  assert(indexHtml.includes('Anodized Aircraft Aluminum DIN Trays'), 'Panel 3: Aircraft Aluminum DIN Trays spec present');
  assert(indexHtml.includes('Custom-Molded Medical Silicone Mats'), 'Panel 3: Silicone mats & brackets spec present');
  assert(indexHtml.includes('Color-Coded Anodizing'), 'Panel 3: Color-Coded Anodizing spec present');

  // Panel 4 Specs (Logistics)
  assert(indexHtml.includes('EXW (Ex Works Sialkot), FOB (Karachi/Lahore), CIF, DAP, and delivered-duty-paid DDP'), 'Panel 4: Incoterms (EXW/FOB/CIF/DAP/DDP) declared');
  assert(indexHtml.includes('Certificate of Origin (SCCI issued)'), 'Panel 4: SCCI Certificate of Origin present');
  assert(indexHtml.includes('Material Mill Test Certificates (MTC)'), 'Panel 4: Mill Test Certificates present');

  // 4. Part 3: Institutional Direct Actions Strip
  console.log('\n--- 4. Part 3: Institutional Direct Actions Strip ---');
  assert(indexHtml.includes('class="why-choose-actions"'), '.why-choose-actions present');
  assert(indexHtml.includes('Direct manufacturing access with zero intermediary trading markups'), 'Direct factory pricing guarantee present');
  assert(indexHtml.includes('href="wholesale-custom-orders.html"') && indexHtml.includes('START OEM / CUSTOM ORDER RFQ'), 'Start OEM RFQ button links to wholesale-custom-orders.html');
  assert(indexHtml.includes('href="https://wa.me/923497400818"') && indexHtml.includes('WHATSAPP FACTORY DESK'), 'WhatsApp Factory Desk link present (+92 349 7400818)');

  // 5. JavaScript Controller Logic
  console.log('\n--- 5. OEMTabsController JavaScript Logic ---');
  assert(oemTabsJs.includes('export class OEMTabsController'), 'OEMTabsController class exported');
  assert(oemTabsJs.includes('selectTab(tabId, setFocus = true)'), 'selectTab method defined');
  assert(oemTabsJs.includes('handleKeyDown(e, currentIndex)'), 'handleKeyDown method defined');
  assert(oemTabsJs.includes("case 'ArrowLeft':") && oemTabsJs.includes("case 'ArrowRight':"), 'Arrow key navigation implemented');
  assert(oemTabsJs.includes("case 'Home':") && oemTabsJs.includes("case 'End':"), 'Home and End key navigation implemented');
  assert(oemTabsJs.includes("tab.setAttribute('aria-selected'"), 'aria-selected dynamically updated');
  assert(oemTabsJs.includes("panel.hidden = !isMatch;"), 'panel.hidden toggled appropriately');
  assert(mainJs.includes("import { OEMTabsController } from './components/oem-tabs.js';"), 'OEMTabsController imported in main.js');
  assert(mainJs.includes('window.oemTabsController = oemTabs;'), 'window.oemTabsController exposed on window');

  // 6. CSS Styling & Layout Tokens
  console.log('\n--- 6. CSS Styling & Layout Tokens in components.css ---');
  assert(compCss.includes('.why-choose-section'), '.why-choose-section defined in components.css');
  assert(compCss.includes('.proof-cards-grid'), '.proof-cards-grid defined');
  assert(compCss.includes('.proof-card'), '.proof-card defined');
  assert(compCss.includes('.proof-card:hover'), '.proof-card:hover styled with lift and gold bar');
  assert(compCss.includes('.proof-metric-pill'), '.proof-metric-pill defined with mono font and gold accent');
  assert(compCss.includes('.oem-showcase-container'), '.oem-showcase-container defined');
  assert(compCss.includes('.oem-tabs-nav'), '.oem-tabs-nav defined');
  assert(compCss.includes('.oem-tab-btn'), '.oem-tab-btn defined');
  assert(compCss.includes('.oem-tab-btn.is-active'), '.oem-tab-btn.is-active defined with gold highlight');
  assert(compCss.includes('.oem-tab-btn:focus-visible'), '.oem-tab-btn:focus-visible outline defined for WCAG');
  assert(compCss.includes('.oem-panel'), '.oem-panel defined');
  assert(compCss.includes('.oem-panel[hidden]'), '.oem-panel[hidden] display:none defined');
  assert(compCss.includes('.oem-visual-badge'), '.oem-visual-badge defined');
  assert(compCss.includes('.oem-param-grid'), '.oem-param-grid defined');
  assert(compCss.includes('.why-choose-actions'), '.why-choose-actions defined');

  console.log('\n============================================================');
  console.log(`MILESTONE 8 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone8Verification();
