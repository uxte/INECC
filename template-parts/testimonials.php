<?php

// WP_Query arguments
$args = array(
    'category_name'          => 'testimonial',
    'post_type'              => 'post',
    'post_status'            => 'publish',
    'order'                  => 'ASC'
);

// The Query
$posts = new WP_Query( $args );

// The Loop
if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) :
    $posts -> the_post();

    $class_hide = '';
    if ( $posts->current_post >= 1 ) {
        $class_hide = 'hide';
    }
?>
<blockquote class="testimonial slide <?php echo $class_hide;?>">
    <div class="content">
        <?php the_content(); ?>
    </div>
    <footer>
        <cite class="author"><?php the_title(); ?></cite>
        <cite class="title"><?php print $post->testimonial_title; ?></cite>
        <figure>
            <img src="<?php print get_the_post_thumbnail( $post, 'medium' ); ?>" alt="<?php echo get_the_title(); ?>" />
        </figure>
    </footer>
</blockquote>
<?php endwhile; endif; wp_reset_postdata(); ?>

<nav class="prev-next">
    <a href="#" rel="prev">Prev</a>
    <a href="#" rel="next">Next</a>
</nav>
