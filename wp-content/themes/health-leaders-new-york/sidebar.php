<div class="sidebar">
	<?php

	if ( is_singular('crb_event') && crb_check_if_event_is_upcoming(get_the_ID()) ) : ?>

		<div class="widget widget_socials">
			<p><?php _e('Share this event:', 'crb'); ?></p>
			<?php get_template_part('fragments/share-icons'); ?>
		</div>

	<?php endif;

		$page_ID = crb_get_page_context();
		$sidebar = '';

		if ( is_singular('crb_event') ) {
			$page_ID = get_the_ID();
		}

		# If $page_ID is present, check for custom sidebar
		if ( !empty($page_ID) ) {
			$sidebar = carbon_get_post_meta($page_ID, 'crb_custom_sidebar');
		}

		if ( is_singular('post') ) {
			$sidebar = get_option('crb_single_post_sidebar');
		}		

		# If sidebar is not set or the $page_ID is not present, assign 'default-sidebar'
		if ( empty($sidebar) ) {
			$sidebar = 'default-sidebar';
		}

		dynamic_sidebar($sidebar);
	?>
</div>
