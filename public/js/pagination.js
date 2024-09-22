// pagination.js
document.addEventListener("DOMContentLoaded", function () {
    // Voeg event listeners toe voor paginatie
    document.querySelectorAll(".pagination a").forEach(function (link) {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            let url = this.getAttribute("href");

            axios
                .get(url)
                .then(function (response) {
                    // Vervang alleen de inhoud van de radio-stations
                    document.querySelector(".grid").innerHTML = response.data;

                    // Update de URL in de browser zonder de pagina opnieuw te laden
                    history.pushState(null, "", url);

                    // Herinitialiseer audio-instellingen
                    initializeAudio();
                })
                .catch(function (error) {
                    console.error("Fout bij laden pagina:", error);
                });
        });
    });
});
