<?php $baseUrl = home_url('/'); ?>
<div id="main_menu_wrap">
	<div class="sidebar_wrap">
		<div class="menu_buttons_wrap">
			<div class="nav_button home">
				<a href="<?php echo $baseUrl; ?>">
					<img src="<?php echo get_template_directory_uri().'/assets/images/SVG/home.svg'; ?>" alt="home"  title="Home" />
					<div class="nav_btn_text"><span>Home</span></div>
				</a>
			</div>
			<div class="nav_button menu">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
					<defs>
						<style>.cls-1{fill:none;stroke:#000;} .st1{stroke:#FFFFFF;}</style>
					</defs>
					<line class="cls-1" x1="5.21" y1="23.5" x2="25.21" y2="23.5"/>
					<line class="cls-1" x1="5.21" y1="15" x2="25.21" y2="15"/>
					<line class="cls-1" x1="5.21" y1="6.5" x2="25.21" y2="6.5"/>
					<circle class="st1" cx="15" cy="15" r="3"/>
					<title>Explore</title>
				</svg>
				<div class="nav_btn_text" id="explore-beyond-menu"><span>Explore</span></div>
			</div>
			<div class="nav_button contact" >
				<img src="<?php echo get_template_directory_uri().'/assets/images/SVG/contact.svg'; ?>" alt="contact" title="Contact" />
				<div class="close_contact_button"></div>
				<div class="nav_btn_text"><span>Contact</span></div>
			</div>
			<div class="nav_button careers">
				<a href="<?php echo $baseUrl; ?>/careers/" title="Careers">
					<img src="<?php echo get_template_directory_uri().'/assets/images/SVG/careers.svg'; ?>" alt="careers" />
					<div class="nav_btn_text"><span>Careers</span></div>
				</a>
			</div>
			<div class="nav_button search">
				<img src="<?php echo get_template_directory_uri().'/assets/images/SVG/search_two.svg'; ?>" alt="contact" title="Search" />
				<div class="close_search_button"></div>
				<div class="nav_btn_text"><span>Search</span></div>
			</div>
		</div>
	</div>
	<div class="full_nav_wrapper">
		<div id="mobileMenuWrapper" class="d-lg-none col-md-12 container">
		   <div id="discipline-mobile">
			   <?php wp_nav_menu( array(
			    'menu' => 66,
			    'items_wrap' => '<ul class="discipline_nav">%3$s</ul>',
			) );?>
		   </div>
		   <hr />
		   <div id="market-mobile">
			<?php wp_nav_menu( array(
			    'menu' => 67,
			    'items_wrap' => '<ul class="sector_nav">%3$s</ul>',
			) );?>
		   </div>
		   <hr />
		   <div id="team-mobile">
			   <?php wp_nav_menu( array(
			    'menu' => 72,
			    'items_wrap' => '<ul class="team_nav">%3$s</ul>',
			) );?>
		   </div>
		   <hr />
		    <div id="pages-mobile">
			   <?php wp_nav_menu( array(
			    'menu' => 148,
			    'items_wrap' => '<ul class="pages_nav">%3$s</ul>',
			) );?>
		   </div>
		</div>
		<div class="full_menu d-none d-lg-flex">
			<div id="nav_seclet_wrapper" class="container">
				<div id="nav_inner_select">
					<div id="category" class="select_block" data-url>
						<img id="arrow_nav" src="<?php echo get_template_directory_uri().'/assets/images/SVG/arrow_nav_alt.svg'; ?>" alt="Selected Nav" />
						<div id="category_projects" class="nav_select_item disable_business" data-name="projects" data-show="Projects" data-shownoselect="Our Top Projects" data-spacetop  data-url="studios"><span class="spacer">Projects</span></div>
						<div id="category_people" class="nav_select_item" data-name="our-team" data-show="People" data-shownoselect="All Studios" data-spacetop  data-url="our-team"><span class="spacer">People</span></div>
						<div id="category_expertise" class="nav_select_item disable_business" data-name="expertise" data-show="Our Expertise" data-shownoselect="Our Expertise" data-spacetop  data-url="expertise" style="display:none;"><span class="spacer">Expertise</span></div>
						<div id="category_about" class="nav_select_item disable_business" data-name="about" data-show="About" data-shownoselect="About" data-spacetop  data-url="about" ><span class="spacer">About</span></div>
						<div id="category_culture" class="nav_select_item disable_business" data-name="culture" data-show="Culture" data-shownoselect="Culture" data-spacetop  data-url="culture" ><span class="spacer">Culture</span></div>
						<div id="category_explorebeyond" class="nav_select_item disable_business" data-name="explore-beyond" data-show="Explore Beyond" data-shownoselect="Explore Beyond" data-spacetop  data-url="explore-beyond" ><span class="spacer">Blog: Explore Beyond</span></div>
						<div id="category_news" class="nav_select_item disable_business" data-name="news" data-show="AM in the News" data-shownoselect="AM in the News" data-spacetop  data-url="news" ><span class="spacer">AM in the News</span></div>
						<div id="moving_indicator"></div>
					</div>
					<div id="pages" class="select_block pages" data-url>
						<img id="arrow_nav" src="<?php echo get_template_directory_uri().'/assets/images/SVG/arrow_nav_alt.svg'; ?>" alt="Selected Nav" />
						<div id="page_culture" class="nav_select_item pages" data-name="culture" data-show="Culture" data-spacetop  data-url="culture"><span class="spacer">Culture</span></div>
						<div id="page_explorebeyond" class="nav_select_item pages" data-name="explore-beyond" data-show="Blog: Explore Beyond" data-spacetop  data-url="blog"><span class="spacer">Blog: Explore Beyond</span></div>
						<div id="page_news" class="nav_select_item pages" data-name="news" data-show="AM in the News" data-spacetop  data-url="news"><span class="spacer">AM in the News</span></div>
						<div id="moving_indicator"></div>
					</div>
					<div id="disciplines" class="select_block" data-url>
						<img id="arrow_nav" src="<?php echo get_template_directory_uri().'/assets/images/SVG/arrow_nav_alt.svg'; ?>" alt="Selected Nav" />
						<div id="discipline_all" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="all-disciplines" data-show="All Disciplines" data-spacetop  data-url=""><span class="spacer">All Disciplines</span></div>
						<div id="discipline_architecture" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="architecture" data-show="Architecture" data-spacetop  data-url="architecture"><span class="spacer">Architecture</span></div>
						<div id="discipline_interiors" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="interiors" data-show="Interiors" data-spacetop  data-url="interiors"><span class="spacer">Interiors</span></div>
						<div id="discipline_planning" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="planning" data-show="Planning" data-spacetop data-url="planning"><span class="spacer">Planning</span></div>
						<div id="discipline_brand" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="brand" data-show="Brand" data-spacetop data-url="brand"><span class="spacer">Brand</span></div>
						<div id="discipline_business" class="nav_select_item disable_expertise disable_explore disable_culture disable_news disable_projects disable_link" data-name="business-services" data-show="Operational Excellence" data-spacetop data-url="operational-excellence"><span class="spacer">Operational Excellence</span></div>
						<div id="moving_indicator"></div>
					</div>
					<div id="market_sector" class="select_block" data-url>
						<img id="arrow_nav" src="<?php echo get_template_directory_uri().'/assets/images/SVG/arrow_nav_alt.svg'; ?>" alt="Selected Nav" />
						<div id="sector_all" class="nav_select_item disable_expertise disable_explore disable_culture disable_news" data-name="all-sectors" data-show="All Studios" data-spacetop data-url=""><span class="spacer">All Studios</span></div>


						<div id="sector_affordablehousing" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_planning disable_brand" data-name="affordable-housing" data-show="Affordable Housing" data-spacetop data-url="affordable-housing"><span class="spacer">Affordable Housing</span></div>

						<div id="sector_community" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="community" data-show="Community" data-spacetop data-url="community"><span class="spacer">Community</span></div>

						<div id="sector_healthcare" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="healthcare" data-show="Healthcare" data-spacetop data-url="healthcare"><span class="spacer">Healthcare</span></div>

						<div id="sector_highereducation" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="higher-education" data-show="Higher Education" data-spacetop data-url="higher-education"><span class="spacer">Higher Education</span></div>

						<div id="sector_hospitality" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="hospitality" data-show="Hospitality" data-spacetop data-url="hospitality"><span class="spacer">Hospitality</span></div>

						<div id="sector_housing" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="housing" data-show="Housing" data-spacetop data-url="housing"><span class="spacer">Housing</span></div>

						<div id="sector_office" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="office" data-show="Office" data-spacetop data-url="office"><span class="spacer">Office</span></div>

						<div id="sector_retail" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="retail" data-show="Retail" data-spacetop data-url="retail"><span class="spacer">Retail</span></div>

						<div id="sector_seniorcommunities" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="senior-communities" data-show="Senior Communities" data-spacetop data-url="senior-communities"><span class="spacer">Senior Communities</span></div>

						<div id="sector_spiritual" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="spiritual" data-show="Spiritual" data-spacetop data-url="spiritual"><span class="spacer">Spiritual</span></div>
						
						<div id="sector_student_housing" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="student-housing" data-show="Student Housing" data-spacetop data-url="student-housing"><span class="spacer">Student Housing</span></div>

						<div id="sector_urbanliving" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="urban-living" data-show="Urban Living" data-spacetop data-url="urban-living"><span class="spacer">Urban Living</span></div>

						<div id="sector_on-the-boards" class="nav_select_item disable_business disable_expertise disable_explore disable_culture disable_news disable_people disable_planning disable_brand" data-name="on-the-boards" data-show="On the Boards" data-spacetop data-url="on-the-boards"><span class="spacer">On the Boards</span></div>

						<div id="moving_indicator"></div>
					</div>
				</div>
			</div>
			<div id="nav_output_wrapper">
				<div class="container">
					<div class="output_wrap">
						<label>CURRENT SELECTION</label>
						<div class="output_flex">
							<div class="category_input">Our Top Projects</div><span class="devider_search_one devider"></span>
							<div class="discipline_input"></div><span class="devider_search_two devider"></span>
							<div class="market_input"></div><span class="devider_search_three devider"></span>
							<div class="reset_button">
								<img id="reset" src="<?php echo get_template_directory_uri().'/assets/images/SVG/resetwdot_white.svg'; ?>" alt="Reset Nav" title="reset" />
								<div class="pulsing"></div>
							</div>
						</div>
					</div>
				</div>
			    <div id="go" class="arrow_wrap">
			    	   <a href="/studios/"><?php /////////////// default to top projects  ////////////////// ?>
			    	    	<h1><bold>Go</bold></h1>
			    	    	<div class="arrows_container">
        	    				<div id="cta_arrow">
        	    					<span class="arrow_right primera black"></span>
        	    					<span class="arrow_right segunda black"></span>
        	    				</div>
			    			</div>
			    	   </a>
			    </div>
			</div>
		</div>
	</div>

	<?php   ////// Get recipient email /////////////////

		//$getrecipientemailname = $_GET['e'];
		$getrecipientemailname = filter_input(INPUT_POST | INPUT_GET, 'e', FILTER_SANITIZE_SPECIAL_CHARS);
		// https://www.smashingmagazine.com/2011/01/keeping-web-users-safe-by-sanitizing-input-data/
		$getrecipient = '';
		if ($getrecipientemailname != '') {
			$getrecipient = $getrecipientemailname . "@ankrommoisan.com";
		}
		echo "<!--getrecipientemailname:" . $getrecipientemailname . " -->";;
	?>

	<script>

		const websiteURL = `${document.location.origin}`;
		const navBottomCategoryOutput = document.querySelector('#nav_output_wrapper .output_wrap .category_input');
		const navBottomDisciplineOutput = document.querySelector('#nav_output_wrapper .output_wrap .discipline_input');
		const navBottomMarketOutput = document.querySelector('#nav_output_wrapper .output_wrap .market_input');

		const navDisableOnProjects = document.querySelectorAll('#nav_inner_select .disable_projects');
		const navDisableOnBusiness = document.querySelectorAll('#nav_inner_select .disable_business');
		const navDisableOnExpertise = document.querySelectorAll('#nav_inner_select .disable_expertise');
		const navDisableOnExplore = document.querySelectorAll('#nav_inner_select .disable_explore');
		const navDisableOnAbout = document.querySelectorAll('#nav_inner_select .disable_about');
		const navDisableOnCulture = document.querySelectorAll('#nav_inner_select .disable_culture');
		const navDisableNews = document.querySelectorAll('#nav_inner_select .disable_news');
		const navDisableOnPeople = document.querySelectorAll('#nav_inner_select .disable_people');
		const navDisableOnPlanning = document.querySelectorAll('#nav_inner_select .disable_planning');
		const navDisableOnBrand = document.querySelectorAll('#nav_inner_select .disable_brand');

		const navBottomGoButton = document.querySelector('#nav_output_wrapper #go a');
		const navCategoryList = document.querySelectorAll('#nav_inner_select .nav_select_item');

		const navCategoryColumns = document.querySelectorAll('#nav_inner_select .select_block');

		const changeTextList = document.querySelector('#sector_affordablehousing');


///////////////////////////// INITIAL NAV SETTINGS AND CURRENT SELECTION //////////////////////////////////////////

		///////////////////// ARCHITECTURE LEADERSHIP ////////////////////////////
		if (window.location.href.indexOf('/architecture-leadership/')  > -1){
			changeTextList.childNodes[0].innerHTML = "Studio Leadership";
			changeTextList.dataset['name'] = 'architecture-leadership';
			changeTextList.dataset['show'] = 'Studio Leadership';
			changeTextList.dataset['url'] = 'architecture-leadership';
			navBottomCategoryOutput.innerHTML = "People";
			navBottomDisciplineOutput.innerHTML = "Architecture";
			navBottomMarketOutput.innerHTML = "Studio Leadership ";
			jQuery(".devider_search_one").html("/");
			jQuery(".devider_search_two").html("/");

			document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
		}

		///////////////////// INTERIORS LEADERSHIP ////////////////////////////
		else if(window.location.href.indexOf('/interiors-leadership/')  > -1){
			changeTextList.childNodes[0].innerHTML = "Studio Leadership";
			changeTextList.dataset['name'] = 'interiors-leadership';
			changeTextList.dataset['show'] = 'Studio Leadership';
			changeTextList.dataset['url'] = 'interiors-leadership';
			navBottomCategoryOutput.innerHTML = "People";
			navBottomDisciplineOutput.innerHTML = "Interiors";
			navBottomMarketOutput.innerHTML = "Studio Leadership ";
			jQuery(".devider_search_one").html("/");
			jQuery(".devider_search_two").html("/");
			document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
		}

		///////////////////// EXECUTIVE LEADERSHIP ////////////////////////////
		else if  (window.location.href.indexOf('/our-team/')  > -1)  {
			changeTextList.childNodes[0].innerHTML = "Firm Leadership";
			changeTextList.dataset['name'] = 'leadership';
			changeTextList.dataset['show'] = 'Firm Leadership';
			changeTextList.dataset['url'] = 'leadership';
			navBottomCategoryOutput.innerHTML = "People";
			navBottomDisciplineOutput.innerHTML = "All Disciplines";
			navBottomMarketOutput.innerHTML = "All Studios";
			jQuery(".devider_search_one").html("/");
			jQuery(".devider_search_two").html("/");
			document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
		}

		///////////////////// TEAM MEMBER  ////////////////////////////
		else if  (window.location.href.indexOf('/team-member/')  > -1)  {
			changeTextList.childNodes[0].innerHTML = "Firm Leadership";
			changeTextList.dataset['name'] = 'leadership';
			changeTextList.dataset['show'] = 'Firm Leadership';
			changeTextList.dataset['url'] = 'leadership';
			navBottomCategoryOutput.innerHTML = "People";
			navBottomDisciplineOutput.innerHTML = "All Disciplines";
			navBottomMarketOutput.innerHTML = "All Studios";
			jQuery(".devider_search_one").html("/");
			jQuery(".devider_search_two").html("/");
			document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
		}



		///////////////////// EXPLORE BEYOND ////////////////////////////
		else if (window.location.href.indexOf('/explore-beyond/')  > -1){
				// EXPLORE BEYOND PAGE
				navBottomGoButton.href = `${websiteURL}/explore-beyond/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("Blog: Explore Beyond");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");
		}
		///////////////////// CULTURE ////////////////////////////
		else if (window.location.href.indexOf('/culture/')  > -1){
			// CULTURE PAGE
				navBottomGoButton.href = `${websiteURL}/culture/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("Culture");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");
		}
		///////////////////// NEWS ////////////////////////////
		else if (window.location.href.indexOf('/news/')  > -1){
				// NEWS PAGE
				navBottomGoButton.href = `${websiteURL}/news/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("AM in the News");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");

		} else { // projects
				jQuery(".category_input").html("Projects");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("All Disciplines");
				jQuery(".devider_search_two").html("/");
				jQuery(".market_input").html("All Studios");

				if (window.location.href.indexOf('/studios/') > -1) {

				} else if (window.location.href.indexOf('architecture') > -1) {
					jQuery(".discipline_input").html("Architecture");
				} else if (window.location.href.indexOf('interiors') > -1) {
					jQuery(".discipline_input").html("Interiors");
				} else if (window.location.href.indexOf('planning') > -1) {
					jQuery(".discipline_input").html("Planning");
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("All Studios");
					navDisableOnPlanning.forEach(disable => {
						disable.classList.add('disable_link');
						disable.classList.remove('active');
					});
				} else if (window.location.href.indexOf('brand') > -1) {
					jQuery(".discipline_input").html("Brand");
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("All Studios");
					navDisableOnBrand.forEach(disable => {
						disable.classList.add('disable_link');
						disable.classList.remove('active');
					});
				}
				if (window.location.href.indexOf('/studios/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("All Studios");

				} else if (window.location.href.indexOf('/affordable-housing/') > -1) {
					//jQuery(".discipline_input").html("All Disciplines");
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Affordable Housing");
					//console.log("Affordable Housing INITIAL NAV ");
				} else if (window.location.href.indexOf('/housing/') > -1) {
					//jQuery(".discipline_input").html("All Disciplines");
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Housing");
				} else if (window.location.href.indexOf('/workplace-interiors/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Office");
					console.log("Workspace Interiors INITIAL NAV ");
				} else if (window.location.href.indexOf('/office/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Office");
					//console.log("Office INITIAL NAV ");
				} else if (window.location.href.indexOf('/urban-living/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Urban Living");
				} else if (window.location.href.indexOf('/urban-living-interiors/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Urban Living");
				} else if (window.location.href.indexOf('/senior-communities/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Senior Communities");
				} else if (window.location.href.indexOf('/spiritual/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Spiritual");
				} else if (window.location.href.indexOf('/healthcare/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Healthcare");
				} else if (window.location.href.indexOf('/higher-education/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Higher Education");
				} else if (window.location.href.indexOf('/hospitality/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Hospitality");
				}else if (window.location.href.indexOf('/retail/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Retail");
				} else if (window.location.href.indexOf('/community/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("Community");
				}  else if (window.location.href.indexOf('/on-the-boards/') > -1) {
					jQuery(".devider_search_two").html("/");
					jQuery(".market_input").html("On the Boards");
				}
		}


///////////////////////////// END INITIAL NAV SETTINGS AND CURRENT SELECTION //////////////////////////////////////////

		let getCategoryUrl;
		let getDiscipleUrl;
		let getMarketUrl;
		let getPageUrl;


		/////////////////// FIND ALL THE ACTIVE NODES ///////////////////
		const urlActive = [];
		const urlActiveExtract = navCategoryList.forEach(eachurl => { urlActive.push(eachurl.dataset.url) });
 		//console.log("urlActive:" + urlActive);


////////////////////////////////////////// NAV SELECT LOAD ////////////////////////////////////////////////////////////

		// Load and Activate
		function navSelectLoad() {


			navCategoryList.forEach(navList => { navList.classList.remove('active')});


		/////////////////// ADD ACTIVE CLASS TO ALL THE ACTIVE NODES ///////////////////
			urlActive.forEach(url => {
				// match URL with / or ? in front
				if ((window.location.href.indexOf('/' + url) > -1) || (window.location.href.indexOf('?' + url) > -1)){
					navCategoryList.forEach(activate => {
// 						//console.log("activate:" + activate);
						if(activate.dataset.name == url){
// 							//console.log("activate:" + activate);


							activate.closest('.select_block').classList.add('not_top');
							activate.classList.add('active');
						}
					})
				}
			});

		/////////////////// ADD ACTIVE CLASS FIRST CHILD OF ACTIVE NODES IF NOT AT THE TOP ///////////////////
			navCategoryColumns.forEach(collumn => { (!collumn.classList.contains('not_top')) ? collumn.children[1].classList.add('active') : ''; });

			const activeListings = [];
			var topvalue = 0;

		/////////////////// MOVE THE ARROWS TO POINT AT THE ACTIVE NODE ///////////////////
			navCategoryList.forEach(navList => {
				//console.log("\nnavList.dataset.name:" + navList.dataset.name);
				//console.log("\nnavList.offsetTop:" + navList.offsetTop);
				navList.setAttribute('data-spacetop', navList.offsetTop);
				if(navList.classList.contains('active')){
					navList.closest('.select_block').setAttribute('data-url', navList.dataset.url);
					const activeList = activeListings.push(navList.closest('.select_block'));
					//console.log("\nnavList.dataset.spacetop:" + navList.dataset.spacetop);

					topvalue = navList.dataset.spacetop;
					if (navList.dataset.name=='culture') {topvalue=30;} // fix issue with culture arrow
					if (navList.dataset.name=='explore-beyond') {topvalue=74;} // fix issue with explore beyond arrow
					if (navList.dataset.name=='news') {topvalue=120;} // fix issue with news arrow
					navList.closest('.select_block').querySelector('#arrow_nav').style.top = `calc(${topvalue}px + 15px)`;
					navList.closest('.select_block').querySelector('#moving_indicator').style.top = `${topvalue}px`;
					//console.log("\nnavList.dataset.url:" + navList.dataset.url);
					//console.log("\ntopvalue:" + topvalue);
					navList.closest('.select_block').querySelector('#arrow_nav').setAttribute('data-current', navList.dataset.name);
					//console.log("\nnavList.dataset.name:" + navList.dataset.name);
					navList.closest('.select_block').querySelector('#moving_indicator').setAttribute('data-current', navList.dataset.name);
				}
			});
 			//console.log("activelistings:" + activeListings);
			activeListings.forEach(activeCol => {activeCol.classList.add('active_collumn')});


			//////////////////////// BUSINESS PROJECTS ///////////////////////////////
			if(document.querySelector('#discipline_business').classList.contains('active') ){
				navDisableOnBusiness.forEach(disable => { disable.classList.add('disable_link')});
			}else if(document.querySelector('#category_expertise').classList.contains('active')){
			//////////////////////// EXPERTISE ///////////////////////////////
				activeListings.forEach(activeCol => {activeCol.classList.remove('active_collumn')});
				activeListings[0].classList.add('active_collumn');
				navDisableOnExpertise.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
				document.querySelector('.devider_search_one').innerHTML = '';
				document.querySelector('.devider_search_two').innerHTML = '';
				document.querySelector('.devider_search_three').innerHTML = '';

			}else if(document.querySelector('#category_explorebeyond').classList.contains('active')){
			//////////////////////// EXPLORE BEYOND ///////////////////////////////

				document.querySelector('#category_about').click();

				jQuery("#categories").addClass("disable_link"); // hide categories
				jQuery("#disciplines").addClass("disable_link"); // hide disciplines
				jQuery("#disciplines div").addClass("disable_link"); // hide disciplines
				jQuery("#market_sector").hide(); // hide market sector
				jQuery("#pages").addClass("showsection");


			}else if(document.querySelector('#category_culture').classList.contains('active')){
			//////////////////////// CULTURE ///////////////////////////////

				document.querySelector('#category_about').click();

				jQuery("#categories").addClass("disable_link"); // hide categories
				jQuery("#disciplines").addClass("disable_link"); // hide disciplines
				jQuery("#disciplines div").addClass("disable_link"); // hide disciplines
				jQuery("#market_sector").hide(); // hide market sector
				jQuery("#pages").addClass("showsection");


			}else if(document.querySelector('#category_news').classList.contains('active')){
			//////////////////////// NEWS ///////////////////////////////

				document.querySelector('#category_about').click();

				jQuery("#categories").addClass("disable_link"); // hide categories
				jQuery("#disciplines").addClass("disable_link"); // hide disciplines
				jQuery("#disciplines div").addClass("disable_link"); // hide disciplines
				jQuery("#market_sector").hide(); // hide market sector
				jQuery("#pages").addClass("showsection");

			}else if(document.querySelector('#category_people').classList.contains('active')){
			//////////////////////// PEOPLE ///////////////////////////////
				navDisableOnPeople.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
			}



			/////////////////// PEOPLE /////////////////////////
			if (document.querySelector('[data-name="our-team"]').classList.contains('active')) {

				navDisableOnPeople.forEach(disable => {
					if(disable.classList.contains('disable_people')){
						disable.classList.add('disable_link');
						disable.classList.remove('active');
					}
				});

				document.querySelectorAll('#nav_inner_select .nav_select_item:not(.disable_people)').forEach(enable => {
					enable.classList.remove('disable_link');
				});

				////////////////////////////  LEADERSHIP  ////////////////////////////////
				if ((document.querySelector('#discipline_all').classList.contains('active')) || (document.querySelector('#discipline_architecture').classList.contains('active')) || (document.querySelector('#discipline_interiors').classList.contains('active'))){
					document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
				}else{
					document.querySelector('#sector_all').click();
					document.querySelector('#sector_affordablehousing').classList.add('disable_link');
					document.querySelector('#sector_affordablehousing').classList.remove('active');
				}
			}



			if(window.location.href.indexOf('/thought-leadership') > -1){
				document.querySelector('#category_projects').click();
				document.querySelector('#discipline_all').click();
				document.querySelector('#sector_all').click();
			}


			if  (window.location.href.indexOf('/team-member/')  > -1)  {
				document.querySelector('#category_people').click();
			}

			////////////////// CONTACT AUTOMATION for #contact /////////////////////////
			if  (window.location.href.indexOf('#contact')  > -1)  {
				document.querySelector('.nav_button.contact').click();
			}

			var getrecipient = "<?php echo $getrecipient; ?>";
			// prepopulate the recipient
			if (getrecipient!='') {
				jQuery("#input_1_10").val(getrecipient);
			}

		}

////////////////////////////////////////// END NAV SELECT LOAD ////////////////////////////////////////////////////////////
		window.addEventListener('load', navSelectLoad);


/////////////////////////////////////////////////// NAV SELECT ///////////////////////////////////////////////////////////////////////////
		// Toggle to Activate
		function navSelect(e) {
			document.querySelector('#nav_output_wrapper #go').classList.add('animated_btn');

			setTimeout(function() {
				document.querySelector('#nav_output_wrapper #go').classList.remove('animated_btn');
			}, 500);


			//Add + remove 'active' class
			(e.currentTarget.closest('.select_block').querySelector('.active')) ? e.currentTarget.closest('.select_block').querySelector('.active').classList.remove('active') : '';

			(!e.currentTarget.classList.contains('active')) ? e.currentTarget.classList.add('active') : '';

			e.currentTarget.closest('.select_block').dataset.url = e.currentTarget.closest('.select_block').querySelector('.active').dataset.url;

			let getCategoryUrl = document.querySelector('#category').dataset.url;
			let getDiscipleUrl = document.querySelector('#disciplines').dataset.url;
			let getMarketUrl = document.querySelector('#market_sector').dataset.url;
			let getPageUrl = document.querySelector('#pages').dataset.url;


			//Move Arrow + Border
			e.currentTarget.closest('.select_block').querySelector('#arrow_nav').style.top = `calc(${e.currentTarget.offsetTop}px + 13px)`;
			e.currentTarget.closest('.select_block').querySelector('#moving_indicator').style.top = `calc(${e.currentTarget.offsetTop}px - 0px)`;
			e.currentTarget.closest('.select_block').querySelector('#arrow_nav').setAttribute('data-current', e.currentTarget.dataset.name);
			e.currentTarget.closest('.select_block').querySelector('#moving_indicator').setAttribute('data-current', e.currentTarget.dataset.name);


			/////////////////////////////////// ACTIVE ACTIONS //////////////////////////////////

///////////////////////////////////////////////// If PEOPLE  /////////////////////////////////////////////



			if (document.querySelector('[data-name="our-team"]').classList.contains('active')) {
				//console.log("our-team active");
				jQuery(".pages").removeClass("showsection"); // hide pages

				jQuery("#disciplines").removeClass("disable_link"); // show discplines
				jQuery("#disciplines div").removeClass("disable_link"); // show disciplines
				jQuery("#market_sector").show(); // show market sector
				jQuery("#market_sector").removeClass("disable_link"); // show market sector

				navDisableOnPeople.forEach(disable => {
					if(disable.classList.contains('disable_people')){
						disable.classList.add('disable_link');
						disable.classList.remove('active');
					}
				});
				document.querySelectorAll('#nav_inner_select .nav_select_item:not(.disable_people)').forEach(enable => {
					enable.classList.remove('disable_link');
				});
				if(!document.querySelector('#sector_all').classList.contains('active') && e.currentTarget.closest('.select_block').id !== 'market_sector'){
					document.querySelector('#sector_all').click();
				}
				// For people - if not All Disciplines, Architecure, or Interiors then hide the 2nd element on the 3rd column

					if (document.querySelector('#discipline_all').classList.contains('active')) {
					///////////////////// EXECUTIVE LEADERSHIP ////////////////////////////
						changeTextList.childNodes[0].innerHTML = "Firm Leadership";
						changeTextList.dataset['name'] = 'leadership';
						changeTextList.dataset['show'] = 'Firm Leadership';
						changeTextList.dataset['url'] = 'leadership';
						navBottomCategoryOutput.innerHTML = "People";
						navBottomDisciplineOutput.innerHTML = "All Disciplines";
						navBottomMarketOutput.innerHTML = "Firm Leadership";
						document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
					}

					///////////////////// ARCHITECTURE LEADERSHIP ////////////////////////////
					else if (document.querySelector('#discipline_architecture').classList.contains('active')) {
						changeTextList.childNodes[0].innerHTML = "Studio Leadership";
						changeTextList.dataset['name'] = 'architecture-leadership';
						changeTextList.dataset['show'] = 'Studio Leadership';
						changeTextList.dataset['url'] = 'architecture-leadership';
						navBottomCategoryOutput.innerHTML = "People";
						navBottomDisciplineOutput.innerHTML = "Architecture";
						navBottomMarketOutput.innerHTML = "Studio Leadership";
						document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
					}

					///////////////////// INTERIORS LEADERSHIP ////////////////////////////
					else if (document.querySelector('#discipline_interiors').classList.contains('active')) {
						changeTextList.childNodes[0].innerHTML = "Studio Leadership";
						changeTextList.dataset['name'] = 'interiors-leadership';
						changeTextList.dataset['show'] = 'Studio Leadership';
						changeTextList.dataset['url'] = 'interiors-leadership';
						navBottomCategoryOutput.innerHTML = "People";
						navBottomDisciplineOutput.innerHTML = "Interiors";
						navBottomMarketOutput.innerHTML = "Studio Leadership";
						document.querySelector('#sector_affordablehousing').classList.remove('disable_link');
					}

				else {
					document.querySelector('#sector_all').click();
					document.querySelector('#sector_affordablehousing').classList.add('disable_link');
					document.querySelector('#sector_affordablehousing').classList.remove('active');
				}
///////////////////////////// PROJECTS /////////////////////////////////////////////////////////
			} else if (document.querySelector('[data-name="projects"]').classList.contains('active')) {
				// PROJECTS
				//console.log("projects1 active");

				jQuery(".pages").removeClass("showsection"); // hide pages
				jQuery("#disciplines").removeClass("disable_link"); // show discplines
				jQuery("#disciplines div").removeClass("disable_link"); // show disciplines
				jQuery("#market_sector").show(); // show market sector
				jQuery("#market_sector").removeClass("disable_link"); // show market sector
				jQuery("#market_sector div").removeClass("disable_link"); // show market sector


				// this is a quirky way this was set up - the 2nd item (housing) is used for leadership in People - so needs to go back to affordable housing for Projects
				const changeTextList = document.querySelector('#sector_affordablehousing');
				changeTextList.childNodes[0].innerHTML = "Affordable Housing";
				changeTextList.dataset['name'] = 'affordable-housing';
				changeTextList.dataset['show'] = 'Affordable Housing';
				changeTextList.dataset['url'] = 'affordable-housing';
			//////////////////////////////////////////////////////////  ABOUT ////////////////////////////////////////////////

			} else if (document.querySelector('[data-name="about"]').classList.contains('active')) {
				// ABOUT
				//console.log("about active");

				jQuery("#categories").addClass("disable_link"); // hide categories
				jQuery("#disciplines").addClass("disable_link"); // hide disciplines
				jQuery("#disciplines div").addClass("disable_link"); // hide disciplines
				jQuery("#market_sector").hide(); // hide market sector
				jQuery("#pages").addClass("showsection");

				document.querySelector('.devider_search_one').innerHTML = '';
				document.querySelector('.devider_search_two').innerHTML = '';
				document.querySelector('.devider_search_three').innerHTML = '';

			} else if (document.querySelector('[data-name="explore-beyond"]').classList.contains('active')) {
				// EXPLORE BEYOND

			 //console.log("blog active");

				navDisableOnExplore.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
				e.currentTarget.classList.add('active');


			} else if (document.querySelector('[data-name="culture"]').classList.contains('active')) {
				// CULTURE
				//console.log("culture active");

				navDisableOnCulture.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
				e.currentTarget.classList.add('active');
			} else if (document.querySelector('[data-name="news"]').classList.contains('active')) {
				//console.log("news active");

				// NEWS

				navDisableOnExplore.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
				e.currentTarget.classList.add('active');
			} else {
				// PROJECTS
				//console.log("projects active");

				jQuery(".pages").removeClass("showsection"); // hide pages
				jQuery("#disciplines").removeClass("disable_link"); // show discplines
				jQuery("#disciplines div").removeClass("disable_link"); // show disciplines

				const changeTextList = document.querySelector('#sector_affordablehousing');
				changeTextList.childNodes[0].innerHTML = "Affordable Housing";
				changeTextList.dataset['name'] = 'affordable-housing';
				changeTextList.dataset['show'] = 'Affordable Housing';
				changeTextList.dataset['url'] = 'affordable-housing';
			}

///////////////////////////////////////////// END ACTIVE ACTIONS ////////////////////////////////////

			e.currentTarget.closest('.select_block').classList.remove('not_top');


			let activeListings = [];

			navCategoryList.forEach(navList => {
				if(navList.classList.contains('active')){
					const activeList = activeListings.push(navList.closest('.select_block'));
				}
			});

			navCategoryColumns.forEach(diactivateCol => {diactivateCol.classList.remove('active_collumn')});
			activeListings.forEach(activeCol => {activeCol.classList.add('active_collumn')});

			if(document.querySelector('#category_projects').classList.contains('active') || document.querySelector('#category_people').classList.contains('active')){
				 navCategoryColumns.forEach(activateCol => {activateCol.classList.add('active_collumn')});
			}



///////////////////////////////     ////////////////////////////////



			//////////////////  PROJECTS //////////////////////
			///////////// PLANNING ////////////////////////
			if(document.querySelector('#category_projects').classList.contains('active') && document.querySelector('#discipline_planning').classList.contains('active')){
				document.querySelector('#sector_all').click();
				navDisableOnPlanning.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
					});
			}

			///////////// BRAND //////////////
			if(document.querySelector('#category_projects').classList.contains('active') && document.querySelector('#discipline_brand').classList.contains('active')){
				document.querySelector('#sector_all').click();
				navDisableOnBrand.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
				});

			}

			navCategoryColumns.forEach(collumn => {
				if(collumn.classList.contains('active_collumn')){
					navCategoryList.forEach(activateLink => {
						if(activateLink.dataset.name == collumn.querySelector('#arrow_nav').dataset.current){
							activateLink.classList.add('active');
						}
					});
				}
			})

			////////////////// LEADERSHIP  //////////////////
			if(document.querySelector('#discipline_all').classList.contains('active') && document.querySelector('#sector_affordablehousing').classList.contains('active') && document.querySelector('#category_people').classList.contains('active') ){
				document.querySelector('.devider_search_three').innerHTML = '';

			} else {
				////////////////// SET THE CURRENT SELECTION TEXT //////////////////
				navCategoryList.forEach(showActive => {
					if(showActive.closest('.select_block').id == 'category'){
						if(showActive.classList.contains('active')){

						}else if(!showActive.closest('.select_block').classList.contains('active_collumn')){
							navBottomCategoryOutput.innerHTML =  '';
						}
					}
					if(showActive.closest('.select_block').id == 'disciplines'){
						if(showActive.classList.contains('active')){
							navBottomDisciplineOutput.innerHTML =  showActive.dataset.show;
						}else if(!showActive.closest('.select_block').classList.contains('active_collumn')){
							navBottomDisciplineOutput.innerHTML =  '';
						}
					}
					if(showActive.closest('.select_block').id == 'market_sector'){
						if(showActive.classList.contains('active')){
							navBottomMarketOutput.innerHTML =  showActive.dataset.show; // Update market_input field in Current Selection
						}
						else if(!showActive.closest('.select_block').classList.contains('active_collumn')){
							navBottomMarketOutput.innerHTML =  '';
						}
					}
				});
				(navBottomDisciplineOutput.innerHTML != '') ? document.querySelector('.devider_search_one').innerHTML = '/' : document.querySelector('.devider_search_one').innerHTML = '';
				(navBottomMarketOutput.innerHTML != '') ? document.querySelector('.devider_search_two').innerHTML = '/' : document.querySelector('.devider_search_two').innerHTML = '';

			}

			if(document.querySelector('#category_projects').classList.contains('active') && document.querySelector('#sector_all').classList.contains('active') && document.querySelector('#discipline_all').classList.contains('active')){
				document.querySelector('.reset_button').classList.remove('to_reset');
			}else{
				document.querySelector('.reset_button').classList.add('to_reset');
			}



			getCategoryUrl = document.querySelector('#category').dataset.url;
			getDiscipleUrl = document.querySelector('#disciplines').dataset.url;
			getMarketUrl = document.querySelector('#market_sector').dataset.url;
			getPageUrl = document.querySelector('#pages').dataset.url;


			///////////////////////   SET URL //////////////////
			////////////////////// PEOPLE LEADERSHIP //////////////////////
			if(document.querySelector('#category_people').classList.contains('active') && document.querySelector('#sector_affordablehousing').classList.contains('active')){
				if(document.querySelector('#discipline_all').classList.contains('active')) {
					getMarketUrl = "leadership"
				} else if(document.querySelector('#discipline_architecture').classList.contains('active')) {
					getMarketUrl = "architecture-leadership"
				} else if(document.querySelector('#discipline_interiors').classList.contains('active')) {
					getMarketUrl = "interiors-leadership"
				}
			}

			if(!document.querySelector('#category_people').classList.contains('active') && document.querySelector('#sector_affordablehousing').classList.contains('active')){
				getMarketUrl = document.querySelector('#market_sector').dataset.url = "affordable-housing"
			}


			////////////////////// PROJECTS //////////////////
			if(document.querySelector('#category_projects').classList.contains('active')){
				// PROJECTS
				if(document.querySelector('#discipline_planning').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getDiscipleUrl}/`;
				}else if(document.querySelector('#discipline_all').classList.contains('active') && document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/studios/`;
				}else if(!document.querySelector('#discipline_all').classList.contains('active') && document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getDiscipleUrl}/`;
				}else if(document.querySelector('#discipline_all').classList.contains('active') && !document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getMarketUrl}/`;
				}else{
					navBottomGoButton.href = `${websiteURL}/${getMarketUrl}/?${getDiscipleUrl}`;
				}


				// hide the items to be hidden for projects (such as business services) - DW
				navDisableOnProjects.forEach(disable => {
					disable.classList.add('disable_link');
					disable.classList.remove('active');
				});


				jQuery(".category_input").html("Projects");


			}else if(document.querySelector('#category_people').classList.contains('active')){
				// PEOPLE
				if(document.querySelector('#discipline_all').classList.contains('active') && document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getCategoryUrl}/`;

					// ALL DISCIPLINES, ARCHITECTURE OR INTERIORS
				} else if (( document.querySelector('#discipline_all').classList.contains('active') || document.querySelector('#discipline_architecture').classList.contains('active') || document.querySelector('#discipline_interiors').classList.contains('active') ) && document.querySelector('#sector_affordablehousing').classList.contains('active')){

					navBottomGoButton.href = `${websiteURL}/${getCategoryUrl}/${getMarketUrl}/`;


				}else if(document.querySelector('#discipline_all').classList.contains('active') && !document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getCategoryUrl}/`;
				}else if(!document.querySelector('#discipline_all').classList.contains('active') && document.querySelector('#sector_all').classList.contains('active')){
					navBottomGoButton.href = `${websiteURL}/${getCategoryUrl}/${getDiscipleUrl}/`;
				}else{
					navBottomGoButton.href = `${websiteURL}/${getCategoryUrl}/?${getDiscipleUrl}`;
				}

			}else if(jQuery('#page_culture').hasClass('active')){
				// CULTURE PAGE
				navBottomGoButton.href = `${websiteURL}/culture/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("Culture");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");
			}else if(jQuery('#page_explorebeyond').hasClass('active')){
				// EXPLORE BEYOND PAGE
				navBottomGoButton.href = `${websiteURL}/explore-beyond/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("Blog: Explore Beyond");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");
			}else if(jQuery('#page_news').hasClass('active')){
				// NEWS PAGE
				navBottomGoButton.href = `${websiteURL}/news/`;
				jQuery(".category_input").html("About");
				jQuery(".devider_search_one").html("/");
				jQuery(".discipline_input").html("AM in the News");
				jQuery(".devider_search_two").html("");
				jQuery(".market_input").html("");
				jQuery(".devider_search_three").html("");
			}


		}

//////////////////////////////// END NAV SELECT ////////////////////////////////////////////////////


		navCategoryList.forEach(navLink => {navLink.addEventListener('click', navSelect)});





		function resetNav(e){
			document.querySelector('#category_projects').click();
			document.querySelector('#discipline_all').click();
			document.querySelector('#sector_all').click();
			document.querySelector('.reset_button').classList.remove('to_reset');
		}
		document.querySelector('.reset_button').addEventListener('click', resetNav);

	</script>




	<div class="full_contact_wrapper">
		<div id="contact-wrapper" class="container">

			<div class="close_contact_button topright"></div>
			<div class="row full_height">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<h1>Contact</h1>
							<p>	<?php echo get_field( 'contact_intro', 'option' );?></p>
						
								<div class="contact-address-block">
							<?php $locations = get_field( 'contact-locations', 'option' );
								if ( $locations ) :
									foreach ( $locations as $location ) : ?>
							
										<?php if ( $location['location_city'] ) : ?>
											<h2><a class="underline_link" href="<?php echo esc_url( $location['location_city_link'] ); ?>"><bold><?php echo esc_html( $location['location_city'] ); ?></bold></a></h2>
										<?php endif; ?>
							
										<?php if ( $location['location_address'] ) : ?>
											<p><?php echo esc_html( $location['location_address']  ); ?></p>
										<?php endif; ?>
							
										<?php if ( $location['location_phone'] ) : ?>
											<a class="underline_link" href="tel:<?php echo esc_attr( $location['location_phone_ac'] . $location['location_phone'] ); ?>">
												(<?php echo esc_html( $location['location_phone_ac'] ); ?>) <?php echo esc_html( $location['location_phone'] ); ?>
											</a>
										<?php endif; ?>
							
										<?php if ( $location['contact_name'] ) : ?>
											<div class="location_contact_info">
												<div class="contact_info_mobile d-lg-none d-xl-none">
													<p><?php echo esc_html( $location['contact_name'] ); ?></p>
													<?php if ( $location['contact_title'] ) : ?>
														<p><?php echo esc_html( $location['contact_title'] ); ?></p>
													<?php endif; ?>
													<?php
													$contact_email = $location['contact_email'];
													if ( $contact_email ) : ?>
														<a class="underline_link" href="#contact" onclick="jQuery('#input_1_10').val('<?php echo esc_js( $contact_email ); ?>');">
															Email
														</a>
													<?php endif; ?>
													<?php if ( $location['contact_name_2'] ) : ?>
														<p><?php echo esc_html( $location['contact_name_2'] ); ?></p>
														<p><?php echo esc_html( $location['contact_title_2'] ); ?></p>
														<?php $contact_email = $location['contact_email_2'];
														if ( $contact_email ) : ?>
															<a class="underline_link" href="#contact" onclick="jQuery('#input_1_10').val('<?php echo esc_js( $contact_email ); ?>');">
																Email
															</a>
														<?php endif; ?>
													<?php endif; ?>
													<?php if ( $location['contact_name_3'] ) : ?>
														<p><?php echo esc_html( $location['contact_name_3'] ); ?></p>
														<p><?php echo esc_html( $location['contact_title_3'] ); ?></p>
														<?php $contact_email = $location['contact_email_3'];
														if ( $contact_email ) : ?>
															<a class="underline_link" href="#contact" onclick="jQuery('#input_1_10').val('<?php echo esc_js( $contact_email ); ?>');">
																Email
															</a>
														<?php endif; ?>
													<?php endif; ?>
													<?php if ( $location['contact_name_4'] ) : ?>
														<p><?php echo esc_html( $location['contact_name_4'] ); ?></p>
														<p><?php echo esc_html( $location['contact_title_4'] ); ?></p>
														<?php $contact_email = $location['contact_email_4'];
														if ( $contact_email ) : ?>
															<a class="underline_link" href="#contact" onclick="jQuery('#input_1_10').val('<?php echo esc_js( $contact_email ); ?>');">
																Email
															</a>
														<?php endif; ?>
													<?php endif; ?>
												</div>
											</div>
										<?php endif; 
									endforeach;
								endif; ?>
							</div>
						</div>	

							
						<div class="col-md-12 col-lg-1"><a href="" name="contact" id="contact"></a></div>
						<div class="d-lg-block col-lg-5"><!-- d-none -->
							<div id="contact-right-block"><?php gravity_form( 1, false, false, false, '', true, 12 ); ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search_window">
		<div class="container">
			<div class="row">
			    <div class="col-md-12 col-lg-2"></div>
			    <div class="col-md-12 col-lg-8">
				    <h1><bold>Search</bold></h1>
				   <?php echo do_shortcode('[wd_asp elements="search,results" ratio="100%,100%" id=1]'); ?>
				</div>
			    <div class="col-md-12 col-lg-2"></div>
			</div>
		</div>
	</div>
</div>

<script>
	const mainHtml = document.querySelector('html');
	const mainNavIcon = document.querySelectorAll('.nav_button');
	const mainNavText = document.querySelectorAll('.nav_button .nav_btn_text');
	const navWrap = document.querySelector('#main_menu_wrap');

	const searchIcon = document.querySelector(".nav_button.search");
	const contactIcon = document.querySelector(".nav_button.contact");
	const menuIcon = document.querySelector(".nav_button.menu");

    menuIcon.addEventListener("click", e => ((navWrap.className != 'open_menu') ? navWrap.classList = '' : '') & (mainHtml.classList.add('locked')) & (menuIcon.classList.toggle("open")) & (e.target.closest('#main_menu_wrap').classList.toggle("open_menu")));

    contactIcon.addEventListener("click", e => ((navWrap.className != 'open_contact') ? navWrap.classList = '' : '') & (mainHtml.classList.add('locked')) & (contactIcon.classList.toggle("open")) & (e.target.closest('#main_menu_wrap').classList.toggle("open_contact")));

	searchIcon.addEventListener("click", e => ((navWrap.className != 'open_search') ? navWrap.classList = '' : '') & (mainHtml.classList.add('locked')) & (searchIcon.classList.toggle("open")) & (e.target.closest('#main_menu_wrap').classList.toggle("open_search")));

    function hideNavText(){
		mainNavText.forEach(navText => {
			(window.scrollY > 20 || navWrap.className != '') ? navText.classList.add('hide') : navText.classList.remove('hide');
		});
		(navWrap.className == '') ? mainHtml.classList.remove('locked') : '';
	}

	window.addEventListener('load', hideNavText);
	window.addEventListener('scroll', hideNavText);
	mainNavIcon.forEach(navIcon => { navIcon.addEventListener('click', hideNavText)})

	// close contact
	jQuery(".close_contact_button.topright").on( "click", function() {
		//console.log("close contact");
		jQuery("#main_menu_wrap").removeClass("open_contact");
		jQuery("html").removeClass("locked");
	});

</script>


<style>
/* set height */
div#nav_seclet_wrapper {
    position: relative;
    top: 150px;
    display: block;
}
@media(max-height:900px){
	div#nav_seclet_wrapper {
		top: 40px;
	}
}

html {
  scroll-behavior: smooth;
}



.full_menu div#nav_output_wrapper .arrows_container {
   /* width: 40px; */
   /*  height: 20px; */
}

div#nav_inner_select > div {
    width: 334px;
    padding: 30px 70px;
    /*position: relative;*/
}
#pages {
	display:none;
}
#category_culture, #category_explorebeyond, #category_news{
	display:none;
}
#pages.showsection{
	display: block;
	opacity: 1;
}

div#menuWrapper .disabled {
   opacity: .3;
   pointer-events: none;
}

#main_menu_wrap .close_contact_button.topright {
    top: 60px;
    right: 10px;
    left: auto;
	cursor:pointer;
}

@media screen and (max-width: 992px) {
	div#mobileMenuWrapper .menu-market-sectors-container, div#mobileMenuWrapper .menu-disciplines-container, div#mobileMenuWrapper .menu-expertise-container, div#mobileMenuWrapper .menu-culture-container, div#mobileMenuWrapper .menu-explore-beyond-container, div#mobileMenuWrapper .menu-team-container, div#mobileMenuWrapper .menu-news-container {
		text-align: center;
	}
	div#mobileMenuWrapper .menu-market-sectors-container ul.sector_nav, div#mobileMenuWrapper .menu-disciplines-container ul.discipline_nav, div#mobileMenuWrapper .menu-expertise-container ul.discipline_nav, div#mobileMenuWrapper .menu-culture-container ul.discipline_nav, div#mobileMenuWrapper .menu-explore-beyond-container ul.discipline_nav, div#mobileMenuWrapper .menu-team-container ul.team_nav, div#mobileMenuWrapper .menu-news-container ul.discipline_nav {
		padding-left: 0px;
		margin-top: 20px !important;
		margin-bottom: 20px !important;
	}
	.current-menu-item{
		font-weight:700;
	}
	ul.team_nav li {
		margin-right: 0px;
	}
	#main_menu_wrap .close_contact_button.topright {
		display:none;
	}
}

div#pages-mobile {
    width: 100%;
    text-align: center;
    line-height: 30px;
    padding: 0;
    margin: 20px auto;
}
.menu-pages-container ul.pages_nav {
    padding: 0;
}

</style>
