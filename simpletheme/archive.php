<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="row text-center no-margin">

            <?php
            // adds post loop
            if( have_posts() ): ?>

            <!-- adds a title and description for the archive page -->
            <header class="page-header">
                <?php

                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="taxonomy-description">', '</div>');

                ?>
            </header>

            <?php while( have_posts() ): the_post(); ?>

                    <?php get_template_part('content', 'archive'); ?>

                <?php endwhile; ?>

                <div class="col-xs-12 text-center">
                    <?php the_posts_navigation(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <!-- adds a sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<!-- adds footer -->
<?php get_footer(); ?>