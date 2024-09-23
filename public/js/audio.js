var audio = document.getElementById("myAudio");
var playPauseBtn = document.getElementById("playPauseBtn");
var playPauseIcon = document.getElementById("playPauseIcon");
var volumeControl = document.getElementById("volumeControl");
var currentTimeDisplay = document.getElementById("currentTimeDisplay");
var muteIcon = document.getElementById("muteIcon");
var radioInfo = document.getElementById("radioInfo");

function playAudio(audioUrl, stationName, stationCategory, stationImg) {
    if (audio) {
        localStorage.setItem("stationName", stationName);
        localStorage.setItem("stationCategory", stationCategory);
        localStorage.setItem("stationImg", stationImg);
        localStorage.setItem("audioUrl", audioUrl);
        localStorage.setItem("audioStatus", "playing");

        radioInfo.innerHTML = `
            <div class="flex-initial text-left flex gap-2">
                <img src="${window.location.origin}/images/${stationImg}" alt="" class="w-10 h-10 rounded-lg">
                <div class="flex flex-col">
                    <p class="font-semibold text-base">${stationName}</p>
                    <span class="text-gray-300 text-xs">${stationCategory}</span>
                </div>
            </div>
        `;

        audio.src = audioUrl;
        audio
            .play()
            .then(() => {
                playPauseIcon.className = "fas fa-pause";
                document.querySelector(".audio").classList.remove("hidden");
            })
            .catch((error) => {
                console.error("Fout bij het afspelen van audio:", error);
            });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    initializeAudio();

    if (localStorage.getItem("audioStatus") === "playing") {
        playAudio(
            localStorage.getItem("audioUrl"),
            localStorage.getItem("stationName"),
            localStorage.getItem("stationCategory"),
            localStorage.getItem("stationImg")
        );
    }

    // Voeg event listeners toe voor paginatie
    document.querySelectorAll(".pagination a").forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let url = this.getAttribute("href");

            axios
                .get(url)
                .then(function (response) {
                    document.querySelector(".grid").innerHTML = response.data;
                    history.pushState(null, "", url);
                    initializeAudio();
                })
                .catch(function (error) {
                    console.error("Fout bij laden pagina:", error);
                });
        });
    });
});

function initializeAudio() {
    if (audio) {
        audio.addEventListener("timeupdate", function () {
            var minutes = Math.floor(audio.currentTime / 60);
            var seconds = Math.floor(audio.currentTime % 60);
            var formattedTime =
                minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
            currentTimeDisplay.textContent = formattedTime;
        });

        var initialVolume = 0.75;
        volumeControl.value = initialVolume;
        var initialColor =
            "linear-gradient(to right, white " +
            initialVolume * 100 +
            "%, gray " +
            initialVolume * 100 +
            "%, gray 100%)";
        volumeControl.style.background = initialColor;

        audio.volume = initialVolume;

        volumeControl.addEventListener("input", function () {
            var value =
                (volumeControl.value - volumeControl.min) /
                (volumeControl.max - volumeControl.min);
            var color =
                "linear-gradient(to right, white " +
                value * 100 +
                "%, gray " +
                value * 100 +
                "%, gray 100%)";
            volumeControl.style.background = color;
            audio.volume = volumeControl.value;
        });

        volumeControl.addEventListener("input", function () {
            audio.volume = volumeControl.value;
            muteIcon.className =
                audio.volume === 0 ? "fas fa-volume-mute" : "fas fa-volume-up";
        });
    }
}

function togglePlayPause() {
    if (audio) {
        if (audio.paused) {
            audio.play();
            playPauseIcon.className = "fas fa-pause";
            localStorage.setItem("audioStatus", "playing");
        } else {
            audio.pause();
            playPauseIcon.className = "fas fa-play";
            localStorage.setItem("audioStatus", "paused");
        }
        localStorage.setItem("audioUrl", audio.src);
    }
}

function toggleMute() {
    if (audio) {
        audio.muted = !audio.muted;
        muteIcon.className = audio.muted
            ? "fas fa-volume-times"
            : "fas fa-volume-up";
    }
}
