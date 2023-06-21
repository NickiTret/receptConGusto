class Steak {
    constructor(element, option) {
        this.element = document.querySelector(element);
        this.items = option.items;
        if (this.element) {
            this.hoverList = this.element.querySelector(".hover-list");
            this.element.addEventListener("mouseover", (event) => {
                var rect = event.target.getBoundingClientRect();
                var x = event.clientX;
                var y = event.clientY - rect.top;

                console.log("Left? : " + x + " ; Top? : " + y + ".");

                if (event.target.dataset.id) {
                    this.show(x, y);
                }
            });
            this.element.addEventListener("mouseout", (event) => {
                if (event.target.dataset.id) {
                    this.hide();
                }
            });
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
}

const dropdown = new Steak("#steak", {
    items: [
        {
            id: 1,
            title: "title 1",
            description: "Описание 1",
        },
    ],
});
