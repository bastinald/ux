@props([
    'icon' => null,
    'label' => null,
    'color' => 'success',
    'dismissible' => false,
])

@php
    $attributes = $attributes->class([
        'alert alert-' . $color . ' fade show mb-0',
        'alert-dismissible' => $dismissible,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <x-ux::icon :name="$icon"/>

    {{ $label ?? $slot }}

    @if($dismissible)
        <x-ux::close dismiss="alert"/>
    @endif
</div>
