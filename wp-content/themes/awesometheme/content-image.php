<div class="post">
    <div class="post-format"><h5>This is '<?php echo get_post_format(); ?>' Post Format</h5></div>
    <?php the_title('<div class="post-title"><h3>IMAGE POST: ', '</h3></div>'); ?>
    <div class="post-thumbnail"><?php the_post_thumbnail(); ?></div>
</div>
<hr>