<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Simple Theme</title>
        <?php wp_head(); ?>
    </head>

    <body>

        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>