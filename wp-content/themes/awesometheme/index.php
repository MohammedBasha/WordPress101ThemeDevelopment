<?php
    //require_once 'header.php';
    // get the header.php file
    get_header();
?>

<div class="row margin-top-50">

    <div class="col-xs-12 col-sm-4 pull-right">
        <?php get_sidebar(); ?>
    </div>
    <div class="col-xs-12 col-sm-8">
        <?php
            $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('posts_per_page' => 3, 'paged' => $currentPage);
            query_posts($args);
            if(have_posts()):
        ?>

            <div class="posts-wrapper text-center clearfix">

                <?php
                    $i = 0;
                    while(have_posts()):
                        the_post();
    //                    get_template_part('content', get_post_format());


                        if($i == 0): $column = 12; $class = ' first-row-padding ';
                        elseif($i > 0 && $i<=2): $column=6; $class = ' second-row-padding ';                        elseif($i > 2): $column = 4; $class = ' third-row-padding ';
                        endif;
                ?>
                        <div class="col-xs-<?php echo $column; echo $class; ?> ">
                            <?php if(has_post_thumbnail()):
                                $urlImg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                            endif;
                            ?>
                            <div class="blog-element" style="background-image: url(<?php echo $urlImg; ?>)">
                                <?php get_template_part('content', 'featured'); ?>
                            </div>
                        </div>
                <?php
                    $i++;
                    endwhile;
                ?>

            </div>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <?php next_posts_link('&#x000AB; Older Posts'); ?>
                </div>
                <div class="col-xs-6 text-right">
                    <?php previous_posts_link('Newer Posts &#x000BB;'); ?>
                </div>
            </div>

        <?php
            endif;
            wp_reset_query();
        ?>
    </div>
</div>


<?php
    //require_once 'footer.php';
    // get the footer.php file

    get_footer();
?>
