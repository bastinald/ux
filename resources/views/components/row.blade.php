@props([
    'align' => null,
    'justify' => null,
    'gap' => null,
])

@php
    $attributes = $attributes->class([
        'row',
        'align-items-' . $align => $align,
        'justify-content-' . $justify => $justify,
        'gx-' . $gap => $gap,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    {{ $slot }}
</div>
