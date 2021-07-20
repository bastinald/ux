@props([
    'links' => null,
    'justify' => 'center',
])

@php
    $attributes = $attributes->class([
        'd-flex align-items-center mb-n3',
        'justify-content-' . $justify => $justify,
    ])->merge([
        //
    ]);
@endphp

@if($links->hasPages())
    <div {{ $attributes }}>
        <div class="d-block d-lg-none">
            {{ $links->links('livewire::simple-bootstrap') }}
        </div>

        <div class="d-none d-lg-block">
            {{ $links->links('livewire::bootstrap') }}
        </div>
    </div>
@endif
