document.addEventListener("DOMContentLoaded", function () {
  console.log("tabs.js loaded");

  const tabContainers = document.querySelectorAll(".tab-container");

  tabContainers.forEach((container) => {
    const tabNavItems = container.querySelectorAll(".tab-nav-item a");
    const tabContents = container.querySelectorAll(".tab-content > .thehustle__layout__tabitem");

    const activateTab = (tab, index) => {
      tabNavItems.forEach((nav) => {
        nav.classList.remove("bg-primary-dark", "hover:text-dark-gray");
        nav.classList.add("hover:text-dark-gray");
      });

      tabContents.forEach((content) => {
        content.classList.add("hide");
        content.classList.remove("active");
      });

      tab.classList.add("bg-primary-dark");
      tab.classList.remove("hover:text-dark-gray");

      const targetId = tab.getAttribute("data-target");
      const targetContent = container.querySelector(targetId);
      if (targetContent) {
        targetContent.classList.remove("hide");
        targetContent.classList.add("active");
      }
    };

    tabNavItems.forEach((tab, index) => {
      tab.addEventListener("click", function (event) {
        event.preventDefault();
        activateTab(tab, index);
      });

      if (index === 0) {
        tab.classList.add("bg-primary-dark");
        tab.classList.remove("hover:text-dark-gray");
        tabContents[index]?.classList?.remove("hide");
      }
    });

    // Check if URL contains a hash
    const urlHash = window.location.hash;
    if (urlHash) {
      const targetTab = Array.from(tabNavItems).find((tab) => tab.getAttribute("data-target") === urlHash);
      if (targetTab) {
        const index = Array.from(tabNavItems).indexOf(targetTab);
        activateTab(targetTab, index);
      }
    }
  });
});
