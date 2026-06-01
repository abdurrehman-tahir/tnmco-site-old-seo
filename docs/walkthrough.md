# Full Audit Walkthrough — TNMCO SEO & GEO Implementation

## Summary

Comprehensive audit of every P0–P3 item from the gap analysis (derived from the master dossier) against the current codebase. **Three bugs were found and fixed** during this audit.

---

## Bugs Found & Fixed During This Audit

### 🔴 Bug 1: Logo transparency destroyed during compression
- **Root cause**: The earlier image compression script converted `tnmLogo.png` and `whitelogo.png` from RGBA (transparent) to RGB (opaque), filling transparent areas with a solid background.
- **Visible symptom**: Logo appeared as an ugly rectangle on the transparent header over the dark hero section.
- **Fix**: Re-compressed both logos from the original git commit, preserving RGBA transparency while still achieving 68–81% size reduction.

| File | Original | Broken (RGB) | Fixed (RGBA) | Reduction |
|---|---|---|---|---|
| `tnmLogo.png` | 280 KB | 69 KB | 89 KB | 68% |
| `whitelogo.png` | 226 KB | 1 KB | 44 KB | 81% |

### 🔴 Bug 2: Hero content hidden behind particles canvas
- **Root cause**: When the blob animation CSS was removed, the `#hero .container { position: relative; z-index: 2; }` rule was also deleted. Without it, the hero text/image sat behind the particles canvas at z-index 0.
- **Fix**: Restored the z-index rule in `style.css`.

### 🟡 Bug 3: PHP warning on db_config.php connection failure
- **Root cause**: `mysqli_report(MYSQLI_REPORT_OFF)` didn't suppress the PHP warning from `new mysqli()` when the database server is unreachable.
- **Fix**: Changed to `MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR` + `@new mysqli(...)` error suppression, so the exception is caught cleanly by the try/catch block.

---

## P0 — Critical for LLM/AI Discovery ✅

### `llms.txt` — [llms.txt](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/llms.txt)
- ✅ Created at root with structured markdown
- ✅ Company identity (legal name, trading name, domain, company number, type, founded, addresses)
- ✅ All 7 core services with descriptions
- ✅ Portfolio/key projects listed
- ✅ Leadership team with LinkedIn links
- ✅ Social mission section
- ✅ External links (website, careers, social)

### `robots.txt` — [robots.txt](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/robots.txt)
- ✅ Blocks `/admin/`, `/database/`, `/scripts/`, config files
- ✅ **All AI crawlers allowed**: OAI-SearchBot, GPTBot, ChatGPT-User, Google-Extended, PerplexityBot, Claude-SearchBot, Claude-User, xai-crawler, anthropic-ai, cohere-ai, CCBot
- ✅ `ClaudeBot` with `Crawl-delay: 1` for training crawler rate limiting
- ✅ `Sitemap: https://tnmco.uk/sitemap.xml`

---

## P1 — High Impact ✅

### Unified `@graph` JSON-LD Schema — [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php#L89-L262)
- ✅ Single `@graph` array (not 3 separate script blocks)
- ✅ `WebSite` with `@id` anchor and `SearchAction`
- ✅ `Organization` + `ProfessionalService` dual type
- ✅ Entity disambiguation description mentioning TNMOC separation
- ✅ `alternateName` array for all known variants
- ✅ `taxID` (company number) for unique identification
- ✅ Dual addresses (UK + PK) with `@id` anchors
- ✅ `makesOffer` linking to 6 Service `@id` references
- ✅ 6 standalone `Service` schemas with `@id`, `provider`, `description`, `areaServed`
- ✅ `LocalBusiness` with geo coordinates, opening hours, `sameAs`
- ✅ All nodes cross-referenced via `@id` anchors

### `FAQPage` Schema — [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php#L1473-L1529)
- ✅ 6 questions covering services, Block Ledger/QuickCard, location, TNMCO vs TNMOC disambiguation, social mission, contact info
- ✅ Valid JSON-LD (verified programmatically)
- ✅ Positioned for Google Rich Results and RAG extraction

### Google Fonts `display=swap` — [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php#L24)
- ✅ Upgraded from API v1 (`css?family=`) to API v2 (`css2?family=`)
- ✅ `&display=swap` appended — eliminates FOIT, improves CLS
- ✅ `preconnect` hints for `fonts.googleapis.com` + `fonts.gstatic.com`

---

## P2 — Medium Impact ✅

### Explicit `width`/`height` on All Images
- ✅ Every `<img>` in `index.php` has `width` and `height` attributes (verified by regex — zero images without `width` found)
- ✅ Logo images in `Career.php` and `JobDetail.php` also have dimensions
- ✅ Global `img { max-width: 100%; height: auto; }` ensures responsive scaling while preventing CLS

### Image Compression
- ✅ All team photos, hero image, logos compressed (total ~2.4 MB reduction)
- ✅ Logo files re-compressed with RGBA transparency preserved (fixed in this audit)

### Google Fonts API v2
- ✅ Using `css2?family=` syntax with proper weight ranges

---

## P3 — Low-Medium Impact ✅

### Passive Scroll Listeners — [main.js](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/js/main.js#L80-L115)
- ✅ Three separate jQuery `$(window).scroll()` handlers consolidated into one native `window.addEventListener('scroll', fn, { passive: true })`
- ✅ Handles: back-to-top visibility, header scroll class, navigation active state

### Particles.js Animation — [main.js](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/js/main.js#L299-L391)
- ✅ `particles.js` library restored in HTML
- ✅ Configuration in `main.js` with improved settings (120 particles, grab hover mode, size animation)
- ✅ `#particles-js` div in hero section
- ✅ CSS positioning (`position: absolute; z-index: 0`)
- ✅ Hero content layered above (`z-index: 2`) — **fixed in this audit**

---

## Previously Implemented (Verified Still Working) ✅

| Item | File | Status |
|---|---|---|
| HTTPS enforcement | `.htaccess` | ✅ 301 redirect |
| Gzip compression | `.htaccess` | ✅ mod_deflate |
| Browser caching | `.htaccess` | ✅ mod_expires (1 year for assets) |
| SEO meta tags | `index.php` | ✅ description, keywords, robots, author |
| Open Graph tags | `index.php` | ✅ Full OG set with image |
| Twitter Card tags | `index.php` | ✅ summary_large_image |
| Canonical URL | `index.php` | ✅ `https://tnmco.uk/` |
| Static H1 fallback | `index.php` | ✅ "All In One Place!" |
| Descriptive alt tags | `index.php` | ✅ All images |
| Aria-labels on socials | `index.php` | ✅ With `rel="noopener noreferrer"` |
| Deferred scripts | `index.php` | ✅ All vendor + main.js |
| Lazy loading | `index.php` | ✅ Below-fold images |
| Clean sitemap | `sitemap.xml` | ✅ No fragments, no dupes |
| SQL injection protection | All PHP files | ✅ Prepared statements |
| Centralized DB config | `db_config.php` | ✅ With graceful offline fallback |
| Secure admin auth | `admin/login.php` | ✅ bcrypt with MD5 auto-upgrade |

---

## Not Implemented (Infrastructure / Content — Not Code Changes)

| Item | Reason |
|---|---|
| WebP/AVIF image conversion | Requires cPanel MIME type config + `<picture>` fallback testing |
| Critical CSS inlining | High effort, low-medium impact, risk of breaking mobile styles |
| CDN (Cloudflare) | Infrastructure decision, not a code change |
| AI crawler log monitoring | Ongoing ops task |
| Content restructuring | Strategic content writing, not code |
| E-E-A-T author bios | Content strategy |
| Review cultivation | Business operations |

---

## Files Modified in This Session

| File | Changes |
|---|---|
| [style.css](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/css/style.css) | Added global `img` responsive rule; restored `#particles-js` CSS; added `#hero .container` z-index; logo `width: auto` |
| [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php) | Restored `#particles-js` div; restored `particles.js` script tag |
| [main.js](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/js/main.js) | Added full `particlesJS()` configuration with improved settings |
| [db_config.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/db_config.php) | Fixed PHP warning suppression on connection failure |
| `tnmLogo.png` | Re-compressed with RGBA transparency preserved (89 KB) |
| `whitelogo.png` | Re-compressed with RGBA transparency preserved (44 KB) |
