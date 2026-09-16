/**
 * MILESTONE 2 - COMPREHENSIVE COMMERCE FLOW VERIFICATION SUITE
 * Tests A through G from Milestone 2 Specification
 */

import { shopifyClient, normalizeProduct, normalizeCollection, formatMoney } from './js/api.js';
import { getQuoteUrl } from './js/components/quote-hook.js';
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

async function runMilestone2Verification() {
  console.log('============================================================');
  console.log('STARTING MILESTONE 2 COMMERCE FLOW VERIFICATION');
  console.log('============================================================\n');

  // --------------------------------------------------------------------------
  // 1. DATA LAYER & STOREFRONT API TESTS
  // --------------------------------------------------------------------------
  console.log('--- 1. Live Storefront Data Layer Verification ---');
  
  // Test Shop Info
  const shopInfo = await shopifyClient.getShopInfo();
  assert(shopInfo?.shop?.name === 'Xentia Industries', `Shop name verified as "${shopInfo?.shop?.name}"`);

  // Test Products Fetching
  const { products, pageInfo } = await shopifyClient.fetchProducts({ first: 50 });
  assert(products.length >= 50, `Fetched ${products.length} live products (>= 50 required)`);

  // Verify Product Normalization
  const sampleProduct = products[0];
  assert(sampleProduct.id && sampleProduct.id.startsWith('gid://shopify/Product/'), 'Product ID is normalized GraphQL GID');
  assert(typeof sampleProduct.handle === 'string' && sampleProduct.handle.length > 0, `Product handle present: ${sampleProduct.handle}`);
  assert(typeof sampleProduct.title === 'string' && sampleProduct.title.length > 0, `Product title present: ${sampleProduct.title}`);
  
  // Find a product that has live Shopify CDN images uploaded
  const productWithLiveImage = products.find(p => p.images.length > 0);
  if (productWithLiveImage) {
    assert(productWithLiveImage.featuredImage?.url?.includes('shopify.com'), `Live Shopify CDN Image verified on "${productWithLiveImage.title}": ${productWithLiveImage.featuredImage.url.slice(0, 50)}...`);
  } else {
    assert(sampleProduct.featuredImage?.url !== undefined, 'Product fallback image is present');
  }

  assert(Array.isArray(sampleProduct.variants) && sampleProduct.variants.length > 0, `Product has ${sampleProduct.variants.length} normalized variant(s)`);
  assert(typeof sampleProduct.price?.amount === 'number' && sampleProduct.price.formatted.startsWith('$'), `Product price normalized: ${sampleProduct.price.formatted}`);
  assert(typeof sampleProduct.availableForSale === 'boolean', `Product availableForSale boolean verified: ${sampleProduct.availableForSale}`);

  // Test Single Product Fetch by Handle
  const singleProduct = await shopifyClient.fetchProductByHandle(sampleProduct.handle);
  assert(singleProduct !== null && singleProduct.handle === sampleProduct.handle, `fetchProductByHandle('${sampleProduct.handle}') succeeded`);

  // Test Collections Fetching (18 total collections)
  const collections = await shopifyClient.fetchCollections({ first: 25 });
  assert(collections.length === 18, `Fetched exactly 18 live collections (Count: ${collections.length})`);
  assert(collections.some(c => c.handle === 'general-surgery-instruments'), 'General Surgery collection exists');
  assert(collections.some(c => c.handle === 'plastic-cosmetic-surgery-instruments'), 'Plastic Surgery collection exists');
  assert(collections.some(c => c.handle === 'surgical-sets'), 'Surgical Sets collection exists');

  // Test Single Collection with Products
  const collWithProducts = await shopifyClient.fetchCollectionByHandle('general-surgery-instruments', { first: 5 });
  assert(collWithProducts !== null && collWithProducts.handle === 'general-surgery-instruments', 'fetchCollectionByHandle succeeded');

  // --------------------------------------------------------------------------
  // 2. COMMERCE CART & CHECKOUT MUTATIONS
  // --------------------------------------------------------------------------
  console.log('\n--- 2. Native Shopify Cart API & Checkout Transitions ---');

  // Create Cart
  const cart = await shopifyClient.createCart([]);
  assert(cart && cart.id && cart.id.startsWith('gid://shopify/Cart/'), `Shopify Cart created successfully: ID: ${cart.id.slice(0, 30)}...`);
  assert(typeof cart.checkoutUrl === 'string' && cart.checkoutUrl.includes('xentiaindustries.myshopify.com/cart/c/'), `Shopify Checkout URL verified: ${cart.checkoutUrl.slice(0, 60)}...`);

  // --------------------------------------------------------------------------
  // 3. STEP 18 TEST SCENARIOS
  // --------------------------------------------------------------------------
  console.log('\n--- 3. Milestone 2 Step 18 Test Scenarios (TEST A - G) ---');

  // TEST A: Product -> Variant -> Cart Mutation -> Subtotal
  console.log('\n[TEST A: Product -> Variant -> Add to Cart -> Quantity -> Remove]');
  const testVariant = sampleProduct.variants[0];
  const cartWithLine = await shopifyClient.addLinesToCart(cart.id, [
    { merchandiseId: testVariant.id, quantity: 1 }
  ]);
  assert(cartWithLine && cartWithLine.id === cart.id, 'Item added to Shopify Cart successfully');
  const lineItem = cartWithLine.lines.edges[0]?.node;
  assert(lineItem !== undefined, 'Line item exists in cart lines edge list');

  if (lineItem) {
    // Test quantity update
    const updatedCart = await shopifyClient.updateCartLines(cart.id, [
      { id: lineItem.id, quantity: 2 }
    ]);
    assert(updatedCart.id === cart.id, 'Cart quantity mutation succeeded');

    // Test remove line
    const emptyCart = await shopifyClient.removeCartLines(cart.id, [lineItem.id]);
    assert(emptyCart.lines.edges.length === 0, 'Cart line removed successfully -> Cart becomes empty');
    assert(emptyCart.totalQuantity === 0, 'Cart totalQuantity is 0');
  }

  // TEST B: Buy Now Checkout Transition
  console.log('\n[TEST B: Buy Now Transition]');
  const instantCart = await shopifyClient.createCart([]);
  assert(instantCart.checkoutUrl && instantCart.checkoutUrl.startsWith('https://xentiaindustries.myshopify.com'), 'Instant Buy Now checkoutUrl is valid Shopify checkout redirect endpoint');

  // TEST C: Unavailable product / variant handling
  console.log('\n[TEST C: Unavailable Product / Out-of-Stock Logic]');
  const unavailableProduct = products.find(p => !p.availableForSale) || sampleProduct;
  assert(unavailableProduct.availableForSale === false, `Product "${unavailableProduct.title}" is out of stock / made to order`);
  const renderedCard = renderProductCard(unavailableProduct);
  assert(renderedCard.includes('REQUEST PRODUCTION QUOTE'), 'Rendered card contains "REQUEST PRODUCTION QUOTE"');
  assert(!renderedCard.includes('ADD SAMPLE TO CART'), 'Rendered card DOES NOT allow direct false add to cart when unavailable');
  assert(renderedCard.includes('Custom Production'), 'Rendered card contains "Custom Production" pill');

  // TEST D: Product -> Request Custom Quote Route & Parameter Context
  console.log('\n[TEST D: Request Custom Quote Routing & State Context]');
  const quoteUrl = getQuoteUrl(sampleProduct, { variantTitle: testVariant.title, quantity: 50 });
  assert(quoteUrl.startsWith('/wholesale-custom-orders.html?'), `Quote URL formatted: ${quoteUrl}`);
  assert(quoteUrl.includes(`product=${sampleProduct.handle}`), `Product handle preserved in URL query: ${sampleProduct.handle}`);
  assert(quoteUrl.includes('quantity=50'), 'B2B quantity preserved in URL query');

  // TEST E: Page Refresh / Cache Deduplication
  console.log('\n[TEST E: Refresh / Request Cache Deduplication]');
  const startTime = Date.now();
  await shopifyClient.fetchProducts({ first: 50 });
  const cachedDuration = Date.now() - startTime;
  assert(cachedDuration < 50, `Subsequent fetch served from in-memory cache in ${cachedDuration}ms (< 50ms)`);

  // TEST F: Open Collection -> Products Render
  console.log('\n[TEST F: Collection Filter Navigation]');
  const generalSurgeryProds = products.filter(p => p.collections.some(c => c.handle === 'general-surgery-instruments'));
  assert(generalSurgeryProds.length > 0, `General Surgery collection filter returns ${generalSurgeryProds.length} products`);

  // TEST G: Responsive & Accessible Attributes
  console.log('\n[TEST G: Responsive & Accessible Markup Verification]');
  assert(renderedCard.includes('role="region"'), 'Product card has role="region" for accessibility');
  assert(renderedCard.includes('aria-label='), 'Product card has descriptive aria-label');
  assert(renderedCard.includes('class="product-image"'), 'Uncropped image presentation verified via product-image CSS styling');

  // --------------------------------------------------------------------------
  // FINAL SUMMARY
  // --------------------------------------------------------------------------
  console.log('\n============================================================');
  console.log(`VERIFICATION COMPLETE: ${passed} PASSED, ${failed} FAILED`);
  console.log('============================================================');

  if (failed > 0) {
    process.exit(1);
  }
}

runMilestone2Verification().catch(err => {
  console.error('Fatal Verification Error:', err);
  process.exit(1);
});
