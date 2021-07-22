@props([
    'color' => 'outline-primary',
    'size' => 'sm',
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        'color' => $color,
        'size' => $size,
    ]);
@endphp

<x-ux::button {{ $attributes }}/>
