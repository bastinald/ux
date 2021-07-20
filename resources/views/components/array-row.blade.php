@props([
    //
])

@php
    $attributes = $attributes->class([
        'list-group-item list-group-item-action p-2',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <div class="row align-items-start gx-2">
        {{ $slot }}
    </div>
</div>
