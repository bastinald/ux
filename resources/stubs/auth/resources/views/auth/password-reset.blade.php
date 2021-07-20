<x-ux::layouts.card :title="__('Reset Password')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('Email')" type="email" model="email"/>
        <x-ux::input :label="__('New Password')" type="password" model="password"/>
        <x-ux::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.card>
