<!-- adds header -->
<?php get_header(); ?>

<!-- adds post loop -->
    <?php
    if( have_posts() ):

        while( have_posts() ): the_post(); ?>
<!-- adds content.php or content-'postformatname'.php into this loop -->
            <?php get_template_part('content', get_post_format()); ?>

        <?php endwhile;

    endif;

    ?>
<!-- adds footer -->
<?php get_footer(); ?>