<?php
    get_header();
?>

<div class="row margin-top-50">
    <div class="col-xs-12">
        <div class="row">

            <div class="col-xs-12">
                <div id="awesome-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <?php
                        // Print The most recent post

                        $args_cat = array(
                            'include' => '8, 9, 10'
                        );

                        $categories = get_categories($args_cat);
                        $count = 0;
                        $bullets = '';
                        foreach($categories as $category):
                            $args = array(
                                'type' => 'post',
                                'posts_per_page' => 1,
                                'category__in' => $category->term_id,
                                'category__not_in' => array(11),
                            );
                            $lastBlog = new WP_Query($args);
                            if($lastBlog->have_posts()):
                                ?>

                                <!--                            <div class="posts-wrapper">-->
                                <?php
                                while($lastBlog->have_posts()):
                                    $lastBlog->the_post();
                                    ?>
                                    <!--                                    <div class="col-xs-12- col-sm-4">-->
                                    <?php
//                                        get_template_part('content', 'featured');
                                    ?>
                                    <div class="item <?php echo ($count == 0)? ' active ' : ''; ?>">
                                        <div class="post-thumbnail">
                                            <?php the_post_thumbnail('full'); ?>
                                        </div>
                                        <div class="carousel-caption">
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
                                                    <span class="post-categories">
                                                        in <?php the_category(', '); ?>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    </div>-->
                                    <?php
                                    $bullets .= '<li data-target="#awesome-carousel" data-slide-to="'.$count.'" class="'; ?>
                                    <?php ($count == 0)? $bullets .= ' active ' : $bullets .= ' '; ?>
                                    <?php $bullets .= '"></li>'; ?>
                                    <?php
                                endwhile;
                                ?>
                                <!--                            </div>-->

                                <?php
                            endif;
                            wp_reset_postdata();
                            $count++;
                        endforeach;
                        ?>
                    </div>

                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php echo $bullets; ?>
                    </ol>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#awesome-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#awesome-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

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
                        get_template_part('content', get_post_format());
                    endwhile;
                ?>

            </div>

        <?php
            endif;
        ?>

<!--        --><?php
//            // PRINT THE NEXT 2 POSTS EXCEPT THE FIRST ONE
//        $args = array(
//            'type'              => 'post',
//            'posts_per_page'    => 2,
//            'offset'            => 1
//        );
//            $lastBlog = new WP_Query($args);
//            if($lastBlog->have_posts()):
//        ?>
<!---->
<!--            <div class="posts-wrapper">-->
<!---->
<!--                --><?php
//                while($lastBlog->have_posts()):
//                    $lastBlog->the_post();
//                    get_template_part('content', get_post_format());
//                endwhile;
//                ?>
<!---->
<!--            </div>-->
<!---->
<!--        --><?php
//            endif;
//            wp_reset_postdata();
//        ?>
<!---->
<!--        <hr>-->

<!--        --><?php
//            // PRINT TUTORIAL CATEGORY POSTS
//            $lastBlog = new WP_Query('type=post&posts_per_page=-1&cat=8');
//            if($lastBlog->have_posts()):
//        ?>
<!---->
<!--            <div class="posts-wrapper">-->
<!---->
<!--                --><?php
//                while($lastBlog->have_posts()):
//                    $lastBlog->the_post();
//                    get_template_part('content', get_post_format());
//                endwhile;
//                ?>
<!---->
<!--            </div>-->
<!---->
<!--        --><?php
//            endif;
//            wp_reset_postdata();
//        ?>
    </div>
</div>


<?php
    get_footer();
?>
