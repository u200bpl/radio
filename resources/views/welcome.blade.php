@extends('layouts.base')
@section('content')

<!-- FEATURED -->
<!-- only show on page 1 -->
@if ($radios->onFirstPage())
<div class="container mx-auto px-4 mt-16">
    <div class="relative bg-cover bg-center bg-no-repeat h-96 rounded-lg shadow-lg cursor-pointer group" style="background-image: url('{{ URL::to('/') }}/images/{{ $featuredRadio->background }}')" onclick="playAudio('{{ $featuredRadio->url }}', '{{ $featuredRadio->name }}', '{{ $featuredRadio->description }}', '{{ $featuredRadio->image }}')">
        <div class="absolute inset-0 bg-black bg-opacity-50 h-full w-full rounded-lg transition-opacity group-hover:bg-opacity-75 duration-300"></div>
        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </div>

        <div class="relative z-10 p-4 flex flex-row gap-2 items-center">
            <img src="{{ URL::to('/') }}/images/{{ $featuredRadio->image }}" alt="" class="w-16 h-16 rounded-full">
            <div>
                <p class="text-white text-2xl font-semibold">{{ $featuredRadio->name }}</p>
                <span class="text-white text-sm">{{ $featuredRadio->description }}</span>
            </div>
        </div>
    </div>
</div>
@endif

<div class="container mx-auto px-4 mt-10">
    <div class="grid grid-cols-12 gap-5">
        <main class="col-span-9">
            <h2 class="text-xl font-semibold">Radio Stations</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
                @foreach ($radios as $radio)
                    <div class="rounded-lg shadow bg-zinc-800 p-3 cursor-pointer flex flex-col justify-between group" onclick="playAudio('{{ $radio->url }}', '{{ $radio->name }}', '{{ $radio->description }}', '{{ $radio->image }}')">
                        <img src="{{ URL::to('/') }}/images/{{ $radio->image }}" alt="" class="rounded-lg w-full">
                        <div class="mt-2">
                            <p class="font-semibold text-base truncate group-hover:text-blue-400">{{ $radio->name }}</p>
                            <span class="text-gray-300 text-xs">{{ $radio->description }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 mb-20">
                {{ $radios->links() }}
            </div>
        </main>

        <!-- SIDE BAR -->
        <aside class="col-span-3 self-start grid gap-y-5 mt-12">
            <!-- POPULAIR -->
            <div class="rounded-lg shadow bg-zinc-800">
                <div class="p-3 flex gap-2 items-center">
                    <div class="bg-blue-200 w-7 h-7 flex justify-center items-center rounded-full"><i class="fa-solid fa-chart-line text-blue-700 text-xs"></i></div>
                    <h5 class="text-xl font-semibold">Populair</h5>
                </div>

                @foreach ($popularRadios as $radio)
                    <div class="group p-3 block border-t-2 border-stone-600 cursor-pointer @if ($loop->last) hover:rounded-b-lg @endif" onclick="playAudio('{{ $radio->url }}', '{{ $radio->name }}', '{{ $radio->description }}', '{{ $radio->image }}')">
                        <div class="flex-initial text-left flex gap-2">
                            <img src="{{ URL::to('/') }}/images/{{ $radio->image }}" alt="" class="w-10 h-10 rounded-lg">
                            <div class="flex items-center justify-between w-full">
                                <div class="flex flex-col">
                                    <p class="font-semibold text-base truncate group-hover:text-blue-400">{{ $radio->name }}</p>
                                    <span class="text-gray-300 text-xs">{{ $radio->description }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>
    </div>
</div>

@endsection

<style>
.audio button i {
    min-width: 12px !important;
}

.audio .audio-slider button i {
    min-width: 20px !important;
}

#volumeControl {
    height: 4px;
    background-color: gray;
    appearance: none;
    margin: 0;
    outline: none;
    accent-color: white;
}

/* Chrome, Safari */
#volumeControl::-webkit-slider-thumb {
    background: white;
    border: 2px solid white;
    border-radius: 50%;
    height: 8px;
    width: 8px;
    cursor: pointer;
}

/* Firefox */
#volumeControl::-moz-range-thumb {
    background: white;
    border: 2px solid white;
    border-radius: 50%;
    height: 8px;
    width: 8px;
    cursor: pointer;
}
</style>
</html>