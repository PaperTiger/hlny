<?php 
get_header(); 
get_template_part('fragments/top-section'); 

global $wp_query;
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content content-size2">
				<div class="section section-events-listing">
					<header class="section-head">
						<?php crb_the_title('<h2 class="section-title">', '</h2>'); 

						if ( have_posts() ) : ?>

							<span class="pages-counter">Page <?php echo $paged . ' of ' . $wp_query->max_num_pages; ?></span><!-- /.pages-counter -->

						<?php endif; ?>
					</header><!-- /.section-head -->
					
					<?php get_template_part('loop'); ?>
												
				</div><!-- /.section section-events -->

				<?php carbon_pagination('posts', array(
					'wrapper_before' => '<div class="paging">',
					'wrapper_after' => '</div>',
					'enable_first' => true,
					'enable_last' => true,
					'enable_numbers' => true,
					'number_limit' => 5,
					'prev_html' => '<a href="{URL}" class="paging-prev"><</a>',
					'next_html' => '<a href="{URL}" class="paging-next">></a>',
					'first_html' => '<a href="{URL}" class="paging-first"><<</a>',
					'last_html' => '<a href="{URL}" class="paging-last">>></a>',
				));  ?>			   
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>