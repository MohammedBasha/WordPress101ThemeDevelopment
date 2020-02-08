<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="post-format"><h5>This is '<?php echo get_post_format(); ?>' Post Format</h5></div>

        <?php the_title(sprintf('<h1 class="entry-header"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>


        <div class="post-date-categories">
            <span class="post-date">Posted on: <?php the_time('l, F j, Y'); ?> at <?php the_time('g:i a'); ?></span>,
            <span class="post-categories">in <?php the_category(', '); ?></span>
        </div>
    </header>

    <div class="row">
        <?php if(has_post_thumbnail()): ?>

            <div class="col-xs-12 col-sm-4">
                <div class="thumbnail post-thumbnail">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="post-content"><?php the_excerpt(); ?></div>
            </div>
        <?php else: ?>
            <div class="col-xs-12">
                <div class="post-content"><?php the_excerpt(); ?></div>
            </div>
        <?php endif; ?>
    </div>


</article>