// Get all modal elements
const modals = document.querySelectorAll('.modal');

// Get all trigger buttons
const triggers = document.querySelectorAll('.open-modal');

// Add event listeners to trigger buttons
triggers.forEach((trigger) => {
  trigger.addEventListener('click', (e) => {
    const modalId = e.target.getAttribute('data-modal-id');
    const modal = document.getElementById(modalId);
    modal.style.display = 'block';
    document.body.classList.add('modal-open'); // Add class to body to remove scrolling
  });
});

// Add event listeners to close buttons
modals.forEach((modal) => {
  const closeButton = modal.querySelector('.close-modal');
  closeButton.addEventListener('click', () => {
    modal.style.display = 'none';
    document.body.classList.remove('modal-open'); // Remove class from body to allow scrolling
  });
});