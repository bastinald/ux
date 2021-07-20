<x-ux::layouts.modal :title="!$dummyModelVariable->exists ? __('Create Dummy Model Title') : __('Update Dummy Model Title')" submit="save">
    <x-slot name="body">
        <x-ux::input :label="__('Name')" model="name"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Cancel')" color="secondary" dismiss="modal"/>
        <x-ux::button :label="__('Save')" type="submit"/>
    </x-slot>
</x-ux::layouts.modal>
