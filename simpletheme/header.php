<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple Theme</title>
<!-- header hook to add elements to <head> - styles, scripts and meta tags -->
        <?php wp_head(); ?>
    </head>

<!-- checks if current page is front page and adds classes to it -->
    <?php
        if ( is_front_page() ):
            $simpletheme_classes = array('simpletheme-class', 'my-class');
        else:
            $simpletheme_classes = array('no-simpletheme-class');
        endif;
    ?>
<!-- function gives the body element different classes defined inside $simpletheme_classes -->
    <body <?php body_class( $simpletheme_classes ); ?>>

        <div class="container">

            <div class="row">

                <div class="col-xs-12">

                    <nav class="navbar navbar-default navbar-fixed-top">
                      <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand" href="#">Simple Theme</a>
                        </div>

                        <!-- adds primary menu to header content -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <?php wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'walker' => new Walker_Nav_Primary()
                                    )
                                );
                            ?>
                        </div>

                      </div><!-- /.container-fluid -->
                    </nav>

                </div>

                <div class="col-xs-12">
                    <div class="search-form-container">
                        <div class="container">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <!-- adds custom header included in functions at this position -->
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />