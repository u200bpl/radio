<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radio</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')

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
    <body class="bg-zinc-900 text-white">
        @include('layouts.header')
        
        @yield('content')

        @include('layouts.footer')

        @include('layouts.audio')
        <script async defer src="{{ URL::to('/') }}/js/audio.js"></script>
        <script async defer src="{{ URL::to('/') }}/js/pagination.js"></script>

        <script>
            const stationId = {{ $radio->id }};

            function sendListenerUpdate(stationId) {
                fetch('/radio/' + stationId + '/listener', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ station_id: stationId })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Update sent for station ID:', data.station_id);
                    console.log('Response:', data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
            }

            setInterval(sendListenerUpdate, 600000);
        </script>
    </body>
</html>