<?php
register_post_type('crb_event', array(
	'labels' => array(
		'name' => __('Events', 'crb'),
		'singular_name' => __('Event', 'crb'),
		'add_new' => __('Add New', 'crb'),
		'add_new_item' => __('Add new Event', 'crb'),
		'view_item' => __('View Event', 'crb'),
		'edit_item' => __('Edit Event', 'crb'),
		'new_item' => __('New Event', 'crb'),
		'view_item' => __('View Event', 'crb'),
		'search_items' => __('Search Events', 'crb'),
		'not_found' =>  __('No Events found', 'crb'),
		'not_found_in_trash' => __('No Events found in trash', 'crb'),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'event',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-calendar',
	'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
));

register_post_type('crb_gallery', array(
	'labels' => array(
		'name' => __('Galleries', 'crb'),
		'singular_name' => __('Gallery', 'crb'),
		'add_new' => __('Add New', 'crb'),
		'add_new_item' => __('Add new Gallery', 'crb'),
		'view_item' => __('View Gallery', 'crb'),
		'edit_item' => __('Edit Gallery', 'crb'),
		'new_item' => __('New Gallery', 'crb'),
		'view_item' => __('View Gallery', 'crb'),
		'search_items' => __('Search Galleries', 'crb'),
		'not_found' =>  __('No Galleries found', 'crb'),
		'not_found_in_trash' => __('No Galleries found in trash', 'crb'),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'gallery',
		'with_front' => false,
	),
	'query_var' => true,
	'supports' => array('title', 'editor', 'page-attributes', 'thumbnail', 'excerpt'),
));


register_post_type('crb_newsletter', array(
	'labels' => array(
		'name' => __('Newsletters', 'crb'),
		'singular_name' => __('Newsletter', 'crb'),
		'add_new' => __('Add New', 'crb'),
		'add_new_item' => __('Add new Newsletter', 'crb'),
		'view_item' => __('View Newsletter', 'crb'),
		'edit_item' => __('Edit Newsletter', 'crb'),
		'new_item' => __('New Newsletter', 'crb'),
		'view_item' => __('View Newsletter', 'crb'),
		'search_items' => __('Search Newsletters', 'crb'),
		'not_found' =>  __('No Newsletters found', 'crb'),
		'not_found_in_trash' => __('No Newsletters found in trash', 'crb'),
	),
	'public' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => array(
		'slug' => 'newsletter',
		'with_front' => false,
	),
	'query_var' => true,
	'menu_icon' => 'dashicons-email',
	'supports' => array('title', 'editor', 'page-attributes'),
));


register_post_type('crb_sponsor', array(
	'labels' => array(
		'name' => __('Sponsors', 'crb'),
		'singular_name' => __('Sponsor', 'crb'),
		'add_new' => __('Add New', 'crb'),
		'add_new_item' => __('Add new Sponsor', 'crb'),
		'view_item' => __('View Sponsor', 'crb'),
		'edit_item' => __('Edit Sponsor', 'crb'),
		'new_item' => __('New Sponsor', 'crb'),
		'view_item' => __('View Sponsor', 'crb'),
		'search_items' => __('Search Sponsors', 'crb'),
		'not_found' =>  __('No Sponsors found', 'crb'),
		'not_found_in_trash' => __('No Sponsors found in trash', 'crb'),
	),
	'public' => false,
	'exclude_from_search' => true,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'_edit_link' => 'post.php?post=%d',
	'rewrite' => false,
	'query_var' => true,
	'menu_icon' => 'dashicons-groups',
	'supports' => array('title', 'editor', 'page-attributes'),
));
