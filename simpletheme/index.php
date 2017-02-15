<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="row text-center no-margin">

            <?php
            // define how many posts per page you want to display
            $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array('posts_per_page' => 3, 'paged' => $currentPage);
            query_posts($args);

            // adds post loop
            if( have_posts() ): $i = 0;
                while( have_posts() ): the_post(); ?>
                <!-- sets counters i that counts how many posts there is and column that sets apropriate bootstrap columns -->
                    <?php
                        if($i == 0): $column = 12;
                        elseif($i > 0 && $i <= 2): $column = 6; $class = ' second-row-padding';
                        elseif($i > 2): $column = 4; $class = ' third-row-padding';
                        endif;
                    ?>

                    <div class="col-xs-<?php echo $column; echo $class; ?>">

                        <?php if( has_post_thumbnail() ):
                            $urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
                        endif;
                        ?>

                        <div class="blog-element" style = "background-image: url(<?php echo $urlImg; ?>)">

                            <!-- adds post title linking permalink of the post -->
                            <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink()) ),'</a></h1>' ); ?>

                            <small><?php the_category(' '); ?></small>
                        </div>
                    </div>

                <?php $i++; endwhile; ?>
                <!-- add pagination for the blog posts -->
                <div class="col-xs-6 text-left">
                    <?php next_posts_link('« Older Posts'); ?>
                </div>
                <div class="col-xs-6 text-right">
                    <?php previous_posts_link('Newer Posts »'); ?>
                </div>

            <?php endif;
                wp_reset_query(); // resets posts per page query
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