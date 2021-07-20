@props([
    'title' => null,
])

@php
    $attributes = $attributes->class([
        'container my-3',
    ])->merge([
        //
    ]);
@endphp

@section('title', $title)

<div {{ $attributes }}>
    @if($title)
        <h1>{{ $title }}</h1>
    @endif

    {{ $slot }}
</div>
