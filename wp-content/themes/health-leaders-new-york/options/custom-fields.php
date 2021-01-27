<?php
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
				Field::make('attachment', 'testimonial_image', __('Testimonial Background Image', 'crb'))
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
		 				Field::make('attachment', 'picture', __('Picture', 'crb'))
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
				Field::make('attachment', 'image', __('Upload Image', 'crb'))
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
				Field::make('attachment', 'image', __('Upload Image'))
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
				Field::make('attachment', 'image', __('Upload Image', 'crb'))
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

			->add_fields('Right Image Section', array(
				Field::make('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Field::make('text', 'left_title', __('Left Text Title', 'crb')),
				Field::make('rich_text', 'left_text', __('Left Text', 'crb')),
				Field::make('attachment', 'right_image', __('Right Image', 'crb')),			
			))

			->add_fields('Full Width Text', array(
				Field::make('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Field::make('rich_text', 'full_width_text', __('Text', 'crb'))
			))

			->add_fields('Left Image Section', array(
				Field::make('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Field::make('attachment', 'left_image', __('Left Image', 'crb')),
				Field::make('text', 'right_title', __('Right Title', 'crb')),
				Field::make('text', 'right_subtitle', __('Right Subtitle', 'crb')),
				Field::make('rich_text', 'right_text', __('Right Text', 'crb')),
				
			))

			->add_fields('Gallery with description', array(
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
						Field::make('attachment', 'image', __('Upload Image', 'crb'))
							->set_required(true)
					))
			))

			->add_fields('Gallery images', array(
				Field::make('text', 'tab_title', __('Tab Title', 'crb'))
					->help_text('Used for the title of the Tab if "Enable Tabs?" is checked.'),
				Field::make('complex', 'gallery_images', __('Gallery Images', 'crb'))
					->setup_labels(array(
						'singular_name' => 'Image',
						'plural_name'   => 'Images'
					))
					->add_fields(array(
						Field::make('attachment', 'image', __('Upload Image', 'crb'))
							->set_required(true)
					))
			))
	));

/* Sponsor Settings */
Container::make('post_meta', __('Sponsor Settings', 'crb'))
	->show_on_post_type('crb_sponsor')
	->add_fields(array(
		Field::make('attachment', 'crb_sponsor_color_logo', __('Color Logo', 'crb'))
			->set_width(50)
			->set_required(true),
		Field::make('attachment', 'crb_sponsor_blue_logo', __('Blue Logo', 'crb'))
			->set_width(50)
			->set_required(true),
		Field::make('text', 'crb_sponsor_link', __('Link URL', 'crb'))
			->set_width(50),
		Field::make('select', 'crb_sponsor_sponsorship_type', __('Sponsorship Type', 'crb'))
			->set_width(50)
			->set_options('crb_get_sponsorship_types')
			->set_required(true),
	));
