<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php bloginfo('name'); wp_title('|'); ?></title>
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <?php

            // call the stylesheet files to be included in the head section
            wp_head();
        ?>
    </head>

    <?php
        if( is_home() ):
            $front_classes = array('my-class', 'custom-class');
        else:
            $front_classes = array('no-my-class', 'no-custom-class');
        endif;
    ?>
    <body <?php body_class( $front_classes ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo home_url(); ?>">Awesome Theme</a>
                            </div><!-- /.navbar-header -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'nav navbar-nav navbar-right',
                                        'container_class' => 'collapse navbar-collapse',
                                        'container_id' => 'main-navigation',
                                        'walker' => new Walker_Nav_Primary()
                                    )
                                ); ?>
                            <!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>

<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!--                    <div class="header-bg">-->
<!--                        <img src="--><?php //header_image(); ?><!--" height="--><?php //echo get_custom_header()->height; ?><!--" width="--><?php //echo get_custom_header()->width; ?><!--" alt="" />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <div class="row">
                <div class="col-xs-12">
                    <div class="search-form-container">
                        <div class="container">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>