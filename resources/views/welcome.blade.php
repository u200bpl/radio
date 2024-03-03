@extends('layouts.base')
@section('content')

<div class="container mx-auto px-4">
    <div class="grid grid-cols-12 gap-5 mt-16">
        <main class="col-span-9">
            <h2 class="text-xl font-semibold">Radio Stations</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
                @foreach ($radios as $radio)
                    <div class="rounded-lg shadow bg-zinc-50 dark:bg-zinc-800 p-3 cursor-pointer" onclick="playAudio('{{ $radio->url }}', '{{ $radio->name }}', '{{ $radio->description }}', '{{ $radio->image }}')">
                        <img src="{{ URL::to('/') }}/images/{{ $radio->image }}" alt="" class="rounded-lg w-full">
                        <div class="mt-2">
                            <p class="font-semibold text-base truncate">{{ $radio->name }}</p>
                            <span class="text-slate-700 dark:text-gray-300 text-xs">{{ $radio->description }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5">
                {{ $radios->links() }}
            </div>
        </main>

        <!-- SIDE BAR -->
        <aside class="col-span-3 self-start sticky top-20 grid gap-y-5 mt-12">
            <!-- POPULAIR -->
            <div class="rounded-lg shadow bg-zinc-50 dark:bg-zinc-800">
                <div class="p-3 flex gap-2 items-center">
                    <div class="bg-red-200 w-7 h-7 flex justify-center items-center rounded-full"><i class="fa-solid fa-chart-line text-red-600 text-xs"></i></div>
                    <h5 class="text-xl font-semibold">Populair</h5>
                </div>

                @foreach ($radios->take(5) as $radio)
                    <div class="p-3 block border-t-2 dark:border-stone-600 cursor-pointer @if ($loop->last) hover:rounded-b-lg @endif" onclick="playAudio('{{ $radio->url }}', '{{ $radio->name }}', '{{ $radio->description }}', '{{ $radio->image }}')">
                        <div class="flex-initial text-left flex gap-2">
                            <img src="{{ URL::to('/') }}/images/{{ $radio->image }}" alt="" class="w-10 h-10 rounded-lg">
                            <div class="flex items-center justify-between w-full">
                                <div class="flex flex-col">
                                    <p class="font-semibold text-base truncate">{{ $radio->name }}</p>
                                    <span class="text-slate-700 dark:text-gray-300 text-xs">{{ $radio->description }}</span>
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
    accent-color: black;
}

/* Chrome, Safari */
#volumeControl::-webkit-slider-thumb {
    background: black;
    border: 2px solid black;
    border-radius: 50%;
    height: 8px;
    width: 8px;
}

/* Firefox */
#volumeControl::-moz-range-thumb {
    background: black;
    border: 2px solid black;
    border-radius: 50%;
    height: 8px;
    width: 8px;
}
</style>
</html>