// Website Toggle Script
const accordion = document.querySelector('.toggle_wrapper');
const items     = accordion.querySelectorAll('.toggle_item_wrap');
const questions = accordion.querySelectorAll('.toggle_text');

//Lets figure out what item to click
function toggleAccordion() {
  const thisItem = this.parentNode;
  
    items.forEach(item => {
      if (thisItem == item) {
        thisItem.classList.toggle('open');
        return;
    }
  
    item.classList.remove('open');
  });
}
questions.forEach(question => question.addEventListener('click', toggleAccordion));



var rellax = new Rellax('.rellax');

var target = jQuery('.video-large');
var targetHeight = target.outerHeight();


jQuery(window).bind('load scroll', function(){
    var scrollPercent = (targetHeight - window.scrollY) / targetHeight;
    target.css('opacity', scrollPercent);
    if (target.css('opacity') < 0.1 ){
	    target.css('opacity', '0.1');
    }

});
jQuery(window).bind('load scroll', function () {
	var pixs = jQuery(document).scrollTop();
    pixs = pixs / 100;
    target.css({"-webkit-filter": "blur("+pixs+"px)","filter": "blur("+pixs+"px)" });     
});
