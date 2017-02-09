<!-- adds header -->
<?php get_header(); ?>

<!-- adds post loop -->
    <?php
    if( have_posts() ):

        while( have_posts() ): the_post(); ?>
<!-- adds post title -->
            <h3><?php the_title(); ?></h3>
<!-- adds date, time and category -->
            <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g: i a'); ?>, in<?php the_category(); ?></small>
<!-- adds post content -->
            <p><?php the_content(); ?></p>

            <hr>

        <?php endwhile;

    endif;

    ?>
<!-- adds footer -->
<?php get_footer(); ?>