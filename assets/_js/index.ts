import HeroCarousel from "./components/HeroCarousel";

jQuery(function ($) {
  function initHomeMessages() {
    const $messagesContainer = $(".home-messages");
    if (!$messagesContainer.length) return;
    const $btns = $messagesContainer.find(".home-messages__btn");
    const $sections = $messagesContainer.find(".home-messages__section");

    let currentSection = 1;

    $btns.on("click", (e) => {
      e.preventDefault();
      const $btn = $(e.currentTarget);
      const sectionNumber = $btn.data("section");
      if (sectionNumber === currentSection) return;

      // clean up
      $btns.removeClass("active");
      $sections.removeClass("active");

      // activate new section
      $btn.addClass("active");
      $sections.eq(sectionNumber - 1).addClass("active");

      // update current section index
      currentSection = sectionNumber;
    });
  }

  // INIT
  initHomeMessages();
  new HeroCarousel();
});
