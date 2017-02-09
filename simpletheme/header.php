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
<!-- adds primary menu to header content -->
        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>