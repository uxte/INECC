<?php

// WP_Query arguments
$args = array(
    'category_name'          => 'event',
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
    if ( $posts->current_post >= 1 && is_front_page() ) {
        $class_hide = 'hide';
    }

?>

<article class="event slide <?php echo $class_hide;?>">
    <h1><?php the_title(); ?></h1>
    <div class="row">
        <div class="col">
            <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php print get_the_date('M \<\s\p\a\n\>d\<\/\s\p\a\n\>');  ?></time>
            <div class="img"><?php print get_the_post_thumbnail( $post, 'medium' ); ?></div>
            <!-- <figure><img src="/img/thumb.svg" alt="Thumb" /></figure> -->
        </div>
        <div class="col">
            <address><?php print $post->event_place; ?></address>
            <?php the_excerpt(); ?>
        </div>
    </div>
    <footer class="row">
        <div class="col">
            <a class="button icon calendar" href="<?php echo make_cal_link($post); ?>" target="_blank">Add to my <span>calendar</span></a>
        </div>
        <div class="col">
            <a class="button icon facebook" rel="noreferrer nofollow" href="<?php print $post->event_fb; ?>">Find out <span>more on</span></a>
        </div>
    </footer>

    
</article>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php if ( is_front_page() ) : ?>
<nav class="prev-next">
    <a href="#" rel="prev">Previous</a>
    <a href="#" rel="next">Next</a>
</nav>
<?php endif; ?>
