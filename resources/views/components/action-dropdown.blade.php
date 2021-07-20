@props([
    'key' => null,
])

@php
    $options = $this->getModel(Str::plural($key));

    $attributes = $attributes->class([
        //
    ])->merge([
        'icon' => $key,
        'label' => __($this->getModel($key)),
    ]);
@endphp

<x-ux::dropdown {{ $attributes }}>
    @foreach($options as $option)
        <x-ux::dropdown-item :label="__($option)" click="$set('model.{{ $key }}', '{{ $option }}')"/>
    @endforeach
</x-ux::dropdown>
