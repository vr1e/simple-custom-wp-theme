<!-- adds header -->
<?php get_header(); ?>

<!-- splits content into columns 3/4 for the post loop, 1/4 for the sidebar -->
<div class="row">

    <div class="col-xs-12">

        <div id="simpletheme-carousel" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">

              <?php
                  /* Define which categories (ID) the post loop loops through  */
                  $args_cat = array(
                      'include' => '9, 10, 8'
                  );

                  $categories = get_categories($args_cat);
                  /* counts the number of loops */
                  $count = 0;
                  $indicators = '';
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

                              <div class="item <?php if($count == 0): echo 'active'; endif; ?>">
                                <?php the_post_thumbnail('full'); ?>
                                <div class="carousel-caption">
                                  <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink()) ),'</a></h1>' ); ?>
                                  <small><?php the_category(' '); ?></small>
                                </div>
                              </div>

                              <?php $indicators .= '<li data-target="#simpletheme-carousel" data-slide-to="'.$count.'" class="'; ?>
                                  <?php if($count == 0): $indicators .= 'active'; endif; ?>

                                  <?php $indicators .= '"></li>'; ?>

                              <?php  endwhile;
                          endif;
                          // resets query so future queries don't get affected
                          wp_reset_postdata();
                      $count++;
                  endforeach;

              ?>

              <!-- Indicators -->
              <ol class="carousel-indicators">
                  <?php echo $indicators; ?>
              </ol>

          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#simpletheme-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#simpletheme-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
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