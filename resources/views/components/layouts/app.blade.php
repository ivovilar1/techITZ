<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans antialiased shadow bg-[#1C1C2E] flex flex-col">
    <x-toast />
    {{ $slot }}
</body>
<footer class="shadow bg-[#1C1C2E] py-8 text-[#B3A1C2] text-center mt-auto">
    <p>&copy; {{ now()->year }} TechITZ. Desenvolvido por
        <a href="https://www.linkedin.com/in/ivo-vilar/"
           class="cursor-pointer font-semibold text-[#FFFFFF] hover:text-[#9D50BB]"
        >
            devIA
        </a>
    </p>
</footer>
</html>
