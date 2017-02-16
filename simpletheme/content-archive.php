<!-- give posts article tag with wordpress generated ID and classes -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <!-- adds post title linking permalink of the post -->
        <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink()) ),'</a></h1>' ); ?>

        <!-- adds date, time and category -->
        <small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g: i a'); ?>, in<?php the_category(); ?></small>
    </header>

        <div class="row">
            <!-- checks if post has featured image -->
            <?php if( has_post_thumbnail() ): ?>

            <div class="col-xs-12 col-sm-4">
                <!-- adds featured image -->
                <div class="thumbnail"><?php the_post_thumbnail('medium'); ?></div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <!-- adds post excerpt -->
                <?php the_excerpt(); ?>
            </div>

            <?php else: ?>
                <div class="col-xs-12 col-sm-12">
                    <!-- adds post excerpt -->
                    <?php the_excerpt(); ?>
                </div>

            <?php endif; ?>
        </div>

</article>