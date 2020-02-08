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
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header>
                                <?php the_title(sprintf('<h1 class="entry-header"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
                            </header>

                            <?php if(has_post_thumbnail()): ?>

                            <div class="pull-right thumbnail post-thumbnail">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                            <?php endif; ?>

                            <div class="post-date-categories">
                                <span class="post-categories">
                                    in
                                    <?php
                                        the_category(', ');
                                        echo ' || ';
                                        the_tags();
                                        echo ' || ';
                                        edit_post_link('Edit Post');
                                    ?>
                                </span>
                            </div>
                            <div class="post-content"><?php the_content(); ?></div>

                            <hr>

                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <?php previous_post_link(); ?>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <?php next_post_link(); ?>
                                </div>
                            </div>
                            <?php
                                if(comments_open()):
                                    comments_template();
                                else:
                                    echo '<h5 class="text-center">Sorry, Comments are closed.</h5>';
                                endif;
                            ?>
                        </article>
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
