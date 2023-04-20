
//MENU


const buttonMenuClose = document.querySelector('.button-menu_close');
const buttonMenuOpen = document.querySelector('.button-menu_open');
const navOpen = document.querySelector('.nav_open');

function toggleNav() {
    navOpen.classList.toggle('hidden');
}

buttonMenuClose.addEventListener('click', toggleNav);
buttonMenuOpen.addEventListener('click', toggleNav);





    //SIGN IN POP UP
    // Get the modal element
const modal = document.getElementById('authentication-modal');
const modalToggle = document.querySelector('[data-modal-toggle="authentication-modal"]');
const modalClose = modal.querySelector('[data-modal-hide="authentication-modal"]');
const modalOverlay = document.createElement('div');

function showModal() {
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    modal.setAttribute('aria-hidden', 'false');
    modalOverlay.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'bottom-0', 'bg-gray-900', 'opacity-70', 'z-40');
    modalOverlay.classList.remove('hidden');
    document.body.appendChild(modalOverlay);
}

function hideModal() {
    modal.classList.remove('flex');
    modal.classList.add('hidden');
    modal.setAttribute('aria-hidden', 'true');
    modalOverlay.classList.add('hidden');
}

modalToggle.addEventListener('click', showModal);
modalClose.addEventListener('click', hideModal);
window.addEventListener('click', (event) => {
    if (event.target === modal) {
        hideModal();
    }
});

const signinLink = document.getElementById('signin-link');
signinLink.addEventListener('click', e => {
    e.preventDefault();
    showModal();
});


