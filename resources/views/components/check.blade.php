@props([
    'label' => null,
    'checkLabel' => null,
    'help' => null,
    'switch' => false,
    'model' => null,
    'lazy' => false,
])

@php
    if ($lazy) $bind = '.lazy';
    else $bind = '.defer';

    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($model),
    ])->merge([
        'type' => 'checkbox',
        'id' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div>
    <x-ux::label :label="$label"/>

    <div class="form-check {{ $switch ? 'form-switch' : '' }}">
        <input {{ $attributes }}>

        <x-ux::check-label :for="$model" :label="$checkLabel"/>

        <x-ux::error :key="$model"/>

        <x-ux::help :label="$help"/>
    </div>
</div>
