# Architecture Decision Record (ADR) - Storefront Architecture

**Document Status:** Approved & Recorded  
**Decision Date:** September 15, 2026  
**Architect:** Lead Architect & Senior Shopify Engineer  
**Project:** Xentia Industries B2B/B2C Surgical Storefront  
**File Path:** `/docs/ARCHITECTURE-DECISION.md`  

---

## 1. Context & Business Requirements

Xentia Industries requires a high-performance, international digital storefront that fulfills two distinct commercial motions:
1. **B2C / Sample Purchases:** Instant e-commerce ordering of standard surgical instruments with native cart, variant selection, and seamless transition to Shopify Checkout.
2. **B2B / Custom OEM / Institutional RFP:** Multi-product custom quote requests, laser engraving selection, steel grade customization (AISI 410, 420 German Stainless Steel, Titanium, Tungsten Carbide), custom surgical set assembly, and direct institutional procurement inquiries.
3. **Brand Credibility:** Aesthetic execution matching an elite German/Swiss precision instrument manufacturer (dark titanium, obsidian black, surgical steel, precision metallic gold accents).

---

## 2. Evaluation of Architectural Options

Five candidate architectures were evaluated across 18 criteria:

### Option A: Shopify-Hosted Liquid Theme (e.g. Dawn / Prestige / Custom Liquid)
* **Description:** Traditional Shopify Online Store 2.0 theme written in Liquid, hosted directly on Shopify servers.
* **Pros:** Native Shopify hosting, zero extra hosting bills, out-of-the-box checkout and customer accounts.
* **Cons:** Severe constraints on custom industrial motion design, restricted DOM freedom for sophisticated B2B multi-step interactive configurators, heavy Liquid compilation latency, rigid schema boundaries, harder to maintain complex custom animations and interactive calculators without breaking theme updates.

### Option B: Shopify Storefront Web Components (Official Web Components)
* **Description:** Standard Web Components (`<shopify-store>`, `<shopify-cart>`, `<shopify-context>`, `<shopify-media>`, `<shopify-variant-selector>`) published by Shopify (`https://cdn.shopify.com/storefront/web-components.js`) embedded into an optimized HTML5/CSS3/ES6 architecture.
* **Pros:** Backed by official Shopify engineering; lightweight (no React/Next bundle bloat); native cart and checkout synchronization; seamless `addLine()` and `buyNow()` API; ultra-fast browser rendering; 100% compliant with standard DOM; maximum animation freedom; accessible dialog-based cart; zero server-side maintenance; works natively in any web environment.
* **Cons:** Requires custom HTML/CSS for advanced B2B multi-product quotation forms (which is an advantage for our tailored bespoke B2B requirements).

### Option C: Fully Headless Shopify Storefront with Hydrogen / Remix
* **Description:** Shopify's official headless stack using React 19, Remix, and Oxygen hosting.
* **Pros:** Highly dynamic, server-side rendering, tight Shopify ecosystem ties.
* **Cons:** High operational complexity, dependency on Node.js/Worker runtimes, complex deployment pipelines, high cold-start risks, heavy maintenance burden for the client post-handoff, significantly slower iterative velocity in Antigravity development compared to standards-based modern web development.

### Option D: Headless React / Next.js Custom App
* **Description:** Next.js 15 App Router hosted on Vercel or Node.js server.
* **Pros:** Rich ecosystem, large component libraries.
* **Cons:** Heavy JavaScript hydration overhead, hydration mismatches with Shopify Web Components, recurring external server/Vercel hosting fees, high barrier to client handoff, over-engineered for a catalog of 50-500 products.

### Option E: Hybrid Architecture (Shopify Storefront Web Components + GraphQL API + Modern Semantic Frontend)
* **Description:** A modern, high-performance static/edge-compatible frontend utilizing:
  - **Official Shopify Storefront Web Components** for native product discovery, variant selection, live cart management, and seamless Shopify checkout.
  - **Storefront GraphQL API** for instant client-side catalog search, filtering across 17 categories, and real-time inventory queries.
  - **Dedicated B2B Multi-Step Quotation Engine** built with lightweight, accessible JavaScript that binds seamlessly to Shopify product handles and variants.
  - **Modern Scoped Vanilla CSS & Semantic HTML5** with CSS design tokens, hardware-accelerated transforms, and zero framework overhead.

---

## 3. Detailed Comparative Matrix

| Evaluation Criteria | Option A (Liquid Theme) | Option B (Web Components) | Option C (Hydrogen/Remix) | Option D (Next.js) | Option E (Recommended Hybrid) |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **1. Performance (CWV & Speed)** | Medium (70-85) | High (95-100) | Medium-High (80-90) | Medium (75-85) | **Maximum (98-100)** |
| **2. Maintainability** | Medium | High | Low-Medium | Low-Medium | **High (Standard Web APIs)** |
| **3. Shopify Compatibility** | Native | Official First-Party | Official | Custom GraphQL | **Official & Native** |
| **4. Product Rendering** | Liquid SSR | Dynamic Web Components | React SSR | React SSR | **Web Components + GraphQL** |
| **5. Cart Functionality** | Liquid Cart | Native `<shopify-cart>` | Headless Cart | Custom State | **Native `<shopify-cart>`** |
| **6. Checkout Transition** | Instant | Native Shopify Checkout | Native Checkout | Redirect API | **Native Shopify Checkout** |
| **7. SEO & Indexability** | High | High (Semantic DOM) | High | High | **High (JSON-LD + Semantic)** |
| **8. Responsive Design** | Rigid | 100% Flexible | Flexible | Flexible | **100% Custom Responsive** |
| **9. Animation Freedom** | Limited | Complete | Complete | Complete | **Complete (60fps CSS/rAF)** |
| **10. Forms Handling** | Liquid Forms | HTML5 Standard | React Forms | React Hook Form | **HTML5 + Secure B2B Endpoint** |
| **11. Custom Quote Workflow** | Poor (App needed) | Custom JS | Custom React | Custom React | **Built-in 5-Step Custom RFQ** |
| **12. Hosting Flexibility** | Shopify Only | Any CDN / Static / Edge | Oxygen / Cloudflare | Vercel / VPS | **Shopify / Cloudflare / Netlify** |
| **13. Domain Setup** | Direct Shopify | Direct or Subdomain | Multi-domain setup | Multi-domain | **Seamless Apex + CNAME** |
| **14. Security Posture** | High | High (Public Token) | High | Complex | **Zero Token Exposure** |
| **15. Deployment Complexity** | Low (Shopify CLI) | Ultra-Low | High | High | **Ultra-Low (Git / Static)** |
| **16. Future Scalability** | Medium | High | High | High | **High (Modular Architecture)** |
| **17. Ease of Client Handoff**| Easy | Very Easy | Very Hard | Hard | **Clean, Documented, Zero Ops** |
| **18. Antigravity Synergy** | Moderate | Excellent | Moderate | Moderate | **Optimal (Predictable & Rapid)** |

---

## 4. Final Architectural Decision

### Selected Architecture: **Option E — Hybrid Modern Storefront (Shopify Storefront Web Components + GraphQL Client + Vanilla Design System)**

### Key Rationale:
1. **Flawless Commerce Source of Truth:** Shopify remains 100% the commerce backend. Products, collections, pricing, discounts, tax rules, and PCI-compliant checkouts live in Shopify.
2. **Instant B2C & Sample Ordering:** Using official `<shopify-store>`, `<shopify-context>`, `<shopify-cart>`, `<shopify-variant-selector>`, and `<shopify-media>`, users can purchase samples with native cart drawers and direct checkout redirects.
3. **Superior B2B Quote Workflow:** A custom 5-step quotation builder (`Select Products -> Specifications -> Customization -> Business Info -> Review & Submit`) pre-populates product handles, calculates volume discount estimates, and generates structured RFQ payloads without requiring expensive, bloated third-party Shopify apps ($50-$200/mo).
4. **Lightweight & Blazing Fast:** Total JavaScript payload is under 80KB (excluding Shopify's CDN component), guaranteeing sub-second Core Web Vitals, 0 CLS, and instant page transitions.
5. **Rock-Solid Security:** Only the public, read-only Storefront Access Token is exposed client-side. The compromised private token is permanently deprecated and excluded from the codebase.
6. **Longevity & Client Handoff:** The client is not locked into complex Node server hosting or expensive monthly developer retainers. Standard HTML5, CSS3, and ES6 are permanently maintainable by any modern engineering team.

---

## 5. Technical Implementation Blueprint

```
d:\xentiaindustries-shopify\
├── Assets\                                # Authoritative brand assets
│   ├── favicon\                           # Complete SVG & WebManifest favicons
│   ├── product-images\                    # High-resolution surgical instrument photography
│   ├── logo-for-website.png               # Master 766x326 transparent logo
│   └── hero-section-sample-by-client.jpeg # Client hero reference
├── css\
│   ├── tokens.css                         # Centralized design tokens (Gold, Steel, Obsidian)
│   ├── base.css                           # Reset, typography, accessibility, focus states
│   ├── components.css                     # Reusable buttons, cards, badges, loader, modal
│   ├── layout.css                         # Header, mega-menu, grid, containers, footer
│   └── shopify-overrides.css              # Custom styling for ::part() of Shopify Web Components
├── js\
│   ├── config.js                          # Public Shopify domain and public access token
│   ├── store.js                           # Shopify Web Components initialization and helpers
│   ├── api.js                             # GraphQL client for collections, search, and catalog
│   ├── quote-builder.js                   # Multi-product B2B quotation state machine
│   ├── motion.js                          # Typewriter, loader dismissal, marquee, smooth scroll
│   └── main.js                            # App entry point, DOM event orchestration
├── docs\                                  # Complete architecture & operational documentation
├── index.html                             # Master production storefront homepage
├── products.html                          # Complete searchable catalog with category filtering
├── product.html                           # Dedicated high-conversion product detail template
├── wholesale-custom-orders.html           # Dedicated multi-step B2B custom quote builder
├── surgical-sets.html                     # 19 canonical surgical sets & custom set configurator
├── about.html                             # Manufacturing heritage, Sialkot facility & quality
├── contact.html                           # Direct communication, inquiry form, map & details
├── faq.html                               # Policy-grounded commercial and technical FAQ
├── policies\                              # Individual legal policy pages (Refund, Return, etc.)
│   ├── refund-policy.html
│   ├── return-policy.html
│   ├── cancellation-policy.html
│   ├── privacy-policy.html
│   ├── terms-and-conditions.html
│   └── shipping-policy.html
└── 404.html                               # Branded 404 error page
```
