@props([
    'icon' => null,
    'label' => null,
    'route' => null,
    'url' => null,
    'href' => null,
    'click' => null,
    'confirm' => false,
])

@php
    if ($route) $href = route($route);
    else if ($url) $href = url($url);

    $attributes = $attributes->class([
        'dropdown-item',
        'active' => $href == Request::url(),
    ])->merge([
        'type' => !$href ? 'button' : null,
        'href' => $href,
        'wire:click' => $click,
        'onclick' => $confirm ? 'confirm(\'Are you sure?\') || event.stopImmediatePropagation()' : null,
    ]);
@endphp

<{{ $href ? 'a' : 'button' }} {{ $attributes }}>
    <x-ux::icon :name="$icon"/>

    {{ $label ?? $slot }}
</{{ $href ? 'a' : 'button' }}>
