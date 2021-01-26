<?php 
/*
	Template Name: Sponsors
*/
get_header();
the_post();
get_template_part('fragments/top-section');
?>

<div class="container">
	<div class="shell">
		<div class="main">
			<div class="content">
				<article class="post">
					<?php get_template_part( 'fragments/page-title' ); ?>

					<div class="post-entry">
						<?php
						the_content();

						$sponsor_types = crb_get_sponsorship_types();
						$sponsor_type_indexes = array_flip( array_keys( $sponsor_types ) );
						foreach ( $sponsor_types as $type => $type_label ) {
							$sponsors = get_posts( array(
								'post_type' => 'crb_sponsor',
								'posts_per_page' => -1,
								'orderby' => 'menu_order',
								'order' => 'ASC',
								'fields' => 'ids',
								'meta_query' => array(
									array(
										'key' => '_crb_sponsor_sponsorship_type',
										'value' => $type,
									)
								)
							) );

							if ( ! $sponsors ) {
								continue;
							}

							echo '<h3 id="' . $type . '" class="sponsor-' . sanitize_title_with_dashes( $type ) . '">' . $type_label . '</h3>';

							foreach ( $sponsors as $key => $sponsor_id ) {
								$logo = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_color_logo' );
								$link = carbon_get_post_meta( $sponsor_id, 'crb_sponsor_link' );
								?>
								<p>
									<?php if ( $link ): ?>
										<a href="<?php echo $link; ?>" target="_blank">
									<?php endif ?>
									<?php echo wp_get_attachment_image($logo, 'medium'); ?>
									<?php if ( $link ): ?>
										</a>
									<?php endif ?>
								</p>

								<?php 
								echo apply_filters( 'the_content', get_post_field( 'post_content', $sponsor_id ) );
								echo '<hr />';
							}
						}
						?>
					</div><!-- /.post-entry -->
				</article><!-- /.post -->
			</div><!-- /.content -->
			
			<?php get_sidebar(); ?>
		</div><!-- /.main -->
	</div><!-- /.shell -->
</div><!-- /.container -->

<?php get_footer(); ?>
