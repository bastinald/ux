@props([
    'icon' => null,
    'label' => null,
    'color' => 'primary',
])

@php
    $attributes = $attributes->class([
        'badge bg-' . $color,
    ])->merge([
        //
    ]);
@endphp

<span {{ $attributes }}>
    <x-ux::icon :name="$icon"/>

    {{ $label ?? $slot }}
</span>
