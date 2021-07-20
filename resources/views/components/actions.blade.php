@props([
'search' => false,
    'title' => null,
])

@php
    $attributes = $attributes->class([
        'row justify-content-between align-items-end',
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    @if($search)
        <div class="col-lg-3 mb-3">
            <x-ux::input icon="search" :placeholder="__('Search')" type="search" model="search" debounce/>
        </div>
    @elseif($title)
        <div class="col-lg-3">
            <h1>{{ $title }}</h1>
        </div>
    @endif

    <div class="col-lg-auto d-flex align-items-center gap-2 mb-3">
        {{ $slot }}
    </div>
</div>
