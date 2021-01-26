<?php 
/*
	Template Name: Who We Are
*/
get_header();
the_post();
get_template_part('fragments/top-section');
?>

<div class="container container-full-width-page">
	<section class="section section-textcols" id="our-history">
		<div class="shell">
			<article class="post">
				<?php 
				$history_title = carbon_get_the_post_meta('crb_history_title');
				$history_content = carbon_get_the_post_meta('crb_history_content'); 
				$history_years   = carbon_get_the_post_meta('crb_history_years', 'complex'); 
				if ( !empty($history_title) ) : ?>

					<header>
						<h2 class="post-title"><?php echo $history_title; ?></h2><!-- /.post-title -->
					</header>

				<?php endif; ?>
		
				<div class="post-entry">
					<?php if ( !empty($history_content) ) : ?>

						<div class="col col-1of2">
							<?php echo wpautop($history_content); ?>
						</div><!-- /.col col-1of2 -->

					<?php endif; 

					if ( !empty($history_years) ) : ?>
					
						<div class="col col-1of2">
							<ol class="list-history-items">
								<?php foreach ( $history_years as $year ) : ?>

									<li>
										<strong><?php echo $year['year']; ?></strong>
										<?php echo wpautop($year['description']); ?>
									</li>

								<?php endforeach; ?>
								
							</ol><!-- /.list-history-items -->
						</div><!-- /.col col-1of2 -->

					<?php endif; ?>
				</div><!-- /.post-entry -->
			</article><!-- /.post -->
		</div><!-- /.shell -->
	</section><!-- /.section -->
	
	<section class="section section-tabs" id="leadership">
		<div class="shell">
			<?php 

			$past_presidents_text = carbon_get_the_post_meta('crb_presidents_text');

			$leadership_title = carbon_get_the_post_meta('crb_leadership_title'); 
			if ( !empty($leadership_title) ) : ?> 

				<header class="section-head">
					<h2 class="section-title"><?php echo $leadership_title; ?></h2><!-- /.section-title -->
				</header><!-- /.section-head -->

			<?php endif; 

			$leadership_tabs = carbon_get_the_post_meta('crb_leadership_tabs', 'complex'); ?>
		
			<div class="tabs">
				<div class="tabs-head">
					<nav class="tabs-nav">
						<ul>
							<?php if ( !empty($leadership_tabs) ) : 

								foreach ( $leadership_tabs as $count => $tab ) : 

									$tab_class = !$count ? 'class="current"' : ''; ?>

									<li <?php echo $tab_class; ?>>
										<a href="#tab-<?php echo $count; ?>"><?php echo $tab['tab_title']; ?></a>
									</li>

								<?php endforeach; 

							endif; 

							if ( !empty($past_presidents_text) ) : ?>
							
								<li>
									<a href="#past-presidents"><?php _e('Past Presidents','crb'); ?></a>
								</li>

							<?php endif; ?>
						</ul>
					</nav><!-- /.tabs-nav -->
				</div><!-- /.tabs-head -->
				
				<div class="tabs-body">
					<?php foreach ( $leadership_tabs as $count => $tab ) : 

						$class = !$count ? 'tab current' : 'tab'; ?>

						<div class="<?php echo $class; ?>" id="tab-<?php echo $count; ?>">
							<ul class="cards">
								<?php foreach ( $tab['team'] as $team_member ) : ?>

									<li class="card">
										<aside class="card-aside">
											<?php if ( !empty($team_member['picture']) ) {
												crb_image(wp_get_attachment_url($team_member['picture']), 325, 402, 1);
											} 

											if ( !empty($team_member['links']) ) : ?>
											
												<ul>
													<?php foreach ( $team_member['links'] as $link ) : ?>

														<li>
															<a href="<?php echo $link['link']; ?>"><?php echo $link['link_text']; ?></a>
														</li>

													<?php endforeach; ?>
												</ul>

											<?php endif; ?>
										</aside><!-- /.card-aside -->
										
										<div class="card-content">
											<header class="card-head">
												<?php if ( !empty($team_member['title']) ) : ?>
												
													<h6><?php echo $team_member['title']; ?></h6>

												<?php endif; 

												echo wpautop($team_member['position']); ?>
											</header><!-- /.card-head -->
											
											<?php if ( !empty($team_member['content']) ) : ?>											

												<div class="card-entry">
													<?php echo wpautop($team_member['content']); ?>
												</div><!-- /.card-entry -->

											<?php endif; ?>
										</div><!-- /.card-content -->
									</li><!-- /.card -->

								<?php endforeach; ?>
										
							</ul><!-- /.cards -->
						</div><!-- /.tab -->

					<?php endforeach; 

					if ( !empty($past_presidents_text) ) : ?>
					
						<div class="tab" id="past-presidents">
							<article class="post">
								<div class="post-entry">
									<?php echo apply_filters('the_content', $past_presidents_text); ?>
								</div><!-- /.post-entry -->
							</article><!-- /.post -->
						</div><!-- /.tab -->

					<?php endif; ?>
				</div><!-- /.tabs-body -->
			</div><!-- /.tabs -->
		</div><!-- /.shell -->
	</section><!-- /.section section-tabs -->
	
	<section class="section section-textcols" id="diversity-inclusion">
		<div class="shell">
			<header class="section-head">
				<?php $diversity_title = carbon_get_the_post_meta('crb_diversity_title');
				if ( !empty($diversity_title) ) : ?>

					<h2 class="section-title"><?php echo $diversity_title; ?></h2><!-- /.section-title -->

				<?php endif; ?>
		
				<a href="#" class="link-scroll-top">
					<i class="ico-arrow-up-green-l"></i>
					<?php _e('Back to top', 'crb'); ?>
				</a>
			</header><!-- /.section-head -->
			
			<?php 
			$diversity_gallery = carbon_get_the_post_meta('crb_diversity_gallery', 'complex'); 
			if ( !empty($diversity_gallery) ) : ?>

				<section class="section section-gallery">
					<ul>
						<?php foreach ( $diversity_gallery as $gallery_image ) : 

							$full_image_src = wp_get_attachment_url($gallery_image['image']);?>

							<li>
								<a href="<?php echo $full_image_src; ?>">
									<img data-original="<?php echo $full_image_src; ?>" alt="" class="lazy">
								</a>
							</li>

						<?php endforeach; ?>
					</ul>
				</section><!-- /.section -->

			<?php endif; 

			$diversity_content = carbon_get_the_post_meta('crb_diversity_content'); 
			if ( !empty($diversity_content) ) : ?>
		
				<article class="post">
					<div class="post-entry">
						<?php echo apply_filters('the_content', $diversity_content); ?>
					</div><!-- /.post-entry -->
				</article><!-- /.post -->

			<?php endif; ?>
		</div><!-- /.shell -->
	</section><!-- /.section -->
</div><!-- /.container -->

<?php get_footer(); ?>