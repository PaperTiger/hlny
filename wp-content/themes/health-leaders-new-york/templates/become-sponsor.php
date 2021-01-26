<?php 
/*
	Template Name: Become a Sponsor
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section'); 
?>


<div class="container">
	<div class="main">
		<div class="section section-become-a-sponsor">
			<div class="shell">
				<div class="content content-size2">
					<div class="post">
						<?php 
						$top_title = carbon_get_the_post_meta('crb_become_sponsor_top_title');
						if ( !empty($top_title) ) : ?>

							<h2 class="post-title post-title-secondary"><?php echo $top_title; ?></h2>

						<?php endif; ?>
						<div class="post-entry">
							<?php the_content(); ?>
						</div><!-- /.post-entry -->
					</div><!-- /.post -->
				</div><!-- /.content -->
				
				<?php get_sidebar(); ?>
			</div><!-- /.shell -->
		</div><!-- /.section section-become-a-sponsor -->
		
		<div class="section section-sponsorship-levels">
			<div class="shell">
				<div class="post">
					<?php 
					$sponsorship_title = carbon_get_the_post_meta('crb_sponsorship_title');
					$sponsorship_levels = carbon_get_the_post_meta('crb_sponsorship_levels', 'complex'); 
					if ( !empty($sponsorship_title) ) : ?>

						<h2 class="post-title post-title-secondary"><?php echo $sponsorship_title; ?></h2>

					<?php endif; 

					if ( !empty($sponsorship_levels) ) : ?>
				
						<ul class="sponsorship-levels">
							<?php foreach ( $sponsorship_levels as $count => $level ) : 

								$class = !$count ? 'sponsorship-level sponsorship-level-featured' : 'sponsorship-level'; ?>

								<li class="<?php echo $class; ?>">
									<div class="sponsorship-level-row">
										<?php if ( !empty($level['title']) ) : ?>

											<h6><?php echo $level['title']; ?></h6>

										<?php endif; 

										if ( !empty($level['description']) ) {

											echo wpautop($level['description']); 

										} ?>
									</div><!-- /.sponsorship-level-row -->
									
									<div class="sponsorship-level-row">
										<?php if ( !empty($level['price']) ) : ?>

											<h6>
												<?php echo $level['price']; 

												if ( !empty($level['text_under_price']) ) : ?>
											
													<span><?php echo $level['text_under_price']; ?></span>

												<?php endif; ?>
											</h6>

										<?php endif; ?>
									</div><!-- /.sponsorship-level-row -->
										
									<?php if ( !empty($level['bottom_text']) ) : ?>

										<div class="sponsorship-level-row">
											<p>
												<small><?php echo $level['bottom_text']; ?></small>
											</p>
										</div><!-- /.sponsorship-level-row -->

									<?php endif; ?>
								</li><!-- /.sponsorship-level -->

							<?php endforeach; ?>
						</ul><!-- /.sponsorship-levels -->

					<?php endif; ?>
				</div><!-- /.post -->
			</div><!-- /.shell -->
		</div><!-- /.section section-sponsorship-levels -->
		
		<div class="section section-gray">
			<div class="shell">
				<div class="post">
					<?php 
					$annual_title = carbon_get_the_post_meta('crb_annual_title');
					$sponsorship_list = carbon_get_the_post_meta('crb_sponsorship_list', 'complex'); 
					if ( !empty($annual_title) ) : ?>

						<h2 class="post-title post-title-secondary"><?php echo $annual_title; ?></h2>

					<?php endif; 

					if ( !empty($sponsorship_list) ) : ?>
				
						<div class="col col-1of2">
							<ul class="list-sponsorships">
								<?php foreach ( $sponsorship_list as $list_item ) : ?>

									<li>
										<h6>
											<?php if ( !empty($list_item['title']) ) {
												echo $list_item['title'];
											} 

											if ( !empty($list_item['price']) ) : ?>
						
												<span><?php echo $list_item['price']; ?></span>

											<?php endif; ?>
										</h6>
									</li>

								<?php endforeach; ?>
								
							</ul><!-- /.list-sponsorships -->
						</div><!-- /.col col-1of2 -->

					<?php endif; 

					$right_text = carbon_get_the_post_meta('crb_annual_right_text');
					if ( !empty($right_text) ) : ?>
						
						<div class="col col-1of2">
							<?php echo wpautop($right_text); ?>
						</div><!-- /.col col-1of2 -->

					<?php endif; ?>
				</div>
				<!-- /.post -->
			</div><!-- /.shell -->
		</div><!-- /.section section-gray -->
		
		<?php 
		$request_form = carbon_get_the_post_meta('crb_sponsorship_form'); 
		if ( !empty($request_form) && function_exists('gravity_form') ) : ?>

			<div class="section section-request">
				<div class="shell">
					<div class="content content-size2">
						<?php gravity_form($request_form, 1, 1, 0, 0, 1, 50); ?>
					</div><!-- /.content -->
				</div><!-- /.shell -->
			</div><!-- /.section section-request -->

		<?php endif; ?>
	</div><!-- /.main -->
</div><!-- /.container -->

<?php get_footer(); ?>