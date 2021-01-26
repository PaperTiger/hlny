<?php if (have_posts()) : ?>
	<ol class="events">
		<?php while ( have_posts() ) : the_post(); ?>

			<li <?php post_class('event'); ?>>

				<div class="event-aside">
					<?php if ( has_post_thumbnail() ) : 

						$thumb_id = get_post_thumbnail_id();
						$thumb_src = wp_get_attachment_url($thumb_id); ?>

						<a href="<?php the_permalink(); ?>">
							<?php crb_image($thumb_src, 263, 0, true); ?>
						</a>

					<?php endif; 

					$category = get_the_category();
					if ( !empty($category) && $category[0]->term_id !== 1 && has_post_thumbnail() ) : ?>

					<?php endif; ?>
				</div><!-- /.event-aside -->
				
				<div class="event-content">
					<p class="event-date"><?php echo get_the_date('F d, Y'); ?></p><!-- /.event-date -->
					
					<h6 class="event-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h6><!-- /.event-title -->
					
					<?php echo wpautop(crb_shortalize($post->post_content, 20, '...')); ?>
				</div><!-- /.event-content -->
			</li><!-- /.event -->
		<?php endwhile; ?>
	 </ol><!-- /.articles -->
	
<?php else : ?>
	<ol class="events">
		<li class="article post error404 not-found">
			<div class="article-body">
				<div class="article-entry">
					<p>
						<?php if ( is_category() ) { // If this is a category archive
							printf( __("Sorry, but there aren't any posts in the %s category yet.", 'crb'), single_cat_title('',false) );
						} else if ( is_date() ) { // If this is a date archive
							_e("Sorry, but there aren't any posts with this date.", 'crb');
						} else if ( is_author() ) { // If this is a category archive
							$userdata = get_user_by('id', get_queried_object_id());
							printf( __("Sorry, but there aren't any posts by %s yet.", 'crb'), $userdata->display_name );
						} else if ( is_search() ) { // If this is a search
							_e('No posts found. Try a different search?', 'crb');
						} else {
							_e('No posts found.', 'crb');
						} ?>
					</p>
					
				</div><!-- /.article-entry -->
			</div><!-- /.article-body -->
		</li><!-- /.article -->
	</ol><!-- /.articles -->
<?php endif; ?>
