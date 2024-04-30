
    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById("searchForm");

        searchForm.addEventListener("submit", function(event) {
            event.preventDefault(); 

            const searchInput = document.getElementById("search").value.toLowerCase();
            const cards = document.querySelectorAll(".card");

            cards.forEach(function(card) {
                const mealName = card.querySelector("h3").innerText.toLowerCase();
                const labelSticker = card.querySelector(".label-sticker").innerText.toLowerCase();
                if (mealName.includes(searchInput) || labelSticker.includes(searchInput)) {
                    card.style.display = "block"; 
                } else {
                    card.style.display = "none"; 
                }
            });
        });
    });

