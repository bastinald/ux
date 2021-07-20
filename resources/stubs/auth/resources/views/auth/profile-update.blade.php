<x-ux::layouts.modal :title="__('Update Profile')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('Name')" model="name"/>
        <x-ux::input :label="__('Email')" type="email" model="email"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
