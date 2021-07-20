@props([
    //
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        'color' => 'outline-primary',
        'size' => 'sm',
    ]);
@endphp

<x-ux::button {{ $attributes }}/>
