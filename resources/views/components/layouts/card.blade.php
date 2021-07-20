@props([
    'title' => null,
    'body' => null,
    'footer' => null,
    'submit' => null,
])

@php
    $attributes = $attributes->class([
        'container my-3',
    ])->merge([
        'wire:submit.prevent' => $submit,
    ]);
@endphp

@section('title', $title)

<{{ $submit ? 'form' : 'div' }} {{ $attributes }}>
    <div class="d-grid col-lg-4 mx-auto">
        <div class="card">
            @if($title)
                <h5 class="card-header">{{ $title }}</h5>
            @endif

            <div class="card-body d-grid gap-3">
                {{ $body ?? $slot }}
            </div>

            @if($footer)
                <div class="card-footer d-flex justify-content-end gap-2">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</{{ $submit ? 'form' : 'div' }}>
