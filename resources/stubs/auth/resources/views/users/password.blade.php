<x-ux::layouts.modal :title="__('Change User Password')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('New Password')" type="password" model="password"/>
        <x-ux::input :label="__('Confirm New Password')" type="password" model="password_confirmation"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
