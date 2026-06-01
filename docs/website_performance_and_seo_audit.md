# T&M Consultants: Website Performance, SEO, & AI Discoverability Audit

This audit evaluates the codebase of the T&M Consultants website across three core dimensions: **Loading Speed (Performance)**, **Traditional Search Engine Optimization (SEO)**, and the **AI Search Shift (Generative Engine Optimization / GEO & LLM Discoverability)**. As a value-added bonus, it also highlights critical **Security and Code Quality** vulnerabilities discovered during the static analysis.

---

## 1. Executive Summary

The T&M Consultants website is built on a traditional PHP architecture (PHP 8.1 default on cPanel) utilizing a legacy theme template. While the structure is clean and modular, it suffers from several optimization bottlenecks that explain why it is **"quite slow on first load."**

Furthermore, the shift in search towards AI-powered answer engines (like ChatGPT Search, Google AI Overviews, Perplexity, and Claude) presents a major challenge for the current codebase. Because the site relies on client-side JavaScript to inject key page headings, **AI search bots—which do not execute JavaScript—currently see an empty primary heading (`<h1>`)**, making the site virtually invisible to their value-extraction mechanisms.

---

## 2. Technical Loading Speed (Performance) Audit

A slow first load directly hurts user retention and is a major negative ranking signal for both Google (via Core Web Vitals) and AI search agents. The audit identified the following root causes:

### 2.1. Critical Render-Blocking Resources in `<head>`
In `index.php`, the browser is forced to halt rendering to download and parse multiple heavy external assets before it can paint anything on screen:
*   **CSS Files (Lines 25–34):** 7 separate CSS stylesheets are loaded synchronously (Bootstrap, FontAwesome, Ionicons, Venobox, Owl Carousel, AOS, and custom styles).
*   **FontAwesome Kit JS (Line 35):** Loaded synchronously in the head: `<script src="https://kit.fontawesome.com/..."></script>`.
*   **jQuery Library (Line 37):** Loaded synchronously in the head: `<script src="assets/vendor/jquery/jquery.min.js"></script>`.
*   **Google Fonts (Line 23):** Loaded without connection pre-hinting (`preconnect`).

> [!TIP]
> **Remedy:** Move non-critical CSS to the footer, load JS scripts with the `defer` or `async` attribute, preconnect to Google Font domains, and load jQuery asynchronously or eliminate its dependency on initial render.

### 2.2. Extremely Heavy & Unoptimized Assets
Large images are the #1 cause of slow loading speeds. The site has several heavy assets loaded in the viewport or shortly below it:
*   `assets/img/aboutNew.png` is **1.26 MB** (1,266,902 bytes). This is massive for a web image and blocks FCP (First Contentful Paint).
*   The primary brand logo `assets/img/tnmLogo.png` is **280 KB**. Logo assets should ideally be highly optimized SVGs under **10 KB** or highly compressed WebP files under **15 KB**.
*   `assets/img/fix-size-01.png` (loaded in the hero section viewport) is **298 KB**.
*   `assets/img/whitelogo.png` is **226 KB**.
*   **Team Images (`assets/img/team/`):** Multiple team member images range from **161 KB to 478 KB** (e.g., `mubashir-farooq.png` is 478 KB). These are PNG files without compression or modern formats, loaded simultaneously.

> [!TIP]
> **Remedy:** Convert all PNG/JPG images to WebP format (typically 70-80% smaller with identical visual quality) and add the native `loading="lazy"` attribute to all images below the fold. Convert logos to optimized SVG format.

### 2.3. Server-Level Deficiencies (`.htaccess`)
The server configuration file `[ .htaccess ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/.htaccess)` is missing essential modern headers:
*   **No Gzip/Brotli Compression:** Text assets (HTML, CSS, JS, SVG) are sent raw over the network, dramatically increasing transfer times.
*   **No Browser Caching:** No `Cache-Control` or `Expires` headers are configured. Returning visitors must re-download every CSS, JS, and image asset on every page load.
*   **No HTTP-to-HTTPS Redirects:** The server does not enforce secure connections at the server level, forcing users to connect to unencrypted HTTP if they type the URL without `https://`.

### 2.4. CPU-Heavy Background Scripts (`particles.js`)
The hero section uses `particlesJS` (`assets/vendor/particles/particles.js`, initialized in `main.js` line 297).
*   Canvas-based animations run continuously on the main thread, causing significant **CPU usage**.
*   This delays **TTI (Time to Interactive)** and degrades **INP (Interaction to Next Paint)**, which replaced First Input Delay as a Core Web Vitals metric in March 2024.

---

## 3. Traditional SEO Audit

While the site includes basic metadata, several legacy practices and technical errors dilute its search engine authority.

### 3.1. Title, Meta, and Duplicate Tags
In `[ index.php ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php)`:
*   **Empty Meta Tags:** Lines 15–16 contain empty attributes:
    ```html
    <meta content="" name="">
    <meta content="" name="">
    ```
*   **Malformed Meta Tag:** Line 159 contains an incomplete metadata instruction:
    ```html
    <meta name="revisit-after" content=" days">
    ```
*   **Missing Canonical Tag:** There is no `<link rel="canonical" href="https://tnmco.uk/">`. This prevents search engines from consolidating link equity if they crawl different URL formats (e.g., `http` vs. `https`, or with/without `index.php`).

### 3.2. robots.txt and Sitemap.xml Errors
*   **robots.txt Restrictions:** The `[ robots.txt ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/robots.txt)` file is configured to *only* address Googlebot:
    ```text
    User-agent: Googlebot
    Disallow: /database/
    Disallow: /scripts/
    ```
    This means other search engines (Bing, DuckDuckGo) and AI crawlers do not have clear rules, and there is no reference linking to the sitemap.
*   **Sitemap.xml Fragment Links:** The `[ sitemap.xml ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/sitemap.xml)` contains URLs with fragment identifiers:
    ```xml
    <loc>https://tnmco.uk/#about</loc>
    <loc>https://tnmco.uk/#services</loc>
    ```
    Fragment identifiers (`#`) are ignored by indexers and should never be listed in an XML sitemap. Additionally, listing both `https://tnmco.uk/` and `https://tnmco.uk/index.php` creates a duplicate content conflict.

### 3.3. Broken & Malformed Structured Data (Schema.org JSON-LD)
*   **Duplicate WebSite Schema:** The site declares the `WebSite` schema twice (Lines 60–72 and Lines 74–86).
*   **Broken Search Target:** The first WebSite schema target query points to:
    ```text
    "target": "https://tnmco.uk/Career.php{search_term_string}"
    ```
    This is broken and missing the query parameter prefix (e.g., `?search=`).
*   **Incomplete LocalBusiness Schema (Lines 89–127):**
    *   `"image": "https://tnmco.uk/"` points to the home directory rather than a physical logo or building image file.
    *   `"streetAddress": ""` is completely empty.

### 3.4. Non-Descriptive Image Alt Tags
Multiple portfolio items use generic or incorrect alternative text, which harms image search indexing and accessibility:
*   NonRival Data Web image uses `alt="init img"` instead of describing the project.
*   Docushield App uses `alt="esehat logo"`. This is incorrect branding.
*   Mintit-Studio uses `alt="Qc img"` (Quick Card image) instead of its own name.

---

## 4. The AI Shift: Generative Engine Optimization (GEO) & AI Discoverability

Search has fundamentally changed. Users are increasingly turning to **AI Search Engines / Answer Engines** (ChatGPT Search, Perplexity, Google Gemini, Claude, Apple Intelligence) to find developers and consultants. 

Rather than displaying a list of blue links, these engines compile a single synthesised answer and **cite the most authoritative sources**. To be visible, websites must transition from SEO to **GEO (Generative Engine Optimization)**.

### 4.1. The JavaScript Rendering Barrier (Critical AI Block)
Based on recent industry indexing studies, **most dedicated AI crawlers (e.g., OpenAI's GPTBot, Anthropic's ClaudeBot, and Perplexity's PerplexityBot) do not execute JavaScript.** They retrieve and parse only the raw, server-rendered HTML source code.

*   In `[ index.php ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php)`, the main page heading `<h1>` is completely empty in the HTML source:
    ```html
    <h1 class="cursor"></h1>
    ```
*   The actual headline text is injected dynamically via client-side jQuery (`main.js` line 243):
    ```javascript
    var textArray = [
        "All In One Place!",
        "BlockChain Ledger!",
        "E-Commerce!",
        "Moblie App Development!",
        "Machine Learning!"
    ];
    ```
*   **The Consequence:** When an AI search engine crawls your page, it reads an **empty H1 heading**. It fails to connect your site with "Blockchain," "E-Commerce," "Mobile App Development," or "Machine Learning" in its heading hierarchy, leading to a massive loss in discoverability scores.

> [!IMPORTANT]
> **Remedy:** The primary heading must be server-rendered inside the `<h1>` tag by default so crawlers can read it instantly. The typing animation can still be layered on top via progressive enhancement, replacing the static text once JavaScript loads.

### 4.2. Key Optimization Factors based on Scientific Research (GEO)
According to the foundational GEO research paper (*"Generative Engine Optimization"* by Aggarwal, Murahari et al. from Princeton/Allen Institute) and recent 2025 Cornell-affiliated studies on AI search dominance:
1.  **Citations & Sources:** AI engines favor pages that explicitly cite authoritative sources, reference databases, or provide external links.
2.  **Quantitative Data (Statistics):** Including numerical statistics, performance figures, and hard facts increases the probability of an LLM citing your text.
3.  **Conversational Headings:** AI users write query prompts as full questions. Restructuring H2/H3 subheadings as questions (e.g., *"How does a custom Blockchain Ledger improve E-commerce security?"*) allows AI models to align queries directly with your content.
4.  **E-E-A-T & Expert Bios:** LLMs crawl structured schemas and author bio sections to verify expertise. The team bios in the modals (lines 1201–1364) are loaded dynamically inside hidden bootstrap modals, but they should be fully annotated with **Person and ProfilePage schema** to verify credentials.

### 4.3. Modern AI Crawler Rules in robots.txt
To make the site highly discoverable by AI models while preventing unwanted background scrapers, the `robots.txt` file should explicitly define directives for AI agents:
*   **Allow search-oriented AI bots:** explicitly allow `OAI-SearchBot` (OpenAI search), `Claude-SearchBot`, and `PerplexityBot`.
*   **Optionally block training scrapers:** If you want to prevent companies from scraping your proprietary code or portfolio without citing you, block `GPTBot` and `ClaudeBot` while leaving search bots active.

---

## 5. Security & Code Quality Audit (Critical Bonus)

During the codebase audit, several high-risk security vulnerabilities were identified. These must be addressed immediately to prevent database compromise or unauthorized administrative access.

### 5.1. SQL Injection Vulnerabilities (High Risk)
*   **In `[ Career.php ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/Career.php)`:**
    ```php
    $sql = $sql." and  location = '".$_POST['location']."' and job_type = '".$_POST['type']."'";
    ```
    The inputs `$_POST['location']` and `$_POST['type']` are concatenated directly into the SQL query without sanitation, escaping, or prepared statements. Any user can manipulate these POST fields to execute arbitrary SQL commands on your database.
*   **In `[ admin/login.php ](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/login.php)`:**
    ```php
    $sql = "SELECT user_name, password FROM user where user_name = '".$user."';";
    ```
    The username is passed directly from POST parameters into the query. An attacker can input `' OR '1'='1` to bypass authentication entirely and log in as an administrator.

> [!CAUTION]
> **Remedy:** Migrate all database queries to use **Prepared Statements** with parameterized inputs (using PHP's `PDO` or prepared `mysqli` statements).

### 5.2. Hardcoded Database Credentials
In `Career.php`, `JobDetail.php`, and `admin/login.php`, database credentials are hardcoded directly into the script:
```php
$servername = "localhost";
$username = "dev_tnm";
$password = "fQUQK@8kpV^r";
$dbname = "db_tnm";
```
If these files are committed to a public GitHub repository, your database password is exposed to the public.

> [!IMPORTANT]
> **Remedy:** Move database credentials into an environment variable configuration (e.g., using a `.env` file and loading them via PHP's `getenv()` or a basic configuration file excluded from Git).

### 5.3. Legacy Cryptography (MD5)
In `admin/login.php`, user passwords are validated using the obsolete MD5 hashing algorithm:
```php
if($row["password"] == md5($pass)){
```
MD5 is highly vulnerable to collision attacks and rainbow table lookups. If the database is leaked, admin passwords can be cracked instantly.

> [!TIP]
> **Remedy:** Migrate password verification to PHP's built-in `password_hash()` and `password_verify()` functions using secure modern algorithms like Argon2id or bcrypt.

---

## 6. Recommendations Roadmap

To solve the loading speed bottlenecks, update the site for traditional/AI SEO, and secure the application, we propose the following phased roadmap:

### Phase 1: Security & Stability (Immediate)
*   [ ] Refactor `Career.php` and `admin/login.php` to use **prepared statements** to block SQL injections.
*   [ ] Relocate hardcoded DB credentials into a secure config file or `.env` loader.
*   [ ] Upgrade password storage from MD5 to **bcrypt** (`password_hash`).

### Phase 2: Performance Optimization (Loading Speed)
*   [ ] **Asset Compression:** Compress `aboutNew.png` (from 1.26MB to <150KB WebP) and convert portfolio images to WebP. Convert logo to SVG.
*   [ ] **Server Optimizations:** Add `mod_deflate` (Gzip) and `Expires` headers for browser caching to `.htaccess`. Enforce HTTPS.
*   [ ] **De-block Render:** Add `defer` tags to scripts, load non-critical CSS asynchronously, and implement resource preconnecting.
*   [ ] **INP Optimization:** Set up a toggle or pause control on `particles.js`, or replace it with a lightweight CSS gradient mesh to free up main thread processing.

### Phase 3: SEO & AI Search Integration (Discoverability)
*   [ ] **H1 Dynamic Fallback:** Populate the `<h1>` tag in `index.php` with static, crawlable fallback text (e.g. `"Technology and Management Solutions All In One Place!"`), then use the JS typewriter script to animate it for visual users.
*   [ ] **robots.txt & sitemap.xml:** Restructure `robots.txt` to define clear rules for AI bots (`OAI-SearchBot`, `PerplexityBot`), fix duplicate entries and remove fragment `#` links in `sitemap.xml`.
*   [ ] **Schema Markup Cleanup:** Merge duplicate schemas, correct the broken career search target, and fill out local business details (address, logo URL).
*   [ ] **Add OpenGraph Meta:** Inject standard OpenGraph and Twitter card meta tags to render card representations in AI systems.
*   [ ] **Content Structural Alignment:** Format pages with "Answer-First" introductory copy and write direct questions as headings.
