var preloader = document.getElementById('loading');

function load() {
    preloader.style.display = 'none';
}

burger = document.querySelector('.burger');
navbar = document.querySelector('.navbar');
navitem = document.querySelector('.navitem');
btn = document.querySelector('.btn');

burger.addEventListener('click', () => {
    navitem.classList.toggle('v-class');
    btn.classList.toggle('v-class');
    navbar.classList.toggle('h-nav');
});