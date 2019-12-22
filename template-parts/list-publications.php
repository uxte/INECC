<?php

// WP_Query arguments
$args = array(
    'category_name'          => 'publication',
    'post_type'              => 'post',
    'post_status'            => 'publish',
    'order'                  => 'DESC'
);

// The Query
$posts = new WP_Query( $args );

// The Loop
if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) : $posts -> the_post(); ?>

<article id="<?php echo $post->post_name?>">
    <h2><?php the_title(); ?></h2>
    <div class="row">
        <figure class="img col">
            <?php print get_the_post_thumbnail( $post, 'medium' ); ?>
        </figure>
        <div class="content col">
            <?php the_content();  ?>
            <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php print 'Published in ' . get_the_date('Y');  ?></time>
            <a class="button" href="<?php echo $post->pub_link; ?>">Download PDF</a>
        </div>
    </div>
</article>

<hr>

<?php endwhile; endif; wp_reset_postdata(); ?>
