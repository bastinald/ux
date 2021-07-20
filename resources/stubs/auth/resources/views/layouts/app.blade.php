<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <livewire:styles/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="d-flex flex-column bg-light h-100">
    <livewire:layouts.nav/>

    <main class="flex-shrink-0">
        {{ $slot }}
    </main>

    <livewire:layouts.footer/>

    <livewire:loader/>
    <livewire:modal/>
    <livewire:scripts/>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
