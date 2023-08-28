const tutorialSteps = document.querySelectorAll('.tutorial-modal');
const closeButtons = document.querySelectorAll('.close-tutorial-button');
const nextButtons = document.querySelectorAll('.next-step-button');

let currentStep = 0;

function showStep(stepIndex) {
    tutorialSteps.forEach((step, index) => {
        if (index === stepIndex) {
            step.classList.remove('hidden');
        } else {
            step.classList.add('hidden');
        }
    });
}

function nextStep() {
    currentStep++;
    if (currentStep < tutorialSteps.length) {
        showStep(currentStep);
    } else {
        closeTutorial();
    }
}

function closeTutorial() {
    tutorialSteps.forEach(step => {
        step.classList.add('hidden');
    });
}

nextButtons.forEach(button => {
    button.addEventListener('click', () => {
        console.log('Next button clicked'); // Add this line
        nextStep();
    });
});

closeButtons.forEach(button => {
    button.addEventListener('click', () => {
        closeTutorial();
    });
});

// Show the initial step when needed
// For example, when a user logs in for the first time
showStep(currentStep);
