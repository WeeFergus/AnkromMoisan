[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

_s
===

Hi. I'm a starter theme called `_s`, or `underscores`, if you like. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A modern workflow with a pre-made command-line interface to turn your project into a more pleasant experience.
* A just right amount of lean, well-commented, modern, HTML5 templates.
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements

`_s` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (like, say, `megatherium-is-awesome`), and then you'll need to do a six-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain and replace with: `'megatherium-is-awesome'`.
2. Search for `_s_` to capture all the functions names and replace with: `megatherium_is_awesome_`.
3. Search for `Text Domain: _s` in `style.css` and replace with: `Text Domain: megatherium-is-awesome`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks and replace with: <code>&nbsp;Megatherium_is_Awesome</code>.
5. Search for `_s-` to capture prefixed handles and replace with: `megatherium-is-awesome-`.
6. Search for `_S_` (in uppercase) to capture constants and replace with: `MEGATHERIUM_IS_AWESOME_`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

### Setup

To start using all the tools that come with `_s`  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!


== Changelog ==

= 1.8.5 May 7, 2025 12:52pm
* Added home-2025, home-2025a, home-2025b, home-2025c templates in working on new homepage design
* Plugin updates

= 1.8.4 March 31, 2025 3:40pm
* Add On the Boards to Nav
* Adjust layout of project templates to fit full images
* Add Projects 2025 Template for better fitting images
* Plugin updates

= 1.8.3 March 6, 2025 12:30pm
* Fix stray 7 on Sector Template Specialty, hide debugging comments, fixed logic with In the News squares
* Fix breadcrumb for individual team members to say 'people' instead of 'project'
* Add acreage to project sidebar for Projects Template and Projects Template 2024, including fetch functionality

= 1.8.2 March 5, 2025 9:20pm
* Add Sector Template Specialty
* Plugin updates

= 1.8.1 February 23, 2025 11:15pm
* Update Footer left column to use Footer 1 menu instead of hardcoded
* Improved spacing in footer
* Plugin updates

= 1.8.0 February 20, 2025 5:39am
* Fix Explore Beyond filter issue introduced accidentally when alphabetizing fitler
* Plugin updates, Themes and WordPress core

* 1.7.9 January 31, 2025 11:40am
* Updated Sector 2025 and Sector templates to properly show the Explore Beyond and In the News items in the bottom
* Added AM in the News link to the footer menu
* Fixed issue with Projects 2024 with Planning button
* Fix z-index on home feature section
* Plugin updates

* 1.7.8 January 28, 2025 4:00pm
* Fix Interiors for Sector 2025 template
* Plugin updates

* 1.7.7 January 24, 2025 4:45pm
* Add Sectors 2025 template
* Update Fetch for Sectors 2025 and Sectors Hospitality 2024
* Update Projects 2024 template - fix issue with buttons
* Plugin Updates

* 1.7.6 January 19, 2025 1:30am
* Fix homepage link issue - stemmed from code on recent homepage hero feature

* 1.7.5 January 17, 2025 3:50pm
* Add categories to In the News section of Page Modules
* Adjust spacing and styles on Projects sidebar
* Add Spirituality to menu
* Remove debugging messages on Explore Beyond
* Update plugins

* 1.7.4 January 2, 2025 2:30am
* Upgrade Advanced Custom Fields Pro to Version 6.3.11
* Update Explore Beyond filters to be alphabetical instead of by term_order
* Plugin updates

* 1.7.3 December 8, 2024 11:00pm
* Update Gravity Forms
* Update Plugins

* 1.7.2 December 5, 2024 4:45pm
* Fix apostrophe issue on Team
* Fix layout issue with Hospitality sidebar
* Update plugins
* Update WordPress core version

* 1.7.1 November 14, 2024 2:00pm
* Homepage top image - add link
* Homepage grid - new customizable method
* All Studios grid - new customizable method
* Update Nav to add Urban Living
* Fix issue with Design not showing up on Projects
* Update plugins


* 1.7.0 November 1, 2024 3:30pm
* Update homepage to use still images from admin fields
* Updates to In the News Page Module
* Fix issue on Explore Beyond with custom thumbs
* Update plugins


* 1.6.9 October 30, 2024 11:25am
* Updates to Interiors Hospitality Sector page (The Society) image overlay
* Updates to In the News module filter
* Plugin updates

* 1.6.8 October 18, 2024 3:00p
* Update Sectors page Explore Beyond and In the News sections - to hide the non-combined versions and just show the combined version
* Same update for Hospitality Sector

* 1.6.7 October 18, 2024 10:05am
* Update Team Member Open Asset importing plugin - if Role is locked then don't update
* Update Team template - show Role for leadership, use new Open Asset field website_leadership to determine leaders


* 1.6.6 October 17, 2024 4:15am
* Fix Team Member Open Asset importing plugin - probably broke when PHP was updated. Includes plugin updates to remove errors.
* Remove On The Boards from footer
* Update plugins

* 1.6.5 October 2, 2024 2:30pm
* Fix of Project 2024 template logic to default to Architecture gallery if no discipline is provided
* Update plugins

* 1.6.4 September 30, 2024 4:00pm
* Fix Nav for Affordable Housing and Housing

* 1.6.3 September 30, 2024 2:35pm
* Remove Similar Projects from Projects template and replace with Back button
* Alphabetize Sectors on homepage, disciplines page, footer
* Add Architecture and Interiors to Team Leadership pages
* Update Plugins

* 1.6.2 September 17, 2024 1:30pm
* Add back <p></p> to Awards content on Projects and Projects 2024
* Add Hospitality sub-categories to Similar Projects
* Fix Architecture button color on Projects 2024 template


* 1.6.1 September 13, 2024 1:25am
* Updates related to PHP upgrade from 7.4 to 8.3
   * wp-config.php update to suppress errors on dev and send to the log
   * Declare variables and test for variables to reduce errors
* Plugin Updates


* 1.6.0 September 11, 2024 2:44am
* Fix FFE category in Fetch
* Add & to FF&E buttons
* Remove space below Awards on Projects pages
* Show right discipline slider on Project 2024 template 


* 1.5.9 September 10, 2024 3:10am
* Similar projects sort descending by date, change limit of 20 to 100
* Discipline button updates, Add FFE as an option of a button, add grayed out button function to Project 2024
* Logic updated to determine which stories to show on Project 2024: Defaults to Architecture not Overview
* Improved Fetch: Now fetches new Hospitality fields and Mass Timber, Fills in Top Project Text
* Add Project Status to Sidebar
* Plugin updates


* 1.5.8 August 20, 2024 10:45am
* Adjust layout of top slider on Project and Project 2024
* Project 2024 - adjust layout of disciplines and right sidebar
* Added Lightbox to top slider
* Add Hospitality 2024 template
* Add In the News module to Page Modules
* Hide In the News from bottom of Sectors for now
* Plugin updates


* 1.5.7 July 24, 2024 11:10pm
* Adjust height of project slider so photo credit shows
* Update footer email links so they open the contact form instead of using mailto
* Update mobile footer to match desktop footer rather than truncated version
* Remove "We don't have these types of projects at this location—yet." from bottom of project pages with no related projects
* Update WordPress version to 6.6.1


* 1.5.6 July 23, 2024 10:30am
* Projects page updates: Top slider left-aligned, Move title below image
* Top Projects now All Studios, lists studios not projects
* Homepage - swap Studios with Featured Story
* Add Explore Beyond to bottom of Sector page template
* Update San Francisco office address
* Fix issue with top content shortcode breaking on some pages
* Update plugins


* 1.5.5  June 20, 2024 4:25pm
* Update Hospitality Sector template to match regular Sector template
* Update Home template and Discipline template to go to main Hospitalty Sector page


* 1.5.4 June 18, 2024 2:40pm
* Slider backgrounds are now white instead of gray for Projects, Story sliders are left aligned.
* All projects are displayed for Projects and Sectors - there is no more Show All button
* Main story and right column of Projects are automatically open
* Navigation issue is fixed when first entering Navigation - goes to All Projects
* Architecture and Interiors now have a 3 x 3 grid of Sectors - Project Types removed.
* Homepage has projects removed, now shows 3 x 3 grid of Sectors, bottom sections are expanded


* 1.5.3 May 28, 2024 12:30pm
* Patch fix for DearPDF so that password protection works for posts


* 1.5.2 May 24, 2024 3:45pm
* Explore Beyond updates: image filter, photo filter, fix jumping, fix mobile blog search
* Add search description: Site and Explore Beyond
* Update plugins


* 1.5.1 May 13, 2024 4:04pm
* Search page revamp - works much better now: All 4 categories load: Posts, Pages, Projects and People. Odd formatting fixed. 
* Author updates for Blog Posts and Page Modules: Use Team Member pulldowns instead of Open Asset IDs
* Plugin updates


* 1.5.0 May 2, 2024 1:54am
* Add OpenAsset functionality for Page Module Authors
* Add Authors, including OpenAsset functionality for Blog Posts
* Slight adjustments to Contact Bubble image and layout
* Update to plugins includeing ACF, Gravity Forms and Ajax Search Pro


** 1.4.9 April 22, 2024 12:47pm
* Add Contact Us bubble to bottom right of screen, opens Contact form
* Change Business Services to Operational Excellence on Teams
* Improve contact behavior from Page Modules
* Plugin and WordPress Core Updates


** 1.4.8 March 31, 2024 11:24pm
* Add Affordable Housing as a top level page
* Update Navigation to add Affordable Housing, improve other issues with Nav
* Update styles for Authors LinkedIn and Instagram icons
* Plugin updates


** 1.4.7 March 19, 2024 12:03pm
* Update leadership to firm instead of executive, studio instead of architecture and interiors
* Add contact functionality, using #contact to open the contact form, adding an X, insert recipient dynamically
* Adding Author fields for email, phone, linkedin, instagram and openasset
* CSS adjustments for buttons and layout on Pagemodules, including new 'combined' style to combine authors
* Mobile menu updates to match new 'About' section


** 1.4.6 February 26, 2024 11:51pm
* Add dynamic styles to Side Module links
* Add Author module to Page Modules
* Hide projects from Person Page
* Add On the Boards to Nav menu
* On the Boards - add filters for Architecture and Interiors
* Add link treatment to Explore Beyond Posts
* Add title mouseovers to nav icons
* People Pages accommodate apostrophes


** 1.4.5 February 13, 2024 11:00am
* On the Boards: Filter by category, show categories, breadcrumbs


** 1.4.4 February 9, 2024 4:15pm
* On the Boards - fix variable so that it pulls the images properly. Change from random to by date.
* Team Member - remove the animation CSS from page - move to Customization settings
* Page Modules - Add Section Class, improvements to Side Button


** 1.4.3 January 31, 2024 2:12am
* Style adjustments for Page Modules layuout, chevron, expandable side content
* People Pages social icons layout update to keep icons together
* Update WordPress to 6.4.3 and plugins


** 1.4.2 January 29, 2024 3:57am
* Style adjustments for header on Page Modules template


** 1.4.1 January 28, 2024 2:45am 
* Page Madule style adjustments - boxed content
* Team Member - People Page - rearrangement - swap name with quote


** 1.4.0 January 26, 2024 12:30pm
* Team member page updates: Add data and information from OpenAsset
* Page Module updates: Add Full Width option, Featured links module, Featured links header
* Change Sector to Studio
* Update Wordpress to 6.4.2 and plugins


** 1.3.9 November 22, 2023 10:52am
* Reomve Google Analytic tag and Tag Manager from header - will use Monster Insights
* Update Wordpress to 6.4.1 and plugins


** 1.3.8 - November 7, 2023 5:03pm
* Add Culture to Menu
* WordPress update to 6.4


** 1.3.7 - October 27, 2023 1:30 pm
* More updates to Page Modules CSS layout

** 1.3.6 - October 27, 2023 10:30 am
* Updates to Page Modules CSS layout
* Update mobile contacts
* WordPress update to 6.3.3

** 1.3.5 - September 22, 2023 4:27pm
* Updates to Page Modules template for button styles, coverflow album
* Projects Fetch now includes design and process
* Fix sorting typo with coverflow albums


* * 1.3.4 - August 30, 2023 10:05am
* Fix typo with album caption that was causing issues with Selfies on the live site (not dev for some reason)
* WordPress update to 6.3.1


* * 1.3.3 - August 17, 2023 5:10pm
* Page Templates updates: buttons, carousel
* OpenAsset Albums updates to function getOpenAssetAlbumSwiper for Coverflow and zoom
* Project Template: Add Process and Design
* Sector Template: Add unlimited sidebar links
* Hide message "we don't have these types of projects at this location-yet" 
* WordPress update to 6.3

* * 1.3.2 - August 8, 2023 1:16am
* Add Links to Hospitality template sidebar

* * 1.3.1 - August 4, 2023 10:05am
* Fixes to main nav for Explore Beyond and In the News
* Links for Sector sidebar
* Breadcrumb updates for Page Module
* Carousel updates for styles

* * 1.3.0 - July 26,2023 18:55am
* Updates to template-pagemodules.php: * add button images * add button types: simple and expandable * add custom breadcrumb * remove dividers 
* Hide Sector PDF link if no link
* Add AM in the News to the desktop and mobile nav, small fixes to mobile nav

* * 1.2.9 - July 24,2023 11:09am
* Add template-pagemodules.php
* Adjustments to CSS

= 1.2.8 - June 8, 2023 12:10 (was 1.2.3 duplicate)
* Update Projects template to show Overview first followed by discipline story
* Add space to On The Board breadcrumb

= 1.2.7 - May 30,2023 11:15 (was 1.2.2 duplicate)
* Fix breadcrumbs issue with hyphens for sectors with two words

= 1.2.6 - May 30,2023 10:10  (was 1.2.1 duplicate)
* Remove 'All Disciplines' from breadcrumbs - it's not needed
* Updated versions in readme.txt

= 1.2.5 - May 29, 2023 16:27 (was 1.2.0 duplicate)
* Fix issues with Custom Similar Projects: show all, put in right order

= 1.2.4 - May 29, 2023 11:15  (was  1.1.9 duplicate)
* Clean up Projects slideshow layout
* Update Breadcrumbs to include sectors and links
* Add Custom Similar Projects option
* Add Alternative Project Category - for combined projects

= 1.2.3 - June 8, 2023 12:10
* Update Projects template to show Overview first followed by discipline story
* Add space to On The Board breadcrumb

= 1.2.2 - May 30,2023 11:15
* Fix breadcrumbs issue with hyphens for sectors with two words

= 1.2.1 - May 30,2023 10:10
* Remove 'All Disciplines' from breadcrumbs - it's not needed
* Updated versions in readme.txt

= 1.2.0 - May 29, 2023 16:27 
* Fix issues with Custom Similar Projects: show all, put in right order

= 1.1.9 - May 29, 2023 11:15 
* Clean up Projects slideshow layout
* Update Breadcrumbs to include sectors and links
* Add Custom Similar Projects option
* Add Alternative Project Category - for combined projects

= 1.1.8 - February 6, 2023 17:57
* Add 'ranked' after the categories for Open Asset albums - to further differentiate them

= 1.1.7 - February 6, 2023 16:52
* Add copyright for photographer credit

= 1.1.6 - February 6, 2023
* Add Open Asset functionality in PHP and Javascript to retrieve albums from Open Asset and display them in projects
* Fix Lightbox issue that was occurring on Dev - updated to current version in /js/fslightbox.js

= 1.1.5 - January 17, 2023
* Add Related Projects exclusion option for project categories
* Add Certified field for projects. Pull Certified and Awards from Open Asset
* Change Home link in footer to Blog

= 1.1.4 - December 19, 2022
* Add breadcrumbs functionality to Explore Beyond: dynamically change breadcrumbs and URL based on filter
* Change breadcrumbs to capital case
* Update sector template to add links / text functionality

= 1.1.3 - December 13, 2022
* Add Project Types from ACF instead of hard-coded logic

= 1.1.2 - November 28, 2022
* Add images 7,8,9,10 to the slideshows

= 1.1.1 - November 28, 2022
* Revert back Sector template - Project Types wasn't quite right

= 1.1.0 - November 22, 2022
* Small adjustments

= 1.0.9 - November 22, 2022
* Projects Awards updates, Card CiXg9YzS/82-new-certification-award-fields-for-project-pages-reorder-of-project-detail-fields
* Fix image formatting issues with posts  Issue with Blog editor images - can't be properly edited in WYSIWYG editor Card OGeWypPk/133-blog-notes-11-14
* Use filter=architecture instead of cat=architecture for filtering categories  Card OGeWypPk/133-blog-notes-11-14
* Update template for Hospitality Interior to match template-projects - for the method of displaying PROEJCT TYPES
* Update sector template to hide "We don't have these types of projects at this location—yet."

= 1.0.8 - November 21, 2022
* Updates to Sectors for Project types
* Fix image formatting issues with posts
* Add Awards for projects

= 1.0.7 - October 13, 2022
* Updates to Explore Beyond styles for customizing image locations, adding right margin to chevrons

= 1.0.6 - October 10, 2022
* Numerous updates to Explore Beyond template and styles
* Add Explore Beyond to menu, remove Expertise
* Updates to nav

= 1.0.5 - September 3, 2022
* Fix Interiors and other disciplines navigation to stay within discipline
* Update breadcrumbs to include a lot more links
* Darken nav styles - they were too light
* Add Explore Beyond template and styles

= 1.0.4 - July 27, 2022 =
* Team Page template-team include Business Services on the Firm Services page
* Turn off 'test_update_team in functions.php for troubleshooting
* Add Health Plans to footer

= 1.0.3 - June 5, 2022 =
* Added Architecture Leadership and Interiors Leadership pages breadcrumb
* Added Architecture Leadership and Interiors Leadership pages on navigation
* Added Architecture Leadership and Interiors Leadership pages title
* Cleaned up /template-parts/main-menu.php code and added /////////// SECTION REMARKS ///////////

= 1.0.2 - May 17, 2022 =
* Updates to Breadcrumbs for people
* Updates to mobile nav
* Updates to style for people
* Rearrange order of titles under people
* Remove duplicate Role / Discipline even if not exact
* Add Changelog header

= 1.0.1 =
* Initial version of ankrom-moisan theme committed to Webaissance repository
