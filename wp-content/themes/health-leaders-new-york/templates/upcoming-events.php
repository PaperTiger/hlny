<?php 
/*
	Template Name: Upcoming Events
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section'); 
?>


<div class="container">
	<div class="shell">
		<section class="section section-events section-events-secondary">

			<?php 
			$featured_events = get_posts(array(
				'posts_per_page' => 1,
				'post_type'      => 'crb_event',
				'meta_query'	 => array(
					'relation'	 => 'AND',
					array(
						'key'     => '_crb_featured_event',
						'value'   => 'yes',
						'compare' => '='
					),
				)
			)); 

			if ( !empty($featured_events) ) {
				crb_show_featured_or_most_recent_event($featured_events[0], true);
			}


			$most_recent_events = get_posts(array(
				'posts_per_page' => 1,
				'post_type'      => 'crb_event',
				'orderby'		 => 'meta_value',
				'order'			 => 'DESC',
				'meta_key'		 => '_crb_event_date',
				'meta_query'	 => array(
					'relation'	 => 'AND',
					array(
						'key'     => '_crb_event_date',
						'value'   => date('Y-m-d'),
						'type'    => 'DATE',
						'compare' => '<'
					),
				)
			)); 

			if ( !empty($most_recent_events) ) {
				crb_show_featured_or_most_recent_event($most_recent_events[0], false);
			} ?>

		</section><!-- /.section section-events -->
		
		<div class="main">
			<div class="content content-size2">
				<div class="section section-events-listing">

					<?php 
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$upcoming_events_args = array(
						'posts_per_page' => 5,
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
					);

					$upcoming_events = new WP_Query($upcoming_events_args);

					if ( $upcoming_events->have_posts() ) : ?>

						<header class="section-head">
							<h2 class="section-title"><?php _e('Upcoming Events', 'crb'); ?></h2><!-- /.section-title -->
							<span class="pages-counter">Page <?php echo $paged . ' of ' . $upcoming_events->max_num_pages; ?></span><!-- /.pages-counter -->
						</header><!-- /.section-head -->
						
						<ol class="events">
							<?php while ( $upcoming_events->have_posts() ) : $upcoming_events->the_post(); ?>

								<li class="event">
									<div class="event-aside">
										<?php if ( has_post_thumbnail() ) : ?>

											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail('event-thumb'); ?>
											</a>

										<?php endif; 

										$partner_event = carbon_get_the_post_meta('crb_partner_event');
										$event_date    = carbon_get_the_post_meta('crb_event_date');

										if ( $partner_event === 'yes') : ?>

											<span class="event-category"><?php _e('Partner Event', 'crb'); ?></span>

										<?php endif; ?>
									</div><!-- /.event-aside -->
									
									<div class="event-content">
										<p class="event-date"><?php echo date('F d, Y', strtotime($event_date)); ?></p><!-- /.event-date -->
										
										<h6 class="event-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h6><!-- /.event-title -->
										
										<?php echo wpautop($post->post_excerpt); ?>
									</div><!-- /.event-content -->
								</li><!-- /.event -->							

							<?php endwhile; ?>
						</ol><!-- /.events -->

					<?php endif; ?>
				</div><!-- /.section section-events -->

				<?php carbon_pagination('posts', array(
					'wrapper_before' => '<div class="paging">',
					'wrapper_after' => '</div>',
					'enable_first' => true,
					'enable_last' => true,
					'enable_numbers' => true,
					'total_pages'    => $upcoming_events->max_num_pages,
					'number_limit' => 5,
					'prev_html' => '<a href="{URL}" class="paging-prev"><</a>',
					'next_html' => '<a href="{URL}" class="paging-next">></a>',
					'first_html' => '<a href="{URL}" class="paging-first"><<</a>',
					'last_html' => '<a href="{URL}" class="paging-last">>></a>',
				));

				wp_reset_query(); ?>
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>