# Yoga Prosperity Model — Admin System Setup Guide

This gives your client a self-service way to:
1. Create new webinar landing pages (no Loveable needed)
2. See every contact-form / registration submission in one place (+ email alert)
3. Edit the Razorpay payment link per page, anytime

---

## STEP 1 — Create the MySQL database (cPanel)

1. Log in to cPanel → **MySQL Databases**.
2. Under "Create New Database", enter a name like `admin` → Create Database.
   (cPanel will prefix it automatically, e.g. `yogaprosp_admin`.)
3. Under "MySQL Users → Add New User", create a user + strong password.
4. Under "Add User to Database", add that user to the database you just made,
   and grant **ALL PRIVILEGES**.
5. Write down: **DB name, DB username, DB password** — you'll need them in Step 3.

## STEP 2 — Import the schema

1. In cPanel, open **phpMyAdmin**.
2. Click your new database on the left.
3. Click the **Import** tab → Choose File → select `db/schema.sql` from this
   package → Go.
4. This creates all tables and a default admin login:
   - Username: `admin`
   - Password: `ChangeMe123!`
   - **You must change this password immediately after first login** (Settings page).

## STEP 3 — Edit config.php

Open `config.php` in a text editor and fill in the real values from Step 1:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'yogaprosp_admin');   // your actual DB name
define('DB_USER', 'yogaprosp_admin');   // your actual DB username
define('DB_PASS', 'your-real-password');

define('DEFAULT_NOTIFY_EMAIL', 'leads@yogaprosperitymodel.com'); // the new inbox you're creating
define('MAIL_FROM_EMAIL', 'noreply@yogaprosperitymodel.com');
```

> Tip: create the `leads@yogaprosperitymodel.com` mailbox first in
> cPanel → Email Accounts, so notification emails have somewhere to land.

## STEP 4 — Upload everything

Using cPanel File Manager (or FTP), upload the **entire contents** of this
package into your site's `public_html` folder, keeping the folder structure:

```
public_html/
  config.php
  landing.php
  register-handler.php
  .htaccess          <- IMPORTANT: merge with existing .htaccess if you have one
  db/
    schema.sql
  admin/
    login.php
    index.php
    leads.php
    pages.php
    page-edit.php
    settings.php
    logout.php
    includes/
    assets/
```

⚠️ **If you already have a `.htaccess` file in public_html** (common with
static sites), don't overwrite it — instead open both files and copy the
`RewriteEngine On` and `RewriteRule` lines from this package's `.htaccess`
into your existing one.

## STEP 5 — Log in

Visit: `https://yogaprosperitymodel.com/admin/login.php`
Log in with `admin` / `ChangeMe123!`, then immediately go to **Settings** and
change the password.

## STEP 6 — Update your homepage contact form

Your current homepage form looks like this:

```html
<form class="contact-form" action="/contact.php" method="get">
```

Replace it with:

```html
<form class="contact-form" action="/register-handler.php" method="post">
  <input type="hidden" name="source_page" value="homepage">
  <input type="hidden" name="redirect_to" value="/?contact=success">
  <input type="text" name="website" style="position:absolute;left:-9999px" tabindex="-1" autocomplete="off">
```

(Keep all the existing `name`, `email`, `phone`, `message` fields exactly as
they are — just change the opening `<form>` tag and add the three hidden
fields shown above right after it.)

## STEP 7 — Create your first webinar page

1. Go to `/admin/pages.php` → **+ New landing page**.
2. Fill in title, date, description, highlights, and your Razorpay link.
3. Set Status to **Published** → Save.
4. Your page is live at: `https://yogaprosperitymodel.com/webinar/your-slug`

Every registration on that page — and every homepage contact submission —
now appears in `/admin/leads.php` **and** emails the address you set,
automatically. For the next webinar, just repeat step 7 — takes about
2 minutes, no design tool required.

---

## Updating from the earlier version?

If you already imported the original `db/schema.sql`, don't re-import it —
instead open phpMyAdmin → SQL tab → paste and run the contents of
`db/migrate-v2-themes.sql`. This adds design-theme support without touching
your existing data. Then upload all the updated files over the old ones.

## What's new: Design Themes + AI Content Assistant

- **10 design themes** — open any landing page in the editor, pick a color
  theme (Sunrise, Ocean, Royal Plum, Midnight Gold, Lotus Pink, etc.), save.
  The public page instantly re-colors — no code changes needed.
- **AI Content Assistant** — type a one-line topic, click "Generate prompt",
  copy it into any free AI chat (ChatGPT, Gemini, or Claude.ai — no paid
  account needed), paste the AI's JSON reply back in, and the title,
  subtitle, description, highlights, and SEO fields fill in automatically.
  Always review the generated text before publishing.

## What's new in this version: 6 Design Layouts

Instead of just color themes, each landing page can now use a completely
different **structure**:

| Layout | Best for |
|---|---|
| Classic Centered | General purpose, safe default |
| Split Hero + Sticky Form | High-conversion — form always visible |
| Long-form Sales Page | Premium/high-ticket offers (e.g. Vajra Sangh) |
| Minimal | Warm audience / retargeting, fastest load |
| Video-First | When you have an invite video |
| Countdown / Urgency | Last-minute registration push |

Pick the layout visually when creating/editing a page — no code needed.
Color theme is still there as an optional extra layer on top of any layout.

### Extra fields for specific layouts
- **Video URL** (YouTube link) — used by Video-First
- **Urgency note** — used by Countdown/Urgency
- **Testimonial quote + author** — used by Long-form
- For the Countdown layout's live timer to work, enter the webinar date in
  a machine-readable format like `2026-08-20 19:00:00` (not "20 Aug, 7 PM").

## Updating from an earlier version?

Run `db/migrate-v3-layouts.sql` in phpMyAdmin (SQL tab) if you already
imported an earlier schema. Then upload all files over the old ones.

## Notes

- **Email delivery**: this uses PHP's built-in `mail()` function, which works
  on most shared hosting out of the box. If notification emails don't arrive,
  check your spam folder first; if they're consistently missing, your host
  may need SMTP configured instead — let us know and we'll switch it over.
- **Security**: `config.php` is blocked from direct browser access via
  `.htaccess`. Still, never share this file publicly or commit it to a public
  GitHub repo.
- **Backups**: back up the `leads` table periodically via phpMyAdmin →
  Export, so you always have your contact data even outside the admin panel.
