# Tasks

- `[x]` **Phase 1: Security & Centralized Configuration**
    - `[x]` Create `db_config.php` and `db_config.example.php`
    - `[x]` Update `.gitignore` to exclude `db_config.php`
    - `[x]` Refactor root PHP files (`Career.php`, `JobDetail.php`, `applicant_info.php`, `mail.php`) to use prepared statements and centralized config
    - `[x]` Refactor admin PHP files (`admin/login.php`, `admin/Add-page.php`, `admin/Edit-page.php`, `admin/applicants.php`, `admin/update_page.php`) to use prepared statements and centralized config
    - `[x]` Implement secure bcrypt authentication in `admin/login.php` with seamless MD5 fallback auto-upgrade

- `[x]` **Phase 2: Performance Optimization**
    - `[x]` Configure Gzip, caching, and HTTPS redirection in `.htaccess`
    - `[x]` Optimize rendering by deferring scripts and preconnecting fonts in `index.php`
    - `[x]` Update `index.php` and `assets/css/style.css` to replace particles.js with a hardware-accelerated CSS animated gradient mesh
    - `[x]` Add lazy-loading to images below the fold
    - `[x]` Compress heavy assets (e.g., `aboutNew.png` and team PNG files) using Python compression script

- `[x]` **Phase 3: SEO & AI Search Discoverability**
    - `[x]` Update `index.php` to include static fallback text in the hero `<h1>` tag
    - `[x]` Update `assets/js/main.js` typewriter logic to clear fallback static text before animation
    - `[x]` Consolidate duplicate JSON-LD Schema structures and correct career search target in `index.php`
    - `[x]` Add OpenGraph and Twitter card metadata tags to `index.php`
    - `[x]` Correct generic/incorrect portfolio and team image `alt` attributes
    - `[x]` Add `aria-label` screen reader tags to social links
    - `[x]` Update `robots.txt` for standard user-agents and allow AI search bots
    - `[x]` Clean up fragment links (`#`) and duplicates in `sitemap.xml`

- `[x]` **Phase 4: GEO & Technical SEO Deep-Dive (Dossier Gaps)**
    - `[x]` Create root `llms.txt` plain markdown map for AI models and conversational engines
    - `[x]` Fix incomplete AI crawler list in `robots.txt` (added `OAI-SearchBot`, `Claude-SearchBot`, `Claude-User`, `xai-crawler`) and implemented ClaudeBot Crawl-delay
    - `[x]` Overhaul JSON-LD schemas into a single consolidated `@graph` array with `@id` anchors to resolve entity ambiguity/collisions (TNMCO vs TNMOC)
    - `[x]` Add structured `FAQPage` schema markup for Rich Results and conversational search RAG extraction
    - `[x]` Upgrade Google Fonts to API v2 and add the `&display=swap` parameter to resolve CLS/FOIT
    - `[x]` Eliminate Cumulative Layout Shift (CLS) by adding explicit `width` and `height` properties to all site images (index, Career, JobDetail pages)
    - `[x]` Optimize scroll responsiveness (INP) by consolidating jQuery scroll handlers in `main.js` into a single native, passive scroll event listener
    - `[x]` Fix broken client testimonial image reference typo from `cominfo.png` to `cominfo-logo.png`
