# Deployment Checklist for Hostinger

Use this checklist when deploying the Arabic Landing Page to Hostinger shared hosting.

## Pre-Deployment

### Local Testing
- [ ] Contact form sends emails successfully
- [ ] All Arabic text displays correctly (RTL)
- [ ] All animations work smoothly
- [ ] Responsive design works on mobile, tablet, desktop
- [ ] All images load correctly
- [ ] No console errors in browser developer tools

### Code Preparation
- [ ] Run `npm run build` to create production assets
- [ ] Verify `public/build` directory contains compiled files
- [ ] Test with production-like environment locally

### Configuration
- [ ] Update `.env` with production values:
  - [ ] `APP_ENV=production`
  - [ ] `APP_DEBUG=false`
  - [ ] `APP_URL=https://yourdomain.com`
  - [ ] `APP_NAME="Your Company Name"`
  - [ ] Mail SMTP settings configured
  - [ ] `CONTACT_EMAIL` set to recipient address

## File Upload

### Files to Upload
- [ ] All application files (except exclusions below)
- [ ] `.env` file with production settings
- [ ] `public/build` directory (compiled assets)

### Files to Exclude
- [ ] `node_modules/` directory (not needed in production)
- [ ] `.git/` directory (optional)
- [ ] `storage/logs/*.log` files (will be recreated)
- [ ] `tests/` directory (optional)
- [ ] `.env.example` (optional, for security)

## Server Configuration

### Directory Structure
- [ ] Document root points to `public/` directory
- [ ] All Laravel files are outside document root (except `public/`)

### File Permissions
- [ ] `storage/` directory: 755 (or 775)
- [ ] `bootstrap/cache/` directory: 755 (or 775)
- [ ] All files inside `storage/` and `bootstrap/cache/`: writable by server

### PHP Configuration
- [ ] PHP version >= 8.2
- [ ] Required PHP extensions installed:
  - [ ] BCMath
  - [ ] Ctype
  - [ ] cURL
  - [ ] DOM
  - [ ] Fileinfo
  - [ ] JSON
  - [ ] Mbstring
  - [ ] OpenSSL
  - [ ] PCRE
  - [ ] PDO
  - [ ] Tokenizer
  - [ ] XML

## Database Setup

### SQLite (Default)
- [ ] `database/database.sqlite` file exists
- [ ] File has correct permissions (writable by server)

### MySQL (Alternative)
- [ ] Database created in hosting panel
- [ ] Database credentials in `.env`:
  - [ ] `DB_CONNECTION=mysql`
  - [ ] `DB_HOST=localhost` (or provided host)
  - [ ] `DB_PORT=3306`
  - [ ] `DB_DATABASE=your_database_name`
  - [ ] `DB_USERNAME=your_username`
  - [ ] `DB_PASSWORD=your_password`
- [ ] Run migrations: `php artisan migrate --force`

## Post-Deployment

### Initial Setup
- [ ] Generate application key (if needed): `php artisan key:generate`
- [ ] Run database migrations: `php artisan migrate --force`
- [ ] Clear and cache configuration:
  ```bash
  php artisan config:cache
  php artisan route:cache
  php artisan view:cache
  ```

### Testing
- [ ] Visit homepage - loads correctly
- [ ] All CSS and JavaScript files load (check Network tab)
- [ ] Navigation menu works
- [ ] Hero section displays with correct Arabic text
- [ ] Features section displays correctly
- [ ] Testimonials carousel works
- [ ] Contact form submits successfully
- [ ] Email received at configured address
- [ ] Form validation works (try submitting empty form)
- [ ] RTL layout displays correctly
- [ ] Responsive design works on mobile device

### Performance
- [ ] Assets load quickly (check page speed)
- [ ] Images optimized and load efficiently
- [ ] No 404 errors in console

### Security
- [ ] `.env` file not accessible via web browser
- [ ] `storage/` and `bootstrap/cache/` not accessible
- [ ] `APP_DEBUG=false` in production
- [ ] Strong `APP_KEY` set

### Mail Configuration
- [ ] Test contact form sends email
- [ ] Check spam folder if email not received
- [ ] Verify SMTP credentials are correct
- [ ] Check `storage/logs/laravel.log` for mail errors

## Content Customization (After Deployment)

### Update Content
- [ ] Replace placeholder logo with actual logo
- [ ] Update hero section text (Arabic)
- [ ] Update feature cards content
- [ ] Update testimonials with real testimonials
- [ ] Update contact email address
- [ ] Update SEO meta tags

### Update Images
- [ ] Replace `public/images/logo.png` with your logo
- [ ] Add favicon if needed
- [ ] Update Open Graph image if needed

## Monitoring

### Log Files
- [ ] Check `storage/logs/laravel.log` for errors
- [ ] Monitor error logs regularly

### Email Testing
- [ ] Send test email from contact form
- [ ] Verify email arrives with correct formatting
- [ ] Check Arabic text in email displays correctly

## Troubleshooting Common Issues

### 500 Internal Server Error
- [ ] Check file permissions
- [ ] Verify `.env` file exists and is configured
- [ ] Check `storage/logs/laravel.log` for specific error
- [ ] Ensure PHP version is compatible

### Assets Not Loading (404)
- [ ] Verify `public/build` directory uploaded
- [ ] Run `npm run build` again and re-upload
- [ ] Check file paths in browser Network tab
- [ ] Clear browser cache

### Mail Not Sending
- [ ] Verify SMTP settings in `.env`
- [ ] Test with `MAIL_MAILER=log` first
- [ ] Check hosting SMTP restrictions
- [ ] Verify port 465 or 587 is not blocked

### RTL Display Issues
- [ ] Verify `dir="rtl"` in HTML tag
- [ ] Check browser console for CSS errors
- [ ] Test in different browsers

## Final Checklist

- [ ] All functionality works as expected
- [ ] All Arabic text displays correctly
- [ ] Contact form sends emails
- [ ] Site is mobile-responsive
- [ ] No console errors
- [ ] Fast page load times
- [ ] SEO meta tags configured
- [ ] Analytics tracking added (if needed)

---

**Deployment Date:** _______________

**Deployed By:** _______________

**Notes:**
_________________________________________________
_________________________________________________
_________________________________________________

