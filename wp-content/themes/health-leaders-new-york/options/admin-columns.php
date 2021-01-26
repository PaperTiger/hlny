<?php

Carbon_Admin_Columns_Manager::modify_columns('post', array('crb_event') )
	->add( array(
		Carbon_Admin_Column::create('Event Date')
			->set_field('_crb_event_date'),
		Carbon_Admin_Column::create('Event Date')
			->set_callback('crb_show_column_thumbnail')
	));

function crb_show_column_thumbnail($post_id) {

	if ( has_post_thumbnail($post_id) ) {
		echo get_the_post_thumbnail($post_id, 'thumbnail');
	}

}