<?php get_header(); ?>

    <div id="primary" class="container">
        <main id="main" class="site-main" role="main">

            <section class="error-404 not-found">

                <header class="page-header">
                    <h1 class="page-title">Sorry, page not found!</h1>
                </header>

                <div class="page-content">

                    <h2>It looks like nothing was found at the location. Maybe try one of the links below or a search?</h2>
                    <!-- add search form -->
                    <?php get_search_form(); ?>
                    <!-- add links to recent posts -->
                    <?php the_widget('WP_Widget_Recent_Posts'); ?>
                    <!-- add links to categories with most posts -->
                    <div class="widget widget_categories">
                        <h3>Check the most used categories</h3>
                        <ul>
                            <?php
                                wp_list_categories(array(
                                    'orderby' => 'count',
                                    'order' => 'DESC',
                                    'show_count' => 1,
                                    'title_li' => '',
                                    'number' => 5,
                                ));
                            ?>
                        </ul>
                    </div>
                    <!-- add links to the archive page -->
                    <?php the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>"); ?>
                </div>

            </section>

        </main>
    </div>

<?php get_footer(); ?>