[Documentation](index.md) > Publishing Assets

# Publishing Assets

You can publish the package assets to customize views and command stub files to your liking.

- [Config](#config)
- [Views](#views)
- [Stubs](#stubs)
- [All Assets](#all-assets)

## Config

Publish the package config file:

```console
php artisan vendor:publish --tag=ux:config
```

The config file can now be found in `config/ux.php`.

## Views

Publish the package views:

```console
php artisan vendor:publish --tag=ux:views
```

The views can now be found in `resources/views/vendor/ux`.

## Stubs

Publish the package command stubs:

```console
php artisan vendor:publish --tag=ux:stubs
```

Update the `stub_path` in `config/ux.php` to:

```php
'stub_path' => resource_path('stubs/vendor/ux'),
```

The command stubs can now be found in `resources/stubs/vendor/ux`.

Available dummy string replacements:

- `DummyComponentNamespace`: Livewire component namespace
- `DummyFactoryClass`: Factory class name
- `DummyFactoryNamespace`: Factory class namespace
- `DummyModelClass`: Model class name
- `DummyModelNamespace`: Model class namespace
- `dummyModelVariables`: plural model variable name
- `dummyModelVariable`: singular model variable name
- `Dummy Model Titles`: plural model title string
- `Dummy Model Title`: singular model title string
- `dummy_model_table`: model table name
- `dummy.prefix`: Livewire route & Blade view prefix
- `dummy-route-uri`: full page Livewire component route URI

## All Assets

Publish all package assets at once:

```console
php artisan vendor:publish --tag=ux
```
