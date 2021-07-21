@props([
    'key' => null,
])

@php
    $labels = Str::title(Str::replace('_', ' ', $key));
    $label = Str::singular($labels);

    $attributes = $attributes->class([
        //
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <x-ux::label :label="__($labels)"/>

    @if(!$slot->isEmpty())
        <div class="list-group mb-2">
            {{ $slot }}
        </div>
    @endif

    <x-ux::button icon="plus" :label="__('Add ' . $label)" size="sm" click="addModelItem('{{ $key }}')"
        :color="!$errors->has($key) ? 'outline-primary' : 'outline-danger'"/>

    <x-ux::error :key="$key"/>
</div>
