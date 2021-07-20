<x-ux::layouts.page :title="__('Dummy Model Titles')">
    <x-ux::actions search>
        <x-ux::button icon="plus" :title="__('Create')" click="$emit('showModal', 'dummy.prefix.save')"/>
        <x-ux::action-dropdown key="sort"/>
        <x-ux::action-dropdown key="filter"/>
    </x-ux::actions>

    <x-ux::list>
        @foreach($dummyModelVariables as $dummyModelVariable)
            <x-ux::list-row>
                <div class="col-lg mb-3 mb-lg-0">
                    <x-ux::link :label="$dummyModelVariable->name" click="$emit('showModal', 'dummy.prefix.read', {{ $dummyModelVariable->id }})"/>
                    <p class="small text-muted mb-0">@displayDate($dummyModelVariable->created_at)</p>
                </div>
                <div class="col-lg-auto d-flex gap-2">
                    <x-ux::action icon="eye" :title="__('Read')" click="$emit('showModal', 'dummy.prefix.read', {{ $dummyModelVariable->id }})"/>
                    <x-ux::action icon="pencil-alt" :title="__('Update')" click="$emit('showModal', 'dummy.prefix.save', {{ $dummyModelVariable->id }})"/>
                    <x-ux::action icon="trash-alt" :title="__('Delete')" click="delete({{ $dummyModelVariable->id }})" confirm/>
                </div>
            </x-ux::list-row>
        @endforeach
    </x-ux::list>

    <x-ux::pagination :links="$dummyModelVariables"/>
</x-ux::layouts.page>
