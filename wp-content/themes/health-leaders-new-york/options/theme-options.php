<?php

$options[] = Carbon_Field::factory('separator', 'header');
$options[] = Carbon_Field::factory('text', 'crb_login_link', __('Top Link', 'crb'))
	->set_default_value('#');
$options[] = Carbon_Field::factory('text', 'crb_login_text', __('Top Link Text', 'crb'))
	->set_default_value('');
$options[] = Carbon_Field::factory('text', 'crb_become_member_link', __('Become a Member link', 'crb'))
	->set_default_value('#');
$options[] = Carbon_Field::factory('attachment', 'crb_default_top_image', __('Default Top Image', 'crb'))
	->help_text('This image will be displayed by default on the top of the page ( if the page does not have a Featured image uploaded ).');

$social_links = crb_get_contact_links();
$options[] = Carbon_Field::factory('separator', 'social_networks_links');
foreach ( $social_links as $value => $default ) {
	$options[] = Carbon_Field::factory('text', 'crb_' . $value. '_link', ucfirst($value . ' Link'))
		->set_default_value($default);
}

/* Pages Section  */
$options[] = Carbon_Field::factory('separator', 'crb_pages_section', __('Pages Section', 'crb'));
$options[] = Carbon_Field::factory('select', 'crb_newsletters_page', __('Newsletters Page', 'crb'))
	->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page')));
$options[] = Carbon_Field::factory('select', 'crb_contact_page', __('Contact Page', 'crb'))
	->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page')));
$options[] = Carbon_Field::factory('select', 'crb_upcoming_events_page', __('Upcoming Events Page', 'crb'))
	->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page')));
$options[] = Carbon_Field::factory('select', 'crb_past_events_page', __('Past Events Page', 'crb'))
	->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page')));
$options[] = Carbon_Field::factory('select', 'crb_sponsorship_page', __('Sponsorship Page', 'crb'))
	->add_options(call_user_func_array('crb_get_all_cpt_entries', array('page')));
$options[] = Carbon_Field::factory('gravity_form', 'crb_sponsorship_form', __('Sponsorship Form', 'crb'));

/* Sidebars Section */
$options[] = Carbon_Field::factory('separator', 'crb_sidebars_section', __('Sidebars Section', 'crb'));
$options[] = Carbon_Field::factory('sidebar', 'crb_single_post_sidebar', __('Single Post Sidebar', 'crb'));
$options[] = Carbon_Field::factory('sidebar', 'crb_single_event_sidebar', __('Single Event Sidebar', 'crb'));

$options[] = Carbon_Field::factory('separator', 'footer');
$options[] = Carbon_Field::factory('rich_text', 'crb_footer_text', __('Footer Text'))
	->set_default_value('');

$options[] = Carbon_Field::factory('separator', 'misc');
$options[] = Carbon_Field::factory('header_scripts', 'header_script');
$options[] = Carbon_Field::factory('footer_scripts', 'footer_script');

Carbon_Container::factory('theme_options', 'Theme Options')
  	->add_fields($options);

if ( carbon_twitter_widget_registered() ) {
	Carbon_Container::factory('theme_options', 'Twitter Settings')
		->set_page_parent(__('Theme Options', 'crb'))
		->add_fields(array(
			Carbon_Field::factory('html', 'crb_twitter_settings_html')
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
			Carbon_Field::factory('text', 'crb_twitter_consumer_key', __('Consumer Key', 'crb'))
				->set_default_value(''),
			Carbon_Field::factory('text', 'crb_twitter_consumer_secret', __('Consumer Secret', 'crb'))
				->set_default_value(''),
			Carbon_Field::factory('text', 'crb_twitter_oauth_access_token', __('Access Token', 'crb'))
				->set_default_value(''),
			Carbon_Field::factory('text', 'crb_twitter_oauth_access_token_secret', __('Access Token Secret', 'crb'))
				->set_default_value(''),
		));
}