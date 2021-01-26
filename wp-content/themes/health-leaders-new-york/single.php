<?php 
get_header();
the_post();
get_template_part('fragments/top-section'); 
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size2">
				<article class="post event-single">
					<header class="post-head">
						<p class="post-meta">
							<span class="post-date">Posted <?php the_date('F d, Y'); ?></span> / <?php the_category(', '); ?>
						</p>
						
						<div class="post-actions">
							<p><?php _e('Share:', 'crb'); ?></p>
							
							<?php get_template_part('fragments/share-icons'); ?>
						</div><!-- /.post-actions -->
					</header><!-- /.post-meta -->

					<div class="post-entry">
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} 

						the_content(); 

						?>
					</div><!-- /.post-entry -->

					<div class="post-actions">
						<p><?php _e('Share:', 'crb'); ?></p>
						
						<?php get_template_part('fragments/share-icons'); ?>
					</div><!-- /.post-actions -->
				</article><!-- /.post -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>