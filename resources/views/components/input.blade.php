@props([
    'label' => null,
    'type' => 'text',
    'icon' => null,
    'prepend' => null,
    'append' => null,
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

    if ($type == 'number') $inputmode = 'decimal';
    else if (in_array($type, ['tel', 'search', 'email', 'url'])) $inputmode = $type;
    else $inputmode = 'text';

    $attributes = $attributes->class([
        'form-control',
        'form-control-' . $size => $size,
        'rounded-end' => !$append,
        'is-invalid' => $errors->has($model),
    ])->merge([
        'type' => $type,
        'inputmode' => $inputmode,
        'id' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div>
    <x-ux::label :for="$model" :label="$label"/>

    <div class="input-group">
        <x-ux::input-addon :icon="$icon" :label="$prepend"/>

        <input {{ $attributes }}>

        <x-ux::input-addon :label="$append" class="rounded-end"/>

        <x-ux::error :key="$model"/>
    </div>

    <x-ux::help :label="$help"/>
</div>
