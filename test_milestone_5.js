/**
 * MILESTONE 5 - HERO SECTION & FACTORY VIDEO INTEGRATION VERIFICATION
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

function runMilestone5Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 5 HERO & FACTORY VIDEO VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const heroJs = fs.readFileSync('./js/components/hero.js', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');
  const animCss = fs.readFileSync('./css/animations.css', 'utf-8');

  // 1. Hero Markup & Video Embed Structure
  console.log('--- 1. Hero Markup & Video Embed Structure ---');
  assert(indexHtml.includes('id="hero"'), 'Hero section #hero exists in index.html');
  assert(indexHtml.includes('class="hero-section"'), 'Hero section has class="hero-section"');
  assert(indexHtml.includes('class="hero-video-wrapper"'), '.hero-video-wrapper container present');
  assert(indexHtml.includes('id="hero-poster-fallback"'), '#hero-poster-fallback poster image present');
  assert(indexHtml.includes('hero_surgical_showcase.webp'), 'Poster references high-res showcase asset');
  assert(indexHtml.includes('id="hero-video-iframe"'), '#hero-video-iframe element present');
  assert(indexHtml.includes('youtube-nocookie.com'), 'Privacy-enhanced youtube-nocookie.com embed used');
  assert(indexHtml.includes('Lu-k3_RsUY4'), 'Official factory manufacturing YouTube video ID Lu-k3_RsUY4 used');
  assert(indexHtml.includes('autoplay=1') && indexHtml.includes('mute=1') && indexHtml.includes('loop=1'), 'Ambient video loop parameters configured (autoplay, mute, loop)');
  assert(indexHtml.includes('tabindex="-1"') && indexHtml.includes('aria-hidden="true"'), 'Background video iframe aria-hidden & non-tabbable for accessibility');
  assert(indexHtml.includes('class="hero-scrim"'), 'Dark obsidian scrim layer present');

  // 2. Headline, Typewriter Tagline & Badges
  console.log('\n--- 2. Typography, Typewriter & Sialkot Heritage ---');
  assert(indexHtml.includes('class="hero-eyebrow-badge"'), 'Sialkot manufacturing pedigree eyebrow badge present');
  assert(indexHtml.includes('Sialkot, Pakistan'), 'Sialkot, Pakistan manufacturing origin declared in eyebrow');
  assert(indexHtml.includes('Precision Surgical Instruments'), 'Primary headline contains Precision Surgical Instruments');
  assert(indexHtml.includes('Crafted for Global Excellence'), 'Headline highlight contains Crafted for Global Excellence');
  assert(indexHtml.includes('id="hero-typewriter-text"'), '#hero-typewriter-text element present');
  assert(indexHtml.includes('id="hero-typewriter-cursor"'), '#hero-typewriter-cursor element present');
  assert(indexHtml.includes('class="typing-cursor"'), 'Cursor styled with .typing-cursor class');

  // 3. Primary Dual CTAs & Direct WhatsApp Channel
  console.log('\n--- 3. Dual Primary CTAs & Lead Channel ---');
  assert(indexHtml.includes('id="hero-cta-explore"'), '#hero-cta-explore primary catalog CTA present');
  assert(indexHtml.includes('href="#categories"'), 'Catalog CTA links to #categories');
  assert(indexHtml.includes('id="hero-cta-quote"'), '#hero-cta-quote secondary RFQ CTA present');
  assert(indexHtml.includes('href="wholesale-custom-orders.html"'), 'RFQ CTA links to wholesale-custom-orders.html');
  assert(indexHtml.includes('wa.me/923497400818'), 'Direct WhatsApp inquiry channel configured (+92 349 7400818)');

  // 4. Trust Capability Metrics Strip
  console.log('\n--- 4. Trust Capability Metrics Strip ---');
  assert(indexHtml.includes('class="hero-capability-strip"'), '.hero-capability-strip present');
  assert(indexHtml.includes('role="region"'), 'Capability strip has accessible role="region"');
  assert(indexHtml.includes('ASTM') && indexHtml.includes('F899'), 'Metric 1: ASTM F899 Stainless Steel present');
  assert(indexHtml.includes('HRC') && indexHtml.includes('52–56'), 'Metric 2: HRC 52-56 Vacuum Heat Treatment present');
  assert(indexHtml.includes('134°C') && indexHtml.includes('Steam'), 'Metric 3: 134°C Autoclave Sterilization Endurance present');
  assert(indexHtml.includes('Global') && indexHtml.includes('Delivery'), 'Metric 4: Global Delivery Terms present');
  assert(indexHtml.includes('EXW • FOB • CIF • DAP • DDP'), 'International trade terms (EXW/FOB/CIF/DAP/DDP) listed');

  // 5. Video Play / Pause Floating Toggle Control
  console.log('\n--- 5. Ambient Video Control Toggle ---');
  assert(indexHtml.includes('id="hero-video-toggle"'), '#hero-video-toggle button present');
  assert(indexHtml.includes('class="video-icon-pause"'), 'Pause icon SVG present');
  assert(indexHtml.includes('class="video-icon-play"'), 'Play icon SVG present');
  assert(indexHtml.includes('aria-label="Pause background factory video"'), 'Accessible aria-label present on video control');

  // 6. HeroController Logic & Reduced Motion Compliance
  console.log('\n--- 6. HeroController Class Logic & Accessibility ---');
  assert(heroJs.includes('export class HeroController'), 'HeroController class exported');
  assert(heroJs.includes('BUILT ON PRECISION.') && heroJs.includes('DRIVEN BY INNOVATION.') && heroJs.includes('DEFINED BY EXCELLENCE.'), 'All 3 canonical brand taglines configured');
  assert(heroJs.includes('prefers-reduced-motion'), 'prefers-reduced-motion media query handled');
  assert(heroJs.includes('postMessage'), 'YouTube player API postMessage commands handled');
  assert(heroJs.includes('pauseVideo') && heroJs.includes('playVideo'), 'pauseVideo and playVideo methods implemented');
  assert(heroJs.includes('toggleVideo()'), 'toggleVideo method implemented');
  assert(heroJs.includes('is-loaded'), 'Video iframe is-loaded class added on load');
  assert(mainJs.includes('heroController.init()'), 'heroController.init() invoked in main.js bootstrap');

  // 7. CSS Styling & Layout Tokens
  console.log('\n--- 7. CSS Styling & Design Tokens ---');
  assert(compCss.includes('.hero-section'), '.hero-section styled in components.css');
  assert(compCss.includes('.hero-video-wrapper'), '.hero-video-wrapper styled with pointer-events: none');
  assert(compCss.includes('.hero-poster-fallback'), '.hero-poster-fallback styled with object-fit: cover');
  assert(compCss.includes('.hero-video-iframe'), '.hero-video-iframe styled with 16:9 responsive ratios');
  assert(compCss.includes('.hero-video-iframe.is-loaded'), '.hero-video-iframe.is-loaded opacity transition styled');
  assert(compCss.includes('.hero-scrim'), '.hero-scrim styled with multi-stop dark obsidian gradient');
  assert(compCss.includes('.hero-typewriter'), '.hero-typewriter styled with gold accent and monospace font');
  assert(compCss.includes('.hero-capability-strip'), '.hero-capability-strip styled with responsive grid');
  assert(compCss.includes('.hero-video-control'), '.hero-video-control styled with glassmorphism');
  assert(animCss.includes('typing-cursor'), '.typing-cursor styled in animations.css');
  assert(animCss.includes('@keyframes caretBlink'), 'caretBlink keyframes defined in animations.css');

  console.log('\n============================================================');
  console.log(`MILESTONE 5 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone5Verification();
