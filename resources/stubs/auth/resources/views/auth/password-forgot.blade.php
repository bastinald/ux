<x-ux::layouts.card :title="__('Forgot Password')" submit="send">
    <x-slot name="body">
        @if($status)
            <x-ux::alert :label="__($status)"/>
        @endif

        <x-ux::input :label="__('Email')" type="email" model="email"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Send Password Reset Link')" type="submit"/>
    </x-slot>
</x-ux::layouts.card>
