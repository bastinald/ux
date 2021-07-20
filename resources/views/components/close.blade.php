@props([
    'color' => null,
    'dismiss' => null,
    'click' => null,
    'confirm' => false,
])

@php
    $attributes = $attributes->class([
        'btn-close',
        'btn-close-' . $color => $color,
    ])->merge([
        'type' => 'button',
        'data-bs-dismiss' => $dismiss,
        'wire:click' => $click,
        'onclick' => $confirm ? 'confirm(\'Are you sure?\') || event.stopImmediatePropagation()' : null,
    ]);
@endphp

<button {{ $attributes }}></button>
