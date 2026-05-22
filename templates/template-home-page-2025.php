<?php
/**
 * Template Name: Home Page 2025
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();

// get page top array
$home_images_array = [];
while (have_rows('home_page_top_section')) {
  the_row();
  $num = 0;
  while (have_rows('home_images')) {
    the_row();
    $num++;
    $home_image = get_sub_field('home_image');
    $home_title1 = get_sub_field('home_image_title1');
    $home_title2 = get_sub_field('home_image_title2');
    $home_title3 = get_sub_field('home_image_title3');
    $home_tagline = get_sub_field('home_image_tagline');
    $home_paragraph = get_sub_field('home_image_paragraph');
    $home_image_caption = get_sub_field('home_image_caption');
    $home_image_link = get_sub_field('home_image_link');

    $home_images_array[] = [
      'image' => $home_image,
      'title1' => $home_title1,
      'title2' => $home_title2,
      'title3' => $home_title3,
      'tagline' => $home_tagline,
      'paragraph' => $home_paragraph,
      'caption' => $home_image_caption,
      'link' => $home_image_link,
      'num' => $num,
    ];
  }
}
?>

<div class="hero-carousel z-1 mt-15 min-993:mt-0 md:portrait:aspect-16/9 relative grid gap-y-3 text-white md:text-black md:landscape:aspect-auto md:landscape:h-screen">
  <?php foreach ($home_images_array as $index => $item) {
    $title_tag = $index === 0 ? 'h1' : 'h2'; ?>
    <section class="hero-carousel__section grid h-full md:before:bg-gradient-to-r md:before:from-white/90 md:before:to-white/0 md:before:col-start-1 md:before:row-start-1 md:before:z-2 md:col-start-1 md:row-start-1 [&.is-active]:opacity-100 relative [&.is-active]:visible md:opacity-0 md:invisible transition-opacity duration-800 ease-in-out <?php echo $index ===
    0
      ? 'is-active'
      : ''; ?>">
      <img src="<?php echo $item[
        'image'
      ]; ?>" class="aspect-16/9 inset-0 col-start-1 row-start-1 h-full w-full object-cover md:absolute" loading="lazy" alt="<?php echo $item[
  'caption'
]; ?>">
      <<?php echo $title_tag; ?> class="z-3 relative col-start-1 row-start-1 flex flex-col self-center pl-[15%] pr-[10%] md:portrait:min-h-[160px] md:landscape:min-h-[195px]">
        <span class="text-shadow-[1px_1px_1px_#000] md:text-shadow-none text-[clamp(16px,4vw,42px)] font-medium leading-none"><?php echo $item[
          'title1'
        ]; ?></span>
        <span class="text-shadow-[1px_1px_1px_#000] md:text-shadow-none text-[clamp(30px,7.5vw,76px)] font-black uppercase leading-none"><?php echo $item[
          'title2'
        ]; ?></span>
      </<?php echo $title_tag; ?>>
      <p class="z-4 text-shadow-[1px_1px_1px_#000] md:text-shadow-none min-993:px-5.5 relative col-start-1 row-start-1 hidden self-end p-2.5 text-[16px] italic leading-none md:block md:p-4"><?php echo $item[
        'caption'
      ]; ?></p>
      <?php if ($item['link']): ?>
        <a href="<?php echo $item[
          'link'
        ]; ?>" class="z-5 relative col-start-1 row-start-1">
          <span class="sr-only">Read more about <?php echo $item['title1'] .
            ' ' .
            $item['title2']; ?></span>
        </a>
      <?php endif; ?>
    </section>
  <?php
  } ?>

  <?php if (count($home_images_array) > 1) { ?>
    <ul class="relative z-10 col-start-1 row-start-1 mb-6 ml-0 hidden justify-center gap-x-6 self-end md:flex lg:landscape:mb-[5vh]">
      <?php foreach ($home_images_array as $index => $item) { ?>
        <li class="flex">
          <button class="hero-carousel__dot [&.is-active]:scale-175 h-2 w-2 xl:h-3 xl:w-3 rounded-full bg-white/90 shadow-[1px_1px_1px_#000] outline-0 transition-transform duration-200 <?php echo $index ===
          0
            ? 'is-active'
            : ''; ?>" data-index="<?php echo $index; ?>">
            <span class="sr-only">Go to slide <?php echo $index + 1; ?></span>
          </button>
        </li>
      <?php } ?>
    </ul>
  <?php } ?>

  <a href="#intro" class="arrow_wrap relative z-20 col-start-1 row-start-1 mb-24 hidden h-10 w-10 self-end justify-self-center md:flex lg:landscape:mb-[15vh]">
    <div class="relative h-full w-full rotate-90">
      <span class="arrow_right primera white"></span>
      <span class="arrow_right segunda white"></span>
    </div>
  </a>
</div>

  <?php
///////////////////////////////////////////////     LOGO      //////////////////////////////////////////////////////////////////
?>
  <div class="square-logo2025 z-2 top-15 min-993:top-0 absolute left-0 w-[84%] text-right">
    <div class="logo_box">
      <a href="/home-2025/" title="Ankrom Moisan">
        <?php include plugin_dir_path(__FILE__) . '../elements/am_logo.svg'; ?>
      </a>
    </div>
  </div>
  <?php
///////////////////////////////////////////     END LOGO      //////////////////////////////////////////////////////////////////
?>

</div>

<div class="wrapper" id="page">
  <div id="intro" class="relative -top-16"></div>
  <?php
//////////////////////////// MESSAGES //////////////////////////////////////////
?>

  <?php while (have_rows('messaging_section')) {
    the_row(); ?>
    <div class="home-messages container my-10 md:my-16 md:grid md:grid-cols-[1fr_2fr] md:gap-x-5 md:gap-y-0">
      <ul class="hidden md:flex md:flex-col">
        <?php while (have_rows('messages')) {

          the_row();
          $index = get_row_index();
          $tagline = get_sub_field('tagline');
          $title = get_sub_field('title');
          $message = get_sub_field('message');
          ?>
          <li>
            <button data-section="<?php echo $index; ?>" class="home-messages__btn focus:outline-0! tagline text-left <?php echo $index ==
1
  ? 'active'
  : ''; ?>"><?php echo $tagline; ?>&nbsp;&gt;&gt;</button>
          </li>
        <?php
        } ?>
      </ul>

      <div class="grid gap-y-16 md:gap-y-0">
        <?php while (have_rows('messages')) {

          the_row();
          $index = get_row_index();
          $tagline = get_sub_field('tagline');
          $title = get_sub_field('title');
          $message = get_sub_field('message');
          ?>
            <section class="home-messages__section md:col-start-1 md:opacity-0 md:invisible transition-opacity [&.active]:opacity-100 [&.active]:visible md:row-start-1 <?php echo $index ==
            1
              ? 'active'
              : ''; ?>">
              <span class="mb-2 inline-block md:sr-only"><?php echo $tagline; ?></span>
              <h3 class="h4 text-balance mb-3"><?php echo $title; ?></h3>
              <p class="message"><?php echo $message; ?></p>
            </section>
        <?php
        } ?>
      </div>
    </div>
  <?php
  } ?>
  <?php
//////////////////////////// END MESSAGES //////////////////////////////////////////
?>


  <?php
  ////////////////////////////// GRID //////////////////////////////////
  // get grid array
  $home_grid_array = [];
  while (have_rows('home_page_grid')) {
    the_row();
    //$home_images = get_sub_field("home_grid_images");
    while (have_rows('home_grid_images')) {
      the_row();
      $home_grid_image = get_sub_field('home_grid_image');
      $home_grid_caption = get_sub_field('home_grid_caption');
      $home_grid_link = get_sub_field('home_grid_link');
      $home_grid_array[] = [
        'image' => $home_grid_image,
        'caption' => $home_grid_caption,
        'link' => $home_grid_link,
      ];
    }
  }
  ?>

  <section class="grid_project_wrap toggle_wrapper marketsector_grid container">
    <div class="studios-title">
      <h6>STUDIOS</h6>
    </div>

    <div class="gap-x-7.5 grid md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($home_grid_array as $grid) { ?>
        <div class="hover_arrow_story">
          <div class="story_image">
            <a class="market_sector_link" href="<?php echo $grid['link']; ?>">
              <img class="aspect-square object-cover" src="<?php echo $grid[
                'image'
              ]; ?>" alt="" loading="lazy" />
              <div class="shimmer tumb_loading"></div>
            </a>
            <div class="row d-lg-flex">
              <div class="col-10">
                <div class="d-lg-block">
                  <h2 class="shimmer"><a href="<?php echo $grid[
                    'link'
                  ]; ?>"><bold><?php echo strtoupper(
  $grid['caption']
); ?></bold></a></h2>
                </div>
              </div>
              <div class="col-2 arrow_wrap">
                <a href="<?php echo $grid[
                  'link'
                ]; ?>" class="market_sector_arrow_link">
                    <div id="cta_arrow">
                      <span class="arrow_right primera black"></span>
                      <span class="arrow_right segunda black"></span>
                    </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <?php
///////////////////////////// END GRID //////////////////////////////////
?>


<!-- Featured Section -->
<?php while (have_posts()) {
  the_post(); ?>
<div class="container">
	<div id="featuredsection" class="four-columns-more story_starter_wrap row toggle_wrapper" >

	<?php if (have_rows('featured_section')) {
   while (have_rows('featured_section')) {
     the_row(); ?>

		<?php
  $featured_section_title = get_sub_field('featured_section_title');
  $featured_section_title_sanitized = str_replace(
    '"',
    "'",
    $featured_section_title
  );
  $featured_section_subtitle = get_sub_field('featured_section_subtitle');
  $featured_section_image = get_sub_field('featured_section_image');
  $featured_section_image_photographer = get_sub_field(
    'featured_section_image_photographer'
  );
  $featured_section_link_1 = get_sub_field('featured_section_link_1');
  $featured_section_link_1_target = get_sub_field(
    'featured_section_link_1_target'
  );
  $featured_section_link_1_text = get_sub_field('featured_section_link_1_text');
  $featured_section_link_1_text = str_replace(
    ' ',
    '&nbsp;',
    $featured_section_link_1_text
  );
  $featured_section_link_2 = get_sub_field('featured_section_link_2');
  $featured_section_link_2_target = get_sub_field(
    'featured_section_link_2_target'
  );
  $featured_section_link_2_text = get_sub_field('featured_section_link_2_text');
  $featured_section_link_2_text = str_replace(
    ' ',
    '&nbsp;',
    $featured_section_link_2_text
  );
  $featured_image_pos = get_sub_field('featured_image_pos');
  $featured_image_pos_tablet = get_sub_field('featured_image_pos_tablet');
  $featured_image_pos_mobile = get_sub_field('featured_image_pos_mobile');
  ?>
		<div class="starter-center-cropped lazy fullwidth" id="featuredimage" title="<?php echo $featured_section_title_sanitized; ?>"  style="background-image: url(<?php echo $featured_section_image; ?>)">
		 <div class="d-xl-block col-xl-12 home_page_story">
			<!-- <div class="story_image">
						<?php if ($featured_section_image_photographer) { ?>
						<div class="photo_credit">
							<p>Ⓒ <?php echo $featured_photographerCredit; ?></p>
						</div>
						<?php } ?>
			</div> -->
		 </div>
		</div>

			<div class="project_content_wrap featuredtext container">
				<div class="row d-none- d-lg-flex featuretextsection">
					<div class="col-md-10">
						<div class="d-none- d-lg-block">
							<h1 class="shimmer bold featured uppercase"><?php echo $featured_section_title; ?></h1>
									<h2 class="shimmer featured"><?php echo $featured_section_subtitle; ?></h2>

						</div>
					</div>

					<div>
						<br clear="all">
					</div>


					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_1; ?>" target="<?php echo $featured_section_link_1_target; ?>"><?php echo $featured_section_link_1_text; ?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_1; ?>" target="<?php echo $featured_section_link_1_target; ?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>


					<div class="featured-link hover_arrow_story">
						<div class="featured-link-section">
							<h3 class="shimmer bold uppercase"><a href="<?php echo $featured_section_link_2; ?>" target="<?php echo $featured_section_link_2_target; ?>"><?php echo $featured_section_link_2_text; ?></a></h3>
						</div>
						<div class="arrow_wrap featuredarrow">
						<a href="<?php echo $featured_section_link_2; ?>" target="<?php echo $featured_section_link_2_target; ?>">
        					<div id="cta_arrow" class="featured-cta-arrow">
        						<span class="arrow_right primera white"></span>
        						<span class="arrow_right segunda white"></span>
        					</div>
						</a>
						</div>
					</div>


			</div>
			</div>
	 </div>

	<?php
   } ?>
	<?php
 } ?>

	</div>

</div>


<?php
} ?>
<!-- End Featured Section -->




</div><!-- #site-content -->



<?php
//////////////////////////////// SCRIPT ///////////////////////////////////////////////
?>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rellax/1.12.1/rellax.min.js"></script> -->
<script>
  //  const seoDescriptionData=(method, url, data)=> {

  //      return fetch(url, {
  //              headers: {
  //                  'Content-Type': 'text/plain'
  //              },
  //          }
  //      ) .then(response=> {
  //              return response.json();
  //          }
  //      );
  //  };


  //  const paralaxDiv = document.querySelector('#poem .home-excitement');

  //  function removeParalax(){
  //  	if(window.innerWidth <= 992){
  //  		paralaxDiv.classList.remove('rellax');
  //  		paralaxDiv.removeAttribute('style');
  //  	}else{
  //  		paralaxDiv.classList.add('rellax');
  //  	}
  //  }

   //window.addEventListener('load', removeParalax);
   //window.addEventListener('resize', removeParalax);


	 	// function gotoslide0(slidenum){
		// 	console.log('gotoslide:' + slidenum);
		// 	return false;
		// }




// jQuery(function() {



	// var ee = getURLParameter('ee');
	// if ((ee!=1) && (ee!=3) & (ee!=4) & (ee!=5) & (ee!=6) & (ee!=7)) {
		// ee=3;
	// }
	// const ee = getURLParameter('ee');
	//var ee = 2; // default to option 2
	//if (ee) {ee = 2;} // default to option 2
	// var eee = getURLParameter('eee');
	// var eeee = getURLParameter('eeee');
	// var eeenum = 50;
	// var eeeenum = 3;
	// var incrementcount = 1;
	// var incrementlimit = 50;
	// var animation_str = "4s";
	// var transition_str = "4s";

	//console.log("a incrementcount: "+incrementcount + " incrementlimit: " + incrementlimit);

	// var images_array = <?php echo json_encode($home_images_array); ?>;

	// var array_length = images_array.length;
	// var screenwidth = jQuery(window).width();

	// var random_key = Math.floor(Math.random() *  array_length);
	//if (ee == '3') {
	//	var use_key = 0; // start at 0 with ee 3
	//} else {
	//var use_key = random_key;
	// var use_key = 0;
	//}
	// var use_image = images_array[use_key]['image'];
	// var title1 = images_array[use_key]['title1'];
	// var title2 = images_array[use_key]['title2'];
	// var navdots = '';
	// var activestr = '';
	// var countdots = -1;
	// navdots+='<a class="playbutton" id="playbutton" title="⏸️" href="#" onclick="return false;">&#9208;︎</a>'; // &#9656;︎ = play ▸︎ &#9208;︎ = pause ⏸️
	// images_array.forEach(function(elelemnt){
		//  countdots++;
		//  if (countdots == use_key) {activestr = ' active ';}
		//  navdots+='<a class="dot ' + activestr" id="dot' + countdots+ '" href="#" onclick="gotoslide(' + countdots + ');return false;">●</a>';
		//  activestr = '';
	// });
	// navdots+='<a class="playbutton" id="playbutton2" href="#" onclick="return false;">&#9208;︎</a>';

	// var use_caption = images_array[use_key]['caption'];
	// var use_link = images_array[use_key]['link'];

	// var captionarrows = '<div class="arrow_wrap hometoparrow"><a href="" class="market_sector_arrow_link"><div id="cta_arrow"><span class="arrow_right primera white hometoparrow1"></span><span class="arrow_right segunda white hometoparrow2"></span></div></a></div>';

	// if (use_link != '') {
			// use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
			//use_caption = '<div class="homecaptiontext">' + use_caption + "</div>" + captionarrows;
	// } else {
			// use_caption = '<div class="homecaptiontext">' + use_caption + "</div>";
	// }


	// jQuery(".title1").html(title1);
	// jQuery(".title2").html(title2);

	// jQuery(".navdots").html(navdots);
	// jQuery(".homecaption").html(use_caption);

// figure out when the mouse is over the link and proceed accordingly
	// function checklink()  {
		// if (use_link != '') {
			//console.log("use_link:" + use_link);
		// jQuery("div#page").on( "mousemove", function(event) {
			// var mouseX = event.pageX;
			// var mouseY = event.pageY;
			// var divOffset = jQuery(".homecaption").position();
			// var divTop = divOffset.top;
			// var divLeft = divOffset.left;
			// var divBottom = divTop + 30;
			// var divRight = divLeft + 400;
			//console.log(mouseX + ' ' + mouseY);
			//console.log(divLeft + ' ' + divRight);
			//console.log(divTop + ' ' + divBottom);
			// if (use_link != '') {
			//  if ((mouseX >= divLeft) && (mouseX <= divRight) && (mouseY >= divTop) && (mouseY <= divBottom)) {
			// 	jQuery("div#page").css("cursor","pointer");
			// 	jQuery(".hometoparrow1").addClass("arrow_wrap-hover-primera");
			// 	jQuery(".hometoparrow2").addClass("arrow_wrap-hover");
			// 	jQuery(".homecaptiontext").addClass("underline_link");
			// 	jQuery(".homecaptiontext").addClass("underline_link_hover");

			// 	jQuery("div#page").on( "click", function() {
			// 			window.location.replace(use_link);
			// 	});
			  // }	else {
				// jQuery("div#page").css("cursor","default");
				//jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
				//jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");
				// jQuery(".homecaptiontext").removeClass("underline_link");
				// jQuery(".homecaptiontext").removeClass("underline_link_hover");
				//jQuery("div#page").on( "click", function() { return false;	});
				// }
			// }
		// });
		// } else {
			//console.log("use_link is empty" );
			// jQuery("div#page").css("cursor","default");
			//jQuery(".hometoparrow1").removeClass("arrow_wrap-hover-primera");
			//jQuery(".hometoparrow2").removeClass("arrow_wrap-hover");
			// jQuery(".homecaptiontext").removeClass("underline_link");
			// jQuery(".homecaptiontext").removeClass("underline_link_hover");
			// jQuery("div#page").on( "mousemove", function(event) { return false});
			//jQuery("div#page").on( "click", function() { return false;	});
		// }
	// }

	// jQuery("#video-no-blur").css("background-image","url('" + use_image + "')");

	// if (ee != '3') {
	//  checklink();
	// }


// function getURLParameter(name) {
//   const urlParams = new URLSearchParams(window.location.search);
//   const paramValue = urlParams.get(name);
//   return paramValue ? decodeURIComponent(paramValue).replace(/[^a-zA-Z0-9]/g, '') : null;
// }

// preload images
// function preloadImage(url) {
  // const img = new Image();
  // img.src = url;
// }


// Example usage:
//preloadImage("path/to/your/image.jpg");

// if (ee == '3') {
	// timed fade-in slider

// preload slides
// jQuery.each(images_array, function(index, val) {
	// preloadImage(val["image"]);
  // console.log(val["image"] + " preloaded");
// });


//jQuery("#playbutton").addClass("show");


// if ((eee != '5000') && (eee != '3000') && (eee != '2000') && (eee != '4000') & (eee != '7000') & (eee != '8000')) {
  //  eee = 6000;
// }
// if ((eeee != '500') && (eeee != '3000') && (eeee != '4000') && (eeee != '6000') & (eeee != '7000') & (eeee != '8000')) {
  //  eeee = 1000;
// }

		// var timernum = eee; // milliseconds between slides
		// var slideTimerInstance;
		// let isRunning = true;


		// function nextslide() {
      // if (isRunning) {

					// jQuery("#slide"+ use_key).fadeOut(0);
					// jQuery("#heroimg"+ use_key).fadeOut(eeee);

					// use_key++;
					// if (use_key >= array_length) { use_key = 0;  }

					// jQuery("#slide"+ use_key).fadeIn(0);
					// jQuery("#heroimg"+ use_key).hide();
					// jQuery("#heroimg"+ use_key).fadeIn(eeee);

					// jQuery(".dot").removeClass("active");
					// jQuery("#dot" + use_key).addClass("active");
					//jQuery(".homecaption").html(use_caption);
					//checklink();
		  // }
		// }


  //  window.gotoslide = function(slidenum) {

	// 		console.log('gotoslide:' + slidenum);

	// 				jQuery("#slide"+ use_key).fadeOut(0);
	// 				jQuery("#heroimg"+ use_key).fadeOut(eeee);

	// 				use_key = slidenum;

	// 				jQuery("#slide"+ use_key).fadeIn(0);
	// 				jQuery("#heroimg"+ use_key).hide();
	// 				jQuery("#heroimg"+ use_key).fadeIn(eeee);

	// 				jQuery(".dot").removeClass("active");
	// 				jQuery("#dot" + use_key).addClass("active");
	// 				//jQuery(".homecaption").html(use_caption);
	// 				//checklink();
	// 				return false;
  // };



		// jQuery(".playbutton").on( "click", function() {
		// 					var buttonchar = jQuery("#playbutton").html();
		// 					console.log('buttonchar:' + buttonchar);
		// 					if ((buttonchar == '&#9656;︎') || (buttonchar == '▸')) { // ▸
		// 						//console.log('buttoncharA:' + buttonchar);
		// 						window.slideTimer();
		// 						jQuery("#playbutton").html('&#9208;︎');// ⏸
		// 						jQuery("#playbutton").attr('title', '⏸');
		// 						jQuery("#playbutton2").html('&#9208;'); // ⏸
		// 						buttonchar = jQuery("#playbutton").html();
		// 						console.log('buttoncharB:' + buttonchar);
		// 					} else {
		// 						//console.log('buttoncharC:' + buttonchar);
		// 						window.pauseSlideTimer();
		// 						jQuery("#playbutton").html('&#9656;');// ▸
		// 						jQuery("#playbutton").attr('title', '▸');
		// 						jQuery("#playbutton2").html('&#9656;');// ▸
		// 						buttonchar = jQuery("#playbutton").html();
		// 						console.log('buttoncharD:dli' + buttonchar);
		// 					}
		// 					return false;
		// });

  //  function stopbutton() {
	// 							var buttonchar = jQuery("#playbutton").html();
	// 	 						//console.log('buttoncharC:' + buttonchar);
	// 							window.pauseSlideTimer();
	// 							jQuery("#playbutton").html('&#9656;');// ▸
	// 							jQuery("#playbutton").attr('title', '▸');
	// 							jQuery("#playbutton2").html('&#9656;');// ▸
	// 							buttonchar = jQuery("#playbutton").html();
	// 							//console.log('buttoncharD:' + buttonchar);
	//  }



		// window.slideTimer = function() {
		// 	  clearInterval(slideTimerInstance);
		// 		slideTimerInstance = setInterval(nextslide, timernum );
		// 		isRunning = true;

		// };

		// window.pauseSlideTimer = function() {
		// 		clearInterval(slideTimerInstance);
		// 		isRunning = false;
		// };


		//window.slideTimer(); // start slideshow

		// jQuery( window ).resize(function() {
		// 	checkwindowsize();
		// });

		// jQuery(window).scroll(function() {
		// 	if (jQuery(window).scrollTop() == 0) {
		// 		checkwindowsize();
		// 	}
		// });

		// function checkwindowsize(){
		// 	//var screensize= jQuery( window ).width();
		// 	var screenheight= jQuery( window ).height();
		// 	var screenwidth= jQuery( window ).width();

		// 	  if(screenwidth>600){
		// 			//window.pauseSlideTimer();
		// 			//stopbutton();
		// 			window.slideTimer(); // start slideshow
		// 		} else {
		// 			window.pauseSlideTimer();
		// 			stopbutton();
		// 		}

		// 	// set the caption and dots height to match image
		// 	let heroimg0height = jQuery("#heroimg0").height();
		// 	let heroimg1height = jQuery("#heroimg1").height();
		// 	let heroimg2height = jQuery("#heroimg2").height();
		// 	let heroimg3height = jQuery("#heroimg3").height();
		// 	let heroimageheight = heroimg0height;
		// 	if (heroimageheight == 0) {
		// 		 heroimageheight =heroimg1height;
		// 	}
		// 	if (heroimageheight == 0) {
		// 		 heroimageheight = heroimg2height;
		// 	}
		// 	if (heroimageheight == 0) {
		// 		 heroimageheight = heroimg3height;
		// 	}
		// 	if (heroimageheight == 0) {
		// 		 heroimageheight = screenheight / 2;
		// 	}
		// 	console.log('heroimageheight:'+ heroimageheight);
		// 	let slidecaptiontop = heroimageheight - 30;
		// 	if (screenwidth<=992){
		// 		heroimageheight+=60; // compensate for top header
		// 		slidecaptiontop-=10;
		// 	}

		// 	if (heroimageheight < screenheight) {
		// 			jQuery("#down-arrows-holder").height(heroimageheight);
		// 			if(screenwidth>600){
		// 					jQuery(".overlay.entry-content").height(heroimageheight);
		// 			} else if(screenheight<400) {
		// 					jQuery(".overlay.entry-content").height(400);
		// 			}
		// 			jQuery(".slidecaption").css("top",slidecaptiontop);
		// 	}

		// 		// make the project images square
		// 		let projectsquaresize = jQuery(".project-center-cropped").width();
		// 		jQuery(".project-center-cropped").height(projectsquaresize);

		// }


		// checkwindowsize();




		//jQuery(".project-center-cropped").addClass("effect1");

// });
</script>

<?php
//////////////////////////////// STYLE ///////////////////////////////////////////////
?>


<style>
		body:not(.home) .nav_button .nav_btn_text {
				display: block;
		}

		/* .overlay.entry-content {
			height: 100vh;
		} */


	/* #playbutton { */
		 /* color: transparent !important; */
	/* } */

	/* #down-arrows-holder {
    display: flex;
    flex-wrap: wrap;
    height: 100vh;
    justify-content: center;
    position: absolute;
    top: 0;
    align-items: flex-end;

		width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
	} */

		/* #down-arrows-holder a {
				width: 40px;
				height: 40px;
				margin: 0 auto;
				display: block;
				overflow: hidden;
		} */

		svg#clipboard {
			max-width: 150px;
		}

	/* .square-logo2025 {
    position: absolute;
		top: 0;
    float: none;
    transition: none;
    width: 84%;
		max-width: none;
		text-align: right;
	} */
	.square-logo2025 .logo_box {
    background: #363430;
    width: 150px;
    padding: 30px 35px 40px;
    height: 150px;
		display: inline-block;
	}
	.square-logo2025 svg path {
    fill: #fff;
	}

	.row.relative-inside {
		padding-bottom:100px;
	}

	.message{
		margin-top:4px;
		-webkit-font-smoothing: antialiased;
	}
	.message p{
		font-size:18px;
		line-height:30px;
		-webkit-font-smoothing: antialiased;
	}
	.tagline{
			font-size:18px;
			margin-bottom:14px;
			cursor:pointer;
			-webkit-font-smoothing: antialiased;
	}
	.tagline.active{
	   font-weight:700;
	}


.studios-title{
	margin-bottom: 35px;
}
.arrow_wrap a {
    margin-top: -5px;
}

/*
#down-arrows-holder .down-arrows-wrapper {
    margin-bottom: 1vh;
}
*/

.breadcrumbs {
    visibility: hidden;
}

	/* div#video-no-blur{ */
			/* background-size:100% auto; */
		  /*transition:2s;*/
			/*animation: fadein 2s;*/
			/* background-size:100% ;  */
			/* background-position:center; */
			/* background-color:#FFF; */
			/*transition:opacity 1s;*/
		/* } */
		/* #video-no-blur.fadein { */
				/* animation: fadein 2s; */
		/* } */
		/* #video-no-blur.fadeout { */
				/* animation: fadeout 2s; */
		/* } */

	/* @keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
	}

	@keyframes fadeout {
    from { opacity: 1; }
    to   { opacity: 0; }
	} */

/* .slidediv{ */
		/*visibility:hidden;*/
		/* display:none;
		position:absolute;
		z-index:0;
		width:100%;
    height: 100vh;
    overflow: hidden; */
/* } */

/* .slidediv.active{ */
		/* visibility:visible;*/
		/* display:block; */
/* } */

/* .heroimg{ */
	 /* width:100%; */
/* } */

.container.square-logo {
	position:relative;
	float: none;
	transition:none;
}


/* .overlay {
    position: relative;
} */


/* .slideoverlay {
  position: absolute;
	z-index:10;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
	background: url(<?php echo get_stylesheet_directory_uri() .
   '/img/hero_gradient.png'; ?>);
	background: linear-gradient(to right,rgba(255,255,255,0.9), rgba(255,255,255,0));
} */


/* .slidetitles{ */
    /* display: flex; */
    /* align-items: center; */
    /* justify-content: left; */
    /* position: absolute; */
    /* z-index: 99998; */
		/* max-width:80%; */
		/* left: 14%; */
    /*left: 200px;*/
    /* top: -38px; */
		/* width:100%; */
    /* height: 100%; */
/* } */

/* .titles{
    display: flex;
    align-items: center;
    justify-content: left;
    position: fixed;
    z-index: 99998;
    left: 220px;
    top: auto;
		width:100%;
    height: 100%;
} */

/* .titlescontent{
		display:block;
} */

/* .title1 , .slidetitle1{ */
/*
    position: absolute;
    top: 320px;
    left: 260px;
		*/
		/* position:relative;
    font-size: 42px;
		line-height:42px;
		font-weight:500;
    color: #000;
    padding: 0px;
		z-index:1000;
		display:block;
		-webkit-font-smoothing: antialiased; */
		/*transition:2s;*/
		/*transition:2s ease-in-out;*/
/* } */
/* .title2, .slidetitle2 { */
/*
    position: absolute;
    top: 380px;
    left: 260px;
		*/
				/* position:relative; */
    /* font-size: 76px; */
		/* line-height:76px; */
		/* font-weight:900; */
    /* color: #000; */
    /* padding: 0px; */
		/* text-transform:uppercase; */
		/* z-index:1000; */
		/* display:block; */
		/* -webkit-font-smoothing: antialiased; */
		/*transition:2s;*/
		/*transition:1s ease-in-out;*/
/* } */


.nav_button .nav_btn_text span {
    text-shadow: none;
    color: #000;
}


/* //////////////////// NAV DOTS //////////////////// */
/* .navdots{
    font-size: 20px;
		font-weight:900;
    padding: 10px;
		z-index:1000;
		display:flex;
		align-items: center;
		color:#FFF;
		vertical-align:middle;
		margin-bottom:3vh;
	  line-height:50px;
} */

/* #playbutton { */
   /* color: transparent !important;*/
/* } */
/* #playbutton.show { */
    /* color: #fff !important; */
		/* text-shadow: 1px 1px 1px #00000077; */
/* } */
/* #playbutton2 { */
    /* color: transparent !important; */
/* } */

/* .dot { */
  /* font-size: 20px; */
	/* color:#FFF; */
	/* vertical-align:middle; */
	/* align-items: center; */
	/* text-align:center; */
	/* margin-right:30px; */
	/* cursor:pointer; */
	/* text-shadow: 1px 1px 1px #00000077; */
	/* transition:1s ease-in-out; */
/* } */
/* .dot.active{
	font-size: 40px;
	margin:-5px 10px 10px 0px;
} */
/* //////////////////// END NAV DOTS //////////////////// */
/*
.homecaption {
    position: absolute;
    bottom: 20px;
    left: 80px;
    font-size: 16px;
    color: #000;
		font-style: italic;
    padding: 10px;
		z-index:1000;
		display:inline-block;
		cursor:pointer;
} */
/* .slidecaption { */
    /* position: absolute; */
    /* top: 90vh; */
    /* left: 20px; */
    /* font-size: 16px;
		line-height:16px; */
    /* color: #000; */
		/* font-style: italic; */
    /* padding: 10px; */
		/* z-index:1000; */
		/* display:inline-block; */
		/* cursor:pointer; */
		/* width:100%; */
/* } */

.homecaptiontext{
    display:inline-block;
}
.hometoparrow{
	display:inline-block;
	height:20px;
	margin-left:14px;
}


.arrow_wrap-hover{
    animation-name: bounceAlpha;
    animation-duration:1.4s;
    animation-iteration-count:infinite;
    animation-timing-function:linear;
}
.arrow_wrap-hover-primera{
    animation-name: bounceAlpha;
    animation-duration:1.4s;
    animation-delay:0.2s;
    animation-iteration-count:infinite;
    animation-timing-function:linear;
}

.underline_link_hover:after {
	animation: portSliderLine 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
}
.project-center-cropped.effect1 {
	transition:1s ease-in-out;
}
/* potential hover effect */
.project-center-cropped.effect1:hover {
    transform: scale(1.1);
}



		.fullwidth{
			width:100% !important;
		}

		.featured-link {
			display: inline-block;
			width: 45%;
			padding-right: 15px;
			padding-left: 15px;
		}

		.featured-link-section {
				display: inline-block;
				vertical-align: middle;
		}



		.featuredarrow {
			max-width: none;
			display: inline-block;
			margin-left: 20px;
			height: 20px;
		}

		#cta_arrow.featured-cta-arrow{
			width:200px;
		}

		h1.shimmer.bold.uppercase {
			height: 40px;
			display: inline-block;
		}
		h2.shimmer.featured {
			height: 40px;
		}
		h3.shimmer.bold.uppercase a {
			line-height: 20px;
			margin-top: 10px;
			display: inline-block;
		}

		#featuredsection {
			margin-top:80px;
			margin-bottom:120px;
			position: relative;
		}



		.featuretextsection{
			max-width:1140px;
			margin:auto;
			text-align:left;
		}



		.col-md-4.featured {
			flex: none;
			display: inherit;
			margin-right: 100px;
		}

		.container.project_content_wrap.featuredtext {
			margin-top: -170px;
			z-index: 10;
			background: #00000080;
			max-width: none;
			color: #fff;
			/* padding: 0px 15%; */
		}
		.featuredarrow{
			max-width: none;
		}





		/* project squares */
		.grid_project_wrap .project-center-cropped {
				min-height: 50px;
		}



		/* ////////////////////////////// RESPONSIVE STYLES //////////////////////////////////////// */


		<?php
  if ($featured_image_pos != '') {
    echo '#featuredimage {' . $featured_image_pos . '}';
  }

  if ($featured_image_pos_tablet != '') {
    echo PHP_EOL;
    echo '@media(max-width:992px) {#featuredimage {' .
      $featured_image_pos_tablet .
      '}}';
  }

  if ($featured_image_pos_mobile != '') {
    echo PHP_EOL;
    echo '@media(max-width:700px) {#featuredimage {' .
      $featured_image_pos_mobile .
      '}}';
  }
  ?>

		@media(max-width:992px) {
			.featured-link {
				width:90%;
				margin-top: 20px;
			}
			.container.project_content_wrap.featuredtext {
					margin-top: -280px;
			}
			h2.shimmer.featured {
				line-height: 20px !important;
			}
		}

		@media screen and (max-width: 992px) {
			.featuredarrow.arrow_wrap a,.featuredarrow.arrow_wrap section {
				margin-top: 0px;
				margin-bottom: 0px !important;
			}
		}


@media screen and (max-width: 992px) {
    .arrow_wrap a {
        margin-top: -10px;
    }

		.container.square-logo2025 {
				top:60px;

		}
		body:not(.home) .nav_button .nav_btn_text {
			display: none;
		}
		/*
		.slidediv {
				height: 70vh;
		}
		*/
		/*
		.slidecaption {
			top: 46vh;
			bottom:unset;
		}
		*/
		.square-logo2025 .logo_box {
			width: 100px;
			padding: 20px 25px 30px;
			height: 100px;
		}
		/* .slidetitles { */
    /*  align-items: end;*/
		    /* align-items: start; */
				/* top: 20vw; */
		/* } */
		/* .title1 , .slidetitle1{ */
			/* font-size: 24px; */
			/* line-height:24px; */
			/*color:#FFF;*/
		/* } */
		/* .title2, .slidetitle2 { */
			/* font-size: 44px; */
			/* line-height:44px; */
			/*color:#FFF;*/
		/* } */
	 /* .overlay {
		 top: 60px;
     position: relative;
		 height: 60vh;
		 height:auto;
	 } */

		/* this is needed for the down arrow and dots */
    .d-lg-none {
        display: none !important;
    }
		/*
	#down-arrows-holder .down-arrows-wrapper {
			margin-bottom: 10vh;

	}
	*/
	/*
	#down-arrows-holder {
        height: 0px;
    }
		*/
	/* #down-arrows-holder .text_block {
    width: 100%;
    height: 0px;
    align-items: center;
    display: none;
	} */
	 /* #down-arrows-holder .arrow_right.white {
        filter:none;
    } */



}




@media screen and (max-width: 600px) {
		/* .slidediv{
			display:block;
			position:relative;
			height:auto;
			margin-bottom:12px;
		} */
		/* .slideoverlay {
			display:none;
		} */
		/* .slidecaption {
				left: 0px;
				font-size: 16px;
				line-height:14px;
		} */
		/* div#page {
	    top: auto;
			margin-top: 90px;
		} */

		/* .overlay.entry-content {
				height: auto;
		} */

		/* div#down-arrows-holder {
			 display: none;
		} */
		.square-logo2025 .logo_box {
			width: 60px;
			padding: 10px 15px 20px;
			height: 60px;
		}
		/* .slidetitles { */
    /*  align-items: end;*/
		    /* align-items: start; */
				/* top: 19vw; */
		/* } */
		/* .title1 , .slidetitle1{
			font-size: 16px;
			line-height:18px;
			color:#FFF;
			text-shadow: 1px 1px 1px #000;
		} */
		/* .title2, .slidetitle2 {
			font-size: 30px;
			line-height:26px;
			color:#FFF;
			text-shadow: 1px 1px 1px #000;
		} */
		/* .dot {
			font-size: 15px;
		} */
		/* .dot.active{ */
			/* font-size: 30px; */
		/* } */
		/* .slidecaption {
			color:#FFF;
			text-shadow: 1px 1px 1px #000;
		} */

		div#cta_arrow {
				display: none;
		}

		 /* .overlay {
        height: 34vh;
    } */

}


@media screen and (max-width: 575px) {
    .marketsector_grid.grid_project_wrap .project-center-cropped {
        width: 96%;
        margin-left: 0;
    }
}

/* this is needed for mobile */
@media (max-width: 575px) {
    .container, .container-sm {
        max-width: 540px;
    }
    /* #down-arrows-holder a {
        margin-left: auto;
    } */
}


</style>

<?php get_footer(); ?>
