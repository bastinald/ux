@props([
    'label' => null,
    'icon' => null,
    'prepend' => null,
    'append' => null,
    'rows' => 3,
    'size' => null,
    'help' => null,
    'model' => null,
    'debounce' => false,
    'lazy' => false,
])

@php
    if ($lazy) $bind = '.lazy';
    else if ($debounce) $bind = '.debounce.500ms';
    else $bind = '.defer';

    $attributes = $attributes->class([
        'form-control',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($model),
    ])->merge([
        'rows' => $rows,
        'id' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div>
    <x-ux::label :for="$model" :label="$label"/>

    <div class="input-group">
        <x-ux::input-addon :icon="$icon" :label="$prepend"/>

        <textarea {{ $attributes }}></textarea>

        <x-ux::input-addon :label="$append" class="rounded-end"/>

        <x-ux::error :key="$model"/>
    </div>

    <x-ux::help :label="$help"/>
</div>
