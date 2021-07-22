@props([
    'width' => null,
    'flex' => false,
    'align' => null,
    'justify' => null,
    'gap' => null,
    'margin' => null,
])

@php
    $attributes = $attributes->class([
        'col-lg' => !$width,
        'col-lg-' . $width => $width,
        'd-flex' => $flex,
        'align-items-' . $align => $align,
        'justify-content-' . $justify => $justify,
        'gap-' . $gap => $gap,
        'mb-' . $margin . ' mb-lg-0' => $margin,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    {{ $slot }}
</div>
