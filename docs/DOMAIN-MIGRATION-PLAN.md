# Domain & DNS Migration Governance Plan

**Document Status:** Pending Human Confirmation (DO NOT EXECUTE AUTOMATICALLY)  
**Date:** September 15, 2026  
**Primary Domain:** `https://xentiaindustries.com`  
**Current Shopify Subdomain:** `https://xentiaindustries.myshopify.com`  
**Hosting / DNS Manager:** cPanel / Registrar DNS  
**File Path:** `/docs/DOMAIN-MIGRATION-PLAN.md`  

---

## 1. Safety Directives & Human Confirmation Rule

> [!CAUTION]
> Under NO circumstances should automated scripts or AI agents modify DNS records or registrar nameservers without explicit written confirmation from the human client. Modifying DNS without proper verification can immediately disrupt business email routing (`@xentiaindustries.com`), causing severe communication and commercial loss.

---

## 2. Current DNS Architecture & Record Inventory

Before making any changes in cPanel Zone Editor or registrar DNS:

### 2.1 Records That MUST Be Preserved (Critical Business Continuity)
* **MX Records:** Any Mail Exchange records directing emails for `xentiaindustries.com` (e.g. Google Workspace, Microsoft 365, or cPanel Webmail).
* **TXT Records for Mail Security:**
  - `v=spf1 ...` (Sender Policy Framework).
  - `default._domainkey...` (DKIM signatures).
  - `_dmarc...` (DMARC policy records).
* **Mail Subdomains:** `mail.xentiaindustries.com`, `webmail.xentiaindustries.com`, `cpanelemal...`.
* **cPanel Infrastructure:** `cpanel.xentiaindustries.com`, `autodiscover...`, `autoconfig...`.

### 2.2 Records to Target for Storefront Migration
Only the root web apex record and the primary `www` CNAME are modified:
* **Apex Record (`@` or `xentiaindustries.com`):**
  - **Type:** `A` Record
  - **Target Value:** `23.227.38.65` (Official Shopify Global Anycast IP)
  - **TTL:** `3600` (or `300` during migration testing)
* **Canonical Subdomain (`www.xentiaindustries.com`):**
  - **Type:** `CNAME` Record
  - **Target Value:** `shops.myshopify.com`
  - **TTL:** `3600`

---

## 3. Step-by-Step Production Migration Protocol

### Step 1: Pre-Flight Verification & DNS TTL Reduction
1. Log into cPanel or Registrar DNS Management.
2. Export/Screenshot current Zone File as an immutable backup.
3. Reduce TTL on the current root `A` record and `www` `CNAME` to 300 seconds (5 minutes) 24 hours prior to launch. This allows instant rollback if issues arise.

### Step 2: Shopify Domain Registration
1. In Shopify Admin, navigate to **Settings -> Domains**.
2. Click **Connect existing domain**.
3. Enter `xentiaindustries.com` (without `https://` or `www`).
4. Enter `www.xentiaindustries.com`.
5. Shopify will provide verification status.

### Step 3: DNS Record Update in cPanel Zone Editor
1. In cPanel -> **Zone Editor**:
   - Edit the `A` record for `xentiaindustries.com` -> change IP to `23.227.38.65`.
   - Edit the `CNAME` record for `www.xentiaindustries.com` -> change record to `shops.myshopify.com.`.
2. Confirm NO MX, SPF, DKIM, or mail records were altered.

### Step 4: SSL Certificate Generation & Verification
1. In Shopify Admin -> Domains, click **Verify Connection**.
2. Shopify will initiate automated Let's Encrypt / Cloudflare SSL provisioning (typically completes in 15–60 minutes, up to 24 hours maximum).
3. Confirm primary domain is set to `xentiaindustries.com` with automatic redirection of `www.xentiaindustries.com` to root (or vice versa according to client preference).

---

## 4. Rollback Procedure (Emergency Plan)

If any critical failure occurs post-migration:
1. Revert the root `A` record back to the original cPanel server IP (recorded in Step 1 backup).
2. Revert `www` CNAME to the original web host record.
3. Because TTL was reduced to 300s, propagation reversion will occur globally within 5 minutes.
4. Verify web and mail services are operational.

---

## 5. Post-Launch Verification Checklist

- [ ] `https://xentiaindustries.com` loads securely over HTTPS without certificate warnings.
- [ ] `http://xentiaindustries.com` automatically redirects to `https://`.
- [ ] `https://www.xentiaindustries.com` redirects to primary domain.
- [ ] Send and receive test emails to `xentiaindustries@gmail.com` and domain-hosted email addresses.
- [ ] Verify test order and cart transition directly into Shopify checkout on the live domain.
- [ ] Submit sitemap (`https://xentiaindustries.com/sitemap.xml`) to Google Search Console.
