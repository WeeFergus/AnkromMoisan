<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ankrom_Moisan
 */

?>
<!-- <p id="market_sector_map_trigger" class="underline_link">Map</p> -->
<div id="home_map_wrap">
<!--
	<div class="close_project_list_btn">
		<img src="<?php echo get_template_directory_uri() . '/assets/images/SVG/close.svg'; ?>"/>
	</div>
-->
	
	<div id='map_home'></div>
	<nav id="filter-group" class="filter-group"></nav>
</div>

<!-- Map Project -->
<?php $projectmap = array(
    'post_type' => 'portfolio_project',
    'post_status' => 'publish',
    'posts_per_page' => -1,
); 
$mapmarks = new WP_Query( $projectmap ); 

// count row number 
$counter = 1;
if(get_option( 'ccp_upload' )["name"] !== 'none'){
	$old_projects_url = get_option( 'ccp_upload' )["url"]; 
	$f_pointer=fopen($old_projects_url,"r"); // file pointer
}
?>

<script>
	
	
	const filterGroup = document.getElementById('filter-group');

	function loadMapBoxSector(container, center){
		
		mapboxgl.accessToken = 'pk.eyJ1IjoiYW5rcm9tbW9pc2FuIiwiYSI6ImNrMXNkeHVxZjBmNTkzZnA0OHM0bW00Z3EifQ.jd4Bbp2LYbjaZEv696_Y3w';
		
		const size = 200;
		
    	// This implements `StyleImageInterface`
    	// to draw a pulsing dot icon on the map.
    	const pulsingDot = {
    	    width: size,
    	    height: size,
    	    data: new Uint8Array(size * size * 4),
		
    	    // When the layer is added to the map,
    	    // get the rendering context for the map canvas.
    	    onAdd: function () {
    	        const canvas = document.createElement('canvas');
    	        canvas.width = this.width;
    	        canvas.height = this.height;
    	        this.context = canvas.getContext('2d');
    	    },
		
    	    // Call once before every frame where the icon will be used.
    	    render: function () {
    	        const duration = 1000;
    	        const t = (performance.now() % duration) / duration;
		
    	        const radius = (size / 2) * 0.15;
    	        const outerRadius = (size / 2) * 0.6 * t + radius;
    	        const context = this.context;
		
    	        // Draw the outer circle.
    	        context.clearRect(0, 0, this.width, this.height);
    	        context.beginPath();
    	        context.rect(
    	            this.width / 2 - outerRadius /2 +10,
    	            this.height / 2 - outerRadius /2 +10,
    	            outerRadius-20,
    	            outerRadius-20
    	        );
    	        context.fillStyle = `rgba(61, 57, 53, ${1 - t})`;
    	        context.fill();
		
    	        // Draw the inner circle.
    	        context.beginPath();
    	        context.rect(
    	            this.width / 2 - radius + 5,
    	            this.height / 2 - radius+ 5,
    	            20,
    	            20
    	        );
    	        context.fillStyle = 'rgba(61, 57, 53, 1)';
    	        context.strokeStyle = 'white';
    	        context.lineWidth = 2;
    	        context.fill();
    	        context.stroke();
		
    	        // Update this image's data with data from the canvas.
    	        this.data = context.getImageData(
    	            0,
    	            0,
    	            this.width,
    	            this.height
    	        ).data;
		
    	        // Continuously repaint the map, resulting
    	        // in the smooth animation of the dot.
    	        map.triggerRepaint();
		
    	        // Return `true` to let the map know that the image was updated.
    	        return true;
    	    }
    	};
    	
		var allLocations = {
			'type': 'FeatureCollection',
			'features': [
				
				<?php if ( $mapmarks->have_posts() ) :?>
				<?php while ( $mapmarks->have_posts() ) : $mapmarks->the_post(); ?>
				<?php if(get_field('project_location_longitude')): ?>
				<?php $categories = get_the_terms( $post->ID, 'portfolio_category');?>
				<?php if($post->post_title === 'Ankrom Moisan Portland Office' || $post->post_title === 'Ankrom Moisan Seattle Office' || $post->post_title === 'Ankrom Moisan San Francisco Office'): ?>
				{
				'type': 'Feature',
				'category': '<?php foreach( $categories as $category ) { echo $category->name . ', ';} ?>',
				'properties': {
					'link': '<?php the_permalink(); ?>',
					'title': "<?php the_title(); ?>",
					'type': 'office',
					'filter': 'office'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo get_field('project_location_longitude'); ?>, <?php echo get_field('project_location_latitude'); ?>]
					}
				},
				<?php else: ?>
				{
				'type': 'Feature',
				'category': '<?php foreach( $categories as $category ) { echo $category->name . ', ';} ?>',
				'properties': {
					'link': '<?php the_permalink(); ?>',
					'title': "<?php the_title(); ?>",
					'type': 'project',
					'filter': 'clickable projects'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo get_field('project_location_longitude'); ?>, <?php echo get_field('project_location_latitude'); ?>]
					}
				},
				<?php endif; ?>
				<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
				
				<?php  if(get_option( 'ccp_upload' )["name"] !== 'none'):
					while(! feof($f_pointer)){
					$ar=fgetcsv($f_pointer);
					if($counter !=1) { 
					?>
				{
				'type': 'Feature',
				'properties': {
					'link': '<?php if($ar[6] !== ''): ?><?php echo $ar[6]; ?><?php else: ?>nolink<?php endif; ?>',
					'title': "<?php echo $ar[2]; ?>",
					'type': 'project',
					'filter': 'old projects'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [<?php echo $ar[1]; ?>, <?php echo $ar[0]; ?>]
					}
				},
				<?php } $counter++; } endif;?>
				

				{
				'type': 'Feature',
				'properties': {
					'title': 'Ankrom Moisan San Francisco Office',
					'type': 'office',
					'filter': 'office'
				},
					'geometry': {
						'type': 'Point',
						'coordinates': [-122.4077743, 37.7795572]
					}
				}
			]
		};
		
	
		
		
		var map = new mapboxgl.Map({
			container: container,
			style: 'mapbox://styles/ankrommoisan/ckig1w3wd56ah19rpxwcbljlf',
			center: [-110.9480895, 42.7290121],
			zoom: 4
		});	
		
		

    	map.on('load', () => {
        	map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });
        
        
			map.loadImage(
    			location.origin + '/wp-content/themes/ankrom-moisan/img/active.png',
    			(error, image) => {
    	    	if (error) throw error;
		
    	    		// Add the image to the map style.
    	    		map.addImage('active', image);
    			}
    		);
    		map.loadImage(
    			location.origin + '/wp-content/themes/ankrom-moisan/img/inactive_project.png',
    			(error, image) => {
    	    	if (error) throw error;
		
    	    		// Add the image to the map style.
    	    		map.addImage('unactive', image);
    			}
    		);
		    
    	    // Add a new source from our GeoJSON data and
    	    // set the 'cluster' option to true. GL-JS will
    	    // add the point_count property to your source data.
    	    map.addSource('allLocations', {
    	        type: 'geojson',
    	        // Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
    	        // from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
    	        data: allLocations,
    	        cluster: true,
    	        clusterMaxZoom: 12, // Max zoom to cluster points on
    	        clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
    	    });
    	    
    	    
    	    
		
		
		
			map.addLayer({
				id: 'clusters',
				type: 'circle',
				source: 'allLocations',
				filter: ['has', 'point_count'],
				paint: {
					// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
					// with three steps to implement three types of circles:
					//   * Blue, 20px circles when point count is less than 100
					//   * Yellow, 30px circles when point count is between 100 and 750
					//   * Pink, 40px circles when point count is greater than or equal to 750
					'circle-color': [
					'step',
						['get', 'point_count'],
						'#61b0bc',
						10,
						'#61b0bc',
						25,
						'#61b0bc',
						40,
						'#61b0bc',
						55,
						'#61b0bc',
						70,
						'#61b0bc',
						85,
						'#61b0bc',
						100,
						'#61b0bc',
						150,
						'#61b0bc',
						200,
						'#61b0bc',
						300,
						'#61b0bc'
					],
					'circle-stroke-color': 'white',
    				'circle-stroke-width': 1,
    				'circle-opacity': 0.8,
					'circle-radius': {
   						property: "point_count",
   						stops: [
   							[0, 10],
   							[5, 13],
   							[10, 16],
   							[15, 19],
   							[20, 22],
   							[25, 25],
   							[30, 28],
   							[35, 31],
   							[40, 34],
   							[45, 37],
   							[50, 40],
   							[55, 43],
   							[60, 46],
   							[65, 49],
   							[70, 52],
   							[75, 55],
   							[80, 58],
   							[90, 61],
   							[100, 64],
   							[110, 67],
   							[120, 70],
   							[130, 73],
   							[140, 76],
   							[150, 79],
   							[170, 82],
   							[190, 85],
   							[210, 88],
   							[250, 91],
   							[300, 94],
   							[350, 97],
   							[400, 105]
   						]
   					}
				}
			});
		
    	    map.addLayer({
    	        id: 'cluster-count',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ['has', 'point_count'],
    	        layout: {
    	            'text-field': '{point_count_abbreviated}',
    	            'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
    	            'text-size': 12
    	        },
    	        paint: {
    	            'text-color': '#fff'
    	        }
    	    });
    	    
    	    map.addLayer({
    	        id: 'unclustered-point',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['!=', 'link', 'nolink'], ['==', 'type', 'project']],
    	        layout: {
					'icon-image': 'pulsing-dot',
					'icon-size': 1.2,
					'icon-rotate': 45
				}
    	        
    	    });
    	    map.addLayer({
    	        id: 'unclustered-point-no-link',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['==', 'link', 'nolink'], ['==', 'type', 'project']],
    	        layout: {
					'icon-image': 'unactive',
					'icon-size': 0.12,
					'icon-rotate': 45
				}
    	        
    	    });
    	     map.addLayer({
    	        id: 'unclustered-point-office',
    	        type: 'symbol',
    	        source: 'allLocations',
    	        filter: ["all", ['!has', 'point_count'], ['==', 'type', 'office']],
    	        layout: {
					'icon-image': 'active',
					'icon-size': 0.22,
					'icon-rotate': 0
				}
    	        
    	    });
    	    
    	    
    	    
		
    	    // inspect a cluster on click
    	    map.on('click', 'clusters', function (e) {
    	        var features = map.queryRenderedFeatures(e.point, {
    	            layers: ['clusters']
    	        });
    	        var clusterId = features[0].properties.cluster_id;
    	        map.getSource('allLocations').getClusterExpansionZoom(
    	            clusterId,
    	            function (err, zoom) {
    	                if (err) return;
		
    	                map.easeTo({
    	                    center: features[0].geometry.coordinates,
    	                    zoom: zoom
    	                });
    	            }
    	        );
    	    });
		
    	    // When a click event occurs on a feature in
    	    // the unclustered-point layer, open a popup at
    	    // the location of the feature, with
    	    // description HTML from its properties.
    	    map.on('click', 'unclustered-point', function (e, marker) {
		        if(e.features[0].properties.link !== 'nolink'){
    	        	location.href = e.features[0].properties.link;
    	        }
    	    });
    	    
    	    
    	    // Create a popup, but don't add it to the map yet.
			var popup = new mapboxgl.Popup({
				closeButton: false,
				closeOnClick: false
			});
    	    map.on('mouseenter', 'unclustered-point', function (e) {
		        var coordinates = e.features[0].geometry.coordinates.slice();
    	        var mag = e.features[0].properties.mag;
    	        map.getCanvas().style.cursor = 'pointer';
    	        
    	        popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);
		
    	    });
    	    map.on('mouseenter', 'unclustered-point-no-link', function (e) {
		        var coordinates = e.features[0].geometry.coordinates.slice();
    	        var mag = e.features[0].properties.mag;
    	        
    	        popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);
		
    	    });
    	    map.on('mouseenter', 'unclustered-point-office', function (e) {
		        var coordinates = e.features[0].geometry.coordinates.slice();
    	        var mag = e.features[0].properties.mag;
    	        
    	        popup.setLngLat(coordinates).setHTML(e.features[0].properties.title).addTo(map);
		
    	    });
    	    map.on('mouseleave', 'unclustered-point', function (e) {
		        popup.remove();
		        map.getCanvas().style.cursor = '';
    	    });
    	    map.on('mouseleave', 'unclustered-point-no-link', function (e) {
		        popup.remove();
		        map.getCanvas().style.cursor = '';
    	    });
    	    map.on('mouseleave', 'unclustered-point-office', function (e) {
		        popup.remove();
		        map.getCanvas().style.cursor = '';
    	    });
		
    	    map.on('mouseenter', 'clusters', function () {
    	        map.getCanvas().style.cursor = 'pointer';
    	    });
    	    map.on('mouseleave', 'clusters', function () {
    	        map.getCanvas().style.cursor = '';
    	    });
    	    
    	    
    	    
    	    
/*
    	   for (const feature of allLocations.features) {
			    const symbol = feature.properties.filter;
			    const layerID = `poi-${symbol}`;
			
			    // Add a layer for this symbol type if it hasn't been added already.
			    if (!map.getLayer(layerID)) {
			        map.addLayer({
			            'id': layerID,
			            'type': 'symbol',
			            'source': 'allLocations',
			            'layout': {
			                // These icons are a part of the Mapbox Light style.
			                // To view all images available in a Mapbox style, open
			                // the style in Mapbox Studio and click the "Images" tab.
			                // To add a new image to the style at runtime see
			                // https://docs.mapbox.com/mapbox-gl-js/example/add-image/
			                'icon-image': `active`,
			                'icon-size': 0.12,
			                'icon-allow-overlap': true
			            },
			            'filter': ['==', 'filter', symbol]
			        });
			
			        // Add checkbox and label elements for the layer.
			        const input = document.createElement('input');
			        input.type = 'checkbox';
			        input.id = layerID;
			        input.checked = true;
			        filterGroup.appendChild(input);
			
			        const label = document.createElement('label');
			        label.setAttribute('for', layerID);
			        label.textContent = symbol;
			        filterGroup.appendChild(label);
			
			        // When the checkbox changes, update the visibility of the layer.
			        input.addEventListener('change', (e) => {
			            map.setLayoutProperty(
			                layerID,
			                'visibility',
			                e.target.checked ? 'visible' : 'none'
			            );
			        });
			    }
			}
*/
		
    	});
    	map.scrollZoom.disable();
    	map.boxZoom.disable();
    	map.addControl(new mapboxgl.NavigationControl());
    
    
    	function resetMap(){
    		setTimeout(function() { 
				// Geographic coordinates of the LineString
				const coordinates = [];
				allLocations.features.forEach(locations => {
					coordinates.push(locations.geometry.coordinates);
				})
// 				console.log(coordinates);
				 
				// Create a 'LngLatBounds' with both corners at the first coordinate.
				const bounds = new mapboxgl.LngLatBounds(
				coordinates[0],
				coordinates[0]
				);
				 
				// Extend the 'LngLatBounds' to include every coordinate in the bounds result.
				for (const coord of coordinates) {
					bounds.extend(coord);
				}
				 
				map.fitBounds(bounds, {
					padding: 30
				});
			}, 1000);
    	}
    	window.addEventListener('load', resetMap);
    	if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
			window.addEventListener('resize', resetMap);
		}
	}
	

	document.addEventListener('load', loadMapBoxSector('map_home', [-122.670798,45.524443]));
	
/*
	const mapBoxCont = document.querySelector('#map_home');
	const mapBoxOver = document.querySelector('#map_overlay');
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
		mapBoxCont.addEventListener('touchstart', function (e) {		
			if(e.touches.length = 2) {
				console.log('two fingers');
		    	map.dragPan.enable();
		  	}else if(e.touches.length = 1){
			  	console.log('one fingers');
			  	map.dragPan.disable();
		  	}
            
        
		});
	}
*/




</script>
