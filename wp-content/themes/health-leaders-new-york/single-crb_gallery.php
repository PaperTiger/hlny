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
					<!--
					<header>
						<h2 class="post-title"><?php the_title(); ?></h2>
					</header>
					-->

					<div class="post-entry">
						<?php the_content(); ?>
					</div><!-- /.post-entry -->
				</article><!-- /.post -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>