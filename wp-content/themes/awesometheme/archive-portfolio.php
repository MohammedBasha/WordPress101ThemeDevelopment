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
        <header class="page-header">
            <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
        ?>
        </header>
            <div class="posts-wrapper text-center clearfix">
                <?php
                    while(have_posts()):
                        the_post();
                    
                    get_template_part('content', 'archive');
                ?>
                        
                <?php
                    
                    endwhile;
                ?>

            </div>
            <div class="row">
                <div class="col-xs-6 text-center">
                    <?php the_posts_navigation(); ?>
                </div>
            </div>

        <?php
            endif;
        ?>
    </div>
</div>


<?php
    get_footer();
?>
