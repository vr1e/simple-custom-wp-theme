<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">

        <?php
            /* Define which categories (ID) the post loop loops through  */
            $args_cat = array(
                'include' => '9, 10, 8'
            );

            $categories = get_categories($args_cat);
            /* sets the for loop to loop through categoies */
            foreach($categories as $category):

                /* adds query that displays only the last post in defined categories */
                $args = array(
                    'type' => 'post',
                    'posts_per_page' => 1,
                    'category__in' => $category->term_id,
                    'category__not_in' => array(1, 11), // removes categories from the loop
                );
                $lastBlog = new WP_Query($args);
                /* post loop that integrates the query to show only the last post */
                if( $lastBlog -> have_posts() ):
                    while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>

                        <div class="col-xs-12 col-sm-4">

                            <!-- adds content.php or content-'postformatname'.php into this loop -->
                            <?php get_template_part('content', 'featured'); ?>

                        </div>
                    <?php endwhile;
                endif;
                // resets query so future queries don't get affected
                wp_reset_postdata();

            endforeach;

        ?>

</div>
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