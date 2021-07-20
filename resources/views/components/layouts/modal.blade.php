@props([
    'title' => null,
    'body' => null,
    'footer' => null,
    'size' => null,
    'submit' => null,
])

@php
    $attributes = $attributes->class([
        'modal-dialog',
        'modal-' . $size => $size,
    ])->merge([
        'wire:submit.prevent' => $submit,
    ]);
@endphp

<{{ $submit ? 'form' : 'div' }} {{ $attributes }}>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                {{ $title }}
            </h5>

            <x-ux::close dismiss="modal"/>
        </div>

        <div class="modal-body d-grid gap-3">
            {{ $body ?? $slot }}
        </div>

        @if($footer)
            <div class="modal-footer">
                {{ $footer }}
            </div>
        @endif
    </div>
</{{ $submit ? 'form' : 'div' }} {{ $attributes }}>
