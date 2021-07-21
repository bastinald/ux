@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        //
    ]);
@endphp

<div>
    <x-ux::label :label="$label"/>

    <div {{ $attributes }}>
        {{ $slot }}
    </div>
</div>
