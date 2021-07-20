<x-ux::layouts.modal :title="__('User')">
    <x-slot name="body">
        <x-ux::desc :title="__('ID')" :data="$user->id"/>
        <x-ux::desc :title="__('Name')" :data="$user->name"/>
        <x-ux::desc :title="__('Email')" :data="$user->email"/>

        <x-ux::modal-heading :label="__('Dates')"/>

        <x-ux::desc :title="__('Timezone')" :data="$user->timezone"/>
        <x-ux::desc :title="__('Created At')" :date="$user->created_at"/>
        <x-ux::desc :title="__('Updated At')" :date="$user->updated_at"/>
    </x-slot>

    <x-slot name="footer">
        <x-ux::button :label="__('Close')" color="secondary" dismiss="modal"/>
    </x-slot>
</x-ux::layouts.modal>
