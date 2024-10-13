document.addEventListener("DOMContentLoaded", function () {
  console.log("tabs.js loaded");
  const tabContainers = document.querySelectorAll(".tab-container");

  tabContainers.forEach((container) => {
    const tabNavItems = container.querySelectorAll(".tab-nav-item a");
    const tabContents = container.querySelectorAll(".tab-item");

    tabNavItems.forEach((tab, index) => {
      tab.addEventListener("click", function (event) {
        event.preventDefault();

        tabNavItems.forEach((nav) => {
          nav.classList.remove("bg-primary-dark", "hover:text-dark-gray");
          nav.classList.add("hover:text-dark-gray");
        });

        tabContents.forEach((content) => content.classList.add("hidden"));

        tab.classList.add("bg-primary-dark");
        tab.classList.remove("hover:text-dark-gray");

        const targetId = tab.getAttribute("data-target");
        const targetContent = container.querySelector(targetId);
        if (targetContent) {
          targetContent.classList.remove("hidden");
        }
      });

      if (index === 0) {
        tab.classList.add("bg-primary-dark");
        tab.classList.remove("hover:text-dark-gray");
        tabContents[index].classList.remove("hidden");
      }
    });
  });
});
