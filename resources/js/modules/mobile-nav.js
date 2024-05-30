const burgerBtn = document.querySelector('.header__burger');
const closeBtn = document.querySelector('.header__close-btn');
const menu = document.querySelector('.header__menu');
const bgOverlay = document.querySelector('.bg-overlay');

// console.log(document.querySelector('[data-bs-ride="carousel"]'))

const openMenu = (e) => {

    menu.classList.add('active');
    bgOverlay.classList.add('active');

}

const closeMenu = () => {
    menu.classList.remove('active');
    bgOverlay.classList.remove('active');
}

burgerBtn.addEventListener('click', openMenu)
bgOverlay.addEventListener('click', closeMenu)

closeBtn.addEventListener('click', closeMenu)

document.addEventListener('swiped-right', closeMenu);
