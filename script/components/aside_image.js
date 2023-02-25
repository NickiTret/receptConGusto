

const aside = document.querySelector('.aside');

if (aside) {
    const asideList = Array.from(aside.querySelectorAll('a'));


    asideList.forEach((el) => {
        el.addEventListener('mousemove', (evt) => {

            evt.target.querySelector('.disabled').classList.add('active');
            let topMouse = evt.offsetY;
            let leftMouse = evt.offsetX;
        
            evt.target.querySelector('.disabled').style.top = `${topMouse}px`;
            evt.target.querySelector('.disabled').style.left = `${leftMouse}px`;


        });

        el.addEventListener('mouseleave', (evt) => {

            evt.target.querySelector('.disabled').classList.remove('active');

        });
    });


}