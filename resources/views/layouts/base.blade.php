<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radio</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        @vite('resources/css/app.css')

        <script>
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>

<style>
    /* Voeg deze stijlen toe aan je CSS-bestand of de head-sectie van je HTML-bestand */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
    }

    .pagination > * {
        margin: 0 0.25rem;
    }

    .pagination .pagination-item:not(.disabled) a {
        color: #fff;
        background-color: #3490dc; /* Aanpassen aan de gewenste blauwe kleur */
        border-color: #3490dc;
    }

    .pagination .pagination-item.active a {
        color: #fff;
        background-color: #1e4e8c; /* Aanpassen aan de gewenste blauwe kleur voor de actieve pagina */
        border-color: #1e4e8c;
    }

    .pagination .pagination-item.disabled a {
        background-color: #ccc; /* Aanpassen aan de gewenste grijze kleur voor uitgeschakelde knoppen */
        border-color: #ccc;
    }
</style>
    </head>
    <body class="bg-zinc-100 dark:bg-zinc-900 dark:text-white font-sans">
        @include('layouts.header')
        
        @yield('content')

        @include('layouts.footer')

        @include('layouts.audio')
    </body>
</html>