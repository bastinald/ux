@props([
    'name' => null,
    'style' => config('ux.font_awesome_style'),
    'size' => null,
    'color' => null,
    'spin' => false,
    'pulse' => false,
])

@php
    $attributes = $attributes->class([
        'fa' . Str::limit($style, 1, null) . ' fa-fw fa-' . $name,
        'fa-' . $size => $size,
        'fa-spin' => $spin,
        'fa-pulse' => $pulse,
        'text-' . $color => $color,
    ])->merge([
        //
    ]);
@endphp

@if($name)
    <i {{ $attributes }}></i>
@endif
