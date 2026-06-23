# The Valley & Peaks

A premium travel media website built with Laravel 13, Filament 5, and MySQL. Authentic travel guides, destination insights, and stories from Nepal and beyond.

## Requirements

- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js 18+

## Setup

### 1. Install dependencies

```bash
composer install
npm install
```

### 2. Configure environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your MySQL credentials:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=valley_peaks
DB_USERNAME=root
DB_PASSWORD=your_password
```

Create the database:

```sql
CREATE DATABASE valley_peaks CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 3. Run migrations and seed

```bash
php artisan migrate --seed
php artisan storage:link
```

### 4. Build assets

```bash
npm run build
```

### 5. Start the server

```bash
php artisan serve
```

Visit **http://localhost:8000**

## Admin Dashboard

- URL: **http://localhost:8000/admin**
- Email: `admin@thevalleyandpeaks.com`
- Password: `password`

Change the admin password immediately after first login.

## Features

- Premium minimalist travel publication design
- Destination hub (Nepal + International by continent)
- Blog with categories, TOC, FAQs, related articles
- SEO & AEO: Schema.org markup (Article, FAQ, Breadcrumb, Organization, Author)
- Sticky navigation, search, newsletter signup
- Filament admin for articles, destinations, categories, authors, pages
- Contact form and newsletter subscriber management

## Tech Stack

- Laravel 13
- Filament 5
- MySQL
- Blade templates
- Vite
