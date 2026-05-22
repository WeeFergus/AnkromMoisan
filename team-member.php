<?php

/* Template Name: Team Member
   Template Post Type: team_project
*/
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ankrom_Moisan
 */

get_header(); ?>

<?php
while (have_rows('fetch_data')) {
  the_row();
  $employeeid = get_sub_field('project_id');
}

function getProjectIds()
{
  $OAprojects_slugs = []; // map OA projects to website project slugs

  $args = [
    'post_type' => 'portfolio_project',
    'limit' => -1,
  ];
  $the_query = new WP_Query($args);
  if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
      $the_query->the_post();
      $thisid = get_the_ID();
      global $post;
      $slug = $post->post_name;
      while (have_rows('fetch_data')) {
        the_row();
        $OAprojectid = get_sub_field('project_id'); // get the OA Project ID
      }
      $OAprojects_slugs[$OAprojectid] = $slug;
    }
  }
  return $OAprojects_slugs;
}
$OAprojects = getProjectIds();
//echo "<!--- OAprojects: <pre>".print_r( $OAprojects,true)."</pre> -->";

function getOpenAssetsEmployeeByID($employeeid, $debug)
{
  $oa_username = 'website_front_end';
  $oa_password = 'ankrom';

  $employees_array = []; // this will have the array of employees with all the needed info for the sliders

  $files_array = []; // this will store all the detailed image information
  $files_array_sorted = []; // this will store all the detailed image information - in the right order

  $photographers_array = []; // stores the photographers
  $photographerslistarray = []; // for keeping track of the photographers

  $debughtml = '';

  //$debughtml.= "<br><br>employeeid: ". $employeeid . "<br>";

  if ($employeeid != '') {
    ////////////////////////////////  EMPLOYEES /////////////////////////////
    $employeestr =
      'https://ankrommoisan.openasset.com/REST/1/Employees?id=' .
      $employeeid .
      '&files=all&projects=all&username=' .
      $oa_username .
      '&orderBy=' .
      $order .
      '&password=' .
      $oa_password;
    // https://ankrommoisan.openasset.com/REST/1/Employees?id=1169&files=all&limit=0&username=website_front_end&password=ankrom
    $debughtml .= 'employeestr:' . $employeestr;

    $employeesarray = file_get_contents($employeestr);
    $employees_decode = json_decode($employeesarray, true);
    //echo "<!-- employees_decode:<pre>".print_r($employees_decode,true)."</pre>-->";

    foreach ($employees_decode as $employeekey => $employeevalue) {
      $fileslist = '';

      foreach ($employeevalue as $key => $value) {
        //echo '<!--<br>key: '.$key.' value:'.$value."-->";
        if (is_array($value)) {
          if ($key == 'files') {
            foreach ($value as $k => $v) {
              //echo '<!--<br>files k: '.$k.' v:'.print_r($v,true)."-->";
              if ($fileslist != '') {
                $fileslist .= ',';
              }
              $thisemployeefileid = $v['id'];
              $fileslist .= $thisemployeefileid;
              $employees_array[$employeekey]['files'][] = $thisemployeefileid;
              $files_array_sorted[$thisemployeefileid][
                'fileid'
              ] = $thisemployeefileid;
            }
          }
        } else {
          $employees_array[$key] = $value;
          if ($key == 'name') {
            $employees_array[$employeekey]['employee_name'] = $value;
          }
        }
      }

      $employeename = $employees_array[$employeekey]['employee_name'];

      $debughtml .= '<br> Employee Name: ' . $employeename;

      ////////////////////////////////  PROJECTS /////////////////////////////

      //$projectsstr = 'https://ankrommoisan.openasset.com/REST/1/Employees?id='.$employeeid.'&projects=all&fields=projects&username=' . $oa_username .'&password=' . $oa_password;
      //$projectsarray = file_get_contents($projectsstr);
      //$projects_decode = json_decode($projectsarray, TRUE);

      //$debughtml.= "<br>".$projectsstr."<br>";
      //echo '<!-- <br>projectsstr:'.$projectsstr."-->";
      //echo '<!-- <br><br>projects_decode:<pre>'.print_r($projects_decode,true)."</pre>-->";

      $projectslist = []; // list of projects by this person
      $projectsdetails = []; // start an array of projecs details
      //echo "<!--projects_decode:".print_r($projects_decode[0]['projects'],true)." -->";

      $projects = $employees_decode[0]['projects'];
      //$projects = $projects_decode[0]['projects'];

      if (is_array($projects)) {
        foreach ($projects as $proj) {
          $projid = $proj['id'];
          $projectslist[] = $projid;
          $projectsdetails[$projid]['id'] = $projid;
          $roles = $proj['roles'];
          $projectsdetails[$projid]['project_role'] =
            $roles['rows'][0]['project_role'];
        }
      }

      $projectsliststr = implode(',', $projectslist);
      //echo "<!-- projectsliststr:".$projectsliststr."-->";

      $projectsdetailsstr =
        'https://ankrommoisan.openasset.com/REST/1/Projects?id=' .
        $projectsliststr .
        '&albums=all&username=' .
        $oa_username .
        '&password=' .
        $oa_password;
      $projectsdetailsarray = file_get_contents($projectsdetailsstr);
      $projectsdetails_decode = json_decode($projectsdetailsarray, true);

      //echo  "<!-- projectsdetailsstr:".$projectsdetailsstr." -->";
      //echo "<!--projectsdetails_decode:".print_r($projectsdetails_decode,true)." -->";

      $albumlistarray = [];

      //////////////// BIG LOOP ///////////////////////
      if (is_array($projectsdetails_decode)) {
        foreach ($projectsdetails_decode as $details) {
          $projectid = $details['id']; // get the id of this project
          $projectsdetails[$projectid]['name'] = $details['name'];
          $projectsdetails[$projectid]['id'] = $projectid;
          $album1 = $details['albums'][0]['id'];
          //$albumlistarray[] = $album1;
          //$projectsdetails[$projectid]['album1'] = $album1; // first album id

          //$albumlist = implode(",",$albumlistarray);

          if ($album1 != '') {
            ////////////////////////////////  ALBUMS /////////////////////////////
            $albumstr =
              'https://ankrommoisan.openasset.com/REST/1/Albums?id=' .
              $album1 .
              '&files=all&limit=0&username=' .
              $oa_username .
              '&password=' .
              $oa_password;
            //echo "<!-- albumstr:" . $albumstr."-->";

            $albumsarray = file_get_contents($albumstr);
            $albums_decode = json_decode($albumsarray, true);
            //echo "<!-- albums_decode<pre>".print_r($albums_decode,true)."</pre>-->";
            $thisfileid = $albums_decode[0]['files'][0]['id'];

            ////////////////////////////////  PROJECT ALBUM FILES /////////////////////////////
            $albumfilesstr =
              'https://ankrommoisan.openasset.com/REST/1/Files/?sizes=all&limit=0&orderBy=display_order&id=' .
              $thisfileid .
              '&username=' .
              $oa_username .
              '&password=' .
              $oa_password;
            $albumfilesarray = file_get_contents($albumfilesstr);
            $albumfiles_decode = json_decode($albumfilesarray, true);
            //echo "<!-- albumfiles_decode:<pre>".print_r($albumfiles_decode,true)."</pre>-->";
            $albumfirstpic =
              $albumfiles_decode[0]['sizes'][0]['http_root'] .
              $albumfiles_decode[0]['sizes'][0]['http_relative_path'];
            $projectsdetails[$projectid]['pic1'] = $albumfirstpic; // first album pic
          }
        }
      }
      //////////////// END BIG LOOP ///////////////////////

      //echo "<!-- projectsdetails:<pre>".print_r($projectsdetails,true)."</pre> -->";

      ////////////////////////////////  EMPLOYEE FILES /////////////////////////////
      $filesstr =
        'https://ankrommoisan.openasset.com/REST/1/Files/?sizes=all&limit=0&orderBy=' .
        $order .
        '&id=' .
        $fileslist .
        '&username=' .
        $oa_username .
        '&password=' .
        $oa_password;
      //echo "<!-- filesstr:".$filesstr."  -->";
      $filesarray = file_get_contents($filesstr);
      $files_decode = json_decode($filesarray, true);
      $sizeslist = '';
      $sizeslistweb = '';

      $debughtml .= '<br>' . $filesstr . '<br>';

      foreach ($files_decode as $filekey => $filevalue) {
        $debughtml .= '<br> filevalue[id]:' . $filevalue['id'];
        $thisfileid = $filevalue['id'];

        // get the rank
        $files_array_sorted[$thisfileid]['rank'] = $filevalue['rank'];

        // get the photographer
        $files_array[$thisfileid]['photographer_id'] =
          $filevalue['photographer_id'];
        $files_array_sorted[$thisfileid]['photographer_id'] =
          $filevalue['photographer_id'];
        if (!in_array($filevalue['photographer_id'], $photographerslistarray)) {
          $photographerslistarray[$thisfileid] = $filevalue['photographer_id'];
        }

        // original_filename
        $files_array[$thisfileid]['original_filename'] =
          $filevalue['original_filename'];
        $files_array_sorted[$thisfileid]['original_filename'] =
          $filevalue['original_filename'];
        // caption
        $files_array[$thisfileid]['caption'] = $filevalue['caption'];
        $files_array_sorted[$thisfileid]['caption'] = $filevalue['caption'];

        foreach ($filevalue as $key => $value) {
          $caption = '';
          $debughtml .= '<br>filekey: ' . $key . ' filevalue:' . $value;
          //echo "<!-- filekey:".$key." filevalue:".$value."  -->";

          if (is_array($value)) {
            foreach ($value as $k => $v) {
              $debughtml .=
                '<br>k: ' . $k . ' v:<pre>' . print_r($v, true) . '</pre>';
              if ($key == 'sizes') {
                if ($k == 0) {
                  if ($sizeslist != '') {
                    $sizeslist .= ', ';
                  }
                  $sizeslist .= $v['http_root'] . $v['relative_path'];
                  $files_array[$thisfileid]['medium'] =
                    $v['http_root'] . $v['relative_path'];
                  $files_array_sorted[$thisfileid]['medium'] =
                    $v['http_root'] . $v['relative_path'];
                  $debughtml .=
                    '<br>k: ' .
                    $k .
                    ' v:' .
                    $v .
                    ' v[http_root]:' .
                    $v['relative_path'];
                } elseif ($k == 4) {
                  //when there are just 4 sizes then the 4th one is webview
                  if ($sizeslist != '') {
                    $sizeslistweb .= ', ';
                  }
                  $sizeslistweb .= $v['http_root'] . $v['relative_path'];
                  $files_array[$thisfileid]['webview'] =
                    $v['http_root'] . $v['relative_path'];
                  $files_array_sorted[$thisfileid]['webview'] =
                    $v['http_root'] . $v['relative_path'];
                } elseif ($k == 5) {
                  //when there are 5 sizes then the 5th one is webview
                  if ($sizeslist != '') {
                    $sizeslistweb .= ', ';
                  }
                  $sizeslistweb .= $v['http_root'] . $v['relative_path'];
                  $files_array[$thisfileid]['webview'] =
                    $v['http_root'] . $v['relative_path'];
                  $files_array_sorted[$thisfileid]['webview'] =
                    $v['http_root'] . $v['relative_path'];
                }
              }
            }
          } else {
            if ($key == 'caption') {
              $caption = $value;
              $files_array[$thisfileid]['caption'] = $caption;
              $files_array_sorted[$thisfileid]['caption'] = $caption;
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
    $photographerslist = implode(',', $photographerslistarray);
    //echo "<br>photographerslist:" . $photographerslist;
    if ($photographerslist != '') {
      $phstr =
        'https://ankrommoisan.openasset.com/REST/1/Photographers/?id=' .
        $photographerslist .
        '&username=' .
        $oa_username .
        '&password=' .
        $oa_password;
      $pharray = file_get_contents($phstr);
      $ph_decode = json_decode($pharray, true);
      foreach ($ph_decode as $phkey => $phvalue) {
        $photographers_array[$phvalue['id']] = $phvalue['name'];
        //echo "<br>photographer id: " . $phvalue['id'] . " name: "  . $phvalue['name'];
      }
    }
  }

  if (!$debug) {
    $debughtml = ''; // erase debug if not set to true
  }

  return [
    'employeename' => $employeename,
    'employees' => $employees_array,
    'files' => $files_array_sorted,
    'projects' => $projectsdetails,
    'debughtml' => $debughtml,
  ];
}
$pics = []; // list of people page pics - with caption = name
$pics[0] = '';

$employee = getOpenAssetsEmployeeByID($employeeid, false);
$name = $employee['employeename'];
// echo "<br><br><br>Name: ".$name."<br>";
//echo "Debug:".$employee['debughtml']."<br>";

$caption = '';
foreach ($employee['files'] as $file) {
  foreach ($file as $key => $value) {
    // use rank 2 for Selfie - rank 3 for People pics
    if ($file['rank'] == '2') {
      if ($key == 'webview') {
        $pics[0] = $value;
      }
    } elseif ($file['rank'] == '3') {
      if ($key == 'caption') {
        $caption = $value;
      }
      if ($key == 'webview') {
        $pics[] = $value;
      }
    }
  }
}

echo '<div id="employee-div">';

echo '<div class="section0">';
// spacer
echo '</div>';

echo '<div class="section1">';
//echo '<img src="'.$employee['files']['webview'].'" class="employee-pic"><br>';

echo '<div id="picdiv">';
echo '<img src="' . $pics[0] . '" class="employee-pic">'; // show the first pic
echo '</div>';

echo '<div class="employee-name">' . $employee['employees']['name'];

echo '<div id="socialdiv">';
if ($employee['employees']['people_pages_social_media_linked_in'] != '') {
  echo '<div class="employee-social"><a href="' .
    $employee['employees']['people_pages_social_media_linked_in'] .
    '" target="_blank" title="Linked In"><span class="dashicons dashicons-linkedin"></span></a></div>';
}
if ($employee['employees']['people_pages_social_media_instagram'] != '') {
  echo '<div class="employee-social"><a href="' .
    $employee['employees']['people_pages_social_media_instagram'] .
    '" target="_blank" title="Instagram"><span class="dashicons dashicons-instagram"></span></a></div>';
}
if ($employee['employees']['people_pages_social_media_facebook'] != '') {
  echo '<div class="employee-social"><a href="' .
    $employee['employees']['people_pages_social_media_facebook'] .
    '" target="_blank" title="Facebook"><span class="dashicons dashicons-facebook"></span></i></a></div>';
}
echo '</div>';
echo '</div>';
echo '<div class="employee-title">' .
  $employee['employees']['title'] .
  '</div>';

echo '</div>';

echo '<div class="section2">';
echo '<div class="divider1"></div>';
echo '<div class="employee-quote">' .
  $employee['employees']['people_pages_quote'] .
  '</div>';

$answer = [];
$answer[] = $employee['employees']['people_pages_answer1'];
$answer[] = $employee['employees']['people_pages_answer2'];
$answer[] = $employee['employees']['people_pages_answer3'];
$answer[] = $employee['employees']['people_pages_answer4'];
$answer[] = $employee['employees']['people_pages_answer5'];
shuffle($answer); // randomize!

echo '<div class="employee-answer">' . $answer[0] . '</div>';
echo '<div class="employee-answer">' . $answer[1] . '</div>';
echo '<div class="employee-answer">' . $answer[2] . '</div>';
echo '<div class="employee-answer">' . $answer[3] . '</div>';
echo '<div class="employee-answer">' . $answer[4] . '</div>';
echo '</div>';

echo '<div class="section3">';
if ($pics[1] != '') {
  echo '<img src="' . $pics[1] . '" class="people-pic">';
} // show the people pic
if ($pics[2] != '') {
  echo '<img src="' . $pics[2] . '" class="people-pic">';
} // show the people pic
if ($pics[3] != '') {
  echo '<img src="' . $pics[3] . '" class="people-pic">';
} // show the people pic
echo '</div>';

$countprojects = 0;

if (!empty($employee['projects'])) {
  // only look at projects if the array is not empty

  foreach ($employee['projects'] as $proj) {
    $thisprojslug = $OAprojects[$proj['id']];
    $thisprojname = $OAprojects[$proj['name']];
    $thisprojlink = '/projects/' . $thisprojslug;

    if ($thisprojslug != '' && $proj['pic1'] != '') {
      $countprojects++;
    }
  }

  if ($countprojects > 0) {
    echo '<div class="divider2"></div>';
    echo '<div class="section4">';
    echo '<div class="header projects-header">Project Highlights</div>';

    foreach ($employee['projects'] as $proj) {
      $thisprojslug = $OAprojects[$proj['id']];
      $thisprojname = $OAprojects[$proj['name']];
      $thisprojlink = '/projects/' . $thisprojslug;

      if ($thisprojslug != '' && $proj['pic1'] != '') {
        echo '<div class="projectdiv">';
        echo '<a href="' .
          $thisprojlink .
          '"><img src="' .
          $proj['pic1'] .
          '" class="albumpic"></a><br>';
        echo '<a href="' .
          $thisprojlink .
          '" class="arrow_wrap">' .
          $proj['name'];
        echo '<div id="cta_arrow"><span class="arrow_right primera black"></span><span class="arrow_right segunda black"></span></div>';
        echo '</a>';
        echo '</div>';
      } elseif ($proj['pic1'] != '') {
        echo '<div class="projectdiv">';
        echo '<img src="' . $proj['pic1'] . '" class="albumpic"><br>';
        echo '<div class="arrow_wrap_text">' . $proj['name'];
        echo '</div>';
        echo '</div>';
      }
      //echo '<div class="projectrolediv">'.$proj['project_role']."</div><br>";
    }
    echo '</div>';
  }
}

echo '</div>';

echo '<br><br><br><br><br><br>';

//echo "<!-- employees: <pre>".print_r($employee['employees'],true)."</pre>-->";
// echo "<!-- employee['projects']:<pre>".print_r($employee['projects'],true)."</pre>-->";

/*
$i = 0;
foreach($employee['files'] as $file){
	foreach($file as $key => $value){

		if ($key == 'webview') {
			$i++;
		  if ($i > 0) {
			echo '<img src="'.$value.'" class="employee-pic"><br>';
		  }
		}

	}
}
*/

/*
foreach($employee['employees'] as $key => $value){
	echo $key.":".$value."<br>";
}
*/

//echo "employees:<pre>".print_r($employee['employees'],true)."</pre><br>";
//echo "files:<pre>".print_r($employee['files'],true)."</pre><br>";
?>

<style>
.section0{
	height:80px;
	width:1000px;
	margin:auto;
}
.section1{
	display:inline-block;
	max-width:440px;
	width:100%;
	padding:10px 0px;
	text-align:left;
	vertical-align: top;
}
.section2{
    padding:10px 50px;
	display:inline-block;
	max-width:570px;
	width:100%;
	vertical-align: top;
}
.section3{
	display: block;
    text-align: center;
    margin: 10px auto 0px;
    width: 100%;
	max-width:1000px;
    padding: 20px 0px;
}

.section3 img {
  display: inline-block;
}
.section4{
	width:100%;
	max-width:1000px;
	margin:auto;
	padding-top:10px;
	text-align: left;
	display:none; /* hide for now */
}
#employee-div{
	width:90%;
	text-align:center;
	margin:auto;
}

#picdiv{
	margin:0 0 14px 0;
	padding:0;
}
.employee-pic{
	width: 400px;
    height: 400px;
    object-fit: cover;
}

.people-pic{
	width: 320px;
    height: 320px;
	object-fit:cover;
	margin-bottom:10px;
}



.people-pic:nth-of-type(1){
	margin:0px 20px 10px 0px;
}
.people-pic:nth-of-type(2){
	margin:0px 20px 10px 0px;
}
.employee-name{
 font-weight:700;
 font-size: 22px;
 text-transform: uppercase;
 text-align:left;
 max-width: 400px;

}
.divider1{
	width:100%;
	border-top:2px solid #333;
	height:3px;
	display:inline-block;
	margin-bottom:10px;
}
.divider2{
	width:1000px;
	border-top:2px solid #333;
	height:3px;
	display:none; /* hide for now */  /*inline-block;*/
	margin-top: 10px;
	margin-bottom:10px;
}
.employee-title{
 font-size:20px;
 text-align:left;
 margin-bottom:20px;
}

#socialdiv {
    /* display: inline; */
    float: right;
}
.employee-social{
	background: #000;
    padding: 5px 0px 0px 5px;
    display: inline-block;
    float: right;
    margin-top: 4px;
    margin-left: 10px;
    width: 30px;
    height: 30px;
    /*font-size: 30px !important;*/
    color: #fff;
    border-radius: 50%;
	transition:.2s;
}
.employee-social:hover{
	background: #fff;
    color: #000;
}
.employee-answer{
	font-size:17px;
	margin-bottom:20px;
	text-align:left;
}
.employee-quote{
	font-size:24px;
	line-height:30px;
	text-align:center;
	margin-top:30px;
	margin-bottom:40px;
}

.projectdiv{
	display:inline-block;
	width:340px;
	text-align:left;
	font-weight:700;
	vertical-align: top;
}

.projectrolediv{
	font-weight:500;
}
.projects-header {
    margin-bottom: 26px;
    text-align: left;
    font-weight: 400 !important;
    font-size: 36px !important;
}

.albumpic{
	width: 320px;
    height: 320px;
	object-fit:cover;
}
.albumpic:nth-of-type(1){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(2){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(4){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(5){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(7){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(8){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(10){
	margin:0px 20px 0px 0px;
}
.albumpic:nth-of-type(11){
	margin:0px 20px 0px 0px;
}

a.arrow_wrap, .arrow_wrap_text {
   line-height: 20px;
   height:60px;
   margin-top:10px;
   display: inline-block;
   vertical-align: middle;
   text-transform: uppercase;
   width:320px;

}
#cta_arrow {
    display: inline-block;
    margin-top: -6px;
    width: 30px;
    float: right;
    position: relative;
}
.arrow_right {
    width: 18px;
    height: 18px;
}


/* /////////////////// TABLET ///////////////// */
@media(max-width:1200px){

	.section3 {
		max-width: 560px;
	}

}

/* /////////////////// MOBILE ///////////////// */
@media(max-width:1060px){
	.section1{
		margin-top:16px;
	}
	.section2{
		padding:10px 0px;
	}
	.section4{
		text-align:center;
		width:90%;
	}
	.people-pic:nth-of-type(1){
		margin:0px 0px 10px 0px;
	}
	.people-pic:nth-of-type(2){
		margin:0px 0px 10px 0px;
	}
	.employee-pic{
		width: 100%;
		height: 100%;
	}
}
</style>

<?php if (strstr($_SERVER['REQUEST_URI'], 'oregon') == true):
  $officeText = 'Portland based';
  $officePhone = '(503) 245-7100';
elseif (strstr($_SERVER['REQUEST_URI'], 'washington') == true):
  $officeText = 'Seattle based';
  $officePhone = '(206) 576-1600';
elseif (strstr($_SERVER['REQUEST_URI'], 'california') == true):
  $officeText = 'San Francisco based';
  $officePhone = '(415) 252-7063';
else:
  $officeText = '';
  $officePhone = '(503) 245-7100';
endif; ?>

<!--
<div class="no_slider_top_text_wrap container">
	<div class="row">
		<div class="col-12">
			<h1><bold>Meet our team member.</bold></h1>
			<?php if (
     strstr($_SERVER['REQUEST_URI'], 'housing') == true ||
     strstr($_SERVER['REQUEST_URI'], 'office') == true ||
     strstr($_SERVER['REQUEST_URI'], 'senior-communities') == true ||
     strstr($_SERVER['REQUEST_URI'], 'healthcare') == true ||
     strstr($_SERVER['REQUEST_URI'], 'higher-education') == true ||
     strstr($_SERVER['REQUEST_URI'], 'hospitality') == true ||
     strstr($_SERVER['REQUEST_URI'], 'retail') == true ||
     strstr($_SERVER['REQUEST_URI'], 'community') == true
   ): ?>
				<?php $term = get_field('team_category_select'); ?>
			    <h5><bold><?php echo $post->post_title; ?></bold></h5>
			<?php endif; ?>
			<p>If you'd like to talk to us, call <?php echo $officePhone; ?></p>
		</div>
	</div>
</div>
-->

<!-- Grid Project -->
<!--
<div class="team_member_grid container">
	<div class="row">
		<div class="col-sm-12 col-md-4 col-lg-3 person-container">
			<div class="center-cropped-employee">
				<?php if (get_field('top_page_slidershow_slide_one_image')): ?>
				<img class="employee-image" src="<?php echo the_field(
      'top_page_slidershow_slide_one_image'
    ); ?>">
				<?php endif; ?>
				<div class="shimmer tumb_img"></div>
			</div>
			<h3><?php echo the_field('team_member_name'); ?></h3>
			<p class="people_status"><?php echo the_field('team_member_status'); ?></p>
			<?php if (get_field('team_member_office')): ?>
			<p class="small_text"><?php echo the_field('team_member_office'); ?> Office</p>
			<?php endif; ?>
		</div>
	</div>
</div>
-->


<?php get_footer(); ?>

