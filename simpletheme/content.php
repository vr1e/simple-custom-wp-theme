<!-- adds post title -->
<h3><?php the_title(); ?></h3>
<!-- adds featured image -->
<div class="thumbnail-image"><?php the_post_thumbnail('medium'); ?></div>
<!-- adds date, time and category -->
<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g: i a'); ?>, in<?php the_category(); ?></small>
<!-- adds post content -->
<p><?php the_content(); ?></p>

<hr>