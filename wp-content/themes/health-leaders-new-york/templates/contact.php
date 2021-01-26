<?php 
/*
	Template Name: Contact
*/
	get_header();
	the_post();
	get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size2">
				<div class="section section-contact">
					<?php the_content(); ?>
				</div><!-- /.section section-contact -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>