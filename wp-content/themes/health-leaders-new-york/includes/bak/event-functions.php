<?php
function crb_show_featured_or_most_recent_event($event, $featured = true) {

	$event_date = carbon_get_post_meta($event->ID, 'crb_event_date'); 

	if ( $featured ) {
		$section_class = 'section-content';
		$event_class   = 'featured-event';
		$title 		   = 'Featured Event';
	} else {
		$section_class = 'section-aside';
		$event_class   = 'most-recent-event';
		$title  	   = 'Most Recent Event';
	} ?>

	<div class="<?php echo $section_class; ?>">
		<h6 class="events-title"><?php echo $title; ?></h6><!-- /.events-title -->

		<div class="event <?php echo $event_class; ?>">
			<?php if ( has_post_thumbnail($event->ID) ) {
				echo get_the_post_thumbnail($event->ID, 'full', array('class' => 'fullscreen-image')); 
			} ?>

			<a href="<?php echo get_permalink($event->ID); ?>">
				<span>
					<small><?php echo date('F d, Y', strtotime($event_date)); ?></small>
					<?php echo $event->post_title; ?>
					<small><?php echo crb_shortalize($event->post_excerpt, 10, '. . .'); ?></small>
				</span>
			</a>

		</div>

		<?php if ( !$featured )  : ?>

			<a href="<?php echo get_permalink(get_option('crb_past_events_page')); ?>" class="link-view-all">
				<?php _e('ALL PAST EVENT GALLERIES', 'crb'); ?>
				<i class="ico-arrow-right-l"></i>
			</a>

		<?php endif; ?>

	</div><!-- /.section-content -->

	<?php
}


function crb_check_if_event_is_upcoming($event_id) {

	$event_date = carbon_get_post_meta($event_id, 'crb_event_date'); 
	if ( strtotime($event_date) > time() ) {
		$upcoming_event = true;
	} else {
		$upcoming_event = false;
	} 

	return $upcoming_event;

}