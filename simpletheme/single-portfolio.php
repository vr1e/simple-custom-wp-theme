<!-- adds header -->
<?php get_header(); ?>
<div class="row">
    <div class="col-xs-12 col-sm-8">
        <!-- adds post loop -->
        <?php
        if( have_posts() ):

            while( have_posts() ): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_title('<h1 class="entry-title">','</h1>' ); ?>

                    <?php if( has_post_thumbnail() ): ?>

                        <div class="pull-right"><?php the_post_thumbnail('thumbnail'); ?></div>

                    <?php endif; ?>

                    <small>
                        <?php
                        // loop through custom taxonomies and echo each one
                            $terms_list = wp_get_post_terms($post -> ID, 'field');

                            $i = 0;
                            foreach($terms_list as $term) {
                                $i++;
                                if($i > 1) {
                                    echo ', ';
                                }
                                echo $term -> name;
                            }
                        ?> ||
                        <?php
                        // loop through custom taxonomies and echo each one
                            $terms_list = wp_get_post_terms($post -> ID, 'software');

                            $i = 0;
                            foreach($terms_list as $term) {
                                $i++;
                                if($i > 1) {
                                    echo ', ';
                                }
                                echo $term -> name;
                            }
                        ?> || <?php edit_post_link(); ?>

                    </small>

                    <?php the_content(); ?>

                    <hr>
                    <!-- add option to go to previous or next post -->
                        <div class="row">
                            <div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
                            <div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
                        </div>

                </article>

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