@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => '#',
    'click' => null,
    'confirm' => false,
])

@php
    if ($route) $href = route($route);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        //
    ])->merge([
        'href' => $href,
        'wire:click.prevent' => $click,
        'onclick' => $confirm ? 'confirm(\'Are you sure?\') || event.stopImmediatePropagation()' : null,
    ]);
@endphp

<a {{ $attributes }}>
    <x-ux::icon :name="$icon"/>

    {{ $label ?? $slot }}
</a>
