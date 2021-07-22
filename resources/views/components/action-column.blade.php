@props([
    'width' => 'auto',
    'flex' => true,
    'gap' => 2,
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        'width' => $width,
        'flex' => $flex,
        'gap' => $gap,
    ]);
@endphp

<x-ux::column {{ $attributes }}>
    {{ $slot }}
</x-ux::column>
