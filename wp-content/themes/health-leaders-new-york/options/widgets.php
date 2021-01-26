<?php
/**
 * Register the new widget classes here so that they show up in the widget list. 
 */
function crb_register_widgets() {
	register_widget('ThemeWidgetRichText');
	register_widget('ThemeWidgetGravityForm');
	register_widget('CrbLatestTweetsWidget');
	register_widget('ThemeWidgetMenuWithDescription');
	register_widget('ThemeWidgetFeaturedEvent');
	register_widget('ThemeWidgetCTA');
	register_widget('ThemeWidgetLatestPosts');
	register_widget('ThemeWidgetYearArchives');
	register_widget('ThemeWidgetContacts');
	// register_widget('CrbLatestTweetsWidget');
	// register_widget('ThemeWidgetExample');
}
add_action('widgets_init', 'crb_register_widgets');

/**
 * Displays a block with a title and WYSIWYG rich text content
 */
class ThemeWidgetRichText extends Carbon_Widget {
	function __construct() {
		$this->setup(__('Rich Text', 'crb'), __('Displays a block with title and WYSIWYG content.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb')),
			Carbon_Field::factory('rich_text', 'content', __('Content', 'crb')),
		));
	}
	
	function front_end($args, $instance) {
		if ($instance['title']) {
			$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		echo apply_filters('the_content', $instance['content']);
	}
}

/**
 * Displays a block with latest tweets from particular user
 */
class CrbLatestTweetsWidget extends Carbon_Widget {
	protected $form_options = array(
		'width' => 300
	);

	function __construct() {
		$this->setup(__('Latest Tweets', 'crb'), __('Displays a block with your latest tweets', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb')),
			Carbon_Field::factory('text', 'username', __('Username', 'crb')),
			Carbon_Field::factory('text', 'count', __('Number of Tweets to show', 'crb'))->set_default_value('5'),
		), 'widget_twitter_feed');
	}

	function front_end($args, $instance) {
		if ( !carbon_twitter_is_configured() ) {
			return; //twitter settings are not configured
		}

		$tweets = TwitterHelper::get_tweets($instance['username'], $instance['count']);
		if (empty($tweets)) {
			return; //no tweets, or error while retrieving
		}


		?>

		<header>
			<?php if ($instance['title']) {

				$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
				echo $args['before_title'] . $title . $args['after_title'];

			} 

			$twitter_link = 'https://twitter.com/' . $instance['username']; ?>

			<a href="<?php echo $twitter_link; ?>" target="_blank">@<?php echo $instance['username']; ?></a>
			<p>
				<a href="<?php echo $twitter_link; ?>" target="_blank">
					<?php _e('View All', 'crb'); ?>
					<i class="ico-arrow-right-blue"></i>
				</a>
			</p>
		</header>

		<ul>
			<?php foreach ($tweets as $tweet) : ?>
				<li>
					<?php echo wpautop($tweet->tweet_text); ?>
					<small><?php echo date('g:i A - M d, Y', $tweet->timestamp); ?></small>
				</li>
			<?php endforeach; ?>			
		</ul>


		<?php
	}
}

/**
 *  Gravity Forms widget
 */
class ThemeWidgetGravityForm extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {
		$this->setup(__('Theme Widget - Gravity Form', 'crb'), __('Displays a Gravity form with title and description.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb')),
			Carbon_Field::factory('textarea', 'description', __('Description', 'crb')),
			Carbon_Field::factory('gravity_form', 'form', __('Choose form', 'crb')),
		), 'widget_subscribe');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) {

		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base); ?>

		<header>
			<?php 
			echo $args['before_title'] . $instance['title'] . $args['after_title']; 
			echo wpautop($instance['description']); 
			?>
		</header>

		<?php if ( !empty($instance['form']) && function_exists('gravity_form') ) {
			gravity_form($instance['form'], 0, 0, 0, 0, 1, 50);
		}

	}
}

/*
	Menu with a title and description
*/
class ThemeWidgetMenuWithDescription extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$menus = crb_get_all_nav_menus();

		$this->setup(__('Theme Widget - Menu with description', 'crb'), __('Displays a WordPress menu with a title and description.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb')),
			Carbon_Field::factory('textarea', 'description', __('Description', 'crb')),
			Carbon_Field::factory('select', 'menu', __('Choose Menu', 'crb'))
				->add_options($menus)
		), 'widget_nav_menu');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) {

		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base); ?>

		<header>
			<?php 
			echo $args['before_title'] . $instance['title'] . $args['after_title']; 
			echo wpautop($instance['description']); 
			?>
		</header>

		<?php wp_nav_menu(array(
			'menu' 		  => $instance['menu'],
			'fallback_cb' => '',
			'container'	  => false
		)); 

	}
}

/*
	Displays information about a featured event ( CPT )
*/
class ThemeWidgetFeaturedEvent extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$this->setup(__('Theme Widget - Featured Event', 'crb'), __('Displays a featured event.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb'))
				->set_default_value('Featured Event'),
		), 'widget_featured_event widget_featured_event_secondary');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) {
		
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);  

		$featured_events = get_posts(array(
			'posts_per_page' => 1,
			'post_type'		 => 'crb_event',
			'meta_query'	 => array(
				'relation'   => 'AND',
				array(
					'key' 	  => '_crb_featured_event',
					'value'   => 'yes',
					'compare' => '='
				),
			)
		));


		if ( !empty($featured_events) ) {
			$event = $featured_events[0];
		}

		$event_link = get_permalink($event->ID);

		$event_date = carbon_get_post_meta($event->ID, 'crb_event_date');

		if ( has_post_thumbnail($event->ID) ) {
			echo get_the_post_thumbnail($event->ID, 'large', array('class' => 'fullscreen-image'));
		}

		if ( !empty($title) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		
		<a href="<?php echo $event_link; ?>">
			<span>
				<small><?php echo date('F d, Y', strtotime($event_date)); ?></small>
				<?php echo $event->post_title; ?>
			</span>
		</a>

		<a href="<?php echo get_permalink(get_option('crb_upcoming_events_page')); ?>" class="link-view-all">
			<?php _e('Go to all events', 'crb'); ?>
			<i class="ico-arrow-right-l"></i>
		</a>

		<?php
	}
}



/*
	Displays Latest Posts
*/
class ThemeWidgetLatestPosts extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$this->setup(__('Theme Widget - Latest Posts', 'crb'), __('Displays latest posts', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb'))
				->set_default_value('Latest news'),
			Carbon_Field::factory('text', 'number_of_posts', __('Number of Posts', 'crb'))
				->set_required(true)
				->set_default_value('3')
		), 'widget_events');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) {
		
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);  
		if ( !empty($title) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} 

		$latest_posts = get_posts(array(
			'posts_per_page' => $instance['number_of_posts'],
		)); 

		if ( !empty($latest_posts) ) : ?>
		
			<ul>
				<?php foreach ( $latest_posts as $p ) : ?>

					<li>
						<?php if ( has_post_thumbnail($p->ID) ) {
							echo get_the_post_thumbnail($p->ID, 'large', array('class' => 'fullscreen-image'));
						} ?>

						<a href="<?php echo get_permalink($p->ID); ?>">
							<span>
								<small><?php echo date('F d, Y', strtotime($p->post_date)); ?></small>
								<?php echo $p->post_title; ?>
							</span>
						</a>
					</li>
					
				<?php endforeach; ?>				
			</ul>

		<?php endif;
	}
}



/*
	Displays image with text and link
*/
class ThemeWidgetCTA extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$this->setup(__('Theme Widget - CTA ', 'crb'), __('Displays an image with link and text.', 'crb'), array(
			Carbon_Field::factory('attachment', 'image', __('Image', 'crb'))
				->set_required(true),
			Carbon_Field::factory('text', 'link', __('Link', 'crb'))
				->set_default_value('#')
				->set_required(true),
			Carbon_Field::factory('text', 'text', __('Text', 'crb'))
				->set_default_value('')
		), 'widget_callout');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) { ?>

		<a href="<?php echo $instance['link']; ?>">
			<?php 
			echo wp_get_attachment_image($instance['image'], 'medium', 0, array('class' => 'fullscreen-image')); 
			if ( !empty($instance['text']) ) {
				echo $instance['text'];
			} ?>
		</a>

		<?php
	}
}

/*
	Displays yearly archives of a custom post type
*/
class ThemeWidgetYearArchives extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$this->setup(__('Theme Widget - Year Archives ', 'crb'), __('Displays yearly archives of a chosen Custom Post Type.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb'))
				->set_default_value('Archive'),
			Carbon_Field::factory('select', 'post_type', __('Choose Post Type', 'crb'))
				->add_options(array(
					'post' 			 => 'Post',
					'crb_event' 	 => 'Event',
					'crb_newsletter' => 'Newsletter'
				)),

		), 'widget_categories');
	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) { 

		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);  
		if ( !empty($title) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} 

 		$archives = crb_get_post_type_years_archives($instance['post_type']);

 		if ( !empty($archives) ) : ?>

			<ul>
				<?php foreach ( $archives as $archive_year ) : 

					if ( $instance['post_type'] === 'crb_newsletter') {
						$archive_link = add_query_arg('newsletter_year', $archive_year->year, get_permalink(get_option('crb_newsletters_page')));
					} else {
						$archive_link = get_year_link($archive_year->year);
					} ?>

					<li>
						<a href="<?php echo $archive_link; ?>"><?php echo $archive_year->year; ?></a>
						<span><?php echo $archive_year->number_of_posts; ?></span>
					</li>

				<?php endforeach; ?>
			</ul>

		<?php endif;

	}
}


/*
	Displays contact information
*/
class ThemeWidgetContacts extends Carbon_Widget {
	/**
	 * Register widget function.
	 */
	function __construct() {

		$this->setup(__('Theme Widget - Contact Info', 'crb'), __('Displays contact information.', 'crb'), array(
			Carbon_Field::factory('text', 'title', __('Title', 'crb'))
				->set_default_value('Healthcare Leaders of New York'),
			Carbon_Field::factory('textarea', 'address', __('Address', 'crb'))
				->set_default_value('28-24 Steinway St, # 206 Astoria, NY 11103'),
			Carbon_Field::factory('text', 'phone_number', __('Phone Number', 'crb')),
			Carbon_Field::factory('text', 'fax_number', __('Fax Number', 'crb')),
			Carbon_Field::factory('text', 'email', __('Email', 'crb')),
			Carbon_Field::factory('text', 'website', __('Website', 'crb'))

		), 'widget_contacts');

	}
	
	/**
	 * Called when rendering the widget in the front-end
	 */
	function front_end($args, $instance) { ?>

		<ul>
			<li>
				<?php if ( !empty($instance['title']) ) : ?>

					<p>
						<strong><?php echo $instance['title']; ?></strong>
					</p>

				<?php endif; 

				echo wpautop($instance['address']); 

				?>
			</li>
			
			<li>
				<p>
					<strong><?php _e('ACHE General Information', 'crb'); ?></strong>
				</p>
				
				<?php echo wpautop($instance['phone_number']); ?>
				<?php echo wpautop($instance['fax_number']); ?>
			</li>
			
			<li>
				<p>
					<strong></strong>
				</p>
				<?php if ( !empty($instance['email']) ) : ?>
				
					<p>E-mail: <a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?> </a></p>

				<?php endif; 

				if ( !empty($instance['website']) ) : ?>
				
					<p>Website: <a href="<?php echo crb_add_http($instance['website']); ?>"><?php echo $instance['website']; ?></a></p>

				<?php endif; ?>
			</li>
		</ul>

		<?php
	}
}
