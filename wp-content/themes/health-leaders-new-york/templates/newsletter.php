<?php 
/*
	Template Name: Newsletter
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section'); 
?>
<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size2">
				<div class="section section-events-listing">
					<header class="section-head">
						<?php 
						$title = isset($_GET['newsletter_year']) ? $_GET['newsletter_year'] : 'All';
						?>
						<h2 class="section-title"><?php echo $title; ?> Archive</h2><!-- /.section-title -->

						<?php $newsletter_years = crb_get_post_type_years_archives('crb_newsletter'); ?>

						<nav class="nav-categories">
							<ul>
								<li>
									<a href="<?php the_permalink(); ?>"><?php _e('All', 'crb'); ?></a>
								</li>

								<?php 
								foreach ( $newsletter_years as $archive_year ) : ?>
								
									<li>
										<a href="<?php echo add_query_arg('newsletter_year', $archive_year->year, get_permalink()); ?>"><?php echo $archive_year->year; ?></a>
									</li>

								<?php endforeach; ?>
							</ul>
						</nav><!-- /.nav-categories -->
					</header><!-- /.section-head -->

					<?php 

					$newsletters_args = array(
						'paged'			 => $paged,
						'posts_per_page' => get_option('posts_per_page'),
						'post_type'		 => 'crb_newsletter'
					);

					if ( isset($_GET['newsletter_year']) ) {
						$newsletters_args['year'] = esc_sql($_GET['newsletter_year']);
					}


					$newsletters = new WP_Query($newsletters_args);

					if ( $newsletters->have_posts() ) : ?>
						
						<ol class="events">
							<?php while ( $newsletters->have_posts() ) : $newsletters->the_post(); ?>

								<li class="event">
									<div class="event-content event-content-fullwidth">
										<h6 class="event-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h6><!-- /.event-title -->
										
										<p class="event-date">published <?php echo get_the_date('F d, Y'); ?></p><!-- /.event-date -->
									</div><!-- /.event-content -->
								</li><!-- /.event -->						

							<?php endwhile; ?>
						</ol><!-- /.events -->

					<?php endif; ?>
				</div><!-- /.section section-events -->

				<?php carbon_pagination('posts', array(
					'wrapper_before' => '<div class="paging">',
					'wrapper_after'  => '</div>',
					'enable_first'   => true,
					'enable_last'    => true,
					'enable_numbers' => true,
					'number_limit'   => 5,
					'total_pages'    => $newsletters->max_num_pages,
					'prev_html' 	 => '<a href="{URL}" class="paging-prev"><</a>',
					'next_html' 	 => '<a href="{URL}" class="paging-next">></a>',
					'first_html' 	 => '<a href="{URL}" class="paging-first"><<</a>',
					'last_html' 	 => '<a href="{URL}" class="paging-last">>></a>',
				)); ?>
			</div><!-- /.content -->

			<?php wp_reset_query(); ?>
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>