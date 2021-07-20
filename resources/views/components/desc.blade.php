@props([
    'title' => null,
    'data' => null,
    'date' => null,
])

@php
    $attributes = $attributes->class([
        //
    ])->merge([
        //
    ]);
@endphp

<dl>
    @if($title)
        <dt>{{ $title }}</dt>
    @endif

    <dd {{ $attributes }}>
        @if($data || !$slot->isEmpty())
            {{ $data ?? $slot }}
        @elseif($date)
            @displayDate($date)
        @else
            N/A
        @endif
    </dd>
</dl>
