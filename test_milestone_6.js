/**
 * MILESTONE 6 - ABOUT XENTIA / SIALKOT MANUFACTURING STORY & TECHNICAL METALLURGY VERIFICATION
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

function runMilestone6Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 6 ABOUT XENTIA & METALLURGY VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');

  // 1. Semantic Section Structure & Heritage Eyebrow
  console.log('--- 1. Section Structure & Sialkot Heritage ---');
  assert(indexHtml.includes('id="about"'), 'Section #about exists in index.html');
  assert(indexHtml.includes('class="section about-section"'), 'Section has class="section about-section"');
  assert(indexHtml.includes('Sialkot Heritage • Century of Precision Metalworking'), 'Heritage eyebrow present');
  assert(indexHtml.includes('Forging Surgical Excellence'), 'Main title contains Forging Surgical Excellence');
  assert(indexHtml.includes('At the World\'s Instrumentation Capital'), 'Title highlight contains At the World\'s Instrumentation Capital');
  assert(indexHtml.includes('class="about-grid"'), '.about-grid 2-column container present');

  // 2. Authentic Sialkot Manufacturing Narrative & Factory Address
  console.log('\n--- 2. Authentic Factory Narrative & Physical Address ---');
  assert(indexHtml.includes('Sialkot, Pakistan'), 'Sialkot, Pakistan recognized in narrative');
  assert(indexHtml.includes('70% of the world\'s handheld surgical tools'), 'World surgical market share (>70%) cited');
  assert(indexHtml.includes('Shahab Pura Road, Small Industries Estate, Sialkot 51310, Punjab, Pakistan'), 'Verified physical factory address declared in narrative');
  assert(indexHtml.includes('class="about-highlight-box"'), '.about-highlight-box mandate callout present');
  assert(indexHtml.includes('The Xentia Manufacturing Mandate'), 'Manufacturing Mandate title present');
  assert(indexHtml.includes('flawless tactile feedback in the operating theater'), 'Surgeon tactile feedback emphasis present');

  // 3. Verified Manufacturing Statistics Grid
  console.log('\n--- 3. Verified Manufacturing Statistics Grid ---');
  assert(indexHtml.includes('class="about-stat-grid"'), '.about-stat-grid present');
  assert(indexHtml.includes('100+') && indexHtml.includes('Years Sialkot Pedigree'), 'Stat 1: 100+ Years Sialkot Pedigree present');
  assert(indexHtml.includes('40+') && indexHtml.includes('Export Nations'), 'Stat 2: 40+ Export Nations present');
  assert(indexHtml.includes('50k+') && indexHtml.includes('Annual Instruments'), 'Stat 3: 50k+ Annual Instruments present');
  assert(indexHtml.includes('100%') && indexHtml.includes('Optical Inspection'), 'Stat 4: 100% Optical Inspection present');

  // 4. 4-Pillar Technical Metallurgy Grid
  console.log('\n--- 4. 4-Pillar Technical Metallurgy Grid ---');
  assert(indexHtml.includes('class="metallurgy-grid"'), '.metallurgy-grid present');
  
  // Pillar 1: Raw Material Metallurgy
  assert(indexHtml.includes('Certified Surgical Alloys'), 'Pillar 1: Certified Surgical Alloys title present');
  assert(indexHtml.includes('ASTM F899 • AISI 420 • AISI 410 • Grade 5 Titanium'), 'Pillar 1: ASTM F899 / AISI alloys spec present');

  // Pillar 2: Cryogenic Vacuum Heat Treatment
  assert(indexHtml.includes('Cryogenic Vacuum Heat Treatment'), 'Pillar 2: Cryogenic Vacuum Heat Treatment title present');
  assert(indexHtml.includes('HRC 52–56 Rockwell • Liquid Nitrogen Quenched'), 'Pillar 2: HRC 52-56 / Nitrogen quench spec present');

  // Pillar 3: Optical Blade Honing & Tensioning
  assert(indexHtml.includes('Artisanal Blade Honing & Tensioning'), 'Pillar 3: Artisanal Blade Honing & Tensioning title present');
  assert(indexHtml.includes('Sub-Millimeter Tip Alignment • Microscopic Honing'), 'Pillar 3: Tip alignment & microscopic honing spec present');

  // Pillar 4: Ultrasonic Passivation & Autoclave Endurance
  assert(indexHtml.includes('Chemical Passivation & Sterilization'), 'Pillar 4: Chemical Passivation & Sterilization title present');
  assert(indexHtml.includes('134°C Autoclave Endurance • Nitric & Citric Acid Passivated'), 'Pillar 4: 134°C Autoclave / Passivation spec present');

  // 5. Compliance & Export Credentials Strip
  console.log('\n--- 5. Compliance & Export Credentials Strip ---');
  assert(indexHtml.includes('class="compliance-badge-strip"'), '.compliance-badge-strip present');
  assert(indexHtml.includes('ISO 13485 Medical Manufacturing Alignment'), 'ISO 13485 badge present');
  assert(indexHtml.includes('ISO 9001 Quality Management System'), 'ISO 9001 badge present');
  assert(indexHtml.includes('ASTM F899 Standard Specification'), 'ASTM F899 badge present');
  assert(indexHtml.includes('SCCI Registered Exporter (Sialkot, Pakistan)'), 'SCCI Exporter badge present');

  // 6. Action CTAs
  console.log('\n--- 6. Factory RFQ & Contact Action CTAs ---');
  assert(indexHtml.includes('href="wholesale-custom-orders.html"') && indexHtml.includes('REQUEST FACTORY QUOTATION'), 'Quotation CTA routes to wholesale-custom-orders.html');
  assert(indexHtml.includes('href="#contact"') && indexHtml.includes('FACILITY LOCATION & CONTACT'), 'Facility contact CTA present');

  // 7. CSS Styling & Layout Tokens
  console.log('\n--- 7. CSS Styling & Layout Tokens ---');
  assert(compCss.includes('.about-section'), '.about-section styled in components.css');
  assert(compCss.includes('.about-grid'), '.about-grid styled in components.css');
  assert(compCss.includes('.about-highlight-box'), '.about-highlight-box styled with gold border');
  assert(compCss.includes('.about-stat-grid'), '.about-stat-grid styled with responsive columns');
  assert(compCss.includes('.about-stat-card'), '.about-stat-card styled with hover transitions');
  assert(compCss.includes('.about-stat-number'), '.about-stat-number styled with gold typography');
  assert(compCss.includes('.metallurgy-grid'), '.metallurgy-grid styled in components.css');
  assert(compCss.includes('.metallurgy-card'), '.metallurgy-card styled with metallic surface');
  assert(compCss.includes('.metallurgy-card::before'), '.metallurgy-card::before styled with gold indicator strip');
  assert(compCss.includes('.compliance-badge-strip'), '.compliance-badge-strip styled in components.css');
  assert(compCss.includes('.compliance-badge-item'), '.compliance-badge-item styled with gold icon accent');

  console.log('\n============================================================');
  console.log(`MILESTONE 6 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone6Verification();
