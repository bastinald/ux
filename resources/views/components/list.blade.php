@props([
    //
])

@php
    $attributes = $attributes->class([
        'list-group mb-3',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    @if(!$slot->isEmpty())
        {{ $slot }}
    @else
        <div class="list-group-item">
            {{ __('No results to display.') }}
        </div>
    @endif
</div>
