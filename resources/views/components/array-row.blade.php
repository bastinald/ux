@props([
    //
])

@php
    $attributes = $attributes->class([
        'list-group-item list-group-item-action p-2',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <x-ux::row align="start" gap="2">
        {{ $slot }}
    </x-ux::row>
</div>
