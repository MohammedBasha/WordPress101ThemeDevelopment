<?php
    /*Template Name: Page No Title*/
    get_header();
?>
<div class="margin-top-50">
<?php
if(have_posts()):
    ?>
    <div class="posts-wrapper">
        <?php
        while(have_posts()):
            the_post();
            ?>
            <h1>This is my static title</h1>
            <div class="post">
                <div class="post-date-categories">
                    <span class="post-date">Posted on: <?php the_time('l, F j, Y'); ?> at <?php the_time('g:i a'); ?></span>,
                    <span class="post-categories">in <?php the_category(', '); ?></span>
                </div>
                <div class="post-content"><?php the_content(); ?></div>
            </div><hr>
            <?php
        endwhile;
        ?>
    </div>
    <?php
endif;
?>
</div>
<?php
    get_footer();
?>
