 <?php // functions_openassets.php 


///////////////////////////   getOpenAssetsAlbums  functions    ///////////////////////////////////////

/////////// Get Open Assets Albums -  Dave Weaver, 2/2/2023
/////////// Refernce: https://developers.openasset.com

function getOpenAssetsAlbums($projectid ) {

$oa_username = 'website_front_end';
$oa_password = 'ankrom';


$project_array = []; // project details

$albums_array = []; // this will have the array of albums with all the needed info for the sliders

$files_array = []; // this will store all the detailed image information

$photographers_array = []; // stores the photographers
$photographerslistarray = []; // for keeping track of the photographers
////////////////////////////////  PROJECTS /////////////////////////////
$datastr = 'https://ankrommoisan.openasset.com/REST/1/Projects/?albums&id=' . $projectid . '&username=' . $oa_username .'&password=' . $oa_password;
echo "<!-- datastr:" . $datastr." -->";
$project = file_get_contents($datastr);
$project_decode = json_decode($project, TRUE);
$albumlist = '';

if (isset($project_decode[0])) {
foreach($project_decode[0] as $key => $value) {
//echo '<br>key: '.$key.' value:'.$value;
	if (is_array($value)) {
			foreach($value as $ke => $va) {
					//echo '<br>ke: '.$ke.' va:'.$va . ' ';
					if (is_array($va)) {
						//echo var_dump($va);
						foreach($va as $k => $v) {
						//echo '<br>key: '. $key . ' k: '.$k.' v:'.$v . ' ';
						if ($key == 'albums') {
							if ($albumlist!='') {
								$albumlist.=',';
							}
							$albumlist.=$v;
						}
					}
				}
			}
	} else {
			if ($key == 'name') {
					$project_array['name'] = $value;
					//echo "Project Name:" . $project_array['name'];
			}
	}
}
//echo "<!-- <br><br>albumslist: ". $albumlist . "<br>-->";


if ($albumlist != '') {
////////////////////////////////  ALBUMS /////////////////////////////
$albumstr = 'https://ankrommoisan.openasset.com/REST/1/Albums?id=' .  $albumlist . '&files=all&limit=0&username=' . $oa_username .'&password=' . $oa_password;
//echo "albumstr:" . $albumstr;

$albumsarray = file_get_contents($albumstr);
$albums_decode = json_decode($albumsarray, TRUE);
//echo "<!-- albumsdecode: <pre>".var_dump($albums_decode)."</pre>-->";

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
							$fileslist.=$v['id'];
							$albums_array[$albumkey]['files'][] = $v['id'];
					}
			}
	} else {
			if ($key == 'name') {
					$albums_array[$albumkey]['album_name'] = $value;
			}

	}
}

//echo "<br> Album Name: " .$albums_array[$albumkey]['album_name'];
//echo "<br>fileslist: ". $fileslist . "<br>";

////////////////////////////////  FILES /////////////////////////////
$filesstr = 'https://ankrommoisan.openasset.com/REST/1/Files/?sizes=all&limit=0&orderBy=display_order&id='.$fileslist.'&username=' . $oa_username .'&password=' . $oa_password;
$filesarray = file_get_contents($filesstr);
$files_decode = json_decode($filesarray, TRUE);
$sizeslist = '';
$sizeslistweb = '';
foreach($files_decode as $filekey => $filevalue) {

	//echo '<br> filevalue[id]:'.$filevalue['id'];
	$thisfileid = $filevalue['id'];

	// get the photographer
	$files_array[$thisfileid]['photographer_id'] = $filevalue['photographer_id'];
	if (!in_array($filevalue['photographer_id'],$photographerslistarray)){
		$photographerslistarray[$thisfileid] = $filevalue['photographer_id'];
	}

	foreach($filevalue as $key => $value) {
	//echo '<br>filekey: '.$key.' filevalue:'.$value;
	if (is_array($value)) {
			foreach($value as $k => $v) {
					//echo '<br>k: '.$k.' v:'.$v;
					if ($key == 'sizes')  {
						if ($k ==0) {
							if ($sizeslist!='') {
								$sizeslist.=', ';
							}
							$sizeslist.=$v['http_root'].$v['relative_path'];
							$files_array[$thisfileid]['medium']=$v['http_root'].$v['relative_path'];;
							//echo '<br>k: '.$k.' v:'.$v. ' v[http_root]:'.$v['relative_path'];
						} else if ($k == 5) {
							if ($sizeslist!='') {
								$sizeslistweb.=', ';
							}
							$sizeslistweb.=$v['http_root'].$v['relative_path'];
							$files_array[$thisfileid]['webview']=$v['http_root'].$v['relative_path'];;
						}
					}
			}
	} else {
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

return array("project" => $project_array, "albums" => $albums_array, "files" => $files_array, "photographers" => $photographers_array);
}
}


// generate a slideshow for the website from and Open Asset album
function getOpenAssetAlbum($OA_albums,$project_id,$albumtype='overview',$size='medium',$offset=1){
	// if more than one match of this albumtype then offset determines which one to who
	// if albumtype =='any' then show any type of album based on offset
	if (($project_id!='') && (!empty($OA_albums))){
		/*
		 if (($size!='webview') && ($size!='medium')) {
			$size = 'webview';
		 }
		 */
		$count = 0; // count which match was made - and show if matches offset
		$html = '';
		foreach($OA_albums['albums'] as $album){
			$thisalbumname = $album['album_name'];
			if (($albumtype == 'any') || (strpos(strtolower($thisalbumname),strtolower($albumtype))!==false)) {
				$count++;
				if ($count == $offset) {
					foreach ($album['files'] as $file) {

							$thispic = $OA_albums['files'][$file][$size];

						if (($thispic != '') && ($thispic != 'undefined')) {

						$html.= '<div class="albumpic">
						';
						$html.= '<img src="'.$thispic.'">&nbsp;';
						$html.= '<br>' . $OA_albums['photographers'][$OA_albums['files'][$file]['photographer_id']];
						$html.= '</div>
						';

						}
					}
		    $html.= '<!-- from open asset -->
				';
				break;
				}
			}
		}
	}

	return $html;
}



// generate a slideshow for the website from and Open Asset album
function getOpenAssetSwiper($OA_albums,$project_id,$albumtype='overview ranked',$size='medium',$offset=1){
	//echo "<!-- albumtype: ".$albumtype." -->";
	// if more than one match of this albumtype then offset determines which one to who
	// if albumtype =='any' then show any type of album based on offset
	if (($project_id!='') && (!empty($OA_albums)))  {
		 /*if (($size!='webview') && ($size!='medium')) {
			$size = 'webview';
		 }*/
		$projectname = $OA_albums['project']['name'];
		$projectnamestr = str_replace('"',"'",$projectname); // make sure no quotes
		$count = 0; // count which match was made - and show if matches offset
		$html = '';
		foreach($OA_albums['albums'] as $album){
			$thisalbumname = $album['album_name'];
			//echo "<!-- searchihg for ".strtolower($albumtype). " in ".strtolower($thisalbumname)." -->";
			if (($albumtype == 'any') || (strpos(strtolower($thisalbumname),strtolower($albumtype))!==false)) {
				$count++;
				if ($count == $offset) {
					//echo "<!-- found ".strtolower($albumtype). " in ".strtolower($thisalbumname)." -->";

					foreach ($album['files'] as $file) {
							$thispicmedium = $OA_albums['files'][$file]['medium'];
							$thispic = $OA_albums['files'][$file][$size];

						if (($thispic != '') && ($thispic != 'undefined')) {

						$html.= '<div class="swiper-slide">
						';
						$html.= '<a data-fslightbox="gallery" href="'.$thispicmedium.'">';
						$html.= '
						<img src="'.$thispic.'" alt="Architecture Photo of '.$projectnamestr.'"></a>';
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
		    $html.= '<!-- from open asset -->
				';
				break;
				}
			}
		}
	}

	return $html;
}





// generate a slideshow for the website from and Open Asset album
function getOpenAssetSwiperTop($OA_albums,$project_id,$albumtype='overview ranked',$size='medium',$offset=1){
	// if more than one match of this albumtype then offset determines which one to who
	// if albumtype =='any' then show any type of album based on offset
	if ($project_id!='') {
		/* if (($size!='webview') && ($size!='medium')) {
			$size = 'webview';
		 } */
		$projectname = $OA_albums['project']['name'];
		$projectnamestr = str_replace('"',"'",$projectname); // make sure no quotes
		$count = 0; // count which match was made - and show if matches offset
		$html = '';
		if (isset($OA_albums['albums'])) {
		foreach($OA_albums['albums'] as $album){
			$thisalbumname = $album['album_name'];
			if (($albumtype == 'any') || (strpos(strtolower($thisalbumname),strtolower($albumtype))!==false)) {
				$count++;
				if ($count == $offset) {
					foreach ($album['files'] as $file) {
							//$thispicmedium = $OA_albums['files'][$file]['medium'];
							$thispic = $OA_albums['files'][$file][$size];

						if (($thispic != '') && ($thispic != 'undefined')) {

						$html.= '<div class="swiper-slide">
						';
						$html.= '<a data-fslightbox="gallerytop" href="'.$thispic.'">';
						$html.= '
						<img src="'.$thispic.'" alt="Architecture Photo of '.$projectnamestr.'"></a>';

						$photographer = $OA_albums['photographers'][$OA_albums['files'][$file]['photographer_id']];
						$copy = "";
						if ($photographer != '') {$copy = "&copy;&nbsp;";}
							$html.='<div class="photo_credit">';
									$html.='<p>'.$copy.$photographer.'</p>';
							$html.='</div>';
						$html.='</div>';
						}
					}
				$html.= '<!-- from open asset -->
				';
				break;
				}
			}
		}
	}
	}

	return $html;
}






/*
Example results

albums
array(3) {
  [0]=>
  array(2) {
    ["files"]=>
    array(10) {
      [0]=>
      int(62602)
      [1]=>
      int(62612)
      [2]=>
      int(62595)
      [3]=>
      int(62569)
      [4]=>
      int(62548)
      [5]=>
      int(62608)
      [6]=>
      int(62598)
      [7]=>
      int(62601)
      [8]=>
      int(62599)
      [9]=>
      int(62572)
    }
    ["album_name"]=>
    string(34) "Union on Broadway Interiors Ranked"
  }
  [1]=>
  array(2) {
    ["files"]=>
    array(10) {
      [0]=>
      int(62566)
      [1]=>
      int(62542)
      [2]=>
      int(62543)
      [3]=>
      int(62559)
      [4]=>
      int(62546)
      [5]=>
      int(62595)
      [6]=>
      int(62592)
      [7]=>
      int(62588)
      [8]=>
      int(62599)
      [9]=>
      int(62591)
    }
    ["album_name"]=>
    string(37) "Union on Broadway Architecture Ranked"
  }
  [2]=>
  array(2) {
    ["album_name"]=>
    string(33) "Union on Broadway Overview Ranked"
    ["files"]=>
    array(5) {
      [0]=>
      int(62542)
      [1]=>
      int(62553)
      [2]=>
      int(62606)
      [3]=>
      int(62599)
      [4]=>
      int(62602)
    }
  }
}

files
array(20) {
  [62548]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/6ff1c935e66a9fc43ad4fbf09a700534/194920_N18_jpg/194920_N18_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/6ff1c935e66a9fc43ad4fbf09a700534/194920_N18_jpg/194920_N18_webview.jpg"
  }
  [62569]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/81e8503c6063d7edc740c6c1e8477a0a/194920_N39_jpg/194920_N39_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/81e8503c6063d7edc740c6c1e8477a0a/194920_N39_jpg/194920_N39_webview.jpg"
  }
  [62572]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/a3214d6ccadd6804084f3f6cdb79ad11/194920_N42_jpg/194920_N42_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/a3214d6ccadd6804084f3f6cdb79ad11/194920_N42_jpg/194920_N42_webview.jpg"
  }
  [62595]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/eb2884d45ecf30a70ea26f90f6c539f6/194920_N65_jpg/194920_N65_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/eb2884d45ecf30a70ea26f90f6c539f6/194920_N65_jpg/194920_N65_webview.jpg"
  }
  [62598]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/1e87046a8482540f34df27a2f9fd37ba/194920_N68_jpg/194920_N68_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/1e87046a8482540f34df27a2f9fd37ba/194920_N68_jpg/194920_N68_webview.jpg"
  }
  [62599]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/225086d0832ec378853bbdb29538fad2/194920_N69_jpg/194920_N69_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/225086d0832ec378853bbdb29538fad2/194920_N69_jpg/194920_N69_webview.jpg"
  }
  [62601]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/ad99ae3992c37db0c06b568c029af28a/194920_N71_jpg/194920_N71_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/ad99ae3992c37db0c06b568c029af28a/194920_N71_jpg/194920_N71_webview.jpg"
  }
  [62602]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/ed12f70f509a33d9cfe88e51857a9087/194920_N72_jpg/194920_N72_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/ed12f70f509a33d9cfe88e51857a9087/194920_N72_jpg/194920_N72_webview.jpg"
  }
  [62608]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/0c839a02cf5673669c0b21a0e8998856/194920_N78_jpg/194920_N78_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/0c839a02cf5673669c0b21a0e8998856/194920_N78_jpg/194920_N78_webview.jpg"
  }
  [62612]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/0a23ce50c5a0d05321ab2ea6ef71b1b6/194920_N82_jpg/194920_N82_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/0a23ce50c5a0d05321ab2ea6ef71b1b6/194920_N82_jpg/194920_N82_webview.jpg"
  }
  [62542]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/d598c00dc2ab3d6715f91fbe14d1f7bb/194920_N12_jpg/194920_N12_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/d598c00dc2ab3d6715f91fbe14d1f7bb/194920_N12_jpg/194920_N12_webview.jpg"
  }
  [62543]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/21855fd1fe6fb46974f1aa6121421f76/194920_N13_jpg/194920_N13_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/21855fd1fe6fb46974f1aa6121421f76/194920_N13_jpg/194920_N13_webview.jpg"
  }
  [62546]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/7372e1becd7daf34b8e260ee3a49d4c1/194920_N16_jpg/194920_N16_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/7372e1becd7daf34b8e260ee3a49d4c1/194920_N16_jpg/194920_N16_webview.jpg"
  }
  [62559]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/011c5b712bd863718021329ddbac109f/194920_N29_jpg/194920_N29_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/011c5b712bd863718021329ddbac109f/194920_N29_jpg/194920_N29_webview.jpg"
  }
  [62566]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/996ad1dfc6853a359c9d01d4f4595b80/194920_N36_jpg/194920_N36_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/996ad1dfc6853a359c9d01d4f4595b80/194920_N36_jpg/194920_N36_webview.jpg"
  }
  [62588]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/c47473616c7fc19b31ee97ff84131d41/194920_N58_jpg/194920_N58_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/c47473616c7fc19b31ee97ff84131d41/194920_N58_jpg/194920_N58_webview.jpg"
  }
  [62591]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/934ae9c6c9e8a6e2b2ee0015c574b444/194920_N61_jpg/194920_N61_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/934ae9c6c9e8a6e2b2ee0015c574b444/194920_N61_jpg/194920_N61_webview.jpg"
  }
  [62592]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/22bbe64ba75a3d048ad2102e229ed91a/194920_N62_jpg/194920_N62_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/22bbe64ba75a3d048ad2102e229ed91a/194920_N62_jpg/194920_N62_webview.jpg"
  }
  [62553]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/e13541e0c38230b0082b360e7c22e19d/194920_N23_jpg/194920_N23_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/e13541e0c38230b0082b360e7c22e19d/194920_N23_jpg/194920_N23_webview.jpg"
  }
  [62606]=>
  array(3) {
    ["photographer_id"]=>
    int(354)
    ["medium"]=>
    string(99) "//data.openasset.com/bf39d439/49d1fd3ff0b2c83512915a8ca123bf9e/194920_N76_jpg/194920_N76_medium.jpg"
    ["webview"]=>
    string(100) "//data.openasset.com/bf39d439/49d1fd3ff0b2c83512915a8ca123bf9e/194920_N76_jpg/194920_N76_webview.jpg"
  }
}

photographers
array(1) {
  [354]=>
  string(11) "Pete Eckert"
}

*/