//MENU


const buttonMenuClose = document.querySelector('.button-menu_close');
    const buttonMenuOpen = document.querySelector('.button-menu_open');
    const navOpen = document.querySelector('.nav_open');

    buttonMenuClose.addEventListener('click', function() {
    navOpen.classList.toggle('hidden');
});
    buttonMenuOpen.addEventListener('click', function() {
    navOpen.classList.toggle('hidden');
});




    //SIGN IN POP UP
    // Get the modal element
// Get the modal element
const modal = document.getElementById('authentication-modal');

// Get the button that opens the modal
const modalToggle = document.querySelector('[data-modal-toggle="authentication-modal"]');

// Get the button that closes the modal
const modalClose = modal.querySelector('[data-modal-hide="authentication-modal"]');

const modalOverlay = document.createElement('div')

    // When the user clicks on the button, open the modal
    modalToggle.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        modalOverlay.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'bottom-0', 'bg-gray-900', 'opacity-50', 'z-40')
        modalOverlay.classList.remove('hidden')
        document.body.appendChild(modalOverlay)
    });

    // When the user clicks on the close button, close the modal
    modalClose.addEventListener('click', () => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        modal.setAttribute('aria-hidden', 'true');
        modalOverlay.classList.add('hidden')
    });

    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            modalOverlay.classList.add('hidden')
            modal.setAttribute('aria-hidden', 'true');
        }
    });

const signinLink = document.getElementById('signin-link');

signinLink.addEventListener('click', e => {
    e.preventDefault();
    modal.classList.add('open');
});

