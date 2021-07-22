@props([
    'align' => null,
    'justify' => null,
    'gap' => null,
])

@php
    $attributes = $attributes->class([
        'd-flex',
        'align-items-' . $align => $align,
        'justify-content-' . $justify => $justify,
        'gap-' . $gap => $gap,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    {{ $slot }}
</div>
