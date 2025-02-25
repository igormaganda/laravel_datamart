<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Charger le CSS par défaut de Filament --}}
    @vite(['resources/css/app.css'])

    {{-- Ajouter ton propre CSS --}}
    <link rel="stylesheet" href="{{ asset('vendor/filament-nord-theme/theme.css') }}">
    
    @livewireStyles
</head>
<body class="filament-body">
    {{ $slot }}
</body>
</html>
