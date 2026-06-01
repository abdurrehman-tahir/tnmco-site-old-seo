# How to Deploy on cPanel

This guide provides step-by-step instructions on deploying the PHP-based TNMCO Website on a cPanel hosting environment.

---

## 📋 Prerequisites

Before starting the deployment process, ensure you have:
- **cPanel access** credentials from your hosting provider.
- **MySQL database details** (or permission to create a new one).
- **SMTP credentials** for outgoing mail functionality (e.g., job application notifications).
- **SSL certificate** installed (AutoSSL or Let's Encrypt) to enable HTTPS.

---

## 🛠️ Step 1: Export Local Database Schema
If you have a local MySQL database running:
1. Open your local database management tool (e.g., phpMyAdmin, DBeaver, or command line).
2. Export the database schema (and any seed data) to a `.sql` file.

> [!NOTE]
> The database contains tables for managing job listings (`jobs`/`careers`), job applicants (`applicants`), and admin login credentials.

---

## 🗄️ Step 2: Create a MySQL Database in cPanel
1. Log in to your **cPanel dashboard**.
2. Navigate to **Databases** > **MySQL® Database Wizard**.
3. **Create a Database**: Enter a name for your database (e.g., `tnmco_db`) and click *Next Step*.
4. **Create a User**: Enter a username (e.g., `tnmco_user`) and a strong password. Click *Create User*.
5. **Assign Privileges**: Check the box for **ALL PRIVILEGES** to link the user to the database. Click *Make Changes*.
6. **Import Schema**:
   - Go back to cPanel Home and open **phpMyAdmin**.
   - Select your newly created database from the left sidebar.
   - Click the **Import** tab at the top.
   - Choose your exported `.sql` file and click **Go** to import tables.

---

## 📦 Step 3: Prepare and Upload Files
1. In your local development machine, compress the project files into a `.zip` archive.
   > [!TIP]
   > Exclude unnecessary files such as `.git`, `.gitignore`, local development configs, and other temp files to keep the archive small.
2. In **cPanel**, navigate to **Files** > **File Manager**.
3. Go to the root directory for your domain (usually `public_html` or a custom folder if deploying to a subdomain).
4. Click **Upload** at the top menu, choose your `.zip` archive, and wait for the upload to complete.
5. Select the uploaded `.zip` file in File Manager, click **Extract** in the top menu, and extract the files to the root directory.

---

## ⚙️ Step 4: Configure Environment Variables
You need to set up database credentials and SMTP details so the live site can talk to your database and send email notifications.

1. In the cPanel File Manager, locate the file `db_config.example.php`.
2. Rename `db_config.example.php` to `db_config.php`.
3. Select `db_config.php` and click **Edit** (or **Code Editor**) at the top.
4. Replace the template values with your cPanel database and SMTP credentials:
   ```php
   define('DB_SERVER', 'localhost'); // Usually localhost in cPanel
   define('DB_USERNAME', 'your_cpanel_db_username');
   define('DB_PASSWORD', 'your_cpanel_db_password');
   define('DB_NAME', 'your_cpanel_db_name');

   define('SMTP_HOST', 'mail.yourdomain.com');
   define('SMTP_USERNAME', 'your_smtp_email');
   define('SMTP_PASSWORD', 'your_smtp_password');
   define('SMTP_PORT', 465); // Standard port for SSL/TLS SMTP mail
   ```
5. Click **Save Changes**.

---

## ☕ Step 5: Verify PHP Version & Settings
This project runs on **PHP 8.1**. The `.htaccess` file contains a handler specifying PHP 8.1, but you should verify this configuration inside cPanel:

1. In the **cPanel dashboard**, search for **MultiPHP Manager** or **Select PHP Version**.
2. Select your domain name from the list.
3. Choose **PHP 8.1** (or higher, matching system requirements) from the dropdown and click **Apply**.

---

## 🔒 Step 6: SSL/HTTPS and Optimization Check
The `.htaccess` file in this project is pre-configured to automatically handle:
- Redirection of all HTTP traffic to HTTPS.
- Gzip compression of text/HTML, CSS, JS, and JSON resources.
- Browser caching/expires headers for static assets.

Verify these rules are active by visiting `https://yourdomain.com` and inspecting page headers in your browser developer tools to ensure `content-encoding: gzip` and `cache-control` are present.

---

## 🚀 Step 7: Post-Deployment Smoke Test
1. **Homepage Check**: Open your website in a browser and verify that static assets (CSS, JS, fonts, images) load properly.
2. **Career Page Form**: Navigate to the Careers section and submit a test application to confirm database writes (`applicant_info.php`) and email triggers (`mail.php`) are fully functioning.
3. **Admin Dashboard**: Visit `https://yourdomain.com/admin` to confirm administrative logins and page management controls function under the newly imported database credentials.
