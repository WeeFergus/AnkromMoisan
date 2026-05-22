<?php
/**
 * Template Name: Dashboard Template
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */




get_header();
?>

	<main id="primary" class="site-main">

	<div id="dashboard-header"><h1><a href="/"><img src="https://dev-ama2020.pantheonsite.io/wp-content/uploads/2023/01/AnkromMoisan-Logo.jpg" id="dashboard-logo" title="Ankrom Moisan Architects" alt="Ankrom Moisan Architects"></a>&nbsp;Projects&nbsp;Dashboard</h1></div>

		<?php 
			$getproject_id = $_GET['project_id'];
			// sanitize_text_field
			$project_id = filter_var($getproject_id, FILTER_SANITIZE_NUMBER_INT); // filter input
			if ($project_id=='') {
				$project_id = 913; // default to The Verve for now - why not? :)
			}
			?>

Offset: <input type="text" id="project-offset" value="0" class="input-short">&nbsp;&nbsp;   
Limit: <input type="text" id="project-limit" value="30" class="input-short"> &nbsp;&nbsp;
Sort: <input type="text" id="project-sort" value="" class="input-medium">&nbsp;&nbsp; 
Search: <input type="text" id="project-search" value="" class="input-medium" >&nbsp;&nbsp; 
<input type="button" id="getprojects-button" value="Get Projects"> 
<div id="dashboard-projects"></div>

<div id="dashboard-controls">
OpenAsset Project ID#:<input type="text" id="project-id" value="<?php echo $project_id;?>">&nbsp;&nbsp;
<input type="button" id="getproject-button" value="Get Project">  
</div>

		<?php


		while ( have_posts() ) { // :
			the_post();


						get_template_part( 'template-parts/content', get_post_type() );

				//$content = apply_filters( 'the_content', get_the_content() );
		   //echo $content;
			//get_template_part( 'template-parts/content', get_post_type() );


?>





<?php /////////////////////////////////////////  Open Asset Albums ////////////////////////////// ?>

		<div id="dashboard-data" class="albumsdiv"></div>
		<div id="albums-data" class="albumsdiv"></div>
	<div class="project_slider">
		<div class="container project_stories">
		 	<div class="row project_interior_story">
				<div id="album-overview" class="albumsdiv"></div>
				<div id="album-interiors" class="albumsdiv"></div>
				<div id="album-architecture" class="albumsdiv"></div>
				<div id="album-planning" class="albumsdiv"></div>
				<div id="album-rendering" class="albumsdiv"></div>
				<div id="album-brand" class="albumsdiv"></div>
				<div id="album-other" class="albumsdiv"></div>
			</div>
		</div>
	</div>
		<?php 
			while ( have_rows('fetch_data') ) : the_row();
        //$project_id = get_sub_field('project_id');
			endwhile;
			if ($project_id==''){
				echo "no project id found<br>";
			}
		?>
		<?php // if ($project_id!='') { ?>
		<?php if (true) { ?>
		<script>


				
				

			const username = 'website_front_end';
			const password = 'ankrom';
			const OpenAssetData = (method, url, data) => {
		    return fetch(url, {headers: {
		        'Content-Type': 'text/plain',
		        'Authorization': 'Basic ' + btoa(`${username}:${password}`),
		    },})
		    .then(response => {
		        return response.json();
		    });
		};


		var overview_album_object; // this will hold the overview album


		function getProjects() {
			var limit = jQuery("#project-limit").val();
			var offset = jQuery("#project-offset").val();
			var sort = jQuery("#project-sort").val();
			var search = jQuery("#project-search").val();
			var projectshtml = "";

		/*	////////////////////  GET PROJECTS ///////////////////////////////  */

			var datastr = 'https://ankrommoisan.openasset.com/REST/1/Projects/?albums&limit=' + limit + '&offset=' + offset;
			if (sort!='') {
				datastr+='&orderBy=' + sort; 
			}
			if (search!='') {
				datastr+='&name=' + search; 
			}


			projectshtml+= '<a href="'+ datastr + '" target="_blank">' + datastr + '</a>';

			//console.log('datastr:' + datastr);
			OpenAssetData('GET', datastr).then(responseData => {
				var projs = JSON.stringify(responseData);
				var projslist = JSON.parse(projs);
				var albums;
				var albumclass = '';

				projectshtml+= "<h1>Projects</h1>";

				for (var key in projslist) {  
					 albumclass = '';
					 albums = projslist[key].albums;
					 if (albums.length >0) {albumclass = 'albums';}
					 projectshtml+= '<div data-projectid="'+ projslist[key].id  + '" class="project-button ' + albumclass + '">' + projslist[key].name +'</div>';
				}
					//console.log('projs:' + projs);

					jQuery("#dashboard-projects").html(projectshtml);

			});
		}
		getProjects();


		function getAlbumFilesSwiper(albumtype='', thisfileslist='', albumname='', projectname='', size='webview', thisalbfilesjson='') {


			if ((albumtype!=='') && (thisfileslist!='') && (thisalbfilesjson!='')) {
		
		/*	////////////////////  GET ALBUM FILES ///////////////////////////////  */
							var filesstr = 'https://ankrommoisan.openasset.com//REST/1/Files/?sizes=all&orderBy=display_order&id=' + thisfileslist;

							var albumFilesPaths = OpenAssetData('GET', filesstr).then(responseData => {
								 var albumhtml = '';
								 albumhtml+="<br>" + albumname;
								 albumhtml+= '<br>Feed: <a href="'+ filesstr + '" target="_blank">' + filesstr + '</a>';


								 var thissizeroot ='';
								 var thissizepathmedium = '';
								 var thissizepathweb = '';
								 var thissizefullpath = '';
								 var thisfileid = '';
								 var thisdisplayorder = "";
								 var albumfilesmedium = new Array();
								 var albumfilesweb = new Array();
								 var albumpics = "";
								 var albumshtml = "";
								 var projecttitle = projectname + ' ' +albumtype;


								 jQuery("#album-overview-title").html(projectname);

									albumpics+='<div class="swiper-container swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden"><div class="swiper-wrapper" id="swiper-wrapper-' + albumtype + '" aria-live="polite" style="transition-duration: 0ms; transform: translate3d(93px, 0px, 0px);">';
		
									//console.log('sizes:' + JSON.stringify(responseData));
									var filespaths = JSON.stringify(responseData);
									var sizesstr = JSON.parse(filespaths);
									//var filessizesstr = filespathsstr.sizes;
										for (var sizeskey in sizesstr) {
											thissizeroot =  sizesstr[sizeskey].sizes[0].http_root;
											thissizepathmedium =  sizesstr[sizeskey].sizes[0].relative_path;
											thissizepathweb =  sizesstr[sizeskey].sizes[5].relative_path;
											thissizefullpathmedium = thissizeroot + thissizepathmedium;
											thissizefullpathweb = thissizeroot + thissizepathweb;
											thisfileid =  sizesstr[sizeskey].id;
											thisdisplayorder =  sizesstr[sizeskey].sizes[0].display_order;
											albumfilesmedium[thisfileid] = thissizefullpathmedium; // assign the image path to the file id
											albumfilesweb[thisfileid] = thissizefullpathweb; // assign the image path to the file id
											}

											// loop through the array that knows the right order and insert the image paths
											for (var filekey in thisalbfilesjson) {
												thisalbumid = thisalbfilesjson[filekey].id;
												if (size=='medium') {
													thissizefullpath = albumfilesmedium[thisalbumid];
												} else { /* webview */
													thissizefullpath = albumfilesweb[thisalbumid];
												}
												if (typeof thissizefullpath !== 'undefined') {

											

														albumpics+='<div class="swiper-slide swiper-slide-active" role="group" aria-label="' + (parseInt(filekey) + 1) + ' / ' +  thisalbfilesjson.length + '"><img src="' + thissizefullpath + '" alt="' + projecttitle + '"></div>';

												//albumpics+='<img src="' + thissizefullpath + '" class="albumpic"  data-fileid="' + thisfileid + '">';
												} else {
														 // albumpics+= ' . ';
														// albumpics+= '<br>' + thissizefullpath + '<br>';
														//albumpics+= JSON.stringify(sizesstr[sizeskey].sizes[0]); + '<br><br>';
														//albumpics+= JSON.stringify(sizesstr[sizeskey].sizes[0]); + '<br><br>';
												}

											}

											albumpics+='</div><div class="slider_controls"><!-- Add Pagination --><div class="swiper-pagination swiper-pagination-fraction swiper-pagination-horizontal"><span class="swiper-pagination-current">1</span> / <span class="swiper-pagination-total">' + thisalbfilesjson.length + '</span></div><!-- Add Arrows --><div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-e2edd8c778171056" aria-disabled="false"></div><div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-e2edd8c778171056" aria-disabled="true"></div></div><div class="shimmer tumb_loading"></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>';

		
											albumhtml+="<br>" +  albumpics;
											
											jQuery("#album-" + albumtype).html(albumhtml);



	var swiper = new Swiper('.swiper-container', {
    	slidesPerView: 'auto',
//     	slidesPerView: 1,
    	centeredSlides: true,
    	loop: false,
    	spaceBetween: 0,
    	draggable: true,
    	simulateTouch: true,
/*
    	breakpoints: {
    		'640': {
    		 slidesPerView: 1,
    		 centeredSlides: true,
    		}
    	},
*/
    	pagination: {
    	    el: '.swiper-pagination',
    	    type: 'fraction',
    	},
    	navigation: {
    	    nextEl: '.swiper-button-next',
    	    prevEl: '.swiper-button-prev',
    	},
    });


							});
			}

		}





		var projectID = <?php echo $project_id;?>;

		/*	////////////////////  GET PROJECT ///////////////////////////////  */
		function getProject() {

				// clear areas
				jQuery("#albums-data").html("");
				jQuery("#album-overview").html("");
				jQuery("#album-architecture").html("");
				jQuery("#album-interiors").html("");
				jQuery("#album-planning-").html("");
				jQuery("#album-rendering-").html("");
				jQuery("#album-brand").html("");
				jQuery("#album-other").html("");
				jQuery("#dashboard-data").html("");

				var datahtml = "";
				var albumhtml = "";


			var projstr = 'https://ankrommoisan.openasset.com/REST/1/Projects/?albums&id=' + projectID;
			datahtml+= '<a href="'+ projstr + '" target="_blank">' + projstr + '</a>';

			var projectData = OpenAssetData('GET', projstr).then(responseData => {
				var proj = JSON.stringify(responseData[0]);
				var projs = JSON.parse(proj);
				var project_name = projs.name;

				datahtml+= "<h1>" + project_name + "</h1><h2>" + projs.name_alias_1 + "<br>" +  projs.code_alias_1 + "</h2>";

				var albums = projs.albums;
				var albumlist = '';
				for (var key in albums) {
					if (albumlist!='') {
						albumlist+=',';
					}
					albumlist+=projs.albums[key].id;
				}
				//console.log('albumlist:' + albumlist);


				jQuery("#dashboard-data").html(datahtml);

		/*	////////////////////  GET ALBUMS ///////////////////////////////  */
				if (albumlist!='') {

				albumshtml="<br><br><h2>Albums:</h2>";

				var albumstr = 'https://ankrommoisan.openasset.com//REST/1/Albums?id=' + albumlist + '&files=all&limit=0';
				albumshtml+= '<a href="'+ albumstr + '" target="_blank">' + albumstr + '</a>';


				jQuery("#albums-data").html(albumshtml);


				var albumFiles = OpenAssetData('GET', albumstr).then(responseData => {

						var itemlist = '';
						var thisalbumname = '';
						var fileslist = '';
						//var albumsobjects = new Array();


						//console.log('albumFiles:' + JSON.stringify(responseData));
						var album = JSON.stringify(responseData);
						var alb = JSON.parse(album);


						var thisalbfiles = '';
						var thisalbfiles_json = '';


						for (var key in alb) {
							itemlist = '';
							if (itemlist!='') {
								itemlist+='<br>';
							}
							//console.log('album keys:' + key);

							thisalbumname = alb[key].name;
							thisalbumid = alb[key].id;

							//console.log('thisalbumname:' + thisalbumname);

							itemlist+='<br>' + thisalbumname;
							fileslist = '';

							thisalbfiles = JSON.stringify(alb[key].files);
							thisalbfiles_json = JSON.parse(thisalbfiles);
							for (var filekey in thisalbfiles_json) {
								thisalbumid = thisalbfiles_json[filekey].id;
								if (fileslist!='') {fileslist+=',';};
								fileslist+=thisalbumid;
								
							}
							itemlist+= "<br>files: " + fileslist;

							jQuery("#albums-data").append(itemlist);


								var albumtype = ''; // default
								var size = 'webview'; // default to web view size


								if (thisalbumname.toLowerCase().includes("overview ranked")) {
									albumtype = 'overview';
									size = 'medium';
								} else if  (thisalbumname.toLowerCase().includes("interiors ranked")) {
									albumtype = 'interiors';
								} else if  (thisalbumname.toLowerCase().includes("architecture ranked")) {
									albumtype = 'architecture';
								} else if  (thisalbumname.toLowerCase().includes("planning ranked")) {
									albumtype = 'planning';
								} else if  (thisalbumname.toLowerCase().includes("rendering ranked")) {
									albumtype = 'rendering';
								} else if  (thisalbumname.toLowerCase().includes("brand ranked")) {
									albumtype = 'brand';
								} else {
									albumtype = 'other';
								}

								// get the album files and write them to their div
								//getAlbumFiles(albumtype, fileslist, thisalbumname, project_name,thisalbfiles_json);
								getAlbumFilesSwiper(albumtype, fileslist, thisalbumname, project_name,size,thisalbfiles_json);
						}

						
  			});
				} else {
						datahtml+="<br><p>No albums found for this project</p>";
						jQuery("#dashboard-data").html(datahtml);
				}
						

		 });
		}



getProject();




jQuery(function() {
// Get new projects when clicking button
jQuery("#getprojects-button").click(function(){
		getProjects();
		return false;
});



// Get new project when clicking a project button
//jQuery(".project-button").click(function(){
jQuery('#dashboard-projects').on('click', '.project-button', function(){
	  //console.log("getting project");
		var thisprojid = jQuery(this).data("projectid");
		//console.log('thisprojid:' + thisprojid);
		jQuery("#project-id").val(thisprojid);
		projectID = jQuery("#project-id").val();
		getProject();
		//return false;
});

// Get new project when clicking button
//jQuery("#getproject-button").click(function(){
jQuery('#dashboard-controls').on('click', '#getproject-button', function(){
		projectID = jQuery("#project-id").val();
		//console.log("Getting project " + projectID);
		getProject();
		return false;
});

});
		</script>
		<?php } ?>

		
<?php /////////////////////////////////////////  End Open Asset Albums ////////////////////////////// ?>

<?php
		}
		//endwhile; // End of the loop.
		?>

	</main><!-- #main -->


<style>

#dashboard-header {
	margin-top:20px;
	margin-bottom:20px;
}
#dashboard-logo{
	height:100px;
}
#dashboard-controls{
	margin-top:20px;
	margin-bottom:20px;
}
main#primary {
    margin-top: 50px;
}
div#main_menu_wrap {
			display: none;
}
body.admin-bar .breadcrumbs {
    display: none;
}
.project-button{
		display:inline-block;
		padding:5px;
		margin:10px 10px;
		background:#3366ff;
		color:#fff;
		cursor:pointer;
		box-shadow:3px 3px 3px 3px #000;
}
.project-button.albums {
    background: green;
}
.albumpic{
		height:100px;
		display:inline-block;
		margin:10px;
}
.input-short{
	width:100px;
}
.input-medium{
	width:200px;
}
.albumsdiv{
    width: 90%;
    overflow-wrap: break-word;
}

</style>



	<!-- Swiper JS -->
	<script src="<?php echo get_stylesheet_directory_uri();?>/swiper/swiper-bundle.min.js"></script>
	<!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->


<p><br><br></p>
<p><br><br></p>
<p><br><br></p>

<?php 
// get_footer();


// reference https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_promises#chaining
?>

