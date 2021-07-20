<x-ux::layouts.modal :title="__('Dummy Model Title')">
    <x-slot name="body">
        <x-ux::desc :title="__('ID')" :data="$dummyModelVariable->id"/>
        <x-ux::desc :title="__('Name')" :data="$dummyModelVariable->name"/>
        <x-ux::desc :title="__('Email')" :data="$dummyModelVariable->email"/>
        <x-ux::desc :title="__('Timezone')" :data="$dummyModelVariable->timezone"/>
        <x-ux::desc :title="__('Created At')" :date="$dummyModelVariable->created_at"/>
        <x-ux::desc :title="__('Updated At')" :date="$dummyModelVariable->updated_at"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Close')" color="secondary" dismiss="modal"/>
    </x-slot>
</x-ux::layouts.modal>
