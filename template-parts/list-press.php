<?php

// WP_Query arguments
$args = array(
    'category_name'          => 'press',
    'post_type'              => 'post',
    'post_status'            => 'publish',
    'order'                  => 'DESC'
);

// The Query
$posts = new WP_Query( $args );

// The Loop
if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) : $posts -> the_post(); ?>

<article id="<?php echo $post->post_name?>">
    <h2><a href="<?php echo $post->press_link; ?>" rel="nofollow"><?php the_title(); ?></a></h2>
    <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php print get_the_date('M d, Y');  ?></time>
</article>

<hr>

<?php endwhile; endif; wp_reset_postdata(); ?>
