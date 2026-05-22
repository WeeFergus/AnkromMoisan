<div class="project_slider">
	<!-- Swiper -->
	<div class="container2025 swiper-container2025  top_project_slider2025">
		<div class="swiper-wrapper">


		<?php 
		/*
		$discipline = "overview"; // default to overview
		$sliderpage = "template-parts/project-story-slides/project-top-slides-no-discipline.php";
		$sliderfield = "top_page_slidershow";
		$contentfield = "top_project_content";
		*/

			// default to architecture
			$discipline = "architecture";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "architecture_project_slideshow";
			$contentfield = "architecture_project_content";


		if ((strstr($_SERVER['REQUEST_URI'], 'architecture') == true ) || ($showdiscipline=="architecture")) {
			$discipline = "architecture";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "architecture_project_slideshow";
			$contentfield = "architecture_project_content";
		} elseif ((strstr($_SERVER['REQUEST_URI'], 'interiors') == true ) || ($showdiscipline=="interiors")) {
			$discipline = "interiors";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "interior_project_slideshow";
			$contentfield = "interior_project_content";
		} elseif ((strstr($_SERVER['REQUEST_URI'], 'planning') == true ) || ($showdiscipline=="planning"))  {
			$discipline = "planning";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "planning_project_slideshow";
			$contentfield = "planning_project_content";
		} elseif ((strstr($_SERVER['REQUEST_URI'], 'brand') == true ) || ($showdiscipline=="brand"))  {
			$discipline = "brand";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "brand_project_slideshow";
			$contentfield = "brandproject_content";

		} elseif ((strstr($_SERVER['REQUEST_URI'], 'design') == true )  || ($showdiscipline=="design")) {
			$discipline = "design";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "design_project_slideshow";
			$contentfield = "design_project_content";

		} elseif ((strstr($_SERVER['REQUEST_URI'], 'process') == true ) || ($showdiscipline=="process")) {
			$discipline = "process";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "process_project_slideshow";
			$contentfield = "process_project_content";

		} elseif ((strstr($_SERVER['REQUEST_URI'], 'ffe') == true ) || ($showdiscipline=="ffe")) {
			$discipline = "ffe";
			$sliderpage = "template-parts/project-story-slides/project-top-slides-with-discipline.php";
			$sliderfield = "process_project_slideshow";
			$contentfield = "process_project_content";

		}


		echo "<!--discipline:".$discipline."-->";
			
			// albumvariation is for new variations of album name. For Projects 2024 albumvariation = " 2024";

			// first look for the album variation - such as " 2024" - then look for the non variation version

			$albumtype = $discipline.' ranked'.$albumvariation;

			echo "<!-- albumtype1:".$albumtype." -->";

			$albumhtml = getOpenAssetSwiperTop($OA_albums,$project_id,$albumtype,'medium',1);
			if (($albumhtml!='') && (!$hide_open_asset_albums)) {
						echo "<!--  getting open assets album -->";
				echo $albumhtml;
			} else {
				$albumtype = $discipline.' ranked';
				echo "<!-- albumtype2:".$albumtype." -->";
				$albumhtml = getOpenAssetSwiperTop($OA_albums,$project_id,$albumtype,'medium',1);
				if (($albumhtml!='') && (!$hide_open_asset_albums)) {
						echo "<!--  getting open assets album -->";
						echo $albumhtml;
				} 
			}
			if ($albumhtml==''){
					echo "<!-- getting manually entered album -->";
					while (have_rows($contentfield)) { the_row();
						if (have_rows($sliderfield)) {
						while( have_rows($sliderfield) ){ the_row();
							echo "<!-- getting ".$sliderpage." -->";
							include $sliderpage;
						}
						} else {
							echo "<!--  no rows found for this page -->";
						}
					}
			}



		?>

		</div>
		<div class="slider_controls_title_wrap">
			<div class="row col-12">
				<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="slider_title">
					<h1>&nbsp;<?php //echo $post->post_title; ?></h1>
				</div>
				<div class="slider_controls"><!-- for symmetry --></div>
		</div>
	</div>
	<div class="shimmer tumb_loading"></div>
	</div>
</div>