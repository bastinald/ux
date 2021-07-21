@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'form-label d-block',
    ])->merge([
        //
    ]);
@endphp

@if($label || !$slot->isEmpty())
    <label {{ $attributes }}>
        {{ $label ?? $slot }}
    </label>
@endif
