# Known Limitations & Verification Backlog

**Project:** Xentia Industries B2B/B2C Surgical Storefront  
**Store URL:** `https://xentiaindustries.myshopify.com`  
**File Path:** `/docs/KNOWN-LIMITATIONS.md`  

---

## 1. Inventory & Stock Tracking in Shopify
* **Observation:** Several live products in the Shopify catalog currently report `availableForSale: false` on the Storefront API because inventory tracking is enabled with 0 allocated stock.
* **Impact:** In Shopify Web Components, `availableForSale: false` automatically disables the native "Buy Now" and "Add to Cart" buttons.
* **Mitigation / Action Required by Merchant:**
  - If Xentia maintains physical sample stock, update inventory counts in Shopify Admin (`Products -> Inventory`).
  - If items are made-to-order, check "Continue selling when out of stock" in variant settings.
  - The storefront UI provides an automatic fallback: when a variant is out of stock, the primary button toggles to **"Request Custom Production Quote"**, ensuring no customer inquiry is ever lost.

---

## 2. Empty Collections in Shopify
* **Observation:** Out of 18 collections in Shopify, 7 categories currently have 0 assigned products: `arthroscopy-instruments`, `gynecology-obstetrics-instruments`, `urology-instruments`, `laparoscopic-instruments`, `cardiovascular-thoracic-instruments`, `dermatology-instruments`, `electrosurgical-surgical-accessories`.
* **Impact:** Visiting these collection pages could present empty grids if not properly handled.
* **Mitigation:**
  - The storefront provides an engineered empty state: *"Xentia manufactures full bespoke instruments for this discipline according to international ISO/ASTM standards. Request a custom production catalog or OEM quotation."*
  - The merchant should assign relevant instruments to these collections in Shopify Admin when catalog expansion occurs.

---

## 3. DNS / cPanel Credentials
* **Observation:** DNS records currently point to existing cPanel hosting.
* **Mitigation:** DNS changes must remain on hold until full staging QA is complete. Migration will follow the documented steps in `/docs/DOMAIN-MIGRATION-PLAN.md` with zero email disruption.

---

## 4. Compromised Admin Credential
* **Observation:** The private token `shpat_REDACTED_ADMIN_TOKEN` was exposed in legacy planning documents.
* **Action Required:** Merchant must revoke this key in Shopify Admin under `Apps -> Develop apps / Headless`. The storefront exclusively uses the public, browser-safe token `1af9a69e60ce1bce5d803c2e53ba47e8`.

---

## 5. Live Catalog Inventory & Image Audit (Milestone 2 Verification)
* **Live Product Count:** 53 products currently published in `xentiaindustries.myshopify.com`.
* **Live Collections Count:** Exactly 18 collections (17 surgical disciplines + 1 surgical sets collection).
* **Inventory Scope Constraint:** The public Storefront API token lacks the `unauthenticated_read_product_inventory` scope. Consequently, querying raw `quantityAvailable` or `totalInventory` yields an `ACCESS_DENIED` GraphQL error. However, `availableForSale` (boolean) is fully supported, authoritative, and standard across all Storefront API versions. All queries use `availableForSale`.
* **Catalog Image Coverage:** 7 out of 53 products currently have high-resolution image files uploaded to Shopify CDN (e.g. `surgical-instruments-on-white-background.png`, `surgical-instrument-set-in-tray.png`). The remaining 46 products have no images in Shopify Admin. The storefront normalizer automatically provides high-resolution local surgical instrument fallback photography (`Assets/product-images/hero_surgical_showcase.webp`) until the merchant uploads specific imagery.
* **Product Variants:** Currently, all 53 products have 1 default variant ("Default Title") in Shopify. The storefront variant selector and modal architecture are fully built and tested to dynamically support multiple variants (updating prices, images, availability, and cart line items) as soon as multi-variant options (e.g. lengths, blade curvatures, TC inserts) are populated in Shopify Admin.

