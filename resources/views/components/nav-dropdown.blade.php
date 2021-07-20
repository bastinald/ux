@props([
    'icon' => null,
    'label' => null,
    'items' => null,
])

@php
    $attributes = $attributes->class([
        'nav-link',
    ])->merge([
        'href' => '#',
        'data-bs-toggle' => 'dropdown',
    ]);
@endphp

<div class="nav-item dropdown">
    <a {{ $attributes }}>
        <x-ux::icon :name="$icon"/>

        {{ $label }}
    </a>

    <div class="dropdown-menu">
        {{ $items ?? $slot }}
    </div>
</div>
