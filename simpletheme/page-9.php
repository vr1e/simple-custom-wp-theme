<!-- adds header -->
<?php get_header(); ?>

<!-- adds post loop -->
    <?php
    if( have_posts() ):

        while( have_posts() ): the_post(); ?>

<!-- adds post content -->
            <p><?php the_content(); ?>dasdasd</p>
<!-- adds post title -->
            <h3><?php the_title(); ?></h3>

            <hr>

        <?php endwhile;

    endif;

    ?>
<!-- adds footer -->
<?php get_footer(); ?>