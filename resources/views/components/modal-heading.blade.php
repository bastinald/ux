@props([
    'label' => null,
])

@php
    $attributes = $attributes->class([
        'border-top border-bottom p-3 mx-n3 mb-0',
    ])->merge([
        //
    ]);
@endphp

<h5 {{ $attributes }}>
    {{ $label ?? $slot }}
</h5>
