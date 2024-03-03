var audio = document.getElementById("myAudio");
var playPauseBtn = document.getElementById("playPauseBtn");
var playPauseIcon = document.getElementById("playPauseIcon");
var volumeControl = document.getElementById("volumeControl");
var currentTimeDisplay = document.getElementById("currentTimeDisplay");
var muteIcon = document.getElementById("muteIcon");
var radioInfo = document.getElementById("radioInfo");

// Functie om de audio af te spelen en informatie bij te werken
function playAudio(audioUrl, stationName, stationCategory, stationImg) {
    try {
        var audio = document.getElementById("myAudio");
        var playPauseIcon = document.getElementById("playPauseIcon");
        var radioInfo = document.getElementById("radioInfo");

        // Sla de geselecteerde informatie op in localStorage
        localStorage.setItem('stationName', stationName);
        localStorage.setItem('stationCategory', stationCategory);
        localStorage.setItem('stationImg', stationImg); // Alleen de bestandsnaam, geen volledige URL
        localStorage.setItem('audioUrl', audioUrl);
        localStorage.setItem('audioStatus', 'playing'); // Optioneel, om de afspeelstatus bij te houden

        // Bijwerken van de radio-informatie
        radioInfo.innerHTML = `
            <div class="flex-initial text-left flex gap-2">
                <img src="${window.location.origin}/images/${stationImg}" alt="" class="w-10 h-10 rounded-lg">
                <div class="flex flex-col">
                    <p class="font-semibold text-base">${stationName}</p>
                    <span class="text-slate-700 dark:text-gray-300 text-xs">${stationCategory}</span>
                </div>
            </div>
        `;
        
        // Afspeelstatus controleren en dienovereenkomstig handelen
        var storedStatus = localStorage.getItem('audioStatus');
        if (storedStatus === 'playing') {
            audio.src = audioUrl;
            audio.play();
            playPauseIcon.className = "fas fa-pause";
            document.querySelector('.audio').classList.remove('hidden');
        } else {
            // Pas de UI aan voor de pauzestand (optioneel)
            playPauseIcon.className = "fas fa-play";
            document.querySelector('.audio').classList.add('hidden');
        }
    } catch (error) {
        console.error('Fout tijdens afspelen audio:', error);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    initializeAudio();

    var savedAudioStatus = localStorage.getItem('audioStatus');
    if (savedAudioStatus === 'playing') {
        playAudio(localStorage.getItem('audioUrl'), localStorage.getItem('stationName'), localStorage.getItem('stationCategory'), localStorage.getItem('stationImg'));
    }

    document.querySelectorAll('.pagination a').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();

            let url = this.getAttribute('href');

            axios.get(url).then(function (response) {
                document.querySelector('.grid').innerHTML = response.data;

                initializeAudio();
            })
            .catch(function (error) {
                console.error('Fout:', error);
            });
        });
    });
});

// Verplaats de initializeAudio-functie naar de bovenste scope
function initializeAudio() {
    audio.addEventListener("timeupdate", function () {
        var minutes = Math.floor(audio.currentTime / 60);
        var seconds = Math.floor(audio.currentTime % 60);
        var formattedTime = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
        currentTimeDisplay.textContent = formattedTime;
    });

    var initialVolume = 0.75;
    volumeControl.value = initialVolume;
    var initialColor = 'linear-gradient(to right, black ' + (initialVolume * 100) + '%, gray ' + (initialVolume * 100) + '%, gray 100%)';
    volumeControl.style.background = initialColor;
    audio.volume = initialVolume;

    volumeControl.addEventListener("input", function () {
        var value = (volumeControl.value - volumeControl.min) / (volumeControl.max - volumeControl.min);
        var color = 'linear-gradient(to right, black ' + (value * 100) + '%, gray ' + (value * 100) + '%, gray 100%)';
        volumeControl.style.background = color;
        audio.volume = volumeControl.value;
    });
}

// Verplaats deze functie naar de bovenste scope
function togglePlayPause() {
    if (audio.paused) {
        var currentStationName = document.querySelector('#radioInfo p');
        var currentStationCategory = document.querySelector('#radioInfo span');
        var currentStationImg = document.querySelector('#radioInfo img');

        if (currentStationName && currentStationCategory && currentStationImg) {
            localStorage.setItem('stationName', currentStationName.textContent);
            localStorage.setItem('stationCategory', currentStationCategory.textContent);
            localStorage.setItem('stationImg', currentStationImg.getAttribute('src').replace('{{ URL::to("/") }}', ''));
        }

        audio.play();
        playPauseIcon.className = "fas fa-pause";
        localStorage.setItem('audioStatus', 'playing');
    } else {
        audio.pause();
        playPauseIcon.className = "fas fa-play";
        localStorage.setItem('audioStatus', 'paused');
    }
    localStorage.setItem('audioUrl', audio.src);
}

// Verplaats deze functie naar de bovenste scope
function toggleMute() {
    audio.muted = !audio.muted;
    muteIcon.className = audio.muted ? "fas fa-volume-times" : "fas fa-volume-up";
}

// Verplaats deze functie naar de bovenste scope
function adjustVolume() {
    var value = (volumeControl.value - volumeControl.min) / (volumeControl.max - volumeControl.min);
    var color = 'linear-gradient(to right, black ' + (value * 100) + '%, gray ' + (value * 100) + '%, gray 100%)';
    volumeControl.style.background = color;
    audio.volume = volumeControl.value;

    // Controleer of het volume nul is en pas het mute-pictogram dienovereenkomstig aan
    if (audio.volume === 0) {
        muteIcon.className = "fas fa-volume-mute";
    } else {
        muteIcon.className = audio.muted ? "fas fa-volume-times" : "fas fa-volume-up";
    }
}

// Voeg deze luisteraar toe voor de mousemove-gebeurtenis op volumeControl
volumeControl.addEventListener("mousemove", adjustVolume);