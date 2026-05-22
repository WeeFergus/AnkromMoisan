<?php // explore-beyond-style.php
?>
<style>

/* ////////////////////////////////  GENERAL  //////////////////////////////////*/



/* /////////////////  HEROHOME  ////////////////*/
#herohome .post-thumbnail {
    height: 400px;
    overflow: hidden;
}

#herohome .post-thumbnail img {
		width: 100%;
        height: 900px;
        margin-top: -300px;
		object-fit: cover;
		overflow: hidden;
}


/* shading */
#heroimage:after {
    content: '';
    position: absolute;
    z-index: 1;
    width: auto;
    height: 100px;
    bottom: 0px;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
    transition: all .3s ease-in-out;
}


/* ///////////////  END HEROHOME  //////////////*/


/* ////////////////  TITLE ///////////////// */
h1.entry-title {
    font-size: 50px !important;
		font-family: 'GothamNarrow-Light' !important;
		color:#fff;
		text-shadow: black 2px 2px, black -2px -2px, black 2px -2px, black -2px 2px;
		text-shadow: black 1px 1px, black -1px -1px, black 1px -1px, black -1px 1px;
		text-shadow: black 2px 2px;
		
		margin-top: -70px;
		margin-left:140px;
		z-index: 10;
		position: absolute;
		display:none;
}
/* hide the title until it's been adjusted */
/* ////////////////  END TITLE ///////////////// */


#blogcontent{
	  width:68%;
		margin-left:140px;
		margin-top:58px;
		display:inline-block;
}
#blogcontent p {
    font-size: 16px;
    line-height: 22px;
}
#blogcontent div{
	padding:0px;
	vertical-align: top;

}


/* solo always gets full width */
.articlediv.solo, .articlediv .solo{
  width: 96%;
}













.catsoverlay2{
  position:relative;
	width:100%;
	margin-top: 20px;
	font-weight:600;
	font-size:18px;
	color:#fff;
	margin-left:20px;
	z-index:1;
	pointer-events:none;
	line-height: 26px;
	visibility: hidden; /* start hidden until the right sizing is found. show with javascript */
	transition:.4s ease-in-out;
}

.catsoverlay{
  position:absolute;
	margin-top: 20px;
	font-weight:600;
	font-size:18px;
	color:#fff;
	margin-left:20px;
	z-index:1;
	pointer-events:none;
	line-height: 26px;
	visibility: hidden; /* start hidden until the right sizing is found. show with javascript */
	transition:.2s ease-in-out;
}

/*
.catsoverlay:hover{
	visibility:visible; 
}
*/

.filterinstructions{
	line-height:18px;
	font-size:16px;
}

.close-ex{
	display:none;
	float:right;
}


article{
	margin-bottom:22px;
}


div#showfiltering {
    display: none;
		font-size:22px;
}
#subtitle{
		font-weight:700;
		font-family: 'GothamNarrow-Book' !important;
    font-size: 28px !important;
    line-height: 1.3em !important;
		margin:6px 0px 12px;
}
#datediv{
	  font-size:12px;
		font-weight:500;
		margin-top:0px;
		text-transform: uppercase;
}
.filtersection {
		display:block;
}
#rightside {
    display: inline-block;
    width: 20%;
    vertical-align: top;
		margin-top:50px;
		margin-left:18px;
}

#mobilensideav {
  display: none;
  width: 100%;
  vertical-align: top;
	margin-top:30px;
	margin-left:0px;
	margin-bottom:10px;
	font-size:28px;
	font-weight:600;
}

#filterpanel{
	margin-bottom:20px;
	font-size:28px;
	font-weight:600;
  display:block;
}
a.blogcategory{
	font-size:20px;
	font-weight:500;
	display:block;
	padding: 0px 5px 0px 2px;
	width:100%;
}
a.blogcategory:hover{
	color: brown;
}
a.articletitle, .articletitle{
	font-weight:700;
	font-size:26px;
	display:block;
	width:90%;
	padding-right: 60px;
}
a.articletitle:hover, , .articletitle:hover{
	/* color: brown !important; */
}
.articledate{
	font-size:12px;
	font-weight:500;
	text-transform:uppercase;
	margin-top: 10px;
}

/* add link treatment */
#articlecontent a{
	text-decoration:none !important;
	color: #63B1BC !important; /* #009ACE */
	display: inline-block;
}

#articlecontent a:after{
	content: ' ';
	animation: portSliderLine2 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
	border-bottom: 2px solid #D7D2CB;
	-webkit-transition: -webkit-transform 0.4s cubic-bezier(0.23, 0.46, 0.4, 1);
	display: block;
	opacity: 0.8;
}

#articlecontent a:hover:after{
	animation: portSliderLine 0.45s cubic-bezier(.15, .75, .5, 1) forwards;
}


/* search styling */
.asp_shortcodes_container span.overlap, .asp_shortcodes_container .overlap {
    line-height: 20px;
    display: inline-block;
    position: relative !important;
}
a.asp_res_url {
    line-height: 18px !important;
}

.results .item .asp_content {
    height: 80px !important;
}

#searchpanel {
    margin-bottom: 20px;
}

#searchpanel .probox{
		border:0;
}

.paneltitle{
    font-size: 28px;
    font-weight: 600;
		margin-bottom: 10px;
}


input#searchbox,  input#searchbox:focus,  input#searchbox:active {
    border-radius: 0px;
		border-width:1px;
		border-color:#000;
		margin-bottom:20px;
		max-width:300px;
		width:100%;
}



button#searchbutton {
    border: 2px solid #000;
		border-left:none;
    margin: 0px;
		background:#333;
    width: 38px;
    height: 38px;
		transition:0.2s ease-in-out;
}

button#searchbutton:hover {
		background:#fff;
		color:#000;
}

button#searchbutton:hover .dashicons-search {
		color:#000;
}

span.dashicons.dashicons-search {
		display: inline-block;
    vertical-align: top;
    font-size: 24px;
    margin-top: 5px;
    padding: 0px;
    width: 24px;
    height: 30px;
		color:#fff;
}

#trendingpanel{
		margin-top:0px;
		font-size:28px;
		font-weight:600;
		padding:0px 0px;
}



.articlediv{
    width: 29%;
		margin:0px 20px 30px 0px;
    /* overflow: hidden; */
		display:none;
}

#blogcontent a{
	font-weight:700;
	text-decoration: underline;
}

/* show the first group of posts */
.articlediv.mod0 {
		display:inline-block;
}

#seemoreposts, #seemoreposts-cat{
		background:#E8E5E1;
		padding:20px 40px !important;
		text-align:center;
		margin-bottom:20px;
		cursor:pointer;
		transition:0.5s ease-in-out;
		display:none;
}

.articleexcerpt{
		display:block;
}
.articleexcerptmobile{
	display:none;
}

#seemoreposts:hover, #seemoreposts-cat:hover{
		background:#ccc;
}

#seemore, #seemore-cat{
	display: inline-block;
	font-family: 'GothamNarrow-Bold' !important;
  font-size: 16px !important;
  line-height: 1.3em !important;
  text-transform: uppercase;
	font-weight:500;
}

#seemoreposts-cat{
	display:none;
}





a.posttitle{
	font-size:28px;
	font-weight:600;
	width:100%;
	height:200px;
	line-height: 30px;
  margin-bottom: 16px !important;
  display: inline-block;
	margin: 0px 10px 10px 0px;
}




.articlediv .posttitle {
   
}



#blogcontent .post-thumbnail {
    width:100%;
		height:200px;
    overflow: hidden;
		display:block;
		border:none;

		background-size:cover;
		background-repeat: no-repeat;
}



#blogcontent .post-thumbnail:hover {
		opacity:1;
		z-index:0;
		filter:brightness(60%) contrast(50%) saturate(260%) ;
}


/*
#blogcontent .post-thumbnail img {
		width: 100%;
		overflow:hidden;
		object-fit: cover;
		display:none; /* start hidden until the right sizing is found. show with javascript */
}
*/

footer#colophon {
    margin-top: 30px;
}


nav.navigation.post-navigation {
    text-align: left;
}
.nav-links {
    text-align: left;
		display: inline-block;
    width: 100%;
    margin: 20px 0px;
		padding:0px;
		font-weight:600;
		font-size:18px;
}

.nav-previous {
    float: left;
}
.nav-next {
    float: right;
}
.divider{
	width:100%;
	height:10px;
	line-height:10px;
	border-top:1px solid #333;
	display:inline-block;
}


#cta_arrow {
    position: relative;
    float: right;
		width:auto;
		margin-right: 10px;
}

footer.entry-footer {
    display: none;
}

#blogcontent img {
    width: 100%;
		height: auto;
}

#blogcontent img.size-thumbnail  {
    width: 150px;
		height: auto;
}


li {
    list-style: inherit;
}

footer li {
    list-style: none;
}
#mobileMenuWrapper li {
    list-style: none;
}
#mobileMenuWrapper  .discipline_nav li, .sector_nav li, .team_nav li {
    list-style: none;
}


/* //////////////////////////////// END GENERAL  //////////////////////////////////*/


/* //////////////////////////////// TABLET  //////////////////////////////////*/
@media(max-width:1400px) {



/*  /////////////// HEROHOME /////////////// */
    #herohome .post-thumbnail {
		height: 320px;
	}

	#herohome .post-thumbnail img {
		width: 100%;
		height: 600px;
		margin-top: -100px;
		object-fit: cover;
	}
/*  /////////////// END HEROHOME /////////////// */


	a.posttitle{
		height:
		150px; 
	}

	#blogcontent .post-thumbnail {
    height: 150px;
	}

	a.articletitle, .articletitle{
		
	}

	/* ////////////////  TITLE ///////////////// */
	h1.entry-title {
		font-size: 50px !important;
		line-height:34px !important;
		margin-top: -70px;
		padding: 0;
		margin-left: 50px;
	}
	/* ////////////////  END TITLE ///////////////// */

	#blogcontent{
	  width:70%;
		margin-left:50px;
		display:inline-block;
	}
	.articlediv{
    width: 28%;
		margin: 0px 20px 30px 0px;
	}

	#rightside {
    display: inline-block;
    width: 17%;
    vertical-align: top;
		margin-top:50px;
		margin-left:6px;
	}


	.catsoverlay2 {
    position: relaitve;
    margin-top: 10px;
    font-weight: 500;
    font-size: 13px;
    line-height: 20px;
    color: #fff;
    margin-left: 10px;
    z-index: 1;
	}


	.catsoverlay {
    position: absolute;
    margin-top: 10px;
    font-weight: 500;
    font-size: 13px;
    line-height: 20px;
    color: #fff;
    margin-left: 10px;
    z-index: 1;
	}

}
/* //////////////////////////////// END TABLET  //////////////////////////////////*/




/* mobile  *//* //////////////////////////////// MOBILE  //////////////////////////////////*/
@media(max-width:700px) {

	html, body {
		overflow-x: hidden;
  }
	.articlediv{
    width: 94%;
		margin: 0px 20px 30px 0px;
	}



/*  /////////////// HEROHOME /////////////// */
	#herohome .post-thumbnail {
		height: 260px;
	}
	#herohome .post-thumbnail img {
		width: 100%;
		height: 300px;
		margin-top: 0px;
		object-fit: cover;
	}

/*  /////////////// END HEROHOME /////////////// */


  a.posttitle {
    font-size: 22px;
    line-height: 24px !important;
	}
	#blogcontent .post-thumbnail {
		height:100px;
	}

	/*
	#blogcontent .post-thumbnail img {

	}
	*/

	#trendingpanel{
		margin-top:0px;
		font-size:28px;
		font-weight:600;
		padding:0px 30px;
	}


	.articleexcerptmobile{
		display:block;
	}
	.articleexcerpt{
		display:none;
	}

	/* ////////////////  TITLE ///////////////// */
	h1.entry-title {
		font-size: 30px !important;
		line-height: 28px !important;
		margin-top: -70px;
		padding: 0;
		margin-left: 20px;
		width:94%;
	}
	/* ////////////////  END TITLE ///////////////// */

	#blogcontent{
		width: 80%;
    margin-left: 30px;
		margin-top:30px;
		display:inline-block;
	}
  #rightside{
		width:80%;
	}
	#trendingpanel{
		margin-top:0px;
	}
	a.blogcategory {
    font-size: 18px;
	}

	.catsoverlay2 {
    position: relative;
    margin-top: 10px;
    font-weight: 500;
    color: #fff;
    margin-left: 10px;
    z-index: 1;
	}

	.catsoverlay {
    position: absolute;
    margin-top: 10px;
    font-weight: 500;
    color: #fff;
    margin-left: 10px;
    z-index: 1;
	}
	a.articletitle, .articletitle {
    font-size: 22px;
	}
	.nav-links {
    text-align: center;
    width: 90%;
		margin:10px;
	}
}
/* //////////////////////////////// END MOBILE  //////////////////////////////////*/

</style>
