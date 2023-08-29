const buttons = document.querySelectorAll('[role="switch"]');
buttons.forEach(function(button) {
    const span = button.querySelector('span');
    const initialState = button.getAttribute('aria-checked') === 'true';

    if (initialState) {
        button.classList.add('bg-indigo-500');
        span.classList.add('translate-x-5');
    } else {
        button.classList.add('bg-gray-200');
        span.classList.add('translate-x-0');
    }

    button.addEventListener('click', function() {
        const isEnabled = button.getAttribute('aria-checked') === 'true';

        if (isEnabled) {
            button.setAttribute('aria-checked', 'false');
            button.classList.remove('bg-indigo-500');
            button.classList.add('bg-gray-200');
            span.classList.remove('translate-x-5');
            span.classList.add('translate-x-0');
        } else {
            button.setAttribute('aria-checked', 'true');
            button.classList.remove('bg-gray-200');
            button.classList.add('bg-indigo-500');
            span.classList.remove('translate-x-0');
            span.classList.add('translate-x-5');
        }
    });
});
