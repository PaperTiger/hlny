<?php 
$page_id = crb_get_page_context(); 

$enable_tabs = carbon_get_the_post_meta('crb_full_width_enable_tabs') === 'yes';

$intro_class = 'intro';
if ( is_page_template('templates/become-member.php') || is_page_template('templates/who-we-are.php') || $enable_tabs ) {
	$intro_class .= ' intro-medium';
} else {
	$intro_class .= ' intro-small';
} 

if ( is_singular('crb_newsletter') ) {
	$intro_class .= ' intro-centered';
} 

if ( is_singular('crb_event') ) {
	$intro_class .= ' intro-event';
	$page_id = get_option('crb_upcoming_events_page');
} 

?>

<div class="<?php echo $intro_class; ?>">

	<?php if ( has_post_thumbnail($page_id) ) {
		$image_id = get_post_thumbnail_id($page_id);
	} else {
		$image_id = get_option('crb_default_top_image');
	}

	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_src = $image_src[0]; ?>

	<img src="<?php echo $image_src; ?>" class="fullscreen-image" />

	<div class="shell">
		<div class="intro-content">
			<?php 

			if ( is_singular('crb_gallery') ) : ?>

				<h1 class="intro-title"><?php the_title();?></h1>

			<?php endif;

			if ( is_singular('crb_newsletter') ) : ?>

				<p class="intro-meta">Published in <?php the_date('F d, Y') ?></p><!-- /.intro-meta -->

			<?php endif;

			if ( is_singular('post') || is_singular('crb_event') ) : ?>

				<p class="breadcrumbs">
					<?php if ( is_singular('post') ) : ?>

						<a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('News', 'crb'); ?></a>
						<span>/</span>
						<?php the_category(', '); 

					else : ?>

						<a href="#"><?php _e('Events', 'crb'); ?></a>
						<span>/</span>
						<?php if ( crb_check_if_event_is_upcoming(get_the_ID() ) ) : ?>

							<a href="<?php echo get_permalink(get_option('crb_upcoming_events_page')); ?>"><?php _e('Upcoming Events', 'crb'); ?></a>

						<?php else : ?>

							<a href="<?php echo get_permalink(get_option('crb_past_events_page')); ?>"><?php _e('Past Events', 'crb'); ?></a>

						<?php endif;

					endif; ?>
				</p>

			<?php endif; 

			if ( is_page_template('default') && $post->post_parent) : ?>

				<p class="breadcrumbs">
					<a href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a>
				</p><!-- /.breadcrumbs -->

			<?php endif;

			if ( !is_search() ) :

				crb_the_title('<h1 class="intro-title">', '<h1>');
			
			else : ?>

				<h1 class="intro-title">Search Results for "<?php echo get_search_query(); ?>"</h1>

			<?php endif;


			$page_description = carbon_get_the_post_meta('crb_page_description'); 
			if ( !empty($page_description) ) : ?>

				<div class="intro-entry">
					<?php echo wpautop($page_description); 

					if ( is_page_template('templates/become-member.php') ) : 

						$video_url = carbon_get_the_post_meta('crb_top_video');
						if ( !empty($video_url) ) : 

							$video = Carbon_Video::create($video_url);
							$video->set_param('autoplay', 0);?>

							<p>
								<a href="#" class="btn btn-green btn-green-play"><?php _e('Play intro video', 'crb'); ?></a>
							</p>

							<p class="mfp-hide intro-video">
								<iframe src="<?php echo $video->get_embed_url(); ?>" frameborder="0" allowfullscreen></iframe>
							</p>

						<?php endif;

					endif; 


					if ( is_page_template('templates/sponsors.php') ) : ?>

						<p>
							<a href="<?php echo get_permalink(get_option('crb_sponsorship_page')); ?>" class="btn btn-green btn-green-large"><?php _e('Become a Sponsor', 'crb'); ?></a>
						</p>

					<?php endif; ?>
				</div><!-- /.intro-entry -->

			<?php endif; 

			$top_navigation_links = carbon_get_the_post_meta('crb_top_navigation_links', 'complex'); 
			if ( !empty($top_navigation_links) ) : ?>

				<nav class="intro-nav">
					<ul>
						<?php foreach ( $top_navigation_links as $link ) : ?>

							<li>
								<a href="#<?php echo $link['link_to_section']; ?>"><?php echo $link['text']; ?></a>
							</li>

						<?php endforeach; ?>
					</ul>
				</nav><!-- /.intro-nav -->

			<?php endif; ?>
			
			<?php
			if ( $enable_tabs ) : 
				$section_tabs = carbon_get_the_post_meta('crb_full_width_sections', 'complex');
				?>

				<nav class="intro-nav">
					<ul>
						<?php foreach ( $section_tabs as $key => $tab ) : 
							
							$tab_title = !empty( $tab['tab_title'] ) ? $tab['tab_title'] : 'Tab ' . ($key + 1);
							$item_class = !$key ? 'class="active"' : '';
							?>

							<li <?php echo $item_class; ?>>
								<a href="#<?php echo sanitize_title_with_dashes($tab_title); ?>"><?php echo $tab_title; ?></a>
							</li>

						<?php endforeach; ?>
					</ul>
				</nav><!-- /.intro-nav -->

			<?php endif; 


			if ( is_page_template('templates/sponsors.php') ) : 

				$sponsorship_types = crb_get_sponsorship_types(); ?>

				<nav class="intro-nav">
					<ul>
						<?php foreach ( $sponsorship_types as $type => $label ) : 

							$item_class = $type === 'platinum' ? 'class="active"' : ''; ?>

							<li <?php echo $item_class; ?>>
								<a href="#<?php echo $type; ?>"><?php echo $label; ?></a>
							</li>

						<?php endforeach; ?>
					</ul>
				</nav>

			<?php endif; ?>

		</div><!-- /.intro-content -->
	</div><!-- /.shell -->

	<?php if ( is_singular('crb_event') ) : 

		$date 		   = carbon_get_the_post_meta('crb_event_date');
		$time 		   = carbon_get_the_post_meta('crb_event_time');
		$location 	   = carbon_get_the_post_meta('crb_event_location');
		$register_link = carbon_get_the_post_meta('crb_event_register_link'); 
		?>

		<div class="intro-bar">
			<div class="shell">
				<ul>
					<li>
						<i class="ico-calendar"></i>
						<?php echo date('F d, Y', strtotime($date)); ?>
					</li>
					
					<?php if ( !empty($time) ) : ?>

						<li>
							<i class="ico-clock"></i>
							<?php echo $time; ?>
						</li>

					<?php endif; 

					if ( !empty($location) ) : ?>
					
						<li>
							<i class="ico-flag"></i>
							<?php echo $location; ?>
						</li>

					<?php endif; ?>
				</ul>

				<?php if ( !empty($register_link) && crb_check_if_event_is_upcoming(get_the_ID()) ) : ?>

					<a href="<?php echo $register_link; ?>" target="_blank" class="btn btn-register-large">
						<i class="ico-check-l"></i>
						<?php _e('REGISTER FOR <br>THIS EVENT', 'crb'); ?>
					</a>

				<?php endif; ?>
			</div><!-- /.shell -->
		</div><!-- /.intro-bar -->

	<?php endif; ?>
</div><!-- /.intro -->
