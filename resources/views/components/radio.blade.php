@props([
    'label' => null,
    'options' => [],
    'help' => null,
    'switch' => false,
    'model' => null,
    'lazy' => false,
])

@php
    if ($lazy) $bind = '.lazy';
    else $bind = '.defer';

    $options = Arr::isAssoc($options) ? $options : array_combine($options, $options);

    $attributes = $attributes->class([
        'form-check-input',
        'is-invalid' => $errors->has($model),
    ])->merge([
        'type' => 'radio',
        'name' => $model,
        'wire:model' . $bind => 'model.' . $model,
    ]);
@endphp

<div>
    <x-ux::label :label="$label"/>

    @foreach($options as $optionValue => $optionLabel)
        <div class="form-check {{ $switch ? 'form-switch' : '' }}">
            @php($optionId = $model . '_' . $loop->index)

            <input {{ $attributes->merge(['id' => $optionId, 'value' => $optionValue]) }}>

            <x-ux::check-label :for="$optionId" :label="$optionLabel"/>

            @if($loop->last)
                <x-ux::error :key="$model"/>

                <x-ux::help :label="$help"/>
            @endif
        </div>
    @endforeach
</div>
