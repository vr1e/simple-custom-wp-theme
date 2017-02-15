<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="row">

            <!-- adds post loop -->
            <?php
            if( have_posts() ):
                while( have_posts() ): the_post(); ?>

                    <?php get_template_part('content', 'search'); ?>

                <?php endwhile;
            endif;
            ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <!-- adds a sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<!-- adds footer -->
<?php get_footer(); ?>