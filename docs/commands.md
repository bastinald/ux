[Documentation](index.md) > Commands

# Commands

Commands to make your development speed blazing fast.

- [Making Auth](#making-auth)
- [Making CRUD](#making-crud)
- [Making Models](#making-models)
- [Running Automatic Migrations](#running-automatic-migrations)
- [Clearing the Log File](#clearing-the-log-file)

## Making Auth

Make full UI & Auth scaffolding:

```console
php artisan make:auth {--force}
```

This command will configure NPM assets, install the Auth scaffolding including login, register, password forgot, profile updating, etc, and create full user CRUD.

When you run this command, it will ask which version of Font Awesome you want to use. In order to use the pro version, you must have the [global NPM token configured](https://fontawesome.com/v5.15/how-to-use/on-the-web/setup/using-package-managers#installing-pro).

## Making CRUD

Make CRUD for a model:

```console
php artisan make:crud {path} {--model=} {--force}
```

The `path` is where the Livewire components and Blade views will go:

```console
php artisan make:crud Users
```

Making CRUD inside a subdirectory:

```console
php artisan make:crud Admin/Users
```

If the model does not exist, it will be created automatically. The package is smart enough to know that the model would be `User` in the examples above.

Specifying the model to use:

```console
php artisan make:crud Admin/Managers --model=User
```

## Making Models

Make a model & factory with automatic migration methods included:

```console
php artisan make:amodel {class} {--force}
```

## Running Automatic Migrations

Run automatic migrations using model `migration` methods:

```console
php artisan migrate:auto {--f|--fresh} {--s|--seed} {--force}
```

## Clearing the Log File

Clear the Laravel log file:

```console
php artisan log:clear
```
