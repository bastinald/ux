# bastinald/ux

Laravel UI, Auth, & CRUD scaffolding package using Bootstrap & Livewire.

<a href="https://www.youtube.com/watch?v=X9oyYlik56U"><img src="https://i.imgur.com/IWHZsV9.png"></a>

## Features

- Automatic migrations
- Automatic routing
- Automatic password hashing
- Automatic user timezones
- Bootstrap 5 preconfigured
- Font Awesome 5 preconfigured
- Global Livewire loader
- Dynamic Livewire modals
- Auth scaffolding command
- CRUD scaffolding command
- Handy Blade components
- Honeypot & reCAPTCHA
- Exception emailing
- Easy form data modelling
- Easy log clearing
- Publishable command stubs
- & more!

## Requirements

- Laravel 8
- NPM

## Documentation

- [Installation](docs/installation.md)
- [Commands](docs/commands.md)
- [Automatic Migrations](docs/automatic-migrations.md)
- [Automatic Routing](docs/automatic-routing.md)
- [Livewire Components](docs/livewire-components.md)
- [Blade Components](docs/blade-components.md)
- [Exception Emails](docs/exception-emails.md)
- [Traits](docs/traits.md)
- [Publishing Assets](docs/publishing-assets.md)

## Quickstart

Install Laravel via Valet, Docker, Laragon, or whatever you prefer:

```console
laravel new my-project
```

Configure your `.env` APP, DB, and MAIL variables:

```env
APP_*
DB_*
MAIL_*
```

Require this package via Composer:

```console
composer require bastinald/ux
```

Make the package UI & Auth scaffolding:

```console
php artisan make:auth
```

Now you can visit your app URL and login using `user@example.com:password`.
