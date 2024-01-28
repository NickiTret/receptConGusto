const viewsort = document.querySelector(".viewsort-btns");
if (viewsort) {
    const btnGrid = Array.from(viewsort.querySelectorAll("button"));
    const sortContainer = document.querySelector(".hits-news");
    btnGrid.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            if(e.currentTarget.dataset.sort === 'grid' && !sortContainer.classList.contains('grid-sort')) {
                sortContainer.classList.add('grid-sort');
            } else if(e.currentTarget.dataset.sort === 'row' && sortContainer.classList.contains('grid-sort')){
                sortContainer.classList.remove('grid-sort');
            }
        })
    });
}
