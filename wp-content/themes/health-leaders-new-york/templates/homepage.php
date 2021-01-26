<?php 
/*
	Template Name: Home
*/
	get_header();
	the_post();
?>

<div class="intro-outer">
	<div class="intro intro-large">
		<?php if ( has_post_thumbnail() ) {

			the_post_thumbnail('full', array('class' => 'fullscreen-image')); 

		} ?>

		<div class="shell">
			<div class="intro-content">
				<?php crb_the_title('<h1 class="intro-title">', '</h1>'); ?>
				
				<div class="intro-entry">
					<?php the_content(); 

					$green_button_text = carbon_get_the_post_meta('crb_homepage_green_button_text');
					$green_button_link = carbon_get_the_post_meta('crb_homepage_green_button_link'); 
					if ( !empty($green_button_link) && !empty($green_button_text) ) : ?>
					
						<p>
							<a href="<?php echo $green_button_link; ?>" class="btn btn-green btn-green-large"><?php echo $green_button_text; ?></a>
						</p>

					<?php endif; ?>
				</div><!-- /.intro-entry -->
			</div><!-- /.intro-content -->
		</div><!-- /.shell -->
	</div><!-- /.intro -->
</div><!-- /.intro-outer -->

<div class="container">
	<div class="shell">
		<section class="section section-logos">
			<?php 
			$sponsor_types = crb_get_sponsorship_types();
			$sponsor_type_indexes = array_flip( array_keys( $sponsor_types ) );
			$sponsors_page = crb_get_page_by_template( 'templates/sponsors.php' );
			foreach ($sponsor_types as $type => $type_label) {
				$sponsors = get_posts(array(
					'post_type' => 'crb_sponsor',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'fields' => 'ids',
					'meta_query' => array(
						array(
							'key' => '_crb_sponsor_sponsorship_type',
							'value' => $type,
						)
					)
				));
				if ( $sponsors ) {
					?>
					<div class="section-logos-slide" <?php echo $sponsor_type_indexes[$type] === 0 ? 'style="display: block;"' : ''; ?>>
						<header>
							<ul>
								<li><?php echo $type_label; ?></li>
								
								<?php if ( $sponsors_page ): ?>
									<li>
										<a href="<?php echo get_permalink($sponsors_page->ID); ?>"><?php _e('VIEW ALL', 'crb'); ?></a>
									</li>
								<?php endif ?>
							</ul>
						</header>

						<ul class="sponsor-logos">				
							<?php foreach ( $sponsors as $sponsor_id ) : 
								$logo = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_blue_logo' );
								$link = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_link' );
								?>

								<li>
									<?php if ( $link ): ?>
										<a href="<?php echo esc_url( $link ); ?>" target="_blank">
									<?php endif ?>
									<?php echo wp_get_attachment_image($logo, 'top-sponsor', 0, array('height' => '41')); ?>
									<?php if ( $link ): ?>
										</a>
									<?php endif ?>
								</li>

							<?php endforeach; ?>
						</ul>
					</div>
					<?php
				}
			}
			?>
		</section><!-- /.section section-logos -->
		
		<section class="section section-events">
			<h6 class="events-title"><?php _e('UPCOMING EVENTS', 'crb'); ?></h6><!-- /.events-title -->

			<?php 

			$events = new WP_Query(array(
				'posts_per_page' => 4,
				'post_type'	 	 => 'crb_event',
				'paged'			 => $paged,
				'orderby'		 => 'meta_value',
				'order'			 => 'ASC',
				'meta_query'	 => array(
					array(
						'key'     => '_crb_event_date',
						'value'   => date('Y-m-d'),
						'type'    => 'DATE',
						'compare' => '>=',
					)
				)
			));

			if ( $events->have_posts() ) : 

				$events_count = 0; ?>

				<ul>

					<?php while ( $events->have_posts() ) : $events->the_post(); 

						$event_date = carbon_get_the_post_meta('crb_event_date'); ?>

						<li>
							<?php if ( has_post_thumbnail() )  {

								$thumb_size = !$events_count ? 'homepage-big-event' : 'homepage-small-event'; 
								the_post_thumbnail($thumb_size, array('class' => 'fullscreen-image'));

							} ?>

							<a href="<?php the_permalink(); ?>">
								<span>
									<small><?php echo date('F d, Y', strtotime($event_date)); ?></small>
									
									<?php the_title(); 

									if ( !$events_count ) : ?>
									
										<small><?php echo crb_shortalize($post->post_excerpt, 10, '. . .'); ?></small>

									<?php endif; ?>
								</span>
							</a>
						</li>

						<?php $events_count++;

					endwhile; ?>

					<li>
						<a href="<?php echo get_permalink(get_option('crb_upcoming_events_page')); ?>" class="link-events">
							<span>
								<?php _e('ALL EVENTS', 'crb'); ?> 
								<i class="ico-arrow-right-l"></i>
							</span>
						</a>
					</li>
												
				</ul>

			<?php endif;

			wp_reset_query(); 

			?>
		</section><!-- /.section section-events -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<section class="section section-plans">
	<div class="shell">
		<?php 
		$benefits_title = carbon_get_the_post_meta('crb_benefits_title');
		$plans 			= carbon_get_the_post_meta('crb_benefit_plans', 'complex'); 
		if ( !empty($benefits_title) ) : ?>
	
			<h2 class="section-title"><?php echo $benefits_title; ?></h2><!-- /.sectoin-title -->
	
		<?php endif; ?>
		
		<ul class="plans">
			<?php if ( !empty($plans) ) : 
	
				foreach ( $plans as $plan ) : ?>
	
					<li class="plan">
						<div class="plan-head">
							<?php if ( $plan['price'] ) : ?>
	
								<strong><?php echo $plan['price']; ?></strong>
	
							<?php endif;
	
							if ( !empty($plan['price_description']) ) : ?>
							
								<small><?php echo $plan['price_description']; ?></small>
	
							<?php endif; ?>
						</div><!-- /.plan-head -->
						
						<div class="plan-body">
							<?php if ( !empty($plan['title']) ) : ?>
	
								<h4><?php echo $plan['title']; ?></h4>
	
							<?php endif; 
	
							echo wpautop($plan['plan_description']); 
	
							if ( !empty($plan['plan_items']) ) : ?>
							
								<ul>
									<?php foreach ( $plan['plan_items'] as $item ) : ?>
	
										<li><?php echo $item['text']; ?></li> 
	
									<?php endforeach; ?>
								</ul>
							
							<?php endif;
	
							if ( !empty($plan['more_info_link']) ) : ?>
	
								<p>
									<a href="<?php echo $plan['more_info_link']; ?>" class="btn btn-green"><?php _e('More Info', 'crb'); ?></a>
								</p>
	
							<?php endif; ?>
						</div><!-- /.plan-body -->
	
						<?php if ( !empty($plan['bottom_description']) ) : ?>
	
							<p class="plan-note"><?php echo $plan['bottom_description']; ?></p><!-- /.plan-note -->
	
						<?php endif; ?>
					</li><!-- /.plan -->
	
				<?php endforeach;
	
			endif; ?>						
		</ul><!-- /.plans -->
	</div><!-- /.shell -->
</section><!-- /.section section-plans -->

<section class="section section-sponsors" id="sponsors">
	<div class="shell">
		<?php 
	
		$sponsors_title = carbon_get_the_post_meta('crb_sponsors_title');
		if ( !empty($sponsors_title) ) : ?>
	
			<h3 class="section-title"><a href="our-sponsors/"><?php echo $sponsors_title; ?></a></h3><!-- /.section-title -->
	
		<?php endif; ?>
	
		<div class="cols">
			<div class="col col-size1">
				<?php crb_homepage_sponsors_section( 'platinum', 'Platinum Sponsors', 61) ; ?>
				<?php crb_homepage_sponsors_section( 'gold', 'Gold Sponsors', 49) ; ?>					
			</div><!-- /.col col-size1 -->
			
			<div class="col col-size2">
				<?php crb_homepage_sponsors_section( 'silver', 'Silver Sponsors', 35) ; ?>					
				<?php crb_homepage_sponsors_section( 'friends', 'Friends Of Hlny', 30) ; ?>			
			</div><!-- /.col col-size2 -->
		</div><!-- /.cols -->
	</div><!-- /.shell -->
</section><!-- /.section section-sponsors -->

<?php get_footer(); ?>
