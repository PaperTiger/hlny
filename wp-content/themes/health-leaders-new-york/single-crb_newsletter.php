<?php 
get_header();
the_post();
get_template_part('fragments/top-section'); 
?>
<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size3 content-centered">
				<article class="post event-single">
					<div class="post-entry">
						<?php the_content(); ?>
					</div><!-- /.post-entry -->

					<?php 
					$gallery_images = carbon_get_the_post_meta('crb_newsletter_gallery', 'complex'); 
					if ( !empty($gallery_images) ) : ?>

						<section class="section section-gallery">
							<ul>
								<?php foreach ( $gallery_images as $image ) : 

									$full_image_src  = wp_get_attachment_image_src($image['image'], 'full');
									$thumb_image_src = wp_get_attachment_image_src($image['image'], 'medium'); ?>

									<li>
										<a href="<?php echo $full_image_src[0]; ?>">
											<img data-original="<?php echo $thumb_image_src[0]; ?>" alt="">
										</a>
									</li>

								<?php endforeach; ?>							
							</ul>
						</section><!-- /.section section-gallery section-gallery-primary -->

					<?php endif; ?>

					<div class="post-actions">
						<a href="<?php echo get_permalink(get_option('crb_newsletters_page')); ?>" class="btn-view-all"><?php _e('VIEW NEWSLETTER ARCHIVE', 'crb'); ?></a>
					</div><!-- /.post-actions -->
				</article><!-- /.post -->
			</div><!-- /.content -->
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>