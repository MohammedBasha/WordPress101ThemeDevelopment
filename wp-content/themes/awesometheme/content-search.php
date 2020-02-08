<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

	<?php the_title(sprintf('<h1 class="entry-header"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
	
	<?php if( has_post_thumbnail() ): ?>
		
		<div class="pull-left"><?php the_post_thumbnail('thumbnail'); ?></div>

	<?php endif; ?>
	
	<small>
		<?php
			the_category(', ');
			echo ' || ';
			the_tags();
			echo ' || ';
			edit_post_link('Edit Post');
		?>
	</small>
	
	<?php the_excerpt(); ?>
	
	<hr>

</article>