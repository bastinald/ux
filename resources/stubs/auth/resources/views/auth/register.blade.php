<x-ux::layouts.card :title="__('Register')" submit="register">
    <x-slot name="body">
        <x-ux::input :label="__('Name')" model="name"/>
        <x-ux::input :label="__('Email')" type="email" model="email"/>
        <x-ux::input :label="__('Password')" type="password" model="password"/>
        <x-ux::input :label="__('Confirm Password')" type="password" model="password_confirmation"/>

        <x-honey recaptcha/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Register')" type="submit"/>
    </x-slot>
</x-ux::layouts.card>
