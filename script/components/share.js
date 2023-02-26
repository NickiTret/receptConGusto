function actionToggle() {
    var action = document.querySelector('.share');
    action.classList.toggle('active');
}


const share = document.querySelector('.share');

if (share) {
    share.addEventListener('click', actionToggle);
}