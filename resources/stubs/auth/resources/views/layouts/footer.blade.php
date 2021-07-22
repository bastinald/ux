<footer class="small text-muted text-center py-3 mt-auto">
    <div class="container">
        <x-ux::row justify="between">
            <x-ux::column width="auto">
                &copy; {{ now()->format('Y') }}
                <x-ux::link :label="config('app.name')" route="welcome"/>
            </x-ux::column>

            <x-ux::column width="auto" flex justify="center" gap="3">
                <x-ux::link :label="__('Contact')" href="mailto:{{ config('mail.from.address') }}"/>
            </x-ux::column>
        </x-ux::row>
    </div>
</footer>
