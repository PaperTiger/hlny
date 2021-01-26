<?php 
get_header();
the_post();

get_template_part('fragments/top-section'); 

$upcoming_event = crb_check_if_event_is_upcoming(get_the_ID());
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size2">
				<?php if ( $upcoming_event ) : ?>

					<article class="post event-single">
						<div class="post-entry">
							<?php 
							$show_thumb = carbon_get_the_post_meta('crb_show_image_on_single_page');

							if ( has_post_thumbnail() && $show_thumb !== 'no' ) {
								the_post_thumbnail('large');
							} ?>

							<?php the_content(); ?>
						</div><!-- /.post-entry -->

						<div class="post-actions">
							<?php 
							$register_link = carbon_get_the_post_meta('crb_event_register_link'); 
							$embed_code = carbon_get_the_post_meta('crb_event_embed_code');
							if ( $embed_code ) :
								echo $embed_code;
							elseif ( !empty( $register_link ) ) : 
								?>
								<a href="<?php echo $register_link; ?>" target="_blank" class="btn btn-green"><?php _e('REGISTER FOR THIS EVENT', 'crb'); ?></a>

								<?php if ( function_exists('gravity_form') ) : ?>

									<a href="#" class="btn sponsor-form-link btn-gray"><?php _e('SPONSOR THIS EVENT', 'crb'); ?></a>
									<div id="sponsorship-form">
										<div class="container">
											<?php gravity_form(get_option('crb_sponsorship_form'), 1, 1, 0, 0, 1); ?>
										</div>
									</div>

								<?php endif;
							endif;
							?>

							<div class="event-share-container">
								<p><?php _e('Share this event:', 'crb'); ?></p>
								<?php get_template_part('fragments/share-icons'); ?>
							</div>
						</div><!-- /.post-actions -->
					</article><!-- /.post -->

				<?php else : 
					?>
					<article class="post event-single">
						<div class="post-entry">
							<?php the_content(); ?>
						</div>
					</article>
					<?php
					echo str_repeat('<br />', 2);

					$gallery_images = carbon_get_the_post_meta('crb_event_gallery_images', 'complex'); 
					if ( !empty($gallery_images) ) : ?>

						<section class="section section-gallery section-event-photos">
							<ul>
								<?php foreach ( $gallery_images as $image ) : 

									$full_image_src = wp_get_attachment_image_src($image['image'], 'full'); 
									$thumb_src 		= wp_get_attachment_image_src($image['image'], 'large'); 

									$title = !empty($image['image_title']) ? 'title="' . $image['image_title'] . '"' : '';
									$desc  = !empty($image['image_description']) ? 'data-description="' . $image['image_description'] .'"' : ''; ?>

									<li>
										<a href="<?php echo $full_image_src[0]; ?>" style="background-image: url(<?php echo $thumb_src[0]; ?>);" <?php echo $title; ?> <?php echo $desc; ?> >
											<img data-original="<?php echo $thumb_src[0]; ?>" alt="">
										</a>
									</li>

								<?php endforeach; ?>
							</ul>
						</section>

					<?php endif;

				endif; ?>
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>
