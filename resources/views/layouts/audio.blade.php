<!-- AUDIO -->
<!-- <section class="audio bg-slate-50 dark:bg-zinc-800 fixed bottom-5 left-1/2 transform -translate-x-1/2 text-center p-2 text-slate-950 dark:text-white shadow-2xl rounded-lg hidden z-50"> -->
<section class="audio bg-slate-50 dark:bg-zinc-800 fixed bottom-0 w-full text-center p-2 text-slate-950 dark:text-white shadow-2xl hidden z-50">
    <audio id="myAudio" preload="auto"></audio>

    <div class="flex justify-center items-center gap-5">
        <!-- RADIO-INFORMATIE -->
        <div id="radioInfo" class="flex-initial text-left flex gap-2"></div>

        <!-- KNOPPEN -->
        <div class="flex-initial flex gap-3">
            <button id="playPauseBtn" onclick="togglePlayPause()">
                <i id="playPauseIcon" class="fas fa-play"></i>
            </button>
        </div>

        <!-- AUDIO TIJD -->
        <div id="currentTimeDisplay" class="text-xs font-semibold min-w-6">0:00</div>

        <!-- AUDIO VOLUME -->
        <div class="audio-slider flex items-center gap-2">
            <button onclick="toggleMute()">
                <i id="muteIcon" class="fas fa-volume-times"></i>
            </button>
            <input type="range" id="volumeControl" min="0" max="1" step="0.01" value="1" onchange="adjustVolume()" class="w-20 h-4 bg-gray-300 rounded-full appearance-none">
        </div>
    </div>
</section>