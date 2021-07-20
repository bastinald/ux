[Documentation](index.md) > Automatic Migrations

# Automatic Migrations

This package promotes the usage of automatic migrations. No more having to micromanage a ton of separate migration files.

- [Migration Method](#migration-method)
- [Running Automatic Migrations](#running-automatic-migrations)

## Migration Method

Add a `migration` method to your models:

```php
// Illuminate\Database\Schema\Blueprint

public function migration(Blueprint $table)
{
    $table->id();
    $table->string('name')->index();
    $table->string('email')->unique();
    $table->string('password');
    $table->rememberToken();
    $table->string('timezone')->nullable();
    $table->timestamp('created_at')->nullable()->index();
    $table->timestamp('updated_at')->nullable();
}
```

As you can see, it uses the same `Blueprint` as traditional migration files.

## Running Automatic Migrations

Run automatic migrations using model `migration` methods:

```console
php artisan migrate:auto {--f|--fresh} {--s|--seed} {--force}
```

This command will compare the schema's inside your model `migration` methods and apply the changes to the database via Doctrine automatically.

This works alongside traditional Laravel migration files, for the cases where you still need migrations that are not coupled to a model. When you run this command, it will run your traditional migrations first, and the automatic migrations afterwards.
