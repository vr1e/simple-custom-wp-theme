<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">

    <div class="col-xs-12">

        <?php
            // adds query that displays only the last post
            $args = array(
                'type' => 'post',
                'posts_per_page' => 1
            );
            $lastBlog = new WP_Query('type=post&posts_per_page=1');
            // post loop that integrates the query to show only the last post
            if( $lastBlog -> have_posts() ):
                while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>
                    <!-- adds content.php or content-'postformatname'.php into this loop -->
                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile;
            endif;
            // resets query so future queries don't get affected
            wp_reset_postdata();
        ?>

    </div>

    <div class="col-xs-12 col-sm-8">

        <!-- adds post loop -->
        <?php
        if( have_posts() ):
            while( have_posts() ): the_post(); ?>
                <!-- adds content.php or content-'postformatname'.php into this loop -->
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile;
        endif;

        // PRINT OTHER 2 POSTS EXCEPT THE FIRST ONE

        // adds query that displays the two posts before the last one
        $args = array(
            'type' => 'post',
            'posts_per_page' => 2,
            'offset' => 1
        );
        $lastBlog = new WP_Query($args);
        // post loop that integrates the query to show only the last post
        if( $lastBlog -> have_posts() ):
            while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>
                <!-- adds content.php or content-'postformatname'.php into this loop -->
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile;
        endif;
        // resets query so future queries don't get affected
        wp_reset_postdata();

        ?>

        <hr>

        <?php
            $args = array(
                'type' => 'post',
                'posts_per_page' => -1,
                'category_name' => 'tutorials'
            );
            // adds query that displays posts only in "tutorials" category
            $lastBlog = new WP_Query($args);
            // post loop that integrates the query to show only the last post
            if( $lastBlog -> have_posts() ):
                while( $lastBlog -> have_posts() ): $lastBlog -> the_post(); ?>
                    <!-- adds content.php or content-'postformatname'.php into this loop -->
                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile;
            endif;
            // resets query so future queries don't get affected
            wp_reset_postdata();

        ?>

    </div>
    <div class="col-xs-12 col-sm-4">
        <!-- adds a sidebar -->
        <?php get_sidebar(); ?>
    </div>
</div>
<!-- adds footer -->
<?php get_footer(); ?>