[Documentation](index.md) > Installation

# Installation

This package was designed to work with new Laravel projects.

- [Install Laravel](#install-laravel)
- [Configure Environment Variables](#configure-environment-variables)
- [Require Package](#require-package)
- [Make Auth Scaffolding](#make-auth-scaffolding)

## Install Laravel

Install Laravel via Valet, Docker, Laragon, or whatever you prefer:

```console
laravel new my-project
```

## Configure Environment Variables

Configure your `.env` APP, DB, and MAIL variables:

```env
APP_*
DB_*
MAIL_*
```

## Require Package

Require this package via Composer:

```console
composer require bastinald/ux
```

## Make Auth Scaffolding

Make the package UI & Auth scaffolding:

```console
php artisan make:auth
```

Now you can visit your app URL and login using `user@example.com:password`.
