const steaks = document.querySelector("section.steak");

if (steaks) {
    const { find } = require("lodash");

    class Steak {
        constructor(element, option) {
            this.element = document.querySelector(element);
            this.items = option.items;

            if (this.element) {
                this.hoverList = this.element.querySelector(".hover-list");
                this.hoverTitle = this.hoverList.querySelector("h2");
                this.hoverDescr = this.hoverList.querySelector("p");

                this.init();

                this.element.addEventListener("mouseover", (event) => {
                    var rect = event.target.getBoundingClientRect();
                    var x = event.clientX;
                    var y = event.clientY - rect.top;

                    //проверка координатов мыши
                    // console.log("Left? : " + x + " ; Top? : " + y + ".");

                    let findItem = Array.from(this.items).find(
                        (item) =>
                            item.id == event.target.getAttribute("data-id")
                    );

                    if (findItem) {
                        this.hoverTitle.innerText = findItem.title;
                        this.hoverDescr.innerText = findItem.description;
                    } else {
                        return;
                    }

                    if (event.target.dataset.id) {
                        this.show(x, y);
                    }
                });

                this.element.addEventListener("mouseout", (event) => {
                    if (event.target.dataset.id) {
                        this.hide();
                    }
                });

                this.element.addEventListener("click", (event) => {
                    const findArrayP = arrayP.filter(
                        (item) =>
                            item.steaks_id ==
                            event.target.getAttribute("data-id")
                    );

                    let allPath = Array.from(
                        document.querySelectorAll("#steak>svg>[data-id]")
                    );
                    allPath.forEach((path) => path.classList.remove("active"));
                    event.target.classList.add("active");

                    window.location.hash = `stake-${event.target.getAttribute(
                        "data-id"
                    )}`;

                    const ulList = dataPieces.querySelector("ul");
                    ulList.innerHTML = `
                            <li>
                                <h4>Карта частей туши животных</h4>
                                <div>
                                    <p>Выберите животное и кликните на ту часть туши, которую хотите приготовить</p>
                                </div>

                            </li>`;

                    findArrayP.forEach((item) => {
                        const lisItem = `
                        <li>
                            <h4>${item.title}</h4>
                            <p>${item.description}</p>
                            <div>
                                <div class="text">
                                    ${item.content}
                                </div>

                                <img lazy="loading" src="${item.image}" alt="${item.description}" title="${item.title}">
                            </div>
                        </li>`;

                        ulList.insertAdjacentHTML("beforeend", lisItem);
                    });
                });
            }
        }

        init() {
            console.log(window.location.hash);

            if (window.location.hash.includes("stake")) {
                let allPath = Array.from(
                    document.querySelectorAll("#steak>svg>[data-id]")
                );


                this.loadSteaks();
            }
        }

        show(left = 0, top = 0) {
            this.hoverList.style.top = `${top}px`;
            this.hoverList.style.left = `${left}px`;
            this.hoverList.classList.add("show");
        }

        hide() {
            this.hoverList.classList.remove("show");
        }

        loadSteaks() {
            let steikId = window.location.hash.replace("#stake-", "");
            const findArrayP = arrayP.filter(
                (item) =>
                    item.steaks_id == steikId
            );

            const ulList = dataPieces.querySelector("ul");

            ulList.innerHTML = `
            <li>
                <h4>Карта частей туши животных</h4>
                <div>
                    <p>Выберите животное и кликните на ту часть туши, которую хотите приготовить</p>
                </div>

            </li>`;

            findArrayP.forEach((item) => {
                const lisItem = `
                <li>
                    <h4>${item.title}</h4>
                    <p>${item.description}</p>
                    <div>
                        <div class="text">
                            ${item.content}
                        </div>

                        <img lazy="loading" src="${item.image}" alt="${item.description}" title="${item.title}">
                    </div>
                </li>`;

                ulList.insertAdjacentHTML("beforeend", lisItem);
            });
        }
    }
    // куски тела
    const dataPieces = document.querySelector(".content");
    const arrayP = Array.from(JSON.parse(dataPieces.getAttribute("data-json")));

    //части тела
    const dataSteak = document.querySelector(".hover-list");
    const arrayS = JSON.parse(dataSteak.getAttribute("data-json"));

    const dropdown = new Steak("#steak", {
        items: arrayS,
    });
}
