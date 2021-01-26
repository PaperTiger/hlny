<?php

/**
 * Returns current year
 *
 * @uses [year]
 */
add_shortcode('year', 'crb_shortcode_year');
function crb_shortcode_year() {
	return date('Y');
}

add_shortcode('column', 'crb_column');
function crb_column( $args, $content = null ) {
	return '<div class="col col-1of2">' . apply_filters('the_content', $content) . '</div>';
}

add_shortcode('video_holder', 'crb_video_holder');
function crb_video_holder( $args, $content = null ) {
	return '<div class="video-wrapper">' . do_shortcode($content) . '</div>';
}	

add_shortcode('green_button', 'crb_green_button');
function crb_green_button( $args, $content = null ) {
	return '<p><a class="btn btn-green" href="' . $args['link'] . '" >' . $content . '</a></p>';
}