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
