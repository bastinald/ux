@props([
    'asset' => null,
    'mix' => null,
    'src' => null,
    'fluid' => false,
    'thumbnail' => false,
    'rounded' => false,
    'circle' => false,
])

@php
    if ($asset) $src = asset($asset);
    else if ($mix) $src = mix($mix);

    $attributes = $attributes->class([
        'img-fluid' => $fluid,
        'img-thumbnail' => $thumbnail,
        'rounded' => $rounded,
        'rounded-circle' => $circle,
    ])->merge([
        'src' => $src,
    ]);
@endphp

<img {{ $attributes }}>
