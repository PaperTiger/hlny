<?php 
	get_header();
	get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content">
				<article class="post">					

					<div class="post-entry">
						<?php printf(__('<p>Please check the URL for proper spelling and capitalization.<br />If you\'re having trouble locating a destination, try visiting the <a href="%1$s">home page</a>.</p>', 'crb'), home_url('/')); ?>
					</div><!-- /.post-entry -->
				</article><!-- /.post -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>
