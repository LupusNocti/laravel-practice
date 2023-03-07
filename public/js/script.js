// Get the form and input element
const form = document.querySelector('form');
const input = document.querySelector('#task-name');

// Add a submit event listener to the form
form.addEventListener('submit', (event) => {
  // If the input value is empty
  if (input.value.trim() === '') {
    // Prevent the form from submitting
    event.preventDefault();
    // Show an alert message
    alert('Please enter a task name');
  }
});
