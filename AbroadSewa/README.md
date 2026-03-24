# Abroad Sewa — Website

A complete multi-page consultancy website built with HTML, Tailwind CSS, PHP, and JavaScript.

## Tech Stack
- **Frontend:** HTML5, Tailwind CSS (CDN), Vanilla JS
- **Backend:** PHP 7.4+
- **Data:** JSON files in `/data/` folder
- **Server:** Apache with mod_rewrite

---

## Folder Structure

```
abroadsewa/
├── index.php              # Homepage
├── about.php              # About Us
├── services.php           # Services + FAQ
├── destinations.php       # Destinations list + detail
├── testimonials.php       # Full testimonials page
├── contact.php            # Contact form
├── contact-submit.php     # Form handler (AJAX)
├── privacy.php            # Privacy policy
├── terms.php              # Terms of use
├── 404.php                # 404 error page
├── router.php             # Front controller / URL router
├── sitemap.xml.php        # Dynamic XML sitemap
├── robots.txt             # SEO robots
├── .htaccess              # Clean URLs + security + caching
│
├── includes/
│   ├── header.php         # Nav + <head> (shared)
│   ├── footer.php         # Footer (shared)
│   └── functions.php      # Helper functions
│
├── data/
│   ├── site.json          # Site name, contact, social links
│   ├── services.json      # All 6 services
│   ├── destinations.json  # All 5 destinations
│   ├── testimonials.json  # 12 student testimonials
│   ├── team.json          # 4 team members
│   ├── faqs.json          # 8 FAQs
│   └── enquiries.json     # (auto-created) Form submissions
│
└── assets/
    ├── css/style.css      # Custom CSS (supplements Tailwind)
    └── js/main.js         # JS: menu, animations, form, filters
```

---

## Local Setup

### Requirements
- PHP 7.4 or higher
- Apache with `mod_rewrite` enabled

### Steps

1. **Copy files** to your web server root (e.g. `htdocs/abroadsewa/` or `/var/www/html/`)

2. **Enable mod_rewrite** (Apache):
   ```bash
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```

3. **Allow .htaccess overrides** — in your Apache config, ensure:
   ```apache
   AllowOverride All
   ```

4. **Set folder permissions:**
   ```bash
   chmod 755 data/
   chmod 644 data/*.json
   ```

5. **Visit** `http://localhost/abroadsewa/` — all pages should work.

---

## Production Deployment

1. Upload all files to your hosting root (e.g. `public_html/`)
2. In `.htaccess`, uncomment the HTTPS redirect lines
3. In `.htaccess`, uncomment and set the www redirect with your domain
4. Update `data/site.json` with real contact info
5. Update the `$base` URL in `sitemap.xml.php`
6. Configure PHP `mail()` or use SMTP (e.g. PHPMailer) in `contact-submit.php`
7. Add `sitemap.xml` to your route in `router.php`:
   ```php
   '/sitemap.xml' => 'sitemap.xml.php',
   ```

---

## Customization

### Update contact info
Edit `data/site.json`

### Add a testimonial
Add a new entry to `data/testimonials.json`

### Add a new destination
Add a new entry to `data/destinations.json`

### Change colors
Primary color is `#E8630A` (orange) and `#1A2744` (navy).
Search and replace these in `assets/css/style.css` and page files.

---

## Pages

| URL | File | Description |
|-----|------|-------------|
| `/` | index.php | Homepage with hero, stats, destinations, services |
| `/about` | about.php | Story, mission, values, team |
| `/services` | services.php | All 6 services + FAQ accordion |
| `/destinations` | destinations.php | Country list |
| `/destinations/japan` | destinations.php | Japan detail page |
| `/testimonials` | testimonials.php | All testimonials with filter |
| `/contact` | contact.php | Contact form |
| `/sitemap.xml` | sitemap.xml.php | SEO sitemap |

---

## SEO Features
- Unique `<title>` and `<meta description>` per page
- `<link rel="canonical">` tags
- Open Graph meta tags
- `robots.txt`
- Dynamic XML sitemap
- Semantic HTML (h1, h2, nav, main, section, footer)
- Clean URLs via .htaccess
- Fast load: Gzip + browser caching headers in .htaccess
