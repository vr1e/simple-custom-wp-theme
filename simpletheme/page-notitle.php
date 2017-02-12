<!-- adds header -->
<?php
/*
Template Name: Page No Title
*/
get_header(); ?>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <!-- adds post loop -->
        <?php
        if( have_posts() ):

            while( have_posts() ): the_post(); ?>

                <h1>This is my static Title</h1>
                <!-- adds date, time and category -->
                <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g: i a'); ?>, in<?php the_category(); ?></small>
                <!-- adds post content -->
                <p><?php the_content(); ?></p>

                <hr>

            <?php endwhile;

        endif;

        ?>
    </div>
    <div class="col-xs-12 col-sm-4">
        <!-- adds a sidebar -->
        <?php dynamic_sidebar('notitle'); ?>
    </div>
</div>
<!-- adds footer -->
<?php get_footer(); ?>