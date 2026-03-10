# Glasolsson

Glasolsson is a Laravel 12 web app for managing eyewear products and categories.

## Features

- Public homepage with paginated products
- Admin login/logout and dashboard
- Full CRUD for products and categories
- Optional product image upload with default fallback image
- Mobile menu + desktop sidebar navigation
- Delete confirmation modal

## Tech Stack

- PHP 8.2+
- Laravel 12
- SQLite
- Blade + Tailwind CSS v4
- Vite + vanilla JavaScript

## Quick Start

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan storage:link
```

Run the app:

```bash
npm run dev
php artisan serve
```

## Demo Login

- Email: `rune@yrgo.com`
- Password: `123`

## Notes

- Products keep existing records when a category is deleted (`category_id` is set to `NULL`).
- Default product thumbnail: `public/images/stock/no-default-thumbnail.png`.

## License

MIT

