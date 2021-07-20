<x-ux::layouts.page :title="__('Users')">
    <x-ux::actions search>
        <x-ux::button icon="plus" :title="__('Create')" click="$emit('showModal', 'users.save')"/>
        <x-ux::action-dropdown key="sort"/>
        <x-ux::action-dropdown key="filter"/>
    </x-ux::actions>

    <x-ux::list>
        @foreach($users as $user)
            <x-ux::list-row>
                <div class="col-lg mb-3 mb-lg-0">
                    <x-ux::link :label="$user->name" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
                    <x-ux::desc :date="$user->created_at" class="small text-muted"/>
                </div>
                <div class="col-lg-auto d-flex gap-2">
                    <x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'users.read', {{ $user->id }})"/>
                    <x-ux::action icon="pencil-alt" :title="__('Update')" click="$emit('showModal', 'users.save', {{ $user->id }})"/>
                    <x-ux::action icon="unlock-alt" :title="__('Password')" click="$emit('showModal', 'users.password', {{ $user->id }})"/>
                    <x-ux::action icon="trash-alt" :title="__('Delete')" click="delete({{ $user->id }})" confirm/>
                </div>
            </x-ux::list-row>
        @endforeach
    </x-ux::list>

    <x-ux::pagination :links="$users"/>
</x-ux::layouts.page>
