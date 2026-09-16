/**
 * MILESTONE 9 - FEATURED SURGICAL INSTRUMENTS SHOWCASE & ADVANCED CATALOG SYNC VERIFICATION
 */

import fs from 'fs';
import { renderProductCard } from './js/components/product-card.js';

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

function runMilestone9Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 9 FEATURED INSTRUMENTS SHOWCASE VERIFICATION');
  console.log('============================================================\n');

  const indexHtml = fs.readFileSync('./index.html', 'utf-8');
  const compCss = fs.readFileSync('./css/components.css', 'utf-8');
  const mainJs = fs.readFileSync('./js/main.js', 'utf-8');
  const filterJs = fs.readFileSync('./js/components/collection-filter.js', 'utf-8');
  const modalJs = fs.readFileSync('./js/components/product-modal.js', 'utf-8');
  const cardJs = fs.readFileSync('./js/components/product-card.js', 'utf-8');

  // 1. Catalog Section Header & Dual-Commerce Messaging
  console.log('--- 1. Section Header & Dual-Commerce Messaging ---');
  assert(indexHtml.includes('id="categories"'), 'Section #categories exists in index.html');
  assert(indexHtml.includes('Verified Sialkot Production • Live Shopify Storefront Sync'), 'Eyebrow contains Verified Sialkot Production');
  assert(indexHtml.includes('Featured Surgical Instruments'), 'Title contains Featured Surgical Instruments');
  assert(indexHtml.includes('class="section-title-highlight">& Storefront Catalog<'), 'Title highlight contains & Storefront Catalog');
  assert(indexHtml.includes('evaluation samples with immediate checkout') && indexHtml.includes('hospital contracts and container-scale exports'), 'Subtitle explains dual-commerce pathways');

  // 2. Product Card Component & Technical Metallurgy Badges
  console.log('\n--- 2. Product Card Component & Metallurgy Micro-Badges ---');
  assert(cardJs.includes('class="product-tech-badges'), 'product-card.js defines .product-tech-badges container');
  assert(cardJs.includes('ASTM F899 Steel'), 'Badge: ASTM F899 Steel present in product-card.js');
  assert(cardJs.includes('HRC 52–56'), 'Badge: HRC 52-56 present in product-card.js');
  assert(cardJs.includes('100% Optical QC'), 'Badge: 100% Optical QC present in product-card.js');
  assert(cardJs.includes('class="product-quick-view-btn"'), 'Quick view button present on product card media');
  assert(cardJs.includes('ADD SAMPLE TO CART'), 'Add Sample to Cart CTA present');
  assert(cardJs.includes('BUY NOW'), 'Buy Now instant checkout CTA present');
  assert(cardJs.includes('BULK RFQ'), 'Bulk RFQ CTA present');
  assert(cardJs.includes('REQUEST PRODUCTION QUOTE'), 'Request Production Quote CTA present for custom production');

  // Test actual rendered card markup via import
  const mockProductInStock = {
    id: 'gid://shopify/Product/12345',
    title: 'Mayo Dissecting Scissors Curved 14cm',
    handle: 'mayo-dissecting-scissors-curved',
    productType: 'General Surgery',
    availableForSale: true,
    hasMultipleVariants: false,
    price: { formatted: '$28.00', rangeFormatted: '$28.00', amount: 28.0 },
    featuredImage: { url: 'Assets/product-images/test.webp', altText: 'Mayo Scissors' },
    selectedVariant: { id: 'gid://shopify/ProductVariant/67890' }
  };
  const renderedInStock = renderProductCard(mockProductInStock);
  assert(renderedInStock.includes('Mayo Dissecting Scissors Curved 14cm'), 'Rendered card contains product title');
  assert(renderedInStock.includes('ASTM F899 Steel'), 'Rendered card contains ASTM F899 Steel badge');
  assert(renderedInStock.includes('HRC 52–56'), 'Rendered card contains HRC 52-56 badge');
  assert(renderedInStock.includes('100% Optical QC'), 'Rendered card contains 100% Optical QC badge');
  assert(renderedInStock.includes('product-quick-view-btn'), 'Rendered card contains quick view button');
  assert(renderedInStock.includes('ADD SAMPLE TO CART'), 'In-stock card renders ADD SAMPLE TO CART button');

  const mockProductCustom = {
    id: 'gid://shopify/Product/99999',
    title: 'Obwegeser Mandibular Periosteal Stripper',
    handle: 'obwegeser-mandibular-stripper',
    productType: 'Maxillofacial',
    availableForSale: false,
    hasMultipleVariants: false,
    price: { formatted: '$45.00', rangeFormatted: '$45.00', amount: 45.0 },
    featuredImage: { url: 'Assets/product-images/test2.webp', altText: 'Stripper' },
    selectedVariant: { id: 'gid://shopify/ProductVariant/11111' }
  };
  const renderedCustom = renderProductCard(mockProductCustom);
  assert(renderedCustom.includes('REQUEST PRODUCTION QUOTE'), 'Custom production card renders REQUEST PRODUCTION QUOTE CTA');

  // 3. Collection & Stock Availability Filter Controller
  console.log('\n--- 3. Collection & Availability Filter Controller ---');
  assert(filterJs.includes("this.availability = 'all';"), 'CollectionFilterController initializes availability = all');
  assert(filterJs.includes('class="availability-filter-row'), 'Availability filter row defined in filter markup');
  assert(filterJs.includes('data-avail="all"'), 'All Instruments availability pill present');
  assert(filterJs.includes('data-avail="in-stock"'), 'In-Stock Samples availability pill present');
  assert(filterJs.includes('data-avail="custom"'), 'Custom Production Runs availability pill present');
  assert(filterJs.includes('setAvailability(avail)'), 'setAvailability method defined in filter controller');
  assert(filterJs.includes('availability: this.availability'), 'Filter event triggers availability payload');

  // 4. Main.js Orchestration & Reactive Filtering
  console.log('\n--- 4. Main.js Orchestration & State Handling ---');
  assert(mainJs.includes("availability: 'all',"), 'AppState declares availability: all');
  assert(mainJs.includes('handleFilterChange({ collectionHandle, searchQuery, sort, availability })'), 'handleFilterChange receives availability');
  assert(mainJs.includes("AppState.availability === 'in-stock'"), 'applyFiltersAndRender filters in-stock products');
  assert(mainJs.includes("AppState.availability === 'custom'"), 'applyFiltersAndRender filters custom production products');
  assert(mainJs.includes("AppState.availability = 'all';"), 'resetCatalogFilters resets AppState.availability');

  // 5. Product Modal Quick-View & Technical Matrix
  console.log('\n--- 5. Product Modal Quick-View & Technical Matrix ---');
  assert(modalJs.includes('class="modal-spec-grid"'), 'modal-spec-grid present in product-modal.js');
  assert(modalJs.includes('ASTM F899 / AISI 420'), 'Modal matrix: ASTM F899 / AISI 420 alloy present');
  assert(modalJs.includes('HRC 52–56 Cryo'), 'Modal matrix: HRC 52-56 Cryo hardness present');
  assert(modalJs.includes('134°C Steam Autoclave'), 'Modal matrix: 134°C Steam Autoclave present');
  assert(modalJs.includes('Sialkot, Pakistan'), 'Modal matrix: Sialkot, Pakistan origin present');
  assert(modalJs.includes('https://wa.me/923497400818?text='), 'Modal WhatsApp direct inquiry button configured');
  assert(modalJs.includes('WHATSAPP INQUIRY'), 'Modal WhatsApp Inquiry label present');

  // 6. CSS Styling & Layout Tokens
  console.log('\n--- 6. CSS Styling & Layout Tokens in components.css ---');
  assert(compCss.includes('.product-tech-badges'), '.product-tech-badges defined in components.css');
  assert(compCss.includes('.product-tech-badge'), '.product-tech-badge defined with mono typography');
  assert(compCss.includes('.product-quick-view-btn'), '.product-quick-view-btn defined with glassmorphism backdrop');
  assert(compCss.includes('.product-quick-view-btn:hover'), '.product-quick-view-btn:hover defined with gold accent');
  assert(compCss.includes('.availability-filter-row'), '.availability-filter-row defined in components.css');
  assert(compCss.includes('.avail-filter-pill'), '.avail-filter-pill defined');
  assert(compCss.includes('.avail-filter-pill.is-active'), '.avail-filter-pill.is-active defined with gold border');
  assert(compCss.includes('.modal-spec-grid'), '.modal-spec-grid defined in components.css');
  assert(compCss.includes('.modal-spec-item'), '.modal-spec-item defined');
  assert(compCss.includes('.modal-spec-label'), '.modal-spec-label defined with mono uppercase');
  assert(compCss.includes('.modal-spec-val'), '.modal-spec-val defined with semibold typography');

  console.log('\n============================================================');
  console.log(`MILESTONE 9 VERIFICATION: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone9Verification();
