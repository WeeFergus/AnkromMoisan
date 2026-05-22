 <?php // functions_openassets_album.php 


///////////////////////////   getOpenAssetsAlbums  functions    ///////////////////////////////////////

/////////// Get Open Assets Albums -  Dave Weaver, 2/2/2023
/////////// Refernce: https://developers.openasset.com

function getOpenAssetsAlbumsByID($albumid,$order,$debug) {


	if ($albumid=='') {
		$albumid = 645; // selfies
	}

	if ($order=='') {
      //$order = 'original_filename'; try blank
	}  

$oa_username = 'website_front_end';
$oa_password = 'ankrom';


$albums_array = []; // this will have the array of albums with all the needed info for the sliders

$files_array = []; // this will store all the detailed image information
$files_array_sorted = []; // this will store all the detailed image information - in the right order

$photographers_array = []; // stores the photographers
$photographerslistarray = []; // for keeping track of the photographers

$debughtml = '';

if (true) {

$debughtml.= "<br><br>albumid: ". $albumid . "<br>";


if ($albumid != '') {
////////////////////////////////  ALBUMS /////////////////////////////
$albumstr = 'https://ankrommoisan.openasset.com/REST/1/Albums?id=' .  $albumid . '&files=all&limit=0&username=' . $oa_username .'&orderBy='.$order.'&password=' . $oa_password;
$debughtml.= "albumstr:" . $albumstr;

$albumsarray = file_get_contents($albumstr);
$albums_decode = json_decode($albumsarray, TRUE);
//echo "<pre>";  //var_dump($albums_decode);//echo "</pre>";

foreach($albums_decode as $albumkey => $albumvalue) {

$fileslist = '';

foreach($albumvalue as $key => $value) {
//echo '<br>key: '.$key.' value:'.$value;
	if (is_array($value)) {
			foreach($value as $k => $v) {
					//echo '<br>k: '.$k.' v:'.$v;
					if ($key == 'files') {
							if ($fileslist!='') {
								$fileslist.=',';
							}
							$thisalbumfileid = $v['id'];
							$fileslist.=$thisalbumfileid;
							$albums_array[$albumkey]['files'][] = $thisalbumfileid;
							$files_array_sorted[$thisalbumfileid]['fileid']=$thisalbumfileid;
					}
			}
	} else {
			if ($key == 'name') {
					$albums_array[$albumkey]['album_name'] = $value;
			}

	}
}


$albumname = $albums_array[$albumkey]['album_name'];

$debughtml.= "<br> Album Name: " .$albumname;


////////////////////////////////  FILES ///////////////////////////// 
$filesstr = 'https://ankrommoisan.openasset.com/REST/1/Files/?sizes=all&limit=0&orderBy='.$order.'&id='.$fileslist.'&username=' . $oa_username .'&password=' . $oa_password;
$filesarray = file_get_contents($filesstr);
$files_decode = json_decode($filesarray, TRUE);
$sizeslist = '';
$sizeslistweb = '';

$debughtml.= "<br>".$filesstr."<br>";


foreach($files_decode as $filekey => $filevalue) {

	$debughtml.= '<br> filevalue[id]:'.$filevalue['id'];
	$thisfileid = $filevalue['id'];

	// get the photographer
	$files_array[$thisfileid]['photographer_id'] = $filevalue['photographer_id'];
	$files_array_sorted[$thisfileid]['photographer_id'] = $filevalue['photographer_id'];
	if (!in_array($filevalue['photographer_id'],$photographerslistarray)){
		$photographerslistarray[$thisfileid] = $filevalue['photographer_id'];
	}

	// original_filename
	$files_array[$thisfileid]['original_filename'] = $filevalue['original_filename'];
	$files_array_sorted[$thisfileid]['original_filename'] = $filevalue['original_filename'];
	 // caption
	$files_array[$thisfileid]['caption'] = $filevalue['caption'];
	$files_array_sorted[$thisfileid]['caption'] = $filevalue['caption'];

	

	foreach($filevalue as $key => $value) {
	$caption ='';
	$debughtml.= '<br>filekey: '.$key.' filevalue:'.$value;
	if (is_array($value)) {
			foreach($value as $k => $v) {
					$debughtml.= '<br>k: '.$k.' v:<pre>'.print_r($v,true).'</pre>';
					if ($key == 'sizes')  {
						if ($k ==0) {
							if ($sizeslist!='') {
								$sizeslist.=', ';
							}
							$sizeslist.=$v['http_root'].$v['relative_path'];
							$files_array[$thisfileid]['medium']=$v['http_root'].$v['relative_path'];;
							$files_array_sorted[$thisfileid]['medium']=$v['http_root'].$v['relative_path'];;
							$debughtml.= '<br>k: '.$k.' v:'.$v. ' v[http_root]:'.$v['relative_path'];
						} else if ($k == 4) { //when there are just 4 sizes then the 4th one is webview
							if ($sizeslist!='') {
								$sizeslistweb.=', ';
							}
							$sizeslistweb.=$v['http_root'].$v['relative_path'];
							$files_array[$thisfileid]['webview']=$v['http_root'].$v['relative_path'];;
							$files_array_sorted[$thisfileid]['webview']=$v['http_root'].$v['relative_path'];;
						} else if ($k == 5) { //when there are 5 sizes then the 5th one is webview
							if ($sizeslist!='') {
								$sizeslistweb.=', ';
							}
							$sizeslistweb.=$v['http_root'].$v['relative_path'];
							$files_array[$thisfileid]['webview']=$v['http_root'].$v['relative_path'];
							$files_array_sorted[$thisfileid]['webview']=$v['http_root'].$v['relative_path'];
						}
					}
					
					
					
			}
	} else {
		if ($key== 'caption') {
							$caption = $value;
							$files_array[$thisfileid]['caption']=$caption;
							$files_array_sorted[$thisfileid]['caption']=$caption;
		}
		/*
		if ($filekey=='photographer_id') {
				$files_array[$thisfileid]=$filevalue;
				echo "<br>photographer id:" . $filekey . " " . $filevalue; // var_dump($filevalue);
			  if (!in_array($filevalue,$photographerslistarray)){
						$photographerslistarray[]=$filevalue; // add this photographer id to the list
				}
			
		}
		*/
		//$filesarray[$key] = $value;
	}
	}
}
	//echo "<br>sizeslist: ". $sizeslist . "<br>";
	//echo "<br>sizeslistweb: ". $sizeslistweb . "<br>";

}


////////////////////////////////  PHOTOGRAPHERS /////////////////////////////
           //https://ankrommoisan.openasset.com/REST/1/Photographers?id=515
$photographerslist = implode(",",$photographerslistarray);
//echo "<br>photographerslist:" . $photographerslist;
if ($photographerslist!='') {
$phstr = 'https://ankrommoisan.openasset.com/REST/1/Photographers/?id='.$photographerslist.'&username=' . $oa_username .'&password=' . $oa_password;
$pharray = file_get_contents($phstr);
$ph_decode = json_decode($pharray, TRUE);
	foreach($ph_decode as $phkey => $phvalue) {
		$photographers_array[$phvalue['id']] = $phvalue['name'];
		//echo "<br>photographer id: " . $phvalue['id'] . " name: "  . $phvalue['name'];
	}
}

}

if (!$debug) {
  $debughtml = ''; // erase debug if not set to true
}

return array("albumname" => $albumname, "albums" => $albums_array, "files" => $files_array_sorted, "photographers" => $photographers_array,"debughtml" => $debughtml);
}
}



// generate a slideshow for the website from and Open Asset album
function getOpenAssetAlbumSwiper($OA_albumid,$order,$debug,$swiperclass,$hidelightbox){
	$OA_album = getOpenAssetsAlbumsByID($OA_albumid,$order,$debug);
	$files = $OA_album['files'];
	$html ='';
	if ($debug){
		$html.="files print_r<pre>".print_r($files,true)."</pre>";
	}
		$html.='<div class="swiper swiper-container '.$swiperclass.'">';
		$html.='<div class="swiper-wrapper">';
	foreach ($files as $file) {
		$thispic = $file['webview'];
		$caption = $file['caption'];


						if (($thispic != '') && ($thispic != 'undefined')) {

						$html.= '<div class="swiper-slide">
						';
						if ($hidelightbox=='yes') {
							
						} else {
							$html.= '<a data-fslightbox="gallery" href="'.$thispic.'">';		
						}
						$html.= '<img src="'.$thispic.'" alt="'.$caption.'" data-subtitle="'.$caption.'" data-caption="'.$caption.'">';

						$html.='<div class="caption">'.$caption.'</div>';
						

						if ($hidelightbox=='yes') {
							
						} else {
							$html.='</a>';
						}
						$photographer = $OA_albums['photographers'][$OA_albums['files'][$file]['photographer_id']];
						$copy = "";
						if ($photographer != '') {$copy = "&copy;&nbsp;";}
						
							$html.='<div class="photo_credit">';
									$html.='<p>'.$copy.$photographer.'</p>';
							$html.='</div>';
						$html.='</div>
						';
						}

	}
	$html.='</div>';

	$html.='	<div class="slider_controls">
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="shimmer tumb_loading"></div>
				<style>
.caption {
	z-index: 3000;
    position: absolute;
    background: #00000077;
    color: #fff;
    bottom: -26px;
    font-size: 15px;
    left: 20px;
    width: 100%;
}

				</style>';
	$html.='</div>';

   $debughtml = $OA_album['debughtml'];
   if ($debughtml!='') {
       $html.=$debughtml;
   }

	return $html;
}

