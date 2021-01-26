<?php if (have_posts()) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_title(); ?>
	<hr>
	<?php endwhile; ?>
<?php endif; ?>
