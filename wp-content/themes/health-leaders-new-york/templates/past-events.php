<?php 
/*
	Template Name: Past Events
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="section section-events-listing">
				<header class="section-head">
					<?php 
					if ( !isset($_GET['event_year']) ) {
						$title = 'All Past Events';
					} else {
						$title = 'Events in ' . $_GET['event_year'];
					}
					?>
					<h2 class="section-title"><?php echo $title; ?></h2><!-- /.section-title -->
				
					<?php 
					global $wpdb;
					$event_years = $wpdb->get_results("SELECT
						   	event_meta.*, YEAR( event_meta.meta_value ) AS year
						    FROM $wpdb->posts as event
						    INNER JOIN $wpdb->postmeta AS event_meta ON (event_meta.post_id = event.ID AND event_meta.meta_key='_crb_event_date')
						WHERE
						    post_type = 'crb_event'
						    AND post_status = 'publish'
						    AND YEAR(event_meta.meta_value) <= YEAR(CURDATE())
						GROUP BY year
						ORDER BY year DESC"
					);

					?>
					<nav class="nav-categories">
						<ul>							
							<li>
								<a href="<?php the_permalink(); ?>"><?php _e('All', 'crb'); ?></a>
							</li>

							<?php foreach ( $event_years as $event_year ) : ?>
								
								<li>
									<a href="<?php echo add_query_arg('event_year', $event_year->year, get_permalink()); ?>"><?php echo $event_year->year; ?></a>
								</li>

							<?php endforeach; ?>
							
						</ul>
					</nav><!-- /.nav-categories -->
				</header><!-- /.section-head -->
				
				<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;				

				$past_events_args = array(
					'posts_per_page' => 10,
					'post_type'		 => 'crb_event',
					'paged'			 => $paged,
					'orderby'		 => 'meta_value',
					'order'			 => 'DESC',
					'meta_key'		 => '_crb_event_date',
					'meta_query'	 => array(
						'relation' => 'AND'						
					)
				);

				if ( isset($_GET['event_year']) ) {

					$start_date_timestamp = strtotime($_GET['event_year'] . '-01-01');

					if ( $_GET['event_year'] == date('Y') ) {
						$end_date_timestamp = time();
					} else {
						$end_date_timestamp   = strtotime(intval($_GET['event_year']+1) . '-01-01'); 
					}

					$past_events_args['meta_query'][] = array(
						'key' => '_crb_event_date',
						'value' => date('Y-m-d', $start_date_timestamp),
						'type'  => 'DATE',
						'compare' => '>='
					);

					$past_events_args['meta_query'][] = array(
						'key' => '_crb_event_date',
						'value' => date('Y-m-d', $end_date_timestamp),
						'type'  => 'DATE',
						'compare' => '<'
					);

				} else {

					$past_events_args['meta_query'][] = array(
						'key'	  => '_crb_event_date',
						'value'   => date('Y-m-y'),
						'type'    => 'DATE',
						'compare' => '<='
					);

				}

				$past_events = new WP_Query($past_events_args);

				if ( $past_events->have_posts() ) : 

					$counter = 1; ?>

					<section class="section-past-events">
						<section class="section section-events">
							<ul>
								<?php while ( $past_events->have_posts() ) : $past_events->the_post(); 

									$date = carbon_get_the_post_meta('crb_event_date'); ?>

									<li>
										<?php if ( has_post_thumbnail() ) {

											the_post_thumbnail('event-thumb', array('class' => 'fullscreen-image'));

										} ?>

										<a href="<?php the_permalink(); ?>">
											<span>
												<small><?php echo date('F d, Y', strtotime($date)); ?></small>
												<?php the_title(); 

												if ( $counter === 1 || $counter === 5 ) : ?>
												
													<small><?php echo crb_shortalize($post->post_excerpt, 10, '. . .')?></small>

												<?php endif; ?>
											</span>
										</a>
									</li>

									<?php 

									if ( $counter === 5 ) : ?>

											</ul>
										</section><!-- /.section section-events -->
										<section class="section section-events">
											<ul>

									<?php endif;

									$counter++;

								endwhile; ?>
																
							</ul>
						</section><!-- /.section section-events -->

					</section><!-- /.section-past-events -->

				<?php endif; 

				if ( $past_events->max_num_pages > 1 ) : ?>

					<div class="section-foot">
						<?php next_posts_link('Load more', $past_events->max_num_pages); ?>
					</div><!-- /.section-foot -->

				<?php endif; ?>
			</div><!-- /.section section-events -->
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>