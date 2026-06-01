# Implementation Plan - Performance, SEO, & Security Roadmap

This plan outlines the specific steps to execute the approved recommendations from the website audit. The goal is to secure the site (prevent SQL injection, remove hardcoded credentials), optimize the first-load performance (cache, compress, replace particles.js with a hardware-accelerated CSS animated mesh, compress images), and integrate modern AI search/discoverability (static H1 fallback, robots.txt update, schema consolidation, OpenGraph tags).

## User Review Required

Please review the following key decisions:

> [!IMPORTANT]
> **Database Credentials & Local Config:**
> We will create a local configuration file `db_config.php` to hold constants and database connection objects. This file is added to `.gitignore` to prevent committing password secrets. An template `db_config.example.php` will be created for reference.
>
> **MD5 to BCrypt Migration:**
> For the administrator password hashing, we will update `admin/login.php` to use PHP's secure `password_verify()`. If there are existing accounts with MD5 hashes, they will not match unless they are updated. We will implement a seamless migration fallback in `login.php`: if the database password is a 32-character MD5 hash and matches the MD5 of the entered password, we will log the user in AND automatically re-hash the password using `password_hash()` (bcrypt) in the database, securing their account dynamically.

> [!TIP]
> **Improving the Animation Quality (Replacing particles.js):**
> We will replace `particles.js` (which causes main-thread lag) with a highly premium, modern, and fluid CSS animated gradient mesh. This mesh uses hardware-accelerated transforms (`translate3d`, `rotate`, `scale`) and SVG morphing path animations (or keyframes) that look state-of-the-art and run at a silky-smooth 60fps with 0% CPU consumption.

---

## Proposed Changes

### Security & Centralized Configuration

#### [NEW] [db_config.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/db_config.php)
*   Create connection constants (Server, User, Pass, DB, Mailer credentials).
*   Initialize a single MySQLi database object `$conn`.
*   Provide utility functions for safe query execution (handling standard prepared statement boilerplate).
*   Add mailer settings so credentials in `mail.php` are also centralized.

#### [NEW] [db_config.example.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/db_config.example.php)
*   An example file matching `db_config.php` without active secret passwords, to serve as a guide for development.

#### [MODIFY] [.gitignore](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/.gitignore)
*   Add `db_config.php` to prevent committing local passwords.

#### [MODIFY] [Career.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/Career.php)
*   Remove hardcoded credentials. Include `db_config.php`.
*   Refactor job search query to use parameterized statements (`$stmt->bind_param("ss", ...)`) to block SQL injection.

#### [MODIFY] [JobDetail.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/JobDetail.php)
*   Remove hardcoded credentials. Include `db_config.php`.
*   Verify parameterized fetch of career opportunities.

#### [MODIFY] [applicant_info.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/applicant_info.php)
*   Remove hardcoded credentials. Include `db_config.php`.
*   Refactor the `insert into applicants` query to use prepared statements (`$stmt = $conn->prepare(...)` and `$stmt->bind_param("isssss", ...)`) to block SQL injection.

#### [MODIFY] [mail.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/mail.php)
*   Remove hardcoded email SMTP credentials. Include `db_config.php` and read credentials from centralized configuration.

#### [MODIFY] [admin/login.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/login.php)
*   Remove hardcoded credentials. Include `../db_config.php`.
*   Refactor the user lookup query using prepared statements.
*   Implement safe password verification (bcrypt) with MD5-upgrade logic.

#### [MODIFY] [admin/Add-page.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/Add-page.php), [admin/Edit-page.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/Edit-page.php), [admin/applicants.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/applicants.php), [admin/update_page.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/admin/update_page.php)
*   Include `../db_config.php`.
*   Ensure all dynamic queries use parameterized values.

---

### Performance Optimization (Loading Speed)

#### [MODIFY] [.htaccess](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/.htaccess)
*   Add gzip output compression configuration (`mod_deflate`).
*   Add Expires/Cache-Control headers for images, CSS, JS, and fonts (`mod_expires`).
*   Configure permanent HTTP to HTTPS redirect.

#### [MODIFY] [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php)
*   **De-block head:** Defer FontAwesome kit and local script tags, add `rel="preconnect"` for Google Fonts domains.
*   **Lazy load:** Add `loading="lazy"` to all images below the fold (e.g. portfolio and team images).
*   **Particles Replacement:** Remove the particles canvas container. Add structural markup for a CSS dynamic gradient background in the Hero section.
*   **Script Cleanups:** Remove `particles.js` library import.

#### [MODIFY] [assets/css/style.css](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/css/style.css)
*   Define variables, keyframe animations, and styling for a modern, hardware-accelerated CSS animated gradient mesh. 
*   This uses morphing radial gradients that animate dynamically to simulate high-end glassmorphism blobs, resolving rendering lag.

#### [NEW] [compress_images.py](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/scratch/compress_images.py)
*   A scratch utility script to automate compression of `aboutNew.png` (resizing and saving it under 150KB) and other heavy team PNG images.
*   It runs a automated local virtual environment, installs Pillow, compresses the images, and updates them in the assets folder.

---

### SEO & AI Search Integration (Discoverability)

#### [MODIFY] [index.php](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/index.php)
*   **H1 Fallback:** Render the core value proposition text directly inside `<h1 class="cursor">` (e.g., `Technology and Management Solutions All In One Place!`) in the server-rendered HTML.
*   **Metadata Consolidation:** Remove the empty `<meta>` tags and clean up metadata.
*   **Schema.org JSON-LD:** Consolidate the two duplicate WebSite schemas. Correct the search query target pointing to career search. Add complete fields to `LocalBusiness` schema.
*   **OpenGraph Tags:** Add `og:title`, `og:description`, `og:image`, `og:url` and Twitter cards.
*   **Descriptive Alts:** Add descriptive `alt` tags to all portfolio and team images, replacing generic texts like `"init img"` or `"Qc img"`.
*   **Aria-Labels:** Add `aria-label` tags to footer social icons for crawlers and screen readers.

#### [MODIFY] [assets/js/main.js](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/assets/js/main.js)
*   Update `typeWriter()` logic to check if `<h1 class="cursor">` has static text, clear it upon JS load, and proceed with the interactive typewriter carousel animation.

#### [MODIFY] [robots.txt](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/robots.txt)
*   Change target directive to standard `User-agent: *`.
*   Add explicit allow rules for AI search agents `OAI-SearchBot` and `PerplexityBot`.
*   Link to the XML sitemap `Sitemap: https://tnmco.uk/sitemap.xml`.

#### [MODIFY] [sitemap.xml](file:///Users/abdurrehman/Documents/GitHub/tnmco-site-old-seo/sitemap.xml)
*   Remove fragment `#about` and `#services` links.
*   Consolidate `/index.php` duplicate link.

---

## Verification Plan

### Automated Tests
*   Run PHP Syntax check on all modified PHP files:
    ```bash
    find . -name "*.php" -exec php -l {} \;
    ```
*   Verify SQL queries compile successfully.
*   Analyze compressed image sizes to verify reduction (e.g., `aboutNew.png` < 150KB).

### Manual Verification
*   Verify that the visual typewriter animation runs properly in the browser.
*   Check the Hero background to ensure the CSS-based animated mesh runs smoothly.
*   Validate structured schema code using Schema.org validator.
*   Verify that page source (command-line `curl` or "View Page Source") shows the static H1 text and structured schema.
