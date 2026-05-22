
/* openasset-albums.js */

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


		function getAlbumFilesSwiper(albumtype='', thisfileslist='', albumname='', projectname='', size='webview', thisalbfilesjson='') {


			if ((albumtype!=='') && (thisfileslist!='') && (thisalbfilesjson!='')) {
		
		/*	////////////////////  GET ALBUM FILES ///////////////////////////////  */
							var filesstr = 'https://ankrommoisan.openasset.com//REST/1/Files/?sizes=all&orderBy=display_order&id=' + thisfileslist;

							var albumFilesPaths = OpenAssetData('GET', filesstr).then(responseData => {
								 var albumhtml = '';
								 //albumhtml+="<br>" + albumname;
								 //albumhtml+= '<br>Feed: <a href="'+ filesstr + '" target="_blank">' + filesstr + '</a>';


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
														 albumpics+= ' . ';
												}

											}
											
											albumpics+='</div><div class="slider_controls"><!-- Add Pagination --><div class="swiper-pagination swiper-pagination-fraction swiper-pagination-horizontal"><span class="swiper-pagination-current">1</span> / <span class="swiper-pagination-total">' + thisalbfilesjson.length + '</span></div><!-- Add Arrows --><div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-e2edd8c778171056" aria-disabled="false"></div><div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-e2edd8c778171056" aria-disabled="true"></div></div><div class="shimmer tumb_loading"></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>';

											albumhtml+="<br>" +  albumpics;
											
											jQuery("#album-" + albumtype).html(albumhtml);


	var swiper = new Swiper('.swiper-container', {
    	slidesPerView: 'auto',
//     	slidesPerView: 1,
    	centeredSlides: false,
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


		/*	////////////////////  GET PROJECT ///////////////////////////////  */
		function getProject() {

				// clear areas
				jQuery("#album-overview").html("");
				jQuery("#album-architecgture").html("");
				jQuery("#album-interiors").html("");
				jQuery("#album-planning-").html("");
				jQuery("#album-rendering-").html("");
				jQuery("#album-brand-").html("");
				jQuery("#album-other").html("");

				var datahtml = "";
				var albumhtml = "";


			var projstr = 'https://ankrommoisan.openasset.com/REST/1/Projects/?albums&id=' + projectID;
			//datahtml+= '<a href="'+ projstr + '" target="_blank">' + projstr + '</a>';

			var projectData = OpenAssetData('GET', projstr).then(responseData => {
				var proj = JSON.stringify(responseData[0]);
				var projs = JSON.parse(proj);
				var project_name = projs.name;

				// datahtml+= "<h1>" + project_name + "</h1><h2>" + projs.name_alias_1 + "<br>" +  projs.code_alias_1 + "</h2>";

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

				//albumshtml="<br><br><h2>Albums:</h2>";

				var albumstr = 'https://ankrommoisan.openasset.com//REST/1/Albums?id=' + albumlist + '&files=all&limit=0';
				//albumshtml+= '<a href="'+ albumstr + '" target="_blank">' + albumstr + '</a>';


				//jQuery("#albums-data").html(albumshtml);


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

							//itemlist+='<br>' + thisalbumname;
							fileslist = '';

							thisalbfiles = JSON.stringify(alb[key].files);
							thisalbfiles_json = JSON.parse(thisalbfiles);
							for (var filekey in thisalbfiles_json) {
								thisalbumid = thisalbfiles_json[filekey].id;
								if (fileslist!='') {fileslist+=',';};
								fileslist+=thisalbumid;
								
							}
							//itemlist+= "<br>files: " + fileslist;

							jQuery("#albums-data").append(itemlist);


								var albumtype = ''; // default
								var size = 'webview'; // default to web view size

								if (thisalbumname.toLowerCase().includes("overview")) {
									albumtype = 'overview';
									size = 'medium';
								} else if  (thisalbumname.toLowerCase().includes("interiors")) {
									albumtype = 'interiors';
								} else if  (thisalbumname.toLowerCase().includes("architecture")) {
									albumtype = 'architecture';
								} else if  (thisalbumname.toLowerCase().includes("planning")) {
									albumtype = 'planning';
								} else if  (thisalbumname.toLowerCase().includes("rendering")) {
									albumtype = 'rendering';
								} else if  (thisalbumname.toLowerCase().includes("brand")) {
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

