# Arabic Landing Page - Laravel + Tailwind CSS + Alpine.js

<p align="center">
  <strong>Production-ready single-page Arabic landing page with full RTL support</strong>
</p>

## 🌟 Features

- ✅ **Full RTL (Right-to-Left) Arabic Support** - Complete RTL layout with Arabic fonts
- ✅ **Responsive Design** - Mobile, tablet, and desktop optimized
- ✅ **Modern Animations** - Smooth scroll-triggered animations using Alpine.js
- ✅ **Contact Form** - With validation, spam protection, and email sending
- ✅ **SEO Optimized** - Meta tags, Open Graph, and structured data in Arabic
- ✅ **Blade Components** - Reusable hero, features, testimonials, and footer sections
- ✅ **Tailwind CSS v4** - Modern utility-first CSS with RTL support
- ✅ **Production Ready** - Optimized for deployment to shared hosting (Hostinger)

## 🚀 Quick Start

### Installation

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Build assets
npm run build

# Start server
php artisan serve
```

Visit `http://localhost:8000` to see your landing page.

### Development

```bash
# Run dev server with hot reload
npm run dev

# In another terminal, start Laravel
php artisan serve
```

## 📚 Documentation

- **[SETUP.md](SETUP.md)** - Complete setup and customization guide
- **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)** - Deployment checklist for Hostinger

## 🎨 Customization

1. **Edit Arabic Content**: Update text in Blade components (`resources/views/components/`)
2. **Replace Logo**: Add your logo to `public/images/logo.png`
3. **Update Email**: Set `CONTACT_EMAIL` in `.env`
4. **Configure Mail**: Add SMTP settings to `.env` (Hostinger/Zoho examples included)

## 📦 Tech Stack

- **Laravel 11** - PHP Framework
- **Blade** - Templating engine
- **Tailwind CSS v4** - Utility-first CSS
- **Alpine.js** - Lightweight JavaScript framework
- **Vite** - Build tool
- **SQLite** - Default database (MySQL supported)

## 📄 License

Built with Laravel Framework - [MIT License](https://opensource.org/licenses/MIT)

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
