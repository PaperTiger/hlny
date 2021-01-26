<?php
/**
 * Template Name: Galleries
 */
?>
<?php 
	get_header();
	the_post();
	get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content">
				<article class="post">
					<div class="post-entry">

				<?php
			   		$args = array( 'post_type' => 'crb_gallery', 'posts_per_page' => -1 );
			        $loop = new WP_Query( $args );
			        ?>

				<ol class="events">
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<hr class="gallery-event">

			<li <?php post_class('event gallery-event'); ?>>

				<div class="event-aside">
					<?php if ( has_post_thumbnail() ) : 

						$thumb_id = get_post_thumbnail_id();
						$thumb_src = wp_get_attachment_url($thumb_id); ?>
						<a href="<?php the_permalink(); ?>">
							<?php crb_image($thumb_src, 263, 0, true); ?>
						</a>
					<?php endif; ?>
				</div><!-- /.event-aside -->
				
				<div class="event-content">
					<p class="event-date"><?php echo get_the_date('F d, Y'); ?></p><!-- /.event-date -->
					
					<h6 class="event-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h6><!-- /.event-title -->
					
				</div><!-- /.event-content -->

			</li><!-- /.event -->

				<?php endwhile;  ?>


				</ol>


					</div><!-- /.post-entry -->
				</article><!-- /.post -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>