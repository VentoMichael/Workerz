
//MENU


const buttonMenuClose = document.querySelector('.button-menu_close');
const buttonMenuOpen = document.querySelector('.button-menu_open');
const navOpen = document.querySelector('.nav_open');

function toggleNav() {
    navOpen.classList.toggle('hidden');
}

buttonMenuClose.addEventListener('click', toggleNav);
buttonMenuOpen.addEventListener('click', toggleNav);



