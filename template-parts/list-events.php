<?php

$s = $_GET['s'];
$local = $_GET['localities'];
$cat = $_GET['cat'];

// WP_Query arguments
$args = array(
    'category_name'          => 'event',
    'post_type'              => 'post',
    'post_status'            => 'publish, future',
    'order'                  => 'DESC',
    'cat'                    => $cat,
);

if(!empty($local)) {
    $args = array(
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'event_place',
                'value' => ''.$local.''
            )
        )
            );
}
if(!empty($s)) {
    $args = array(
        's' => $s,
    );
}
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

<article class="event slide <?php echo $class_hide;?>" id="<?php echo $post->post_name?>">
    <h2><a href="<?php echo $post->event_fb; ?> ?>"><?php the_title(); ?></a></h2>
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
            <a class="button icon facebook" rel="noreferrer nofollow" href="<?php echo $post->event_fb; ?>">Find out <span>more on</span></a>
        </div>
    </footer>
</article>

<hr>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php if ( is_front_page() ) :
    if ( $posts->post_count <= 1 ) {
        $navClass = 'hide';
    }?>
<nav class="prev-next <?php echo $navClass ?>">
    <a href="#" rel="prev">Previous</a>
    <a href="#" rel="next">Next</a>
</nav>
<?php endif; ?>
