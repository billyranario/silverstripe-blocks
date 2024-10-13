document.addEventListener('DOMContentLoaded', function() {
  console.log("accordion.js loaded");
  const accordionItems = document.querySelectorAll('.accordion-title');

  accordionItems.forEach(title => {
      title.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          const content = document.querySelector(targetId);

          if (content.classList.contains('hidden')) {
              document.querySelectorAll('.accordion-body').forEach(body => body.classList.add('hidden'));
              content.classList.remove('hidden');
          } else {
              content.classList.add('hidden');
          }
      });
  });
});
