const menuBody = document.querySelector('.menu');
document.addEventListener('click', menu);
function menu(event) {
    if (event.target.closest(".menu__button")) {
        menuBody.classList.toggle('active');
    }
    if (!event.target.closest(".menu")) {
        menuBody.classList.remove('active');
    }
}