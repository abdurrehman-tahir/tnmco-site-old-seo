# Gap Analysis: GEO Dossier vs. Current Implementation

This compares every recommendation in the master dossier against what has been implemented so far.

---

## ✅ What Was Implemented Successfully

| Dossier Recommendation | Status | Implementation |
|---|---|---|
| Allow AI crawlers in `robots.txt` | ✅ Partial | Added GPTBot, ChatGPT-User, PerplexityBot, ClaudeBot, Google-Extended, anthropic-ai, cohere-ai, CCBot |
| Block sensitive directories | ✅ Done | `/admin/`, `/database/`, `/scripts/`, config files blocked |
| Sitemap directive in robots.txt | ✅ Done | `Sitemap: https://tnmco.uk/sitemap.xml` |
| Clean `sitemap.xml` (remove fragments/dupes) | ✅ Done | Removed `/#about`, `/#services`, `/index.php` duplicate |
| Server-Side Rendering for core content | ✅ Already PHP | PHP templates are server-rendered by nature |
| Static H1 fallback for crawlers | ✅ Done | `<h1>` has static text; JS clears before typewriter starts |
| LocalBusiness JSON-LD schema | ✅ Done | Corrected image, address, hours, email |
| Organization JSON-LD schema | ✅ Done | With service catalog, founding date, contact point |
| WebSite JSON-LD schema | ✅ Done | With corrected SearchAction target |
| OpenGraph + Twitter Card meta tags | ✅ Done | Full OG and Twitter card set |
| Canonical URL | ✅ Done | `<link rel="canonical">` |
| Descriptive meta description | ✅ Done | Keyword-rich, 160-char description |
| Descriptive image `alt` tags | ✅ Done | All portfolio, team, hero images |
| Accessibility (`aria-label`) on icon links | ✅ Done | All social links, with `rel="noopener noreferrer"` |
| Gzip compression | ✅ Done | `.htaccess` mod_deflate |
| Browser caching headers | ✅ Done | `.htaccess` mod_expires |
| HTTPS enforcement | ✅ Done | 301 redirect in `.htaccess` |
| Defer non-critical scripts | ✅ Done | All vendor JS deferred |
| Preconnect for Google Fonts | ✅ Done | `preconnect` for fonts.googleapis.com + gstatic |
| Replace CPU-heavy animation | ✅ Done | Particles.js → CSS gradient mesh (GPU-composited) |
| Lazy-load below-fold images | ✅ Done | `loading="lazy"` on all below-fold images |
| Image compression | ✅ Done | ~2.4 MB total reduction |

---

## ❌ Critical Code-Level Gaps (Implementable Now)

### 1. Missing `llms.txt` File
> **Dossier**: *"An llms.txt file must be deployed at the root directory to provide language models with a clean, markdown-formatted map of the company's service architecture."*

**Not created.** This is a plain-text/markdown file specifically formatted for LLMs — acts as a structured directory of the company, its services, team, and case studies. High-impact for AI discoverability with zero cost.

---

### 2. Incomplete AI Crawler List in `robots.txt`
> **Dossier**: *"OAI-SearchBot, Claude-SearchBot, Claude-User, xai-crawler"*

**Missing crawlers:**
- `OAI-SearchBot` — OpenAI's real-time search retrieval bot (different from GPTBot which is for training)
- `Claude-SearchBot` — Anthropic's real-time search crawler
- `Claude-User` — Anthropic's user-session crawler
- `xai-crawler` — Grok/xAI's real-time information stream

**Also missing:** `Crawl-delay: 1` for `ClaudeBot` (training crawler) to manage server resources on shared hosting.

---

### 3. No `FAQPage` Structured Data Schema
> **Dossier**: *"Structured FAQ sections must be integrated at the bottom of all core service pages with FAQPage schema markup."*

**Not implemented.** FAQPage schema is a high-value structured data type that directly feeds Google's Rich Results and is heavily weighted by RAG systems for Q&A extraction.

---

### 4. No Explicit `width` / `height` on Most Images (CLS Risk)
> **Dossier**: *"Every image must include explicit width and height dimensions in the HTML to prevent layout shifts."*

**~20+ images missing explicit dimensions.** The hero image, about section image, portfolio screenshots, testimonial logos, and service SVGs all lack `width`/`height` attributes. This causes CLS (Cumulative Layout Shift) — browsers can't reserve space until the image downloads, so content jumps around.

---

### 5. No `font-display: swap` on Google Fonts
> **Dossier**: *"Custom web fonts must be loaded using appropriate CSS display rules to prevent shifts when the browser transitions from system fallbacks."*

Current font URL:
```
fonts.googleapis.com/css?family=Open+Sans:300,...|Montserrat:300,...
```
**Missing `&display=swap` parameter.** Without it, text is invisible (FOIT) until fonts load, hurting both LCP and CLS.

---

### 6. No `@graph` Schema Structure for Entity Disambiguation
> **Dossier**: *"AI models encounter search collisions with 'TNMOC' (The National Museum of Computing). The domain must deploy highly specific JSON-LD schemas that clearly differentiate T&M Consultants using @graph and @id anchors."*

Current schemas use 3 separate `<script>` blocks without `@id` cross-references. The dossier recommends a single `@graph` array that explicitly links the Organization to its Services via `@id` references, resolving the entity collision risk.

---

### 7. No `Service`-Type Schemas for Key Products
> **Dossier**: *"Deploy nested Service schemas to clearly define the company's specific blockchain ledger capabilities."*

The Organization schema has an `OfferCatalog` (good), but there are no standalone `Service` schema nodes with `@id` anchors for Block Ledger, QuickCard, etc. These standalone Service schemas allow AI models to directly associate specific products with the company entity.

---

### 8. Images Not Converted to WebP/AVIF
> **Dossier**: *"All web graphics must be converted into next-generation compressed formats such as WebP or AVIF, which reduce raw file sizes by up to fifty percent."*

I compressed the PNGs in-place (83% reduction on the hero), but **kept them as PNG format**. WebP would give an additional 25-40% size reduction on top of what was already achieved. AVIF would be even better but has limited cPanel/browser support.

---

### 9. No Passive Event Listeners
> **Dossier**: *"Event listeners registered for touch or scroll inputs must be marked as passive to prevent the main browser thread from blocking."*

Not addressed. jQuery's scroll and touch handlers don't use `{ passive: true }` — this affects INP scores.

---

### 10. Google Fonts API v1 → v2 Upgrade
The current font URL uses the old `css?family=` API (v1). The v2 API (`css2?family=`) supports `display=swap` natively and serves variable fonts for smaller payloads.

---

## ⚠️ Infrastructure / Hosting Gaps (Require cPanel/Server Access)

| Recommendation | Status | Notes |
|---|---|---|
| Edge CDN (Cloudflare/Bunny) for TTFB < 200ms | ❌ Not done | Shared hosting has high TTFB; Cloudflare free tier would help significantly |
| Verify CDN/firewall isn't blocking AI crawlers | ❌ Not verified | Need to check access logs for AI user-agent blocks |
| Monitor access logs for AI crawler IPs | ❌ Not done | Ongoing operational task |
| Critical CSS inlining (above-fold styles) | ❌ Not done | Would require extracting critical CSS and inlining in `<head>` |
| WebP/AVIF with `<picture>` fallback | ❌ Not done | cPanel may not have WebP MIME types configured |

---

## 📋 Strategic / Content Gaps (Beyond Code — Ongoing Initiatives)

These are **not code changes** but strategic activities the dossier recommends:

### Content Restructuring (Phase 4 in Dossier)
- [ ] Reframe page headers as exact conversational questions (e.g., "What is a custom blockchain ledger used for in e-commerce?" instead of "Blockchain Services")
- [ ] Write direct 200-word summary-first paragraphs at top of each service description
- [ ] Break dense text blocks into 2-3 sentence paragraphs
- [ ] Add structured comparison tables (e.g., QuickCard vs traditional payment systems)
- [ ] Structure content for RAG extraction — scannable lists, numbered steps, tables

### Entity & Local Consistency
- [ ] Align NAP (Name/Address/Phone) formatting across tnmco.uk, Google Business Profile, LinkedIn, Facebook, and all external directories
- [ ] Address the dual London/Faisalabad office representation — ensure both are consistently formatted everywhere
- [ ] Update LocalBusiness schema with the London registered address (49 Eglington Rd, SE18 3SL)

### E-E-A-T & Author Authority (Claude Optimization)
- [ ] Add named author bios with credentials to case studies and publications
- [ ] Avoid superlative/promotional language ("ultimate", "best", "flawless")
- [ ] Present balanced technical explanations with tradeoffs

### Review Cultivation (ChatGPT Search)
- [ ] Target average online review rating ≥ 4.3
- [ ] Encourage reviews mentioning specific deliverables (blockchain, mobile apps, project management)

### Social Signal Strategy (Grok/xAI)
- [ ] Maintain X posting frequency of 3-5 times daily
- [ ] Structure case studies as "1/n" X threads
- [ ] Build engagement from verified accounts in blockchain/startup sectors

### Off-Page Consensus Building
- [ ] Secure brand mentions on authoritative tech publications
- [ ] Establish presence on developer QA communities (Stack Overflow, Reddit)
- [ ] Digital PR campaign linking T&M to blockchain/ML expertise

---

## Recommended Implementation Priority

> [!IMPORTANT]
> The following are high-impact code changes that can be done right now, ordered by impact on AI discoverability:

| Priority | Change | Impact | Effort |
|---|---|---|---|
| **P0** | Create `llms.txt` | 🔴 Critical for LLM discovery | Low |
| **P0** | Fix `robots.txt` — add missing crawlers + Crawl-delay | 🔴 Critical for AI search | Low |
| **P1** | Upgrade JSON-LD to `@graph` with Service schemas + entity disambiguation | 🔴 High for entity resolution | Medium |
| **P1** | Add `FAQPage` schema | 🟠 High for Rich Results + RAG | Medium |
| **P1** | Add `&display=swap` to Google Fonts URL | 🟠 High for CLS/LCP | Trivial |
| **P2** | Add explicit `width`/`height` to all images | 🟡 Medium for CLS | Medium |
| **P2** | Convert PNGs to WebP with `<picture>` fallback | 🟡 Medium for LCP | Medium |
| **P2** | Upgrade to Google Fonts API v2 | 🟡 Medium for payload size | Low |
| **P3** | Passive event listeners on scroll/touch | 🟢 Low-medium for INP | Low |
| **P3** | Critical CSS inlining | 🟢 Low-medium for LCP | High |
