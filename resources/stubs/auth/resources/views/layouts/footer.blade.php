<footer class="small text-muted py-3 mt-auto">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                &copy; {{ now()->format('Y') }}
                <x-ux::link :label="config('app.name')" route="welcome"/>
            </div>
            <div class="col-auto d-flex gap-3">
                <x-ux::link :label="__('Contact')" href="mailto:{{ config('mail.from.address') }}"/>
            </div>
        </div>
    </div>
</footer>
