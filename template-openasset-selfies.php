<?php
/**
 * Template Name: OpenAsset Selfies
 * Template Post Type: page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */



get_header();
?>



	<main id="primary" class="site-main">


<?php

			$getalbum_id = $_GET['album_id'];
			// sanitize_text_field
			$album_id = filter_var($getalbum_id, FILTER_SANITIZE_NUMBER_INT); // filter input

			$order = $_GET['order'];

			if ($album_id=='') {
				$album_id = 5645; // selfies album
			}


		while ( have_posts() ) { // :
			the_post();

		the_content();
						//get_template_part( 'template-parts/content', get_post_type() );

	?>


	<div id="dashboard-header"><h1><a href="/"><img src="https://ankrommoisan.com/wp-content/uploads/2023/03/AnkromMoisan-Logo-300x176.jpg" id="dashboard-logo" title="Ankrom Moisan Architects" alt="Ankrom Moisan Architects"></a>&nbsp;Open Asset Album</h1></div>


</div>


		<?php



				//$content = apply_filters( 'the_content', get_the_content() );
		   //echo $content;
			//get_template_part( 'template-parts/content', get_post_type() );


// GET THE PROJECT VIA PHP

include "functions_openassets_album.php";

$OA_album = getOpenAssetsAlbumsByID($album_id,$order,true);

echo "<h1>Open Asset Album: " . $OA_album['albumname']  . "</h1>";


//echo "<pre>". print_r($OA_album,true) . "</pre>";

$files = $OA_album['files'];

foreach ($files as $file) {
		//echo "<br<br>a:" . $file['webview'];
		$thisfilename = $file['original_filename'];
		$thisname	= str_replace("_SQ_Selfie.jpg","", $thisfilename);
		$thisname	= str_replace("_SQ_Selfie.jpeg","", $thisname);
		$thisname	= str_replace("_SQ_Selfie.png","", $thisname);
		$thisname	= str_replace("_Selfie.png","", $thisname);
		$thisname	= str_replace("_SQ_Selfie 2.jpg","", $thisname);

		$caption = $file['caption'];



		echo '<div class="albumpicdiv"><img src="' .$file['webview']. '" class="albumpicimg" ><br>'.$caption.'<br>'.$thisname.'<br>'.$thisfilename.'</div>';

//		echo "<br>b:" . $file[0]['webview'];
//		echo "<br>c:" . $file->'webview';

}


echo $OA_album['debughtml'];

} ?>

		
<?php /////////////////////////////////////////  End Open Asset Albums ////////////////////////////// ?>


	</main><!-- #main -->


<style>

div#main_menu_wrap {
			display: none;
}
body.admin-bar .breadcrumbs {
    display: none;
}

#dashboard-header {
	margin-top:20px;
	margin-bottom:20px;
}
#dashboard-logo{
	height:100px;
}

.albumpicdiv {
	display: inline-block;
	margin:10px;
}

.albumpicimg{
		width:200px;
		height:auto;
}

</style>





<p><br><br></p>
<p><br><br></p>
<p><br><br></p>

<?php 
// get_footer();


// reference https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_promises#chaining
?>

<?php

/*
Array
(
    [albums] => Array
        (
            [0] => Array
                (
                    [files] => Array
                        (
                            [0] => 63292
                            [1] => 63294
                            [2] => 63295
                            [3] => 63296
                            [4] => 63376
                            [5] => 63377
                            [6] => 63381
                            [7] => 63382
                            [8] => 63383
                            [9] => 63396
                            [10] => 63397
                            [11] => 63398
                            [12] => 63399
                            [13] => 63400
                            [14] => 63401
                            [15] => 63402
                            [16] => 63403
                            [17] => 63404
                            [18] => 63405
                            [19] => 63406
                            [20] => 63407
                            [21] => 63408
                            [22] => 63409
                            [23] => 63411
                            [24] => 63412
                            [25] => 63413
                            [26] => 63414
                            [27] => 63415
                            [28] => 63416
                            [29] => 63417
                            [30] => 63418
                            [31] => 63419
                            [32] => 63420
                            [33] => 63421
                            [34] => 63422
                            [35] => 63423
                            [36] => 63424
                            [37] => 63425
                            [38] => 63426
                            [39] => 63427
                            [40] => 63540
                            [41] => 63541
                            [42] => 63542
                            [43] => 63543
                            [44] => 63544
                            [45] => 63549
                            [46] => 63550
                            [47] => 63551
                            [48] => 63552
                            [49] => 63553
                            [50] => 63554
                            [51] => 63555
                            [52] => 63556
                            [53] => 63557
                            [54] => 63558
                            [55] => 63559
                        )

                    [album_name] => SELFIES
                )

        )

    [files] => Array
        (
            [63292] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/891d621d9f7311c97cd3e3eeb32d976f/S_230307_jpg/S_230307_medium.jpg
                    [webview] => //data.openasset.com/bf39d439/891d621d9f7311c97cd3e3eeb32d976f/S_230307_jpg/S_230307_webview.jpg
                )

            [63294] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/4a495deb657ad4cab3e5b0a4f74b40a6/S_230307_N3_jpg/S_230307_N3_medium.jpg
                    [webview] => //data.openasset.com/bf39d439/4a495deb657ad4cab3e5b0a4f74b40a6/S_230307_N3_jpg/S_230307_N3_webview.jpg
                )

            [63295] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/e10d9f258bb731600da737ac0d835fee/S_230307_N4_jpg/S_230307_N4_medium.jpg
                    [webview] => //data.openasset.com/bf39d439/e10d9f258bb731600da737ac0d835fee/S_230307_N4_jpg/S_230307_N4_webview.jpg
                )

            [63296] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/a89fa01260eb55dcfef287714daa6c68/S_230307_N5_png/S_230307_N5_medium.jpg
                    [webview] => //data.openasset.com/bf39d439/a89fa01260eb55dcfef287714daa6c68/S_230307_N5_png/S_230307_N5_webview.jpg
                )

            [63376] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/0a3e62168cc6e5d50cc5d256bff819f9/S_230317.jpg
                )

            [63377] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/f63c42b8ef011be5cb69fb24374e4ffd/S_230317_N2.jpg
                )

            [63381] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/7d82faf23f63eff0064bd3fc47efe922/S_230317_N3.png
                )

            [63382] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/bfd8ef5a688270c4576c3960876b338c/S_230317_N4.jpg
                )

            [63383] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/e44a654d6b1fc0640468ba097871459f/S_230317_N5.jpg
                )

            [63396] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/4562574638f611877ea113d455b4bcab/S_230317_N16.jpg
                )

            [63397] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/a0b8b5c986cb4ecb6a0e6e7504006567/S_230317_N17.jpg
                )

            [63398] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/d8b13154abd0b9a3dd5d4efb6ac48437/S_230317_N18.jpg
                )

            [63399] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/311281d6f53722ce3f8b614ccb3c469c/S_230317_N19.jpg
                )

            [63400] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/03433d184e1d60a41bcefdfe663a3d68/S_230317_N20.jpg
                )

            [63401] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/ca21886a5051d63af8ef4221c0b796f9/S_230317_N21.jpg
                )

            [63402] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/e299341ca4fc6ada11e3460b044e0e64/S_230317_N22.jpg
                )

            [63403] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/f613aef4226025b38ff4ac8ee884c28b/S_230317_N23.jpg
                )

            [63404] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/e57b70df2d2aa92d48f5581698fa75d9/S_230317_N24.jpg
                )

            [63405] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/4d6b19427193250b3e86f139903f0e57/S_230317_N25.jpg
                )

            [63406] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/5cba080a2de69cf02d02534b7b504f99/S_230320.jpg
                )

            [63407] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/27d602c8a21ebd4966793662a89645d6/S_230320_N2.jpg
                )

            [63408] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/abec91d9f3dea07f74eb625ea078f240/S_230320_N3.jpg
                )

            [63409] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/9ef29b207ad42ee2bbb0624f801f5dcc/S_230320_N4.jpg
                )

            [63411] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/127d712fc4b632c9f70e31fc38e5bd32/S_230320_N6.jpg
                )

            [63412] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/123d7e471730a067a96bb2644d27299f/S_230320_N7.jpg
                )

            [63413] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/642affd531d64f6c07a7c441ef3e29ca/S_230320_N8.jpg
                )

            [63414] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/d4e72e7a0bde4b0dd3f5ad5a6ac8ed48/S_230320_N9.jpg
                )

            [63415] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/9f0c75cb0eeb9492e13f60d051ee467a/S_230320_N10.jpg
                )

            [63416] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/63870b6984608323b8b020e29654f4aa/S_230320_N11.jpg
                )

            [63417] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/6796d1ceaff2b50cce68c34c200beaec/S_230320_N12.jpg
                )

            [63418] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/ddf9b49c54eefd0614b277bba9d7a779/S_230320_N13.jpg
                )

            [63419] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/d932f71e9c58e08b79e066cb4ee96642/S_230320_N14.jpg
                )

            [63420] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/3471c539ab6bc18695bd3002c42895b3/S_230320_N15.jpg
                )

            [63421] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/bf2742513bcd07248360366b260288bd/S_230320_N16.jpg
                )

            [63422] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/fb9e225240603905b63f5a76d8047a01/S_230320_N17.jpg
                )

            [63423] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/4bca8ac0bd1ca695bc8c6a4c88f1bb6e/S_230320_N18.jpg
                )

            [63424] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/533c650bc98e830a0a63d7219c93c438/S_230320_N19.jpg
                )

            [63425] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/0ecc3d1c31d714e91f4ebc9aaa1b35d3/S_230320_N20.jpg
                )

            [63426] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/fcc3c3325b499e60bbd612152e3e5f0b/S_230320_N21.png
                )

            [63427] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/2a5d6361e7dfbbda810596b5654f8ea8/S_230320_N22.jpg
                )

            [63540] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/56699a2f50ee11e81d14359a29caa982/S_230321.jpg
                )

            [63541] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/490777fe46f8cde2a8794ac0c7438809/S_230321_N2.jpg
                )

            [63542] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/18751e441c84e457c8716348be26b9bd/S_230321_N3.jpg
                )

            [63543] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/9f3faa14a83686fd027a6f76e58841f6/S_230321_N4.jpg
                )

            [63544] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/e7f1e4c19d545b02a6ca5e448075645b/S_230321_N5.jpg
                )

            [63549] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/cabd594c89a953709fbc0990a49cb098/S_230321_N6.jpg
                )

            [63550] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/21728b57b55edc81f7661564c0c01f75/S_230321_N7.jpg
                )

            [63551] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/f58ca6d2facc59bf4def26d8f5c8e6e2/S_230321_N8.jpg
                )

            [63552] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/0bb5e4d3f5fed3fb1753b90ae654cffb/S_230321_N9.jpg
                )

            [63553] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/c56a8aa0397fd6cff645acd27445c7e8/S_230321_N10.jpg
                )

            [63554] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/19eb1e586651c1cbd2bdccf4adff0bb5/S_230321_N11.jpg
                )

            [63555] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/6b14dcbdb19aee0283a65d7ffd72c0d2/S_230321_N12.jpg
                )

            [63556] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/cb19867368b2f28979e2f3643e3c1231/S_230321_N13.jpg
                )

            [63557] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/1e6798333bc18c5ac0d7b9cd8e6a0a03/S_230321_N14.jpg
                )

            [63558] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/96eaedac56aa58c5279501bf02147657/S_230321_N15.jpg
                )

            [63559] => Array
                (
                    [photographer_id] => 0
                    [medium] => //data.openasset.com/bf39d439/11450e5fe74307bac3d61d3e649052d1/S_230321_N16.jpg
                )

        )

    [photographers] => Array
        (
        )


*/

?>