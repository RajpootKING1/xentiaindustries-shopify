# Shopify Security & Credential Governance Policy

**Document Status:** Mandatory & Enforced  
**Effective Date:** September 15, 2026  
**Security Officer:** Lead Architect & Senior Shopify Engineer  
**Store:** `xentiaindustries.myshopify.com`  
**File Path:** `/docs/SHOPIFY-SECURITY.md`  

---

## 1. Incident Retrospective & Compromised Credential Protocol

During preliminary project discovery, a private Shopify Admin API access token was recorded in documentation:
* **Compromised Key ID:** `shpat_088...` (Recorded in legacy planning PDF).
* **Threat Classification:** **HIGH RISK - TREAT AS COMPROMISED.**
* **Immediate Remediation Directives:**
  1. **Revocation in Admin:** The client/administrator must log into Shopify Admin (`Settings -> Apps and sales channels -> Develop apps / Headless`) and delete or revoke this private access token immediately.
  2. **Codebase Sanitization:** No private token shall ever be included in any client-side JavaScript, HTML markup, repository commits, or local frontend configuration files.
  3. **Logging Prohibition:** Antigravity agents, developers, and deployment scripts are strictly prohibited from outputting private tokens to terminal logs or system diagnostics.

---

## 2. Credential Categorization: Public vs. Private

Shopify's Storefront architecture cleanly delineates between public, unauthenticated client credentials and private, server-side secrets:

### 2.1 Public / Browser-Safe Credentials (Allowed on Client)
* **Store Domain:** `xentiaindustries.myshopify.com` (Public storefront domain).
* **Storefront API Public Access Token:** `1af9a69e60ce1bce5d803c2e53ba47e8`.
* **Scope & Capabilities:**
  - Read public product catalog, titles, descriptions, images, variants, and pricing.
  - Read public collections and articles.
  - Create and manage customer checkout sessions and carts (`unauthenticated_read_product_listings`, `unauthenticated_write_checkouts`, `unauthenticated_read_checkouts`).
* **Why it is safe:** Shopify's Storefront API is designed from the ground up for public browser execution. It cannot access merchant financial data, customer PII, internal orders, fulfillment mechanisms, or administrative settings.

### 2.2 Private / Server-Only Secrets (Forbidden on Client)
* **Shopify Admin API Tokens:** (e.g. `shpat_...`, OAuth Access Tokens).
* **Storefront API Private Tokens:** Tokens granting elevated server-side rates or draft order creation.
* **Webhook Signature Secrets:** Secrets used to verify HMAC-SHA256 signatures for order or inventory webhooks.
* **Storage Location:** Environment variables on a secure backend or serverless runtime (e.g. Cloudflare Worker, Netlify Function, AWS Lambda). Never bundled into browser client code.

---

## 3. Environment Variable & Git Protection Strategy

### 3.1 `.gitignore` Configuration
The project root `.gitignore` enforces strict exclusion rules:
```gitignore
# Security & Credentials
.env
.env.local
.env.*.local
*.pem
*.key
credentials.json
secrets.json

# Dependencies & Build Output
node_modules/
dist/
build/
.cache/

# OS & Editor
.DS_Store
Thumbs.db
.vscode/
.idea/
```

### 3.2 Environment Variable Naming Conventions
* `PUBLIC_SHOPIFY_STORE_DOMAIN`: Browser-safe myshopify domain.
* `PUBLIC_SHOPIFY_STOREFRONT_TOKEN`: Browser-safe public storefront access token.
* `PRIVATE_SHOPIFY_ADMIN_TOKEN`: Server-side secret only.
* `PRIVATE_WEBHOOK_SECRET`: Server-side HMAC verification key only.

---

## 4. Webhook Security Architecture (If Deployed)

For any asynchronous event handling (e.g. notifying manufacturing upon confirmed order payment):
1. **HMAC Verification:** The receiving serverless endpoint MUST verify the `X-Shopify-Hmac-Sha256` header against the computed hash of the raw request body using the private shared secret.
2. **Replay Protection:** Check timestamps (`X-Shopify-Webhook-Id` and timing window within 5 minutes) to prevent replay attacks.
3. **Idempotency:** Webhook handlers must store processed webhook IDs in a key-value store to prevent duplicate fulfillment triggers.

---

## 5. Security Checklist for Every Release

- [x] Zero private API tokens in frontend source code (`grep -rn "shpat_" .` returns empty).
- [x] All Storefront API calls use only the unauthenticated public storefront token.
- [x] All forms implement client-side input sanitization, length limits, and anti-spam honeypot fields.
- [x] File uploads in custom quote forms validate MIME types (`.pdf`, `.jpg`, `.png`, `.step`, `.dwg`) and enforce a 10MB maximum payload ceiling.
- [x] External links utilize `rel="noopener noreferrer"`.
- [x] Content Security Policy (CSP) headers accommodate only trusted CDNs (`cdn.shopify.com`, Google Fonts, YouTube iframe API).

---

## 6. Milestone 2 Security Audit Attestation (September 15, 2026)
* **Codebase Audit Result:** PASSED. All files created or modified in Milestone 2 (`js/api.js`, `js/cart.js`, `js/main.js`, `js/components/quote-hook.js`, `js/components/product-card.js`, `js/components/product-modal.js`, `js/components/collection-filter.js`, `wholesale-custom-orders.html`, `index.html`) utilize strictly the public Storefront Access Token (`1af9a69e60ce1bce5d803c2e53ba47e8`).
* **Compromised Admin Key Check:** Zero instances of `shpat_` exist in the codebase.
* **Network Traffic Check:** All GraphQL queries are directed to `https://xentiaindustries.myshopify.com/api/2024-04/graphql.json` via standard HTTPS POST with header `'X-Shopify-Storefront-Access-Token'`. No private Admin API endpoints (`/admin/api/...`) are referenced.

