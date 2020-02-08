<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<!--    --><?php //if(has_post_thumbnail()): ?>
<!--        <div class="thumbnail post-thumbnail">-->
<!--            --><?php //the_post_thumbnail('thumbnail'); ?>
<!--        </div>-->
<!--    --><?php //endif; ?>

    <footer class="entry-header">
        <?php
        the_title(
            sprintf(
                '<h1 class="entry-header"><a href="%s">',
                esc_url(get_permalink())
            ),
            '</a></h1>'
        );
        ?>
        <div class="post-date-categories">
            <span class="post-categories">in <?php the_category(', '); ?></span>
        </div>
    </footer>


</article>