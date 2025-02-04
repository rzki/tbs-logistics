<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title . ' - ' . config('app.name') ?? 'Laravel' }}</title>

    <!-- Styles -->
    @vite('resources/sass/app.scss')
    {{-- Timeline --}}
    <link rel="stylesheet" href="{{ asset('assets/css/timeline-8.css') }}"><link rel="stylesheet" href="{{ asset('assets/css/responsive-widths-bootstrap-minified.css') }}">
</head>

<body>
    <main class="min-vh-100 d-flex align-items-center justify-content-center">
        <div class="flex-fill">
            {{ $slot }}
        </div>
    </main>
</body>

</html>
