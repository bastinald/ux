@props([
    'icon' => null,
    'label' => null,
    'items' => null,
    'color' => 'primary',
    'size' => null,
])

@php
    $attributes = $attributes->class([
        'btn btn-' . $color,
        'btn-' . $size => $size,
    ])->merge([
        'icon' => $icon,
        'label' => $label,
        'color' => $color,
        'size' => $size,
        'toggle' => 'dropdown',
    ]);
@endphp

<div class="dropdown d-inline-block">
    <x-ux::button {{ $attributes }}>
        <x-ux::icon :name="$icon"/>

        {{ $label }}
    </x-ux::button>

    <div class="dropdown-menu">
        {{ $items ?? $slot }}
    </div>
</div>
