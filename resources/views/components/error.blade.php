@props([
    'key' => null,
])

@php
    $attributes = $attributes->class([
        'd-block invalid-feedback',
    ])->merge([
        //
    ]);
@endphp

@error($key)
    <div {{ $attributes }}>
        {{ $message }}
    </div>
@enderror
