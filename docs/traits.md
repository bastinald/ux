[Documentation](index.md) > Traits

# Traits

This package provides a couple of handy traits.

- [WithModel](#withmodel)
- [HasHashes](#hashashes)

## WithModel

This trait makes form data model manipulation a breeze. No more having to create a component property for every single form input.

### Getting Model Data

Get all values as an array:

```php
$this->getModel();
```

Get a single value:

```php
$this->getModel('name');
```

Get an array of specific values:

```php
$this->getModel(['name', 'email']);
```

Passing an array to this method will always return an array, even if it is only one item.

Get an array of all values except certain ones:

```php
$this->getModelExcept(['password', 'password_confirmation']);
```

### Setting Model Data

Set a single value:

```php
$this->setModel('name', 'Kevin');
```

Set multiple values:

```php
$this->setModel([
    'name' => 'Kevin',
    'email' => 'kevin@example.com',
]);
```

### Working With Arrays

Add an empty array item:

```php
$this->addModelItem('locations');
```

Remove an array item by its key:

```php
$this->removeModelItem('locations', 3);
```

Order an array item by its key & direction:

```php
$this->orderModelItem('locations', 3, 'up');
```

The direction should be `up` or `down`.

### Binding Model Data

Package Blade components work with this trait via the `model` attribute:

```html
<x-ux::input :label="__('Name')" model="name"/>
<x-ux::input :label="__('Email')" type="email" model="email"/>
```

### Validating Model Data

Use the `validateModel` method to validate model data:

```php
$this->validateModel([
    'name' => ['required'],
    'email' => ['required', 'email'],
]);
```

This method works just like the Livewire `validate` method, so you can specify your rules in a separate `rules` method if you prefer.

## HasHashes

This trait will auto-hash model attributes when saving to the database.

Declare attributes to auto-hash via the `hashes` property:

```php
// Illuminate\Database\Eloquent\Model
// Bastinald\Ux\Traits\HasHashes

class User extends Model
{
    use HasHashes;

    protected $hashes = ['password'];
}
```

This will only hash attributes that are not already hashed, so it will not slow down seeders.
