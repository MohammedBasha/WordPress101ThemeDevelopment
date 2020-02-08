<div class="post">
    <div class="post-format"><h5>This is '<?php echo get_post_format(); ?>' Post Format</h5></div>
    <?php the_title('<div class="post-title"><h3>ASIDE POST: ', '</h3></div>'); ?>
    <div class="post-date-categories">
        <span class="post-date">Posted on: <?php the_time('l, F j, Y'); ?> at <?php the_time('g:i a'); ?></span>,
        <span class="post-categories">in <?php the_category(', '); ?></span>
    </div>
</div>
<hr>