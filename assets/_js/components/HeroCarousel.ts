import WindowSize from "../singletons/WindowSize";

class HeroCarousel {
  $container: JQuery<HTMLElement>;
  $sections: JQuery<HTMLElement>;
  $dots: JQuery<HTMLElement>;
  currentSlideIndex: number;
  windowSize: WindowSize;
  STATIC_BREAKPOINT: number;
  SLIDE_DURATION: number;
  timer: ReturnType<typeof setTimeout> | null;

  constructor() {
    this.$container = jQuery(".hero-carousel");

    if (!this.$container.length) return;
    this.$sections = this.$container.find(".hero-carousel__section");
    this.$dots = this.$container.find(".hero-carousel__dot");
    this.currentSlideIndex = 0;
    this.windowSize = WindowSize.getInstance();
    this.timer = null;

    this.STATIC_BREAKPOINT = 993;
    this.SLIDE_DURATION = 5000; // Duration for each slide in milliseconds

    this.init();
  }

  init() {
    if (this.windowSize.getSize().width >= this.STATIC_BREAKPOINT) {
      this.initTimer();
    }
    this.$dots.on("click", this.onDotClick.bind(this));
    this.windowSize.addListener(this.onResize.bind(this));
  }

  initTimer() {
    this.clearTimer(); // Clear any existing timer

    if (this.$sections.length <= 1) return; // No need for a timer if there's only one slide

    this.timer = setTimeout(() => {
      this.currentSlideIndex =
        (this.currentSlideIndex + 1) % this.$sections.length;
      this.goToSlide(this.currentSlideIndex);
      this.initTimer(); // Restart the timer after manual navigation
    }, this.SLIDE_DURATION); // Change slide every 5 seconds
  }

  clearTimer() {
    if (this.timer) {
      clearTimeout(this.timer);
      this.timer = null;
    }
  }

  onDotClick(e: JQuery.ClickEvent) {
    e.preventDefault();
    const $dot = jQuery(e.currentTarget);
    const index = $dot.data("index");
    if (index === this.currentSlideIndex) return;

    this.goToSlide(index);
    this.initTimer(); // Restart the timer after manual navigation
  }

  goToSlide(index: number) {
    if (index < 0 || index >= this.$sections.length) return;
    this.$sections.removeClass("is-active");
    this.$sections.eq(index).addClass("is-active");
    this.currentSlideIndex = index;

    // update dots
    this.$dots.removeClass("is-active");
    this.$dots.eq(index).addClass("is-active");
  }

  onResize() {
    this.clearTimer(); // Clear the timer on resize
    // reset to first slide
    this.goToSlide(0);

    if (this.windowSize.getSize().width >= this.STATIC_BREAKPOINT) {
      this.initTimer(); // Reinitialize the timer if the window is wide enough
    }
  }

  destroy() {}
}

export default HeroCarousel;
