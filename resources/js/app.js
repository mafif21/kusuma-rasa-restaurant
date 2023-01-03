// default starter
import "./bootstrap";
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// aos

// own
// search function
const search = document.querySelector("#menu-search");
const cards = document.querySelectorAll("#card");

search.addEventListener("input", function () {
    const userInput = search.value;

    for (let i = 0; i < cards.length; i++) {
        const cardValue = cards[i].getElementsByTagName("h5")[0];

        if (cardValue.innerText.toLocaleLowerCase().indexOf(userInput) > -1) {
            cards[i].style.display = "";
        } else {
            cards[i].style.display = "none";
        }
    }
});
