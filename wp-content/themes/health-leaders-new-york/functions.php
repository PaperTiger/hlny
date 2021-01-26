<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
add_action('carbon_after_register_fields', 'crb_attach_theme_help');
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Theme Options' ) )
		->add_fields( array(
			Field::make( 'text', 'crb_text', 'Text Field' ),
		) );
}

add_action( 'after_setup_theme', 'crb_load' );
/*
function crb_load() {
	require_once( 'vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}
*/

//define('CRB_THEME_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);

# Load the debug functions early so they're available for all theme code
//include_once(CRB_THEME_DIR . 'lib/debug.php');

# Enqueue JS and CSS assets on the front-end
add_action('wp_enqueue_scripts', 'crb_wp_enqueue_scripts');
function crb_wp_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue jQuery
	wp_enqueue_script('jquery');

	# Enqueue Custom JS files
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	wp_enqueue_script('fullscreener', $template_dir . '/js/jquery.fullscreener.js', array('jquery'));
	wp_enqueue_script('lazyload', $template_dir . '/js/jquery.lazyload.min.js', array('jquery'));
	wp_enqueue_script('magnific-popup', $template_dir . '/js/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script('theme-functions', $template_dir . '/js/functions.js', array('jquery'));

	# Enqueue Custom CSS files
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	wp_enqueue_script('magnific-popup', $template_dir . '/css/magnific-popup.css');
	wp_enqueue_script('fonts', $template_dir . '/css/fonts.css');
	wp_enqueue_script('theme-styles', $template_dir . '/style.css');

	# Enqueue Comments JS file
	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
}

# Enqueue JS and CSS assets on admin pages
add_action('admin_enqueue_scripts', 'crb_admin_enqueue_scripts');
function crb_admin_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue Scripts
	# @crb_enqueue_script attributes -- id, location, dependencies, in_footer = false
	# crb_enqueue_script('theme-admin-functions', $template_dir . '/js/admin-functions.js', array('jquery'));
	
	# Enqueue Styles
	# @crb_enqueue_style attributes -- id, location, dependencies, media = all
	# crb_enqueue_style('theme-admin-styles', $template_dir . '/css/admin-style.css');
}

/*
# Attach Custom Post Types and Custom Taxonomies
add_action('init', 'crb_attach_post_types_and_taxonomies', 0);
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once(CRB_THEME_DIR . 'options/post-types.php');

	# Attach Custom Taxonomies
	include_once(CRB_THEME_DIR . 'options/taxonomies.php');
}
add_action('after_setup_theme', 'crb_setup_theme');
*/

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('crb_setup_theme')) {
	function crb_setup_theme() {
		# Make this theme available for translation.
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Common libraries
		include_once(CRB_THEME_DIR . 'lib/common.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-fields/carbon-fields.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-validator/carbon-validator.php');
		include_once(CRB_THEME_DIR . 'lib/admin-column-manager/carbon-admin-columns-manager.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-pagination/carbon-pagination.php');

		# Additional libraries and includes
		include_once(CRB_THEME_DIR . 'includes/comments.php');
		include_once(CRB_THEME_DIR . 'includes/title.php');
		include_once(CRB_THEME_DIR . 'includes/gravity-forms.php');

		# Attach additional options
		if( !function_exists('wpthumb') ) {
			include_once(CRB_THEME_DIR . 'includes/wpthumb/wpthumb.php');
		}
		
		# Theme supports
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support('menus');
		add_theme_support('html5', array('gallery'));

		# Manually select Post Formats to be supported - http://codex.wordpress.org/Post_Formats
		// add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );

		# Register Theme Menu Locations
		
		register_nav_menus(array(
			'navigation-menu'=>__('Navigation Menu', 'crb'),
		));
		
		
		# Attach custom widgets
		include_once(CRB_THEME_DIR . 'options/widgets.php');

		# Attach custom shortcodes
		include_once(CRB_THEME_DIR . 'options/shortcodes.php');

		# Attach custom columns
		include_once(CRB_THEME_DIR . 'options/admin-columns.php');

		include_once(CRB_THEME_DIR . 'includes/event-functions.php');
		
		# Add Actions
		add_action('widgets_init', 'crb_widgets_init');

		# Add Filters
		add_filter('excerpt_more', 'crb_excerpt_more');
		add_filter('excerpt_length', 'crb_excerpt_length', 999);

		add_image_size('homepage-big-event', 1140, 908, 1);
		add_image_size('homepage-small-event',570, 454, 1);
		add_image_size('event-thumb', 526, 360, 1);
		add_image_size('top-sponsor', 0, 82, 1);
		
	}
}

# Register Sidebars
# Note: In a child theme with custom crb_setup_theme() this function is not hooked to widgets_init
function crb_widgets_init() {
	$sidebar_options = array_merge(crb_get_default_sidebar_options(), array(
		'name' => 'Default Sidebar',
		'id'   => 'default-sidebar',
	));

	$footer_widgets_options = array(
		'name' => 'Footer Widgets',
		'id'   => 'footer-widgets',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widgettitle">',
		'after_title'   => '</h6>',
	);
	
	register_sidebar($footer_widgets_options);
	register_sidebar($sidebar_options);
}

# Sidebar Options
function crb_get_default_sidebar_options() {
	return array(
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="widgettitle">',
		'after_title'   => '</h6>',
	);
}
/*
function crb_attach_theme_options() {
	# Attach fields
	include_once(CRB_THEME_DIR . 'options/theme-options.php');
	include_once(CRB_THEME_DIR . 'options/custom-fields.php');
}

function crb_attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	include_once(CRB_THEME_DIR . 'lib/theme-help/theme-readme.php');
}
*/

function crb_excerpt_more() {
	return '...';
}

function crb_excerpt_length() {
	return 55;
}

function crb_get_all_nav_menus() {

	$menus = wp_get_nav_menus(); 
	$nav_menus = array('none' => 'None');
	foreach ( $menus as $menu ) {      
		$nav_menus[$menu->term_id] = $menu->name;
	}
	return $nav_menus;
}

/* Social Links Functions*/
function crb_get_contact_links() { 

	$contact_links = array(
	  	'linkedin' => 'http://linkedin.com',
	  	'twitter'  => 'http://twitter.com'
	);
	return $contact_links;

}

function crb_add_http($url) {

	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = "http://" . $url;
	}
	return $url;

}

add_filter('next_posts_link_attributes', 'crb_posts_link_attributes');
function crb_posts_link_attributes() {
    return 'class="btn btn-blue link-load-more"';
}

function crb_get_all_cpt_entries($post_type) { // get all events, returns array(id => name)

	global $wpdb;
	$items = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_type='" . $post_type . "' AND post_status='publish'");
	$new_items = array();
	foreach($items as $i) {
		$new_items[$i->ID] = $i->post_title;
	}
	return $new_items;
}

function crb_display_social_links($footer = false) {

	$socials = crb_get_contact_links();
	foreach ($socials as $key => $social_link) : 

		$link =  get_option('crb_' . $key . '_link');
		if ( !empty($link) ) : ?>

			<li>
				<a href="<?php echo $link; ?>" target="_blank">
					<?php if ( $footer ) : ?>

						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico-<?php echo $key; ?>-blue.png" alt="" width="15px" height="15px">

					<?php else : ?> 
					
						<i class="ico-<?php echo $key; ?>"></i>

					<?php endif; ?>
				</a>
			</li>

		<?php endif;

	endforeach; 
}

function crb_image($source, $width, $height, $crop = true, $class = '') {

	$args = array(
		'width'  => $width,
		'height' => $height,
		'crop'	 => $crop
	); 

	if ( $class !== '' ) {

		$class = 'class="' . $class . '"';

	} ?>
	
	<img src="<?php echo wpthumb( $source, $args ); ?>" <?php echo $class; ?>>

	<?php

}

add_filter('wp_list_categories', 'crb_span_cat_count');
function crb_span_cat_count($links) {
	$links = str_replace('</a> (', '</a> <span>(', $links);
	$links = str_replace(')', ')</span>', $links);
	return $links;
}

function crb_get_post_type_years_archives($post_type = 'post') {

	global $wpdb;
	$years = $wpdb->get_results("
		SELECT
		    YEAR( post_date ) AS year, count($wpdb->posts.ID) AS number_of_posts
		FROM {$wpdb->posts}
		WHERE
		    post_type = '$post_type'
		    AND post_status = 'publish'
		GROUP BY
		    YEAR( post_date )
		ORDER BY post_date
		DESC"
	);

	return $years;

}

function crb_homepage_sponsors_section( $sponsorship_type, $title, $height_size) { 
	$sponsors = get_posts(array(
		'post_type' => 'crb_sponsor',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'fields' => 'ids',
		'meta_query' => array(
			array(
				'key' => '_crb_sponsor_sponsorship_type',
				'value' => $sponsorship_type,
			)
		)
	));	

	if ( empty( $sponsors ) ) {
		return;
	}
	?>

	<div class="sponsors sponsors-<?php echo $sponsorship_type; ?>">
		<?php echo wpautop($title); ?>

		<ul>
			<?php foreach ( $sponsors as $sponsor_id ) : 
				$logo = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_color_logo' );
				$link = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_link' );
				?>

				<li>
					<?php if ( $link ): ?>
						<a href="<?php echo $link; ?>" target="_blank">
					<?php endif ?>
					<?php echo wp_get_attachment_image( $logo, array(0, $height_size) ); ?>
					<?php if ( $link ): ?>
						</a>
					<?php endif ?>
				</li>

			<?php endforeach; ?>
		</ul>
	</div>

	<?php
}

function crb_get_sponsorship_types() {
	return array(
		'platinum' => __('Platinum Sponsors', 'crb'),
		'gold' => __('Gold Sponsors', 'crb'),
		'silver' => __('Silver Sponsors', 'crb'),
		'friends' => __('Friends of HLNY', 'crb'),
	);
}

# Get a page by its template, and optionally by additional criteria
function crb_get_page_by_template($template, $additional_meta = array()) {

	// the query for the page template 
	$meta_query = array(
		array(
			'key' => '_wp_page_template',
			'value' => $template,
		)
	);

	// if there is an additional criteria, merge with the above meta query
	if ($additional_meta) {
		$meta_query = array_merge($meta_query, $additional_meta);
		$meta_query['relation'] = 'AND';
	}

	// perform the query
	$pages = get_posts(array(
		'post_type' => 'page',
		'posts_per_page' => 1,
		'orderby' => 'ID',
		'order' => 'ASC',
		'meta_query' => $meta_query
	));

	// get the first page only
	if ($pages && !empty($pages[0])) {
		return $pages[0];
	}

	return false;
}

/* Gallery Shortcode modifications */

# Modify the wrapper of the default gallery shortcode
add_filter( 'gallery_style', 'crb_modify_gallery_shortcode_wrapper' );
function crb_modify_gallery_shortcode_wrapper() {
	return '<div class="section section-gallery section-event-photos custom-gallery-shortcode">';
}

# Modify the default gallery shortcode attributes
add_filter( 'shortcode_atts_gallery', 'crb_modify_post_gallery_attributes' );
function crb_modify_post_gallery_attributes($attrs) {

	$attrs['itemtag'] = 'li';
	$attrs['captiontag'] = 'strong';
	$attrs['link'] = 'file';
	return $attrs;
	
}
