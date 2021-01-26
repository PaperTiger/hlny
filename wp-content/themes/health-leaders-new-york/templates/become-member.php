<?php 
/*
	Template Name: Become a Member
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<?php 
		$sections = carbon_get_the_post_meta('crb_member_sections', 'complex'); 
		if ( !empty($sections) ) : 

			foreach ( $sections as $section ) : ?>

				<section class="section section-membership">
					<div class="section-aside">
						<?php if ( !empty($section['testimonial_image']) ) {

							echo wp_get_attachment_image($section['testimonial_image'], 'large', 0, array('class' => 'fullscreen-image'));

						} ?>
						<div class="testimonial">
							<?php if ( !empty($section['testimonial_text']) ) : ?>

								<blockquote>
									<?php echo wpautop($section['testimonial_text']); ?>
								</blockquote>

							<?php endif; ?>

							<div class="testimonial-author">
								<?php echo wpautop($section['testimonial_author_name']);  ?>
								<?php echo wpautop($section['testimonial_author_info']);  ?>
							</div><!-- /.testimonial-author -->
						</div><!-- /.testimonial -->
					</div><!-- /.col col-1of2 -->
					
					<div class="section-content">
						<div class="post">
							<?php if ( !empty($section['title']) ) : ?>

								<h2 class="post-title"><?php echo $section['title']; ?></h2><!-- /.post-title -->

							<?php endif; ?>
							
							<div class="post-entry">
								<?php if ( !empty($section['content']) ) {
									echo wpautop($section['content']);
								} 

								if ( !empty($section['plans']) ) : ?>
								
									<ul class="list-prices">
										<?php foreach ( $section['plans'] as $plan ) : ?>

											<li>
												<h6><?php echo $plan['plan_name']; ?></h6>
												<strong><?php echo $plan['plan_price']; ?></strong>
											</li>

										<?php endforeach; ?>
									</ul><!-- /.list-prices -->

								<?php endif; 

								if ( !empty($section['bottom_text']) ) : ?>

									<p>
										<small>
											<em><?php echo $section['bottom_text']; ?></em>
										</small>
									</p>

								<?php endif; 

								if ( !empty($section['green_button_text']) && !empty($section['green_button_link']) ) : ?>

									<p>
										<a href="<?php echo $section['green_button_link']; ?>" class="btn btn-green"><?php echo $section['green_button_text']; ?></a>
									</p>

								<?php endif; ?>
							</div><!-- /.post-entry -->
						</div><!-- /.post -->
					</div><!-- /.col col-1of2 -->
				</section><!-- /.section section-primary -->

			<?php endforeach; 

		endif; ?>
		
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>