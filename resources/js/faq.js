const buttons = document.querySelectorAll('.button-title-faq');

buttons.forEach(button => {
    button.addEventListener('click', () => {
        const answer = button.closest('.pt-6').querySelector('.anwser-faq');
        const icon = button.querySelector('.icon-faq');

        answer.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
        icon.classList.toggle('rotate-0');
    });
});
