import SimpleScrollbar from "simplebar";
import likely from "ilyabirman-likely";

// import 'simplebar';


const scrollElements = Array.from(document.querySelectorAll(".scroll"));

if (scrollElements) {
    scrollElements.forEach((el) => {
        new SimpleScrollbar(el, {});
    });
}

let search = document.querySelector(".search");

if (search) {
    let searchInput = document.querySelector(".search input");

    search.addEventListener("click", (event) => {
        if (!searchInput.classList.contains("expand")) {
            event.preventDefault();
            searchInput.classList.add("expand");
            searchInput.value = "";
            searchInput.focus();
        }
    });
    searchInput.addEventListener("blur", (event) => {
        console.log(event.target);
        if (searchInput.classList.contains("expand")) {
            searchInput.classList.remove("expand");
        }
    });
}

likely.initiate();


