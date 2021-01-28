<?php
use Carbon_Fields\Container;
use Carbon_Fields\Widget;
use Carbon_Fields\Field;

define('CRB_THEME_DIR', dirname(__FILE__) . DIRECTORY_SEPARATOR);
////include_once(CRB_THEME_DIR . 'options/theme-options.php');
//include('options/custom-fields.php');

add_action( 'carbon_fields_register_fields', 'crb_attach_post_meta' );
function crb_attach_post_meta() {
	/* Page Settings */
	Container::make('post_meta', __('Page Settings', 'crb'))
		->show_on_post_type('page')
		->hide_on_template(array('templates/homepage.php', 'default'))
		->add_fields(array(
			Field::make('textarea', 'crb_page_description', __('Page Description', 'crb'))
				->help_text('This text will be displayed right after the title.')
		));
	
	
	/* Default Page Settings */
	Container::make('post_meta', __('Default Page Settings', 'crb'))
		->show_on_post_type('page')
		->show_on_template(array('default'))
		->add_fields(array(
			Field::make('text', 'crb_page_subtitle', __('Subtitle', 'crb')),
			Field::make('textarea', 'crb_page_top_description', __('Top Description', 'crb'))
				->help_text('This text will be displayed before the textin the editor.')
		));
	
	/* Home Page Settings */
	Container::make('post_meta', __('Home Page Settings', 'crb'))
		->show_on_post_type('page')
		->show_on_template(array('templates/homepage.php'))
		->add_tab('Top Page Settings', array(
			Field::make('text', 'crb_homepage_green_button_text', __('Green Button Text', 'crb'))
				->set_default_value('Featured CTA'),
			Field::make('text', 'crb_homepage_green_button_link', __('Green Button Link', 'crb'))
				->set_default_value('#'),
		))
	
		->add_tab('Benefits', array(
			Field::make('text', 'crb_benefits_title', __('Title', 'crb'))
				->set_default_value('Benefits of joining HLNY integer legentibus erat a ante historiaum dapibus.'),
			Field::make('complex', 'crb_benefit_plans', __('Plans', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Plan',
					'plural_name'   => 'Plans'
				))
				->add_fields(array(
					Field::make('text', 'price', __('Price', 'crb')),
					Field::make('text', 'price_description', __('Price Description', 'crb'))
						->help_text('This text will be displayed right under the price.'),
					Field::make('text', 'title', __('Plan Title', 'crb')),
					Field::make('text', 'plan_description', __('Plan Description', 'crb')),
					Field::make('complex', 'plan_items', __('List Items', 'crb'))
						->add_fields(array(
							Field::make('text', 'text', __('Text', 'crb'))
								->set_required(true)
						)),
					Field::make('text', 'more_info_link', __('"More Info" link', 'crb')),
					Field::make('text', 'bottom_description', __('Bottom Description', 'crb'))
				)),
		));
	
	/* Sidebar Settings */
	Container::make('post_meta', __('Sidebar Settings', 'crb'))
		->show_on_post_type(array(
			'page',
			'crb_event',
		))
		->hide_on_template(array('templates/homepage.php', 'templates/become-member.php', 'templates/who-we-are.php', 'templates/past-events.php', 'templates/full-width.php'))
		->add_fields(array(
			Field::make('sidebar', 'crb_custom_sidebar', __('Choose / Add New Sidebar', 'crb'))
		));
	
	/* Become a Member Page Settings */
	Container::make('post_meta', __('Become a Member Page Settings', 'crb'))
		->show_on_post_type('page')
		->show_on_template('templates/become-member.php')
		->add_fields(array(
			Field::make('text', 'crb_top_video', __('Video URL', 'crb'))
				->help_text('Enter Vimeo or YouTube url in this field. Example: https://www.youtube.com/watch?v=XQu8TTBmGhA'),
			Field::make('complex', 'crb_member_sections', __('Sections', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Section',
					'plural_name'   => 'Sections'
				))
				->add_fields(array(
					Field::make('text', 'title', __('Title', 'crb')),
					Field::make('rich_text', 'content', __('Content', 'crb')),
					Field::make('complex', 'plans', __('Plans', 'crb'))
						->setup_labels(array(
							'singular_name' => 'Plan',
							'plural_name'   => 'Plans'
						))
						->add_fields(array(
							Field::make('text', 'plan_name', __('Name', 'crb'))
								->set_required(true),
							Field::make('text', 'plan_price', __('Price', 'crb'))
								->set_required(true)
						)),
					Field::make('text', 'bottom_text', __('Bottom Text', 'crb')),
					Field::make('text', 'green_button_text', __('Green Button Text', 'crb')),
					Field::make('text', 'green_button_link', __('Green Button Link', 'crb')),
					Field::make('textarea', 'testimonial_text', __('Testimonial Text', 'crb')),
					Field::make('text', 'testimonial_author_name', __('Testimonial Author', 'crb')),
					Field::make('text', 'testimonial_author_info', __('Testimonial Author Info', 'crb')),
					Field::make('image', 'testimonial_image', __('Testimonial Background Image', 'crb'))
				))
		));
	
	
	
	/* Become a Member Page Settings */
	Container::make('post_meta', __('Become a Sponsor Page Settings', 'crb'))
		->show_on_post_type('page')
		->show_on_template('templates/become-sponsor.php')
		->add_tab('Content', array(
			Field::make('text', 'crb_become_sponsor_top_title', __('Content Title', 'crb'))
			->set_default_value('How to Become a Sponsor')
		))
		->add_tab('Sponsorship Levels', array(
			Field::make('text', 'crb_sponsorship_title', __('Title', 'crb'))
				->set_default_value('Our Sponsorship Levels'),
			Field::make('complex', 'crb_sponsorship_levels', __('Levels', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Level',
					'plural_name'   => 'Levels'
				))
				->add_fields(array(
					Field::make('text', 'title', __('Title', 'crb'))
						->set_width(20),
					Field::make('textarea', 'description', __('Description', 'crb'))
						->set_width(20),
					Field::make('text', 'price', __('Price', 'crb'))
						->set_width(20),
					Field::make('text', 'text_under_price', __('Text Under Price', 'crb'))
						->set_default_value('per calendar year')
						->set_width(20),
					Field::make('text', 'bottom_text', __('Bottom Text', 'crb'))
						->set_width(20)
	
				))
		))
	
		->add_tab('Annual Gala', array(
			Field::make('text', 'crb_annual_title', __('Title', 'crb'))
				->set_default_value('Annual gala'),
			Field::make('complex', 'crb_sponsorship_list', __('Sponsorship List', 'crb'))
				->add_fields(array(
					Field::make('text', 'title', __('Title', 'crb'))
						->set_width(50),
					Field::make('text', 'price', __('Price', 'crb'))
						->set_width(50)
				)),
			Field::make('rich_text', 'crb_annual_right_text', __('Right Text', 'crb')),
		))
	
		->add_tab('Sponsorship Request', array(
			Field::make('gravity_form', 'crb_sponsorship_form', __('Choose Sponsorship Form', 'crb'))
		));
	
	/* Who We Are Page Settings */
	Container::make('post_meta', __('Who We Are Page Settings', 'crb'))
		->show_on_post_type('page')
		->show_on_template('templates/who-we-are.php')
		->add_tab('Top Section', array(
			Field::make('complex', 'crb_top_navigation_links', __('Top Navigation Links', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Link',
					'plural_name'   => 'Links'
				))
				->add_fields(array(
					Field::make('text', 'text', __('Text', 'crb'))
						->set_required(true)
						->set_width(50),
					Field::make('select', 'link_to_section', __('Scroll to section', 'crb'))
						->set_width(50)
						->add_options(array(
							'our-history' => 'Our History',
							'leadership'  => 'Leadership',
							'diversity-inclusion' => 'Diversity & Inclusion'
						))
				))
		))
	
		->add_tab('Our History', array(
			Field::make('text', 'crb_history_title', __('Title', 'crb'))
				->set_default_value('Our History'),
			Field::make('rich_text', 'crb_history_content', __('Content', 'crb')),
			Field::make('complex', 'crb_history_years', __('Years', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Year',
					'plural_name'   => 'Years'
				))
				->add_fields(array(
					Field::make('text', 'year', __('Year', 'crb'))
						->set_required(true)
						->set_width(50),
					Field::make('textarea', 'description', __('Description', 'crb'))
						->set_width(50)
						->set_required(true),
				)),
		))
	
		->add_tab('Leadership', array(
			Field::make('text', 'crb_leadership_title', __('Title', 'crb'))
				->set_default_value('Leadership'),
			Field::make('complex', 'crb_leadership_tabs', __('Tabs', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Tab',
					'plural_name'   => 'Tabs'
				))
				 ->add_fields(array(
					 Field::make('text', 'tab_title', __('Tab Title', 'crb'))
						 ->set_required(true),
					 Field::make('complex', 'team', __('Team Members', 'crb'))
						 ->setup_labels(array(
							 'singular_name' => 'Team Member',
							 'plural_name'   => 'Team Members'
						 ))
						 ->add_fields(array(
							 Field::make('text', 'title', __('Title', 'crb'))
								 ->set_width(15),
							 Field::make('text', 'position', __('Position','crb'))
								 ->set_width(15),
							 Field::make('image', 'picture', __('Picture', 'crb'))
								 ->set_width(20),
							 Field::make('textarea', 'content', __('Content', 'crb'))
								 ->set_width(30),
							 Field::make('complex', 'links', __('Links', 'crb'))	
								 ->set_width(20)
								 ->help_text('These links will be displayed under the picture.')
								 ->setup_labels(array(
									 'singular_name' => 'Link',
									 'plural_name'   => 'Links'
								 ))
								 ->add_fields(array(
									 Field::make('text', 'link', __('Link', 'crb'))
										 ->set_required(true),
									 Field::make('text', 'link_text', __('Link Text', 'crb'))
										 ->set_required(true)
								 ))
						 ))
				 )),
			Field::make('rich_text', 'crb_presidents_text', __('Past Presidents Text', 'crb')),
		))
	
		->add_tab('Diversity & Inclusion', array(
			Field::make('text', 'crb_diversity_title', __('Title', 'crb'))
				->set_default_value('Diversity & Inclusion'),
			Field::make('complex', 'crb_diversity_gallery', __('Gallery', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Image',
					'plural_name'   => 'Images'
				))
				->add_fields(array(
					Field::make('image', 'image', __('Upload Image', 'crb'))
						->set_required(true),
				)),
			Field::make('rich_text', 'crb_diversity_content', __('Content', 'crb'))
		));
	
	
	/* Newsletter Settings */
	Container::make('post_meta', __('Newsletter Settings', 'crb'))
		->show_on_post_type('crb_newsletter')
		->add_fields(array(
			Field::make('complex', 'crb_newsletter_gallery', __('Newsletter Gallery', 'crb'))
				->setup_labels(array(
					'singular_name' => 'Image',
					'plural_name'   => 'Images'
				))
				->add_fields(array(
					Field::make('image', 'image', __('Upload Image'))
						->set_required(true)
				))
		));
	
	$yes_no_array = array(
		'no'  => 'No',
		'yes' => 'Yes'
	);
	
	/* Event Settings */
	Container::make('post_meta', __('Event Settings', 'crb'))
		->show_on_post_type('crb_event')
		->add_fields(array(
			Field::make('date', 'crb_event_date', __('Event Date', 'crb'))
				->set_width(25),
			Field::make('text', 'crb_event_time', __('Event Time', 'crb'))
				->set_width(25),
			Field::make('text', 'crb_event_location', __('Event Location', 'crb'))
				->set_width(25),
			Field::make('text', 'crb_event_register_link', __('Register Link', 'crb'))
				->set_width(25),
	
			Field::make('select', 'crb_partner_event', __('Partner Event', 'crb'))
				->add_options($yes_no_array)
				->set_width(50),
			Field::make('select', 'crb_featured_event', __('Featured Event', 'crb'))
				->add_options($yes_no_array)
				->set_width(50),
	
			Field::make('textarea', 'crb_event_embed_code', __('Form Embed Code', 'crb'))
				->set_rows(3)
				->help_text('If you specify a form embed code, the Register and Sponsor buttons will not be displayed.'),
	
			Field::make('select', 'crb_show_image_on_single_page', __('Show Thumbnail on Event Page', 'crb'))
				->add_options(array(
					'yes' => 'Yes',
					'no' => 'No'
				)),
	
			Field::make('complex', 'crb_event_gallery_images', __('Gallery Images', 'crb'))
				->help_text('These images will be displayed, if the event has already passed.')
				->setup_labels(array(
					'singular_name' => 'Image',
					'plural_name'   => 'Images'
				))
				->add_fields(array(
					Field::make('image', 'image', __('Upload Image', 'crb'))
						->set_required(true)
						->set_width(30),
					Field::make('text', 'image_title', __('Image Title', 'crb'))
						->set_width(30),
					Field::make('text', 'image_description', __('Image Description', 'crb'))
						->set_width(40)
				))
		));
	
		/* Full Width Page Settings */
		Container::make('post_meta', __('Full Width Page Settings', 'crb'))
			->show_on_post_type('page')
			->show_on_template('templates/full-width.php')
			->add_fields(array(
				Field::make('checkbox', 'crb_full_width_enable_tabs', __('Enable Tabs?', 'crb')),
				Field::make('complex', 'crb_full_width_sections', __('Sections', 'crb'))

					->setup_labels(array(
						'singular_name' => 'Section',
						'plural_name'   => 'Sections'
					))

					->add_fields('right_image_section', array(
						Field::make('separator', 'crb_right_image_section_section', __('Right Image Section', 'crb')),
						Field::make('text', 'tab_title', __('Tab Title', 'crb'))
							->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
						Field::make('text', 'left_title', __('Left Text Title', 'crb')),
						Field::make('rich_text', 'left_text', __('Left Text', 'crb')),
						Field::make('image', 'right_image', __('Right Image', 'crb')),			
					))

					->add_fields('full_width_text', array(
						Field::make('separator', 'crb_full_width_text_section', __('Full Width Text', 'crb')),
						Field::make('text', 'tab_title', __('Tab Title', 'crb'))
							->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
						Field::make('rich_text', 'full_width_text', __('Text', 'crb'))
					))

					->add_fields('left_image_section', array(
						Field::make('separator', 'crb_left_image_section_section', __('Left Image Section', 'crb')),
						Field::make('text', 'tab_title', __('Tab Title', 'crb'))
							->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
						Field::make('image', 'left_image', __('Left Image', 'crb')),
						Field::make('text', 'right_title', __('Right Title', 'crb')),
						Field::make('text', 'right_subtitle', __('Right Subtitle', 'crb')),
						Field::make('rich_text', 'right_text', __('Right Text', 'crb')),
						
					))

					->add_fields('gallery_with_description', array(
						Field::make('separator', 'crb_gallery_with_description_section', __('Gallery with description', 'crb')),
						Field::make('text', 'tab_title', __('Tab Title', 'crb'))
							->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
						Field::make('text', 'gallery_title', __('Title', 'crb'))
							->set_default_value('Sub-Heading with gallery'),
						Field::make('textarea', 'gallery_description', __('Description', 'crb')),
						Field::make('complex', 'gallery_images', __('Gallery Images', 'crb'))
							->setup_labels(array(
								'singular_name' => 'Image',
								'plural_name'   => 'Images'
							))
							->add_fields(array(
								Field::make('image', 'image', __('Upload Image', 'crb'))
									->set_required(true)
							))
					))

					->add_fields('gallery_images', array(
						Field::make('separator', 'crb_gallery_images_section', __('Gallery Images', 'crb')),
						Field::make('text', 'tab_title', __('Tab Title', 'crb'))
							->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
						Field::make('complex', 'gallery_images', __('Gallery Images', 'crb'))
							->setup_labels(array(
								'singular_name' => 'Image',
								'plural_name'   => 'Images'
							))
							->add_fields(array(
								Field::make('image', 'image', __('Upload Image', 'crb'))
									->set_required(true)
							))
					))
			));


	/* Sponsor Settings */
	Container::make('post_meta', __('Sponsor Settings', 'crb'))
		->show_on_post_type('crb_sponsor')
		->add_fields(array(
			Field::make('image', 'crb_sponsor_color_logo', __('Color Logo', 'crb'))
				->set_width(50)
				->set_required(true),
			Field::make('image', 'crb_sponsor_blue_logo', __('Blue Logo', 'crb'))
				->set_width(50)
				->set_required(true),
			Field::make('text', 'crb_sponsor_link', __('Link URL', 'crb'))
				->set_width(50),
			Field::make('select', 'crb_sponsor_sponsorship_type', __('Sponsorship Type', 'crb'))
				->set_width(50)
				->set_options('crb_get_sponsorship_types')
				->set_required(true),
		));
	
}

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	
	$social_links = crb_get_contact_links();

	Container::make( 'theme_options', __( 'Theme Options', 'crb' ) )
	->add_fields( array(
		Field::make( 'text', 'crb_text', 'Text Field' ),
		Field::make('separator', 'header'),
		Field::make('text', 'crb_login_link', __('Top Link', 'crb'))
			->set_default_value('#'),
		Field::make('text', 'crb_login_text', __('Top Link Text', 'crb'))
			->set_default_value(''),
		Field::make('text', 'crb_become_member_link', __('Become a Member link', 'crb'))
			->set_default_value('#'),
		Field::make('image', 'crb_default_top_image', __('Default Top Image', 'crb'))
			->help_text('This image will be displayed by default on the top of the page ( if the page does not have a Featured image uploaded ).'),
		Field::make('separator', 'social_networks_links'),
		Field::make('text', 'crb_linkedin_link', ucfirst('Linkedin Link'))
		->set_default_value('#'),
		Field::make('text', 'crb_twitter_link', ucfirst('Twitter Link'))
		->set_default_value('#'),
		Field::make('separator', 'crb_pages_section', __('Pages Section', 'crb')),
		Field::make('select', 'crb_newsletters_page', __('Newsletters Page', 'crb'))
			->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page'))),
		Field::make('select', 'crb_contact_page', __('Contact Page', 'crb'))
			->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page'))),
		Field::make('select', 'crb_upcoming_events_page', __('Upcoming Events Page', 'crb'))
			->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page'))),
		Field::make('select', 'crb_past_events_page', __('Past Events Page', 'crb'))
			->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page'))),
		Field::make('select', 'crb_sponsorship_page', __('Sponsorship Page', 'crb'))
			->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page'))),
		Field::make('gravity_form', 'crb_sponsorship_form', __('Sponsorship Form', 'crb')),
		
		/* Sidebars Section */
		Field::make('separator', 'crb_sidebars_section', __('Sidebars Section', 'crb')),
		Field::make('sidebar', 'crb_single_post_sidebar', __('Single Post Sidebar', 'crb')),
		Field::make('sidebar', 'crb_single_event_sidebar', __('Single Event Sidebar', 'crb')),
		
		Field::make('separator', 'footer'),
		Field::make('rich_text', 'crb_footer_text', __('Footer Text'))
			->set_default_value(''),
		
		Field::make('separator', 'misc'),
		Field::make('header_scripts', 'header_script'),
		Field::make('footer_scripts', 'footer_script'),	
		
		Field::make('separator', 'crb_twitter_settings_group', __('Twiiter Settings', 'crb')),
		Field::make('html', 'crb_twitter_settings_html')
		->set_html('
			<div style="position: relative; background: #fff; border: 1px solid #ccc; padding: 10px;">
				<h4><strong>' . __('Twitter API requires a Twitter application for communication with 3rd party sites. Here are the steps for creating and setting up a Twitter application:', 'crb') . '</strong></h4>
				<ol style="font-weight: normal;">
					<li>' . sprintf(__('Go to <a href="%1$s" target="_blank">%1$s</a> and log in, if necessary.', 'crb'), 'https://dev.twitter.com/apps/new') . '</li>
					<li>' . __('Supply the necessary required fields and accept the <strong>Terms of Service</strong>. <strong>Callback URL</strong> field may be left empty.', 'crb') . '</li>
					<li>' . __('Submit the form.', 'crb') . '</li>
					<li>' . __('On the next screen, click on the <strong>Keys and Access Tokens</strong> tab.', 'crb') . '</li>
					<li>' . __('Scroll down to <strong>Your access token</strong> section and click the <strong>Create my access token</strong> button.', 'crb') . '</li>
					<li>' . __('Copy the following fields: <strong>Consumer Key, Consumer Secret, Access Token, Access Token Secret</strong> to the below fields.', 'crb') . '</li>
				</ol>
			</div>
		'),
		Field::make('text', 'crb_twitter_consumer_key', __('Consumer Key', 'crb'))
		->set_default_value(''),
		Field::make('text', 'crb_twitter_consumer_secret', __('Consumer Secret', 'crb'))
		->set_default_value(''),
		Field::make('text', 'crb_twitter_oauth_access_token', __('Access Token', 'crb'))
		->set_default_value(''),
		Field::make('text', 'crb_twitter_oauth_access_token_secret', __('Access Token Secret', 'crb'))
		->set_default_value('')		
	) );

}


# Load the debug functions early so they're available for all theme code
//include_once(CRB_THEME_DIR . 'lib/debug.php');

# Enqueue JS and CSS assets on the front-end
add_action('wp_enqueue_scripts', 'crb_wp_enqueue_scripts');
function crb_wp_enqueue_scripts() {
	$template_dir = get_template_directory_uri();

	# Enqueue jQuery
	wp_enqueue_script('jquery');

	# Enqueue Custom JS files
	# @wp_enqueue_script attributes -- id, location, dependencies, in_footer = false
	wp_enqueue_script('fullscreener', $template_dir . '/js/jquery.fullscreener.js', array('jquery'));
	wp_enqueue_script('lazyload', $template_dir . '/js/jquery.lazyload.min.js', array('jquery'));
	wp_enqueue_script('magnific-popup', $template_dir . '/js/jquery.magnific-popup.min.js', array('jquery'));
	wp_enqueue_script('theme-functions', $template_dir . '/js/functions.js', array('jquery'));

	# Enqueue Custom CSS files
	# @wp_enqueue_script attributes -- id, location, dependencies, media = all
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
	# @wp_enqueue_script attributes -- id, location, dependencies, in_footer = false
	wp_enqueue_script('theme-admin-functions', $template_dir . '/js/admin-functions.js', array('jquery'));
	
	# Enqueue Styles
	# @wp_enqueue_script attributes -- id, location, dependencies, media = all
	wp_enqueue_script('theme-admin-styles', $template_dir . '/css/admin-style.css');
}

# Attach Custom Post Types and Custom Taxonomies
add_action('init', 'crb_attach_post_types_and_taxonomies', 0);
function crb_attach_post_types_and_taxonomies() {
	# Attach Custom Post Types
	include_once(CRB_THEME_DIR . 'options/post-types.php');

	# Attach Custom Taxonomies
	include_once(CRB_THEME_DIR . 'options/taxonomies.php');
}

add_action('after_setup_theme', 'crb_setup_theme');

# To override theme setup process in a child theme, add your own crb_setup_theme() to your child theme's
# functions.php file.
if (!function_exists('crb_setup_theme')) {
	function crb_setup_theme() {
		include_once(CRB_THEME_DIR . 'lib/admin-column-manager/carbon-admin-columns-manager.php');
		# Make this theme available for translation.
		/*
		load_theme_textdomain( 'crb', get_template_directory() . '/languages' );

		# Common libraries
		include_once(CRB_THEME_DIR . 'lib/common.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-fields/carbon-fields.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-validator/carbon-validator.php');
		include_once(CRB_THEME_DIR . 'lib/carbon-pagination/carbon-pagination.php');

		# Additional libraries and includes
		include_once(CRB_THEME_DIR . 'includes/comments.php');
		include_once(CRB_THEME_DIR . 'includes/title.php');
		include_once(CRB_THEME_DIR . 'includes/gravity-forms.php');

		# Attach additional options
		if( !function_exists('wpthumb') ) {
			include_once(CRB_THEME_DIR . 'includes/wpthumb/wpthumb.php');
		}
		*/
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

		//add_action('carbon_register_fields', 'crb_attach_theme_options');
		add_action('carbon_after_register_fields', 'crb_attach_theme_help');

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

function crb_attach_theme_help() {
	# Theme Help needs to be after options/theme-options.php
	include_once(CRB_THEME_DIR . 'lib/theme-help/theme-readme.php');
}

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
