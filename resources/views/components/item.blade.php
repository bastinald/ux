@props([
    'icon' => null,
    'iconColor' => null,
    'data' => null,
    'date' => null,
    'color' => null,
    'size' => null,
])

@php
    $attributes = $attributes->class([
        $size => $size,
        'text-' . $color => $color,
    ])->merge([
        //
    ]);
@endphp

<div {{ $attributes }}>
    <x-ux::icon :name="$icon" :color="$iconColor"/>

    @if($data || !$slot->isEmpty())
        {{ $data ?? $slot }}
    @elseif($date)
        @displayDate($date)
    @else
        N/A
    @endif
</div>
