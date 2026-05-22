<?php echo "<!--project-top-slides-with-discipline -->"; ?>
<?php if( have_rows('slide_one') ){ while( have_rows('slide_one') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } } // end of the loop. ?>
<?php } // if( get_field('slide_one') ){ ?>
<?php if( have_rows('slide_two') ){ while( have_rows('slide_two') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_two') ){ ?>
<?php if( have_rows('slide_three') ){ while( have_rows('slide_three') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_three') ){ ?>
<?php if( have_rows('slide_four') ){ while( have_rows('slide_four') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_four') ){ ?>
<?php if( have_rows('slide_five') ){  while( have_rows('slide_five') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_five') ){ ?>
<?php if( have_rows('slide_six') ){  while( have_rows('slide_six') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_six') ){ ?>

<?php if( have_rows('slide_seven') ){  while( have_rows('slide_seven') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_seven') ){ ?>

<?php if( have_rows('slide_eight') ){  while( have_rows('slide_eight') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_eight') ){ ?>

<?php if( have_rows('slide_nine') ){  while( have_rows('slide_nine') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_nine') ){ ?>

<?php if( have_rows('slide_ten') ){  while( have_rows('slide_ten') ){ the_row(); $projectstoryimagemedium = get_sub_field('medium'); $projectslidecredit = get_sub_field('photographer_credit');?>
<?php if($projectstoryimagemedium){?>
<div class="swiper-slide">
	<img src="<?php echo $projectstoryimagemedium; ?>" alt="<?php echo ucfirst($discipline) ;?> Photo of <?php echo $post->post_title; ?>">
	<?php $copy = ""; if($projectslidecredit){ $copy="&copy;&nbsp;"; } ?>
	<div class="photo_credit">
		<p><?php echo $copy.$projectslidecredit; ?></p>
	</div>
</div>
<?php } ?>
<?php } } // if( get_field('slide_ten') ){ ?>