<!-- adds header -->
<?php get_header(); ?>
<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">
    <div class="col-xs-12 col-sm-8">

        <!-- adds post loop -->
        <?php
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>
                <!-- adds content.php or content-'postformatname'.php into this loop -->
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile;
        endif;
        ?>

    </div>
    <div class="col-xs-12 col-sm-4">
        <!-- adds a sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<!-- adds footer -->
<?php get_footer(); ?>