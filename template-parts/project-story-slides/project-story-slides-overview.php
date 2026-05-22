<!-- project-story-slides-overview -->
<?php if( have_rows('slide_one')): while( have_rows('slide_one')): the_row(); 
	$projectstoryimagemedium = get_sub_field('image'); 
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_one') ): ?>
<?php if( have_rows('slide_two') ): while( have_rows('slide_two') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_two') ): ?>
<?php if( have_rows('slide_three') ): while( have_rows('slide_three') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_three') ): ?>
<?php if( have_rows('slide_four') ): while( have_rows('slide_four') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_four') ): ?>
<?php if( have_rows('slide_five') ): while( have_rows('slide_five') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_five') ): ?>
<?php if( have_rows('slide_six') ): while( have_rows('slide_six') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_six') ): ?>

<?php if( have_rows('slide_seven') ): while( have_rows('slide_seven') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_seven') ): ?>

<?php if( have_rows('slide_eight') ): while( have_rows('slide_eight') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_eight') ): ?>

<?php if( have_rows('slide_nine') ): while( have_rows('slide_nine') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_nine') ): ?>

<?php if( have_rows('slide_ten') ): while( have_rows('slide_ten') ): the_row(); 
	$projectstoryimagemedium = get_sub_field('image');
	$projectstoryimagesmall = get_sub_field('image'); 
	$projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium):?>
<div class="swiper-slide">
	<a data-fslightbox="gallery" href="<?php echo $projectstoryimagemedium; ?>">
		<img src="<?php echo $projectstoryimagesmall; ?>" alt="Architecture Photo of <?php echo $post->post_title; ?>">
	</a>
	<?php if($projectslidecredit): ?>
	<div class="photo_credit">
		<p>Ⓒ <?php echo $projectslidecredit; ?></p>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php endwhile; endif; // if( get_field('slide_ten') ): ?>
					