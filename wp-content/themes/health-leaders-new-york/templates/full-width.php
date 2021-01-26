<?php 
/*
	Template Name: Full Width Template
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section'); 
?>


<div class="container container-full-width-page">

	<?php 
	$sections = carbon_get_the_post_meta('crb_full_width_sections', 'complex'); 

	if ( !empty($sections) ) :

		foreach ( $sections as $key => $section ) : 

			$section_class = 'section'; 
			$section_type = $section['_type'];
			if ( $section_type === '_gallery_with_description' ) {
				$section_class .= ' section-gallery section-gallery-primary';
			} 

			if ( $section_type === '_gallery_images' ) {
				$section_class .= ' section-gallery';
			}

			if ( $section_type === '_full_width_text' ) {
				$section_class .= ' section-textcols';
			}

			$section_title = !empty( $section['tab_title'] ) ? $section['tab_title'] : 'Tab ' . ($key + 1);
			$section_id = sanitize_title_with_dashes( $section_title );

			$text_section = in_array($section_type, array('_right_image_section', '_left_image_section', '_full_width_text')); ?>

			<section class="<?php echo $section_class; ?>" id="<?php echo $section_id; ?>">

				<?php if ( $text_section ) : ?>

					<div class="shell">
						<article class="post">

				<?php endif; 

				switch ( $section_type ) {

					case '_right_image_section' : {

						if ( !empty($section['right_image']) ) : ?>

							<div class="col col-1of2 col-right">
								<?php echo wp_get_attachment_image($section['right_image'], 'large'); ?>
							</div><!-- /.col col-1of2 -->

						<?php endif; ?>

						<div class="col col-1of2">
							<?php if ( !empty($section['left_title']) ) : ?>

								<header>
									<h2 class="post-title"><?php echo $section['left_title']; ?></h2><!-- /.post-title -->
								</header>

							<?php endif; 

							if ( !empty($section['left_text']) ) : ?>
							
								<div class="post-entry">
									<?php echo apply_filters('the_content', $section['left_text']); ?>
								</div><!-- /.post-entry -->

							<?php endif; ?>
						</div><!-- /.col col-1of2 -->	

						<?php break;

					}

					case '_left_image_section' : {

						if ( !empty($section['left_image']) ) : ?>

							<div class="col col-1of2">
								<?php echo wp_get_attachment_image($section['left_image'], 'large'); ?>
							</div><!-- /.col col-1of2 -->

						<?php endif; ?>

						<div class="col col-1of2">
							<header>
								<?php if ( !empty($section['right_title']) ) : ?>

									<h2 class="post-title"><?php echo $section['right_title']; ?></h2><!-- /.post-title -->

								<?php endif; 

								if ( !empty($section['right_subtitle']) ) : ?>
								
									<h6><?php echo $section['right_subtitle']; ?></h6>

								<?php endif; ?>
							</header>
							
							<?php if ( !empty($section['right_text']) ) : ?>

								<div class="post-entry">
									<?php echo apply_filters('the_content', $section['right_text']); ?>
								</div><!-- /.post-entry -->

							<?php endif; ?>
						</div><!-- /.col col-1of2 -->

						<?php break;


					}

					case '_full_width_text' : {

						if ( !empty($section['full_width_text']) ) : ?>

							<div class="post-entry">
								<?php echo apply_filters('the_content', $section['full_width_text']); ?>
							</div><!-- /.post-entry -->

						<?php endif;

						break;

					}

					case '_gallery_with_description' : {

						?>
						<div class="shell">
							<?php 
							
							if ( !empty($section['gallery_title']) ) : ?>

								<h2 class="section-title"><?php echo $section['gallery_title']; ?></h2><!-- /.section-title -->

							<?php endif; 

							if ( !empty($section['gallery_description']) ) : ?>

								<div class="section-entry">
									<?php echo wpautop($section['gallery_description']); ?>
								</div><!-- /.section-entry -->

							<?php endif; 

							if ( !empty($section['gallery_images']) ) : ?>

								<ul>
									<?php foreach ( $section['gallery_images'] as $image ) : 

										$full_image_src = wp_get_attachment_image_src($image['image'], 'full'); 
										$thumb_src 		= wp_get_attachment_image_src($image['image'], 'large');?>

										<li>
											<a href="<?php echo $full_image_src[0]; ?>">
												<img data-original="<?php echo $thumb_src[0]; ?>" alt="">
											</a>
										</li>

									<?php endforeach; ?>
														
								</ul>

							<?php endif; ?>
						</div><!-- /.shell -->

						<?php

						break;

					}

					case '_gallery_images' : {

						if ( !empty($section['gallery_images']) ) : ?>

							<div class="shell">
								<ul>
									<?php foreach ( $section['gallery_images'] as $image ) : 

										$full_image_src = wp_get_attachment_image_src($image['image'], 'full'); 
										$thumb_src 		= wp_get_attachment_image_src($image['image'], 'large');?>

										<li>
											<a href="<?php echo $full_image_src[0]; ?>">
												<img data-original="<?php echo $thumb_src[0]; ?>" alt="">
											</a>
										</li>

									<?php endforeach; ?>
														
								</ul>
							</div>

						<?php endif; 
					}

				} 

				if ( $text_section ) : ?>

						</article>
					</div>

				<?php endif; ?>

			</section>

		<?php endforeach; 

	endif; ?>
</div><!-- /.container -->

<?php get_footer(); ?>
