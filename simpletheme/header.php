<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple Theme</title>
        <?php wp_head(); ?>
    </head>

    <?php

        if ( is_front_page() ):
            $simpletheme_classes = array('simpletheme-class', 'my-class');
        else:
            $simpletheme_classes = array('no-simpletheme-class');
        endif;
    ?>

    <body <?php body_class( $simpletheme_classes ); ?>>

        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>