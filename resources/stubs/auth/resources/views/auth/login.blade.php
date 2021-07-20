<x-ux::layouts.card :title="__('Login')" submit="login">
    <x-slot name="body">
        <x-ux::input :label="__('Email')" type="email" model="email"/>
        <x-ux::input :label="__('Password')" type="password" model="password"/>

        <div class="d-flex justify-content-between">
            <x-ux::check :checkLabel="__('Remember me')" model="remember"/>
            <x-ux::link :label="__('Forgot password?')" route="password.forgot"/>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Login')" type="submit"/>
    </x-slot>
</x-ux::layouts.card>
