@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'row gx-3',
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
