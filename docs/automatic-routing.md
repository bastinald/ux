[Documentation](index.md) > Automatic Routing

# Automatic Routing

This package is able to automatically route full page Livewire components. No more having to constantly reference a routes file.

- [Route Method](#route-method)
- [Route Parameters](#route-parameters)

## Route Method

Add a `route` method to your full page Livewire components:

```php
// Illuminate\Support\Facades\Route

public function route()
{
    return Route::get('home', static::class)
        ->name('home')
        ->middleware('auth');
}
```

As you can see, it returns the Laravel `Route` facade, so the sky is the limit.

## Route Parameters

Passing route parameters to the Livewire `mount` method:

```php
class UserUpdate extends Component
{
    public $user;

    public function route()
    {
        return Route::get('users/update/{user}', static::class)
            ->name('users.update')
            ->middleware('auth');
    }
    
    public function mount(User $user)
    {
        $this->user = $user;
    }
}
```
