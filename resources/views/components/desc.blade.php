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

<dl {{ $attributes }}>
    @if($title)
        <dt>{{ $title }}</dt>
    @endif

    <dd>
        @if($data || !$slot->isEmpty())
            {{ $data ?? $slot }}
        @elseif($date)
            @displayDate($date)
        @else
            N/A
        @endif
    </dd>
</dl>
