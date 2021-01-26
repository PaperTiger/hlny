<?php
/* Page Settings */
Carbon_Container::factory('custom_fields', __('Page Settings', 'crb'))
	->show_on_post_type('page')
	->hide_on_template(array('templates/homepage.php', 'default'))
	->add_fields(array(
		Carbon_Field::factory('textarea', 'crb_page_description', __('Page Description', 'crb'))
			->help_text('This text will be displayed right after the title.')
	));


/* Default Page Settings */
Carbon_Container::factory('custom_fields', __('Default Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template(array('default'))
	->add_fields(array(
		Carbon_Field::factory('text', 'crb_page_subtitle', __('Subtitle', 'crb')),
		Carbon_Field::factory('textarea', 'crb_page_top_description', __('Top Description', 'crb'))
			->help_text('This text will be displayed before the textin the editor.')
	));

/* Home Page Settings */
Carbon_Container::factory('custom_fields', __('Home Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template(array('templates/homepage.php'))
	->add_tab('Top Page Settings', array(
		Carbon_Field::factory('text', 'crb_homepage_green_button_text', __('Green Button Text', 'crb'))
			->set_default_value('Featured CTA'),
		Carbon_Field::factory('text', 'crb_homepage_green_button_link', __('Green Button Link', 'crb'))
			->set_default_value('#'),
	))

	->add_tab('Benefits', array(
		Carbon_Field::factory('text', 'crb_benefits_title', __('Title', 'crb'))
			->set_default_value('Benefits of joining HLNY integer legentibus erat a ante historiaum dapibus.'),
		Carbon_Field::factory('complex', 'crb_benefit_plans', __('Plans', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Plan',
				'plural_name'   => 'Plans'
			))
			->add_fields(array(
				Carbon_Field::factory('text', 'price', __('Price', 'crb')),
				Carbon_Field::factory('text', 'price_description', __('Price Description', 'crb'))
					->help_text('This text will be displayed right under the price.'),
				Carbon_Field::factory('text', 'title', __('Plan Title', 'crb')),
				Carbon_Field::factory('text', 'plan_description', __('Plan Description', 'crb')),
				Carbon_Field::factory('complex', 'plan_items', __('List Items', 'crb'))
					->add_fields(array(
						Carbon_Field::factory('text', 'text', __('Text', 'crb'))
							->set_required(true)
					)),
				Carbon_Field::factory('text', 'more_info_link', __('"More Info" link', 'crb')),
				Carbon_Field::factory('text', 'bottom_description', __('Bottom Description', 'crb'))
			)),
	));

/* Sidebar Settings */
Carbon_Container::factory('custom_fields', __('Sidebar Settings', 'crb'))
	->show_on_post_type(array(
		'page',
		'crb_event',
	))
	->hide_on_template(array('templates/homepage.php', 'templates/become-member.php', 'templates/who-we-are.php', 'templates/past-events.php', 'templates/full-width.php'))
	->add_fields(array(
		Carbon_Field::factory('sidebar', 'crb_custom_sidebar', __('Choose / Add New Sidebar', 'crb'))
	));

/* Become a Member Page Settings */
Carbon_Container::factory('custom_fields', __('Become a Member Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/become-member.php')
	->add_fields(array(
		Carbon_Field::factory('text', 'crb_top_video', __('Video URL', 'crb'))
			->help_text('Enter Vimeo or YouTube url in this field. Example: https://www.youtube.com/watch?v=XQu8TTBmGhA'),
		Carbon_Field::factory('complex', 'crb_member_sections', __('Sections', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Section',
				'plural_name'   => 'Sections'
			))
			->add_fields(array(
				Carbon_Field::factory('text', 'title', __('Title', 'crb')),
				Carbon_Field::factory('rich_text', 'content', __('Content', 'crb')),
				Carbon_Field::factory('complex', 'plans', __('Plans', 'crb'))
					->setup_labels(array(
						'singular_name' => 'Plan',
						'plural_name'   => 'Plans'
					))
					->add_fields(array(
						Carbon_Field::factory('text', 'plan_name', __('Name', 'crb'))
							->set_required(true),
						Carbon_Field::factory('text', 'plan_price', __('Price', 'crb'))
							->set_required(true)
					)),
				Carbon_Field::factory('text', 'bottom_text', __('Bottom Text', 'crb')),
				Carbon_Field::factory('text', 'green_button_text', __('Green Button Text', 'crb')),
				Carbon_Field::factory('text', 'green_button_link', __('Green Button Link', 'crb')),
				Carbon_Field::factory('textarea', 'testimonial_text', __('Testimonial Text', 'crb')),
				Carbon_Field::factory('text', 'testimonial_author_name', __('Testimonial Author', 'crb')),
				Carbon_Field::factory('text', 'testimonial_author_info', __('Testimonial Author Info', 'crb')),
				Carbon_Field::factory('attachment', 'testimonial_image', __('Testimonial Background Image', 'crb'))
			))
	));



/* Become a Member Page Settings */
Carbon_Container::factory('custom_fields', __('Become a Sponsor Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/become-sponsor.php')
	->add_tab('Content', array(
		Carbon_Field::factory('text', 'crb_become_sponsor_top_title', __('Content Title', 'crb'))
		->set_default_value('How to Become a Sponsor')
	))
	->add_tab('Sponsorship Levels', array(
		Carbon_Field::factory('text', 'crb_sponsorship_title', __('Title', 'crb'))
			->set_default_value('Our Sponsorship Levels'),
		Carbon_Field::factory('complex', 'crb_sponsorship_levels', __('Levels', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Level',
				'plural_name'   => 'Levels'
			))
			->add_fields(array(
				Carbon_Field::factory('text', 'title', __('Title', 'crb'))
					->set_width(20),
				Carbon_Field::factory('textarea', 'description', __('Description', 'crb'))
					->set_width(20),
				Carbon_Field::factory('text', 'price', __('Price', 'crb'))
					->set_width(20),
				Carbon_Field::factory('text', 'text_under_price', __('Text Under Price', 'crb'))
					->set_default_value('per calendar year')
					->set_width(20),
				Carbon_Field::factory('text', 'bottom_text', __('Bottom Text', 'crb'))
					->set_width(20)

			))
	))

	->add_tab('Annual Gala', array(
		Carbon_Field::factory('text', 'crb_annual_title', __('Title', 'crb'))
			->set_default_value('Annual gala'),
		Carbon_Field::factory('complex', 'crb_sponsorship_list', __('Sponsorship List', 'crb'))
			->add_fields(array(
				Carbon_Field::factory('text', 'title', __('Title', 'crb'))
					->set_width(50),
				Carbon_Field::factory('text', 'price', __('Price', 'crb'))
					->set_width(50)
			)),
		Carbon_Field::factory('rich_text', 'crb_annual_right_text', __('Right Text', 'crb')),
	))

	->add_tab('Sponsorship Request', array(
		Carbon_Field::factory('gravity_form', 'crb_sponsorship_form', __('Choose Sponsorship Form', 'crb'))
	));

/* Who We Are Page Settings */
Carbon_Container::factory('custom_fields', __('Who We Are Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/who-we-are.php')
	->add_tab('Top Section', array(
		Carbon_Field::factory('complex', 'crb_top_navigation_links', __('Top Navigation Links', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Link',
				'plural_name'   => 'Links'
			))
			->add_fields(array(
				Carbon_Field::factory('text', 'text', __('Text', 'crb'))
					->set_required(true)
					->set_width(50),
				Carbon_Field::factory('select', 'link_to_section', __('Scroll to section', 'crb'))
					->set_width(50)
					->add_options(array(
						'our-history' => 'Our History',
						'leadership'  => 'Leadership',
						'diversity-inclusion' => 'Diversity & Inclusion'
					))
			))
	))

	->add_tab('Our History', array(
		Carbon_Field::factory('text', 'crb_history_title', __('Title', 'crb'))
			->set_default_value('Our History'),
		Carbon_Field::factory('rich_text', 'crb_history_content', __('Content', 'crb')),
		Carbon_Field::factory('complex', 'crb_history_years', __('Years', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Year',
				'plural_name'   => 'Years'
			))
			->add_fields(array(
				Carbon_Field::factory('text', 'year', __('Year', 'crb'))
					->set_required(true)
					->set_width(50),
				Carbon_Field::factory('textarea', 'description', __('Description', 'crb'))
					->set_width(50)
					->set_required(true),
			)),
	))

	->add_tab('Leadership', array(
		Carbon_Field::factory('text', 'crb_leadership_title', __('Title', 'crb'))
			->set_default_value('Leadership'),
		Carbon_Field::factory('complex', 'crb_leadership_tabs', __('Tabs', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Tab',
				'plural_name'   => 'Tabs'
			))
		 	->add_fields(array(
		 		Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
		 			->set_required(true),
		 		Carbon_Field::factory('complex', 'team', __('Team Members', 'crb'))
		 			->setup_labels(array(
		 				'singular_name' => 'Team Member',
		 				'plural_name'   => 'Team Members'
		 			))
		 			->add_fields(array(
		 				Carbon_Field::factory('text', 'title', __('Title', 'crb'))
		 					->set_width(15),
		 				Carbon_Field::factory('text', 'position', __('Position','crb'))
		 					->set_width(15),
		 				Carbon_Field::factory('attachment', 'picture', __('Picture', 'crb'))
		 					->set_width(20),
		 				Carbon_Field::factory('textarea', 'content', __('Content', 'crb'))
		 					->set_width(30),
		 				Carbon_Field::factory('complex', 'links', __('Links', 'crb'))	
		 					->set_width(20)
		 					->help_text('These links will be displayed under the picture.')
		 					->setup_labels(array(
		 						'singular_name' => 'Link',
		 						'plural_name'   => 'Links'
		 					))
		 					->add_fields(array(
		 						Carbon_Field::factory('text', 'link', __('Link', 'crb'))
		 							->set_required(true),
		 						Carbon_Field::factory('text', 'link_text', __('Link Text', 'crb'))
		 							->set_required(true)
		 					))
		 			))
		 	)),
		Carbon_Field::factory('rich_text', 'crb_presidents_text', __('Past Presidents Text', 'crb')),
	))

	->add_tab('Diversity & Inclusion', array(
		Carbon_Field::factory('text', 'crb_diversity_title', __('Title', 'crb'))
			->set_default_value('Diversity & Inclusion'),
		Carbon_Field::factory('complex', 'crb_diversity_gallery', __('Gallery', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Image',
				'plural_name'   => 'Images'
			))
			->add_fields(array(
				Carbon_Field::factory('attachment', 'image', __('Upload Image', 'crb'))
					->set_required(true),
			)),
		Carbon_Field::factory('rich_text', 'crb_diversity_content', __('Content', 'crb'))
	));


/* Newsletter Settings */
Carbon_Container::factory('custom_fields', __('Newsletter Settings', 'crb'))
	->show_on_post_type('crb_newsletter')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_newsletter_gallery', __('Newsletter Gallery', 'crb'))
			->setup_labels(array(
				'singular_name' => 'Image',
				'plural_name'   => 'Images'
			))
			->add_fields(array(
				Carbon_Field::factory('attachment', 'image', __('Upload Image'))
					->set_required(true)
			))
	));

$yes_no_array = array(
	'no'  => 'No',
	'yes' => 'Yes'
);

/* Event Settings */
Carbon_Container::factory('custom_fields', __('Event Settings', 'crb'))
	->show_on_post_type('crb_event')
	->add_fields(array(
		Carbon_Field::factory('date', 'crb_event_date', __('Event Date', 'crb'))
			->set_width(25),
		Carbon_Field::factory('text', 'crb_event_time', __('Event Time', 'crb'))
			->set_width(25),
		Carbon_Field::factory('text', 'crb_event_location', __('Event Location', 'crb'))
			->set_width(25),
		Carbon_Field::factory('text', 'crb_event_register_link', __('Register Link', 'crb'))
			->set_width(25),

		Carbon_Field::factory('select', 'crb_partner_event', __('Partner Event', 'crb'))
			->add_options($yes_no_array)
			->set_width(50),
		Carbon_Field::factory('select', 'crb_featured_event', __('Featured Event', 'crb'))
			->add_options($yes_no_array)
			->set_width(50),

		Carbon_Field::factory('textarea', 'crb_event_embed_code', __('Form Embed Code', 'crb'))
			->set_rows(3)
			->help_text('If you specify a form embed code, the Register and Sponsor buttons will not be displayed.'),

		Carbon_Field::factory('select', 'crb_show_image_on_single_page', __('Show Thumbnail on Event Page', 'crb'))
			->add_options(array(
				'yes' => 'Yes',
				'no' => 'No'
			)),

		Carbon_Field::factory('complex', 'crb_event_gallery_images', __('Gallery Images', 'crb'))
			->help_text('These images will be displayed, if the event has already passed.')
			->setup_labels(array(
				'singular_name' => 'Image',
				'plural_name'   => 'Images'
			))
			->add_fields(array(
				Carbon_Field::factory('attachment', 'image', __('Upload Image', 'crb'))
					->set_required(true)
					->set_width(30),
				Carbon_Field::factory('text', 'image_title', __('Image Title', 'crb'))
					->set_width(30),
				Carbon_Field::factory('text', 'image_description', __('Image Description', 'crb'))
					->set_width(40)
			))
	));

/* Full Width Page Settings */
Carbon_Container::factory('custom_fields', __('Full Width Page Settings', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/full-width.php')
	->add_fields(array(
		Carbon_Field::factory('checkbox', 'crb_full_width_enable_tabs', __('Enable Tabs?', 'crb')),
		Carbon_Field::factory('complex', 'crb_full_width_sections', __('Sections', 'crb'))

			->setup_labels(array(
				'singular_name' => 'Section',
				'plural_name'   => 'Sections'
			))

			->add_fields('Right Image Section', array(
				Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Carbon_Field::factory('text', 'left_title', __('Left Text Title', 'crb')),
				Carbon_Field::factory('rich_text', 'left_text', __('Left Text', 'crb')),
				Carbon_Field::factory('attachment', 'right_image', __('Right Image', 'crb')),			
			))

			->add_fields('Full Width Text', array(
				Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Carbon_Field::factory('rich_text', 'full_width_text', __('Text', 'crb'))
			))

			->add_fields('Left Image Section', array(
				Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Carbon_Field::factory('attachment', 'left_image', __('Left Image', 'crb')),
				Carbon_Field::factory('text', 'right_title', __('Right Title', 'crb')),
				Carbon_Field::factory('text', 'right_subtitle', __('Right Subtitle', 'crb')),
				Carbon_Field::factory('rich_text', 'right_text', __('Right Text', 'crb')),
				
			))

			->add_fields('Gallery with description', array(
				Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Carbon_Field::factory('text', 'gallery_title', __('Title', 'crb'))
					->set_default_value('Sub-Heading with gallery'),
				Carbon_Field::factory('textarea', 'gallery_description', __('Description', 'crb')),
				Carbon_Field::factory('complex', 'gallery_images', __('Gallery Images', 'crb'))
					->setup_labels(array(
						'singular_name' => 'Image',
						'plural_name'   => 'Images'
					))
					->add_fields(array(
						Carbon_Field::factory('attachment', 'image', __('Upload Image', 'crb'))
							->set_required(true)
					))
			))

			->add_fields('Gallery images', array(
				Carbon_Field::factory('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Carbon_Field::factory('complex', 'gallery_images', __('Gallery Images', 'crb'))
					->setup_labels(array(
						'singular_name' => 'Image',
						'plural_name'   => 'Images'
					))
					->add_fields(array(
						Carbon_Field::factory('attachment', 'image', __('Upload Image', 'crb'))
							->set_required(true)
					))
			))
	));

/* Sponsor Settings */
Carbon_Container::factory('custom_fields', __('Sponsor Settings', 'crb'))
	->show_on_post_type('crb_sponsor')
	->add_fields(array(
		Carbon_Field::factory('attachment', 'crb_sponsor_color_logo', __('Color Logo', 'crb'))
			->set_width(50)
			->set_required(true),
		Carbon_Field::factory('attachment', 'crb_sponsor_blue_logo', __('Blue Logo', 'crb'))
			->set_width(50)
			->set_required(true),
		Carbon_Field::factory('text', 'crb_sponsor_link', __('Link URL', 'crb'))
			->set_width(50),
		Carbon_Field::factory('select', 'crb_sponsor_sponsorship_type', __('Sponsorship Type', 'crb'))
			->set_width(50)
			->set_options('crb_get_sponsorship_types')
			->set_required(true),
	));
