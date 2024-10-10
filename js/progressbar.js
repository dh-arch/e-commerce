// script.js

const progressBar = document.getElementById('progress-bar');
const steps = document.querySelectorAll('.progress-step');

let currentStep = 1;

// Function to move to the next step
function nextStep() {
    if (currentStep < steps.length) {
        // Mark the current step as completed
        steps[currentStep - 1].classList.add('completed');
        
        // Update the progress bar width
        progressBar.style.width = ((currentStep / (steps.length - 1)) * 100) + '%';
        
        // Increment the current step
        currentStep++;
    }
}
