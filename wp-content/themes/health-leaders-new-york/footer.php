		<footer class="footer">
			<div class="footer-callout">
				<div class="shell">
					<a href="<?php echo home_url('/'); ?>" class="footer-logo">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-full.png" alt="<?php bloginfo('name'); ?>" width="312px" height="80px">
					</a>
					<a href="<?php echo get_permalink(get_option('crb_contact_page')); ?>" class="btn btn-blue"><?php _e('Contact Us', 'crb'); ?></a>
				</div><!-- /.shell -->
			</div><!-- /.footer-callout -->
			
			<div class="footer-content">
				<div class="shell">
					<div class="footer-widgets">
						<?php dynamic_sidebar('footer-widgets'); ?>
					</div><!-- /.footer-widgets -->

					<div class="footer-bar">
						<?php $footer_text = get_option('crb_footer_text'); 
						if ( !empty($footer_text) ) : ?>

							<div class="copyright">
								<?php echo wpautop(do_shortcode($footer_text)); ?>
							</div><!-- /.copyright -->

						<?php endif; ?>

						<div class="socials">
							<ul>
								<?php crb_display_social_links(true); ?>
							</ul>
						</div><!-- /.socials -->
					</div><!-- /.footer-bar -->
				</div><!-- /.shell -->
			</div><!-- /.footer-content -->
		</footer><!-- /.footer -->
	</div><!-- /.wrapper -->

<?php wp_footer(); ?>
</body>
</html>