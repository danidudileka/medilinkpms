// Select all FAQ question buttons
document.querySelectorAll('.faq-question').forEach((button) => {
  button.addEventListener('click', () => {
    const answer = button.nextElementSibling;
    const expanded = button.getAttribute('aria-expanded') === 'true';

    // Toggle the expanded state
    button.setAttribute('aria-expanded', !expanded);

    // Show or hide the answer
    answer.hidden = expanded;
  });
});
