<?php
    get_header();
?>

<div class="row margin-top-50">
    <div class="col-xs-12 col-sm-4 pull-right">
        <?php get_sidebar(); ?>
    </div>
    <div class="col-xs-12 col-sm-8">

        <?php
            if(have_posts()):
        ?>
            <div class="posts-wrapper">
                <?php
                    while(have_posts()):
                        the_post();
                ?>
                    <div class="post">
                        <div class="post-content"><?php the_content(); ?></div>
                        <?php the_title('<div class="post-title"><h3>', '</h3></div>'); ?>
                    </div>
                    <hr>
                <?php
                    endwhile;
                ?>
            </div>
        <?php
            endif;
        ?>
    </div>
</div>

<?php
    get_footer();
?>
