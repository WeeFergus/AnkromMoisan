<?php
  /* Template Name: Location
     Template Post Type: locations
  */
  /* The template for displaying location CPTs. */

  get_header();

  $intro = get_field('introduction');
  $address = get_field('location_address');
  $phone = get_field('location_phone');
  ?>
  <main id="primary" class="site-main">
    <div class="hero_sector_wrapper">
      <div class="hero_sector_image_wrap">
        <div class="hero_image architecture_project_content healthcare" style="background-image: url(

        <?php echo esc_url(
          get_the_post_thumbnail_url(get_the_ID(), 'full')
          ); ?>);"> </div>
        <div class="container hero_title">
          <div class="row">
            <div class="col-12">
              <h1>
              <span class="sector_title"> <?php the_title(); ?> Office </span>
            </h1> </div>
          </div>
        </div>
      </div>
    </div>
    <!-- introduction -->
    <div class="container sector_top_content">
      <div class="row">
        <div class="col-lg-7 col-md-12 toggle_wrapper">
          <p>
            <?php echo $intro; ?>
          </p>
        </div>
        <div class="col-lg-1 col-md-12"></div>
        <div class="col-lg-4 col-md-12 toggle_wrapper sector_sidebar">
          <p>
            <?php echo $address; ?>
          </p>
          <p>
            <a href="tel:1-
            <?php echo esc_attr($phone); ?>">
              <?php echo esc_html($phone); ?>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- leadership -->
    <?php if (have_rows('leadership_profiles')): ?>
      <div class="container no_slider_top_text_wrap">
        <div class="row">
          <div class="col-12 our-team-top">
            <h2> <?php $office_title = get_field('office_title');
              if(empty($office_title)) {
                echo '
          <bold>Office &amp; Leadership</bold>';
              } else {
                echo '
          <bold>'.$office_title.'</bold>';
              } ?> </h2> </div>
        </div>
      </div>
      <div class="container">
        <div class="team-grid">
          <?php $profile_ids = [];
  while (have_rows('leadership_profiles')) : the_row();?>
            <div class="person-container">
              <div class="headshot">
                <?php  $profile = get_sub_field('profile');
      if ($profile) :
        $profile_id = $profile->ID;
        $team_member_name = get_field('team_member_name', $profile_id);

        $name_div = strtolower(
          str_replace([" ", "(", ")", "'"], ["_", "", "", ""], $team_member_name)
        );

        $profile_ids[] = $name_div;
        $discipline     = get_field('team_member_discipline', $profile_id);
        $title          = get_field('team_member_title', $profile_id);
        $accreditation  = get_field('team_member_accreditation', $profile_id);
        $role           = get_field('team_member_role', $profile_id);
        $headshot       = get_field('top_page_slidershow_slide_one_image', $profile_id);

        // Get this person's OA employee ID (stored in ACF as 'project_id' inside 'fetch_data')
        $oa_employee_id = '';
        if ( have_rows('fetch_data', $profile_id) ) {
          while ( have_rows('fetch_data', $profile_id) ) {
            the_row();
            $oa_employee_id = get_sub_field('project_id');
          }
        }

        // Fetch LinkedIn URL from OpenAsset
        $linkedin_url = '';
        if ( $oa_employee_id ) {
          $oa_username = 'website_front_end';
          $oa_password = 'ankrom';
          $oa_url = 'https://ankrommoisan.openasset.com/REST/1/Employees?id=' . $oa_employee_id
            . '&username=' . $oa_username
            . '&password=' . $oa_password;

          $oa_response = file_get_contents($oa_url);
          $oa_data     = json_decode($oa_response, true);

          if ( !empty($oa_data[0]['people_pages_social_media_linked_in']) ) {
            $linkedin_url = $oa_data[0]['people_pages_social_media_linked_in'];
          }
        }



        if (strpos(strtolower($discipline), "leadership") !== false) {
          $title = $role;
        }

        $showonsite = $title;

      ?>
                  <?php if ($headshot) : ?> <a href="
              <?php echo get_permalink($profile_id); ?>" target="_blank">
            <img id="selfie-<?php echo $thisname; ?>"
            class="employee-image"
            src="<?php echo $headshot; ?>"
            data-headshot="<?php echo $headshot; ?>"
            data-selfie="<?php echo $name_div; ?>"
            >

          </a>
                    <?php endif; ?>
              </div>
              <div class="name-link-grid">
                <div class="name-title">
                  <a target="_blank" href="
                    <?php echo get_permalink($profile_id); ?>">
                    <h3> <?php echo $team_member_name; ?> </h3> </a>
                  <p class="people_status"><?php echo $showonsite; ?><span class="acc"><?php echo $accreditation; ?></span></p>
                </div>
                <?php if ( $linkedin_url ) : ?>
                  <div class="social_div">

                    <div class="employee-social">
                      <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" title="LinkedIn">
                        <span class="dashicons dashicons-linkedin"></span>
                      </a>
                    </div>
                  </div>
                  <?php endif; ?>
              </div>
            </div>
            <?php endif;?>
              <?php  endwhile;
endif;
?>
        </div>
        <div id="selfies">
          <?php $album_id = 5645;
  include get_template_directory() . "/functions_openassets_album.php";
  $OA_album = getOpenAssetsAlbumsByID($album_id,'',false);
  $files = $OA_album['files'];
  foreach ($files as $file) {
    $caption = strtolower($file['caption']);
    $thisname = str_replace(
      [" ", "(", ")", "'"],
      ["_", "", "", ""],
      $caption
    );

    // only print selfies for displayed profiles
    if (!in_array($thisname, $profile_ids)) {
      continue;
    }

    echo '
          <div class="albumpicdiv">
            <img id="selfie-' . $thisname . '"
      src="' . $file['webview'] . '"
      class="albumpicimg">
            </div>';
  }?> </div>
      </div>
      <!--end leadershio-->
      <!--culture -->
      <?php if (have_rows('community_&_culture')): ?>
        <div class="container culture-wrap">
          <div class="row">
            <div class="col-12 our-team-top">
              <h2> <?php $community_title = get_field('community_&_culture_title');
        if(empty($community_title)) {
          echo '
                <bold>Community &amp; Culture</bold>';
          } else {
        echo '
                <bold>'.$community_title.'</bold>';
      } ?> </h2> </div>
          </div>
        </div>
        <div class="container">
          <div class="culture-row">
            <?php while (have_rows('community_&_culture')):
    the_row();
    $article_title = get_sub_field('article_title');
    $article_link = get_sub_field('article_link');
    $article_content = get_sub_field('article_content');
    $article_image = get_sub_field('article_image');
    ?>
              <div class="culture-grid">
                <div class="text-block">
                  <?php if ($article_title): ?>
                    <h3 class="h2"> <?php echo esc_html($article_title); ?> </h3>
                    <?php endif; ?>
                      <?php if ($article_content): ?>
                        <p>
                          <?php echo esc_html($article_content); ?>
                        </p>
                        <?php endif; ?>
                          <?php if ($article_link): ?> <a target="_blank" href="
                    <?php echo esc_url($article_link); ?>">Read More </a>
                <?php endif; ?>
                </div>
                <div class="img"> <img src="

                  <?php echo esc_url($article_image['url']); ?>" alt="

                  <?php echo esc_attr($article_image['alt']); ?>" /> </div>
              </div>
              <?php
    endwhile;
    endif; ?>
          </div>
        </div>
        <!--projects-->
        <?php if (have_rows('projects')): ?>
          <div class="container no_slider_top_text_wrap">
            <div class="row">
              <div class="col-12 our-team-top">
                <h2> <?php
           $projects_title = get_field('projects_title');
           if(empty($projects_title)) {
            echo '
                  <bold>Projects</bold>';
           } else {
            echo '
                  <bold>'.$projects_title.'</bold>';
           } ?> </h2> </div>
            </div>
          </div>
          <div class="container">
            <div class="project-grid">
              <?php while (have_rows('projects')):
        the_row();
        $title = get_sub_field('project_name');
        $studio = get_sub_field('project_studio');
        $img = get_sub_field('project_image');
        $img_oa = get_sub_field('project_image_openasset');
        $project = get_sub_field('project_link');
        $project_url = get_permalink($project->ID);
        $project_id = $project->ID;
        ?>
                <div class="story_image">
                  <a target="_blank" href="
                  <?php echo esc_url($project_url); ?>">
                    <?php if (!empty($img_oa)) : ?>
                      <div class="square-img" style="background-image: url(
                    <?php echo esc_url($img_oa); ?>);"> </div>
                      <?php elseif (!empty($img)) : ?>
                        <div class="square-img" style="background-image: url(
                    <?php echo esc_url($img); ?>);"> </div>
                        <?php endif; ?>
                  </a>
                  <div class="project_content_wrap">
                    <div class="row d-lg-flex">
                      <div class="col-md-10 col-sm-12">
                        <div class="d-lg-block">
                          <h3 class="shimmer">
                  <a target="_blank" href="
                            <?php echo esc_url($project_url); ?>"> <?php if ($title) {
                      echo $title;
                      } else {
                      echo esc_html(get_the_title($project_id));
                      } ?> </a>
                </h3>
                          <h4> <?php echo $studio; ?> </h4> </div>
                      </div>
                      <div class="col-md-2 col-sm-12 arrow_wrap">
                        <a target="_blank" href="
                        <?php echo esc_url($project_url); ?>">
                          <div id="cta_arrow"> <span class="arrow_right primera black"></span> <span class="arrow_right segunda black"></span> </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
        endwhile;
        endif; ?>
            </div>
            <!-- news -->
            <?php if ( have_rows('news_posts') ) : ?>
              <div class="container no_slider_top_text_wrap">
                <div class="row">
                  <div class="col-12 our-team-top">
                    <h2> <?php
          $news_title = get_field('news_title');
           if(empty($news_title)) {
            echo '
                  <bold>News &amp; Insights</bold>';
           } else {
            echo '
                  <bold>'.$news_title.'</bold>';
           } ?> </h2> </div>
                </div>
              </div>
              <div class="container module-container">
                <div class="row" id="description">
                  <div class="col-12">
                    <div class="module-subheader"></div>
                    <div class="module-content">
                      <style>
                      .inthenews-thumbsrc {
                        background-color: #3D3935 !important;
                      }
                      </style>
                    </div>
                  </div>
                </div>
                <div class="row modulerow justify-content-start pushLeft" style="max-width:1140px;margin:auto;">
                  <?php while ( have_rows('news_posts') ) : the_row();
        $post_object = get_sub_field('news_post');
        if ( $post_object ) :
          $post_id    = $post_object->ID;
          $post_url   = get_permalink( $post_id );
          $post_title = get_the_title( $post_id );
          $thumb      = get_the_post_thumbnail_url( $post_id, 'medium' );
          $news_link  = get_field('news_link', $post_id);
          $link_url   = !empty($news_link) ? $news_link : $post_url;
      ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                      <div class="inthenews-post underline_link_wrap">
                        <div class="catsoverlay" style="visibility: hidden;"></div>
                        <a href="<?php echo esc_url($link_url); ?>" target="_blank" class="posttitle">
                          <div class="inthenews-thumb"> <img src="
                        <?php echo esc_url($thumb); ?>" class="inthenews-thumbsrc img-fluid" alt="
                        <?php echo esc_attr($post_title); ?>"> </div>
                          <div class="inthenews-title">
                            <h3> <?php echo esc_html($post_title); ?> </h3> </div>
                        </a>
                      </div>
                    </div>
                    <?php endif; endwhile; ?>
                </div>
              </div>
              <?php endif; ?>
                <script>
                jQuery('a.posttitle').mouseover(function() {
                  var closestoverlay = jQuery(this).closest('.inthenews-post').find('.catsoverlay');
                  jQuery(closestoverlay).css('visibility', 'visible');
                });
                jQuery('a.posttitle').mouseout(function() {
                  var closestoverlay = jQuery(this).closest('.inthenews-post').find('.catsoverlay');
                  jQuery(closestoverlay).css('visibility', 'hidden');
                });
                </script>
  </main>
  <?php get_footer(); ?>
    <script>
    jQuery(function() {
      jQuery(".employee-image").mouseover(function() {
        var key = jQuery(this).data("selfie");
        var selfie = jQuery("#selfie-" + key);
        if(selfie.length) {
          jQuery(this).attr("src", selfie.attr("src"));
        }
      });
      jQuery(".employee-image").mouseout(function() {
        var originalsrc = jQuery(this).data("headshot");
        if(originalsrc) {
          jQuery(this).attr("src", originalsrc);
        }
      });
    });
    </script>
