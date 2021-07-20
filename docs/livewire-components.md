[Documentation](index.md) > Livewire Components

# Livewire Components

Handy Livewire components to make your dev life easier.

- [Dynamic Modals](#dynamic-modals)
- [Global Loader](#global-loader)

## Dynamic Modals

This package allows you to show Livewire components as Bootstrap modals.

### Showing Modals

Show a modal by emitting `showModal` with the Livewire component alias:

```html
<x-ux::button click="$emit('showModal', 'users.update')"/>
```

Or, via your Livewire components:

```php
$this->emit('showModal', 'users.update', $user->id);
```

As you can see, you can pass parameters to the `mount` method after the alias.

### Hiding Modals

Hide the currently open modal by emitting `hideModal`:

```html
<x-ux::close click="$emit('hideModal')"/>
```

Or, via Livewire components:

```php
$this->emit('hideModal');
```

### Modal Views

Use the `layouts.modal` component in your Blade view:

```html
<x-ux::layouts.modal title="Update Profile" submit="save">
    <x-slot name="body">
        <x-ux::input label="Name" model="name"/>
        <x-ux::input label="Email" type="email" model="email"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button label="Cancel" color="secondary" dismiss="modal"/>
        <x-ux::button label="Save" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
```

## Global Loader

This package will show a loading spinner after a short delay when any Livewire action runs.

The loader can be customized by publishing the package views.
