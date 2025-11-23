# Laravel Arabic Landing Page - Setup Guide

This is a production-ready single-page landing page built with Laravel, Blade, Tailwind CSS, and full RTL Arabic support.

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP** >= 8.2 with extensions: BCMath, Ctype, cURL, DOM, Fileinfo, JSON, Mbstring, OpenSSL, PCRE, PDO, Tokenizer, XML
- **Composer** (PHP package manager)
- **Node.js** >= 18.x and **npm** (or yarn)
- **Git**

## 🚀 Installation Steps

### 1. Clone/Download the Project

If you haven't already, extract or clone the project to your desired directory:

```bash
cd landing_page
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

Copy the `.env.example` file to `.env`:

```bash
# On Windows
copy .env.example .env

# On Linux/Mac
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 5. Configure Environment Variables

Open `.env` file and configure the following:

#### Application Settings
```env
APP_NAME="Your Company Name"
APP_URL=http://localhost
```

#### Mail Configuration (Choose one option)

**Option 1: Hostinger SMTP**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.hostinger.com
MAIL_PORT=465
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_password_here
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
CONTACT_EMAIL=info@domain.com
```

**Option 2: Zoho Mail**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.zoho.com
MAIL_PORT=465
MAIL_USERNAME=noreply@yourdomain.com
MAIL_PASSWORD=your_password_here
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"
CONTACT_EMAIL=info@domain.com
```

**For Development/Testing (logs emails instead of sending):**
```env
MAIL_MAILER=log
CONTACT_EMAIL=info@domain.com
```

### 6. Create Database (SQLite)

The project uses SQLite by default. Create the database file:

```bash
touch database/database.sqlite
```

Or on Windows:
```bash
type nul > database/database.sqlite
```

### 7. Run Migrations

```bash
php artisan migrate
```

### 8. Build Assets

#### Development Mode (with hot reload)

```bash
npm run dev
```

This will start Vite dev server with hot module replacement. Keep this running in a separate terminal.

#### Production Build

```bash
npm run build
```

This compiles and minifies all assets for production.

### 9. Start Development Server

In a new terminal (or after building assets):

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

## 📝 Customization Guide

### 1. Edit Arabic Content

#### Hero Section
Edit `resources/views/components/hero.blade.php`:
- Line 18: Main headline
- Line 22: Subheadline
- Line 28-33: CTA button texts

#### Features Section
Edit `resources/views/components/features.blade.php`:
- Lines 24-45: Feature cards data (title, description, icon)

#### Testimonials
Edit `resources/views/components/testimonials.blade.php`:
- Lines 26-50: Testimonials array (name, role, content)

#### Contact Information
Edit `resources/views/components/footer.blade.php`:
- Line 30: Email address displayed
- Edit `app/Http/Controllers/ContactController.php` line 48 for recipient email (or use CONTACT_EMAIL in .env)

### 2. Replace Logo

1. Add your logo image to `public/images/logo.png`
2. The logo is referenced in:
   - `resources/views/landing.blade.php` (line 77)
   - Update the alt text and size as needed

### 3. Update SEO Meta Tags

Edit `resources/views/landing.blade.php`:
- Lines 9-12: Title, description, keywords
- Lines 17-23: Open Graph meta tags
- Lines 26-29: Twitter Card meta tags
- Lines 45-62: Structured data (JSON-LD)

### 4. Change Colors

Edit `resources/css/app.css` or use Tailwind classes. The primary color scheme uses blue:
- Primary: `#2563eb` (blue-600)
- Hover: `#1d4ed8` (blue-700)

To change colors globally, update Tailwind config in `tailwind.config.js`.

### 5. Change Fonts

The project uses Google Fonts (Tajawal and Cairo) for Arabic text. To change:

1. Update font links in `resources/views/landing.blade.php` (line 40)
2. Update font family in `resources/css/app.css` (line 10)

## 🚀 Deployment to Hostinger (Shared Hosting)

### Pre-Deployment Checklist

- [ ] Run `npm run build` to build production assets
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Configure mail settings in `.env`
- [ ] Test the contact form
- [ ] Update `APP_URL` to your domain

### Deployment Steps

1. **Upload Files**
   - Upload all files except `node_modules`, `.git`, `storage/logs/*` to your hosting via FTP/SFTP
   - Ensure `.env` is uploaded with production settings

2. **Set Directory Permissions**
   ```bash
   chmod -R 755 storage
   chmod -R 755 bootstrap/cache
   ```

3. **Configure Web Server**
   - Point document root to `public` directory
   - Ensure `public/index.php` is accessible

4. **Update .env for Production**
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://yourdomain.com
   ```

5. **Run Migrations** (via SSH if available, or use hosting panel)
   ```bash
   php artisan migrate --force
   ```

6. **Clear and Cache Configuration**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

7. **Set Up Cron Job** (if using queues)
   ```
   * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
   ```

### Hostinger-Specific Notes

- Use Hostinger's SMTP settings (see `.env.example`)
- Ensure PHP version is 8.2 or higher
- Check file upload limits if needed
- Verify `storage` and `bootstrap/cache` are writable

## 🧪 Testing

### Test Contact Form

1. Fill out the contact form on the landing page
2. Check:
   - Email logs: `storage/logs/laravel.log` (if `MAIL_MAILER=log`)
   - Or check your inbox if SMTP is configured
3. Verify validation messages appear in Arabic
4. Test spam protection (honeypot field should catch bots)

## 📁 Project Structure

```
landing_page/
├── app/
│   ├── Http/Controllers/
│   │   └── ContactController.php    # Contact form handler
│   └── Mail/
│       └── ContactMail.php          # Email template
├── config/
│   └── mail.php                     # Mail configuration
├── public/
│   ├── images/                      # Logo and images
│   └── index.php                    # Entry point
├── resources/
│   ├── css/
│   │   └── app.css                  # Tailwind CSS
│   ├── js/
│   │   └── app.js                   # Alpine.js setup
│   └── views/
│       ├── components/              # Blade components
│       │   ├── hero.blade.php
│       │   ├── features.blade.php
│       │   ├── testimonials.blade.php
│       │   └── footer.blade.php
│       ├── emails/
│       │   └── contact.blade.php    # Email template
│       └── landing.blade.php        # Main landing page
├── routes/
│   └── web.php                      # Routes
├── .env.example                     # Environment template
├── tailwind.config.js               # Tailwind configuration
├── vite.config.js                   # Vite configuration
└── SETUP.md                         # This file
```

## 🔧 Troubleshooting

### Assets Not Loading
- Run `npm run build` again
- Clear browser cache
- Check that `public/build` directory exists

### Mail Not Sending
- Verify SMTP credentials in `.env`
- Check `storage/logs/laravel.log` for errors
- Test with `MAIL_MAILER=log` first
- Verify `CONTACT_EMAIL` is set correctly

### RTL Issues
- Ensure `dir="rtl"` and `lang="ar"` are set in `<html>` tag
- Check browser developer tools for CSS conflicts
- Verify Tailwind classes are using logical properties

### 500 Error on Production
- Set `APP_DEBUG=true` temporarily to see errors
- Check file permissions on `storage` and `bootstrap/cache`
- Verify `.env` file is uploaded correctly
- Check Laravel logs in `storage/logs/laravel.log`

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Alpine.js Documentation](https://alpinejs.dev)
- [Vite Documentation](https://vitejs.dev)

## 🆘 Support

For issues or questions:
1. Check the troubleshooting section above
2. Review Laravel logs: `storage/logs/laravel.log`
3. Verify all environment variables are set correctly

---

**Built with ❤️ using Laravel, Tailwind CSS, and Alpine.js**

