<!-- give posts article tag with wordpress generated ID and classes -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <!-- checks if post has featured image -->
    <?php if( has_post_thumbnail() ): ?>

        <!-- adds featured image -->
        <div class="thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>

    <?php endif; ?>

    <!-- adds post title linking permalink of the post -->
    <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink()) ),'</a></h1>' ); ?>

    <small><?php the_category(); ?></small>

</article>