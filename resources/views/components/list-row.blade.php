@props([
    //
])

@php
    $attributes = $attributes->class([
        'list-group-item list-group-item-action',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <div class="row align-items-center">
        {{ $slot }}
    </div>
</div>
