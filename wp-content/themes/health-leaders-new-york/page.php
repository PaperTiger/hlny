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
					<?php
					$subtitle 	 = carbon_get_the_post_meta('crb_page_subtitle');
					$description = carbon_get_the_post_meta('crb_page_top_description'); 
					if ( !empty($subtitle) || !empty($description) ) : ?>

						<header>
							<?php if ( !empty($subtitle) ) : ?>

								<h2 class="post-title"><?php echo $subtitle; ?></h2><!-- /.post-title -->

							<?php endif; 

							if ( !empty($description) ) : ?>

								<h6 class="post-subtitle"><?php echo $description; ?></h6><!-- /.post-subtitle -->

							<?php endif; ?>
						</header>

					<?php endif; ?>

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