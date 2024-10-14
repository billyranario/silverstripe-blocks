document.addEventListener('DOMContentLoaded', function() {
  console.log('accordion.js loaded');
  const accordionTitles = document.querySelectorAll('.accordion-title');

  accordionTitles.forEach(title => {
      title.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          const content = document.querySelector(targetId);
          const icon = this.querySelector('.accordion-icon');

          content.classList.toggle('hidden');

          if (content.classList.contains('hidden')) {
              icon.classList.remove('rotate-180');
          } else {
              icon.classList.add('rotate-180');
          }
      });
  });
});
