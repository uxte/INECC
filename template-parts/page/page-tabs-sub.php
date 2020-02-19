<?php
/**
 * Template part for displaying subpages in tabs under the content
 */
?>

<?php
$parent_id = $post -> post_parent;
$current_post = $post->ID;
$offset = 0;

if ( $parent_id == 0 ) { //If it's the parent page
    $parent_id = get_queried_object_id();
    // Don't show first child
    $offset = 1;
}
if ( $post -> menu_order >= 3 ) { //If page order is higher than 3 show the next 3 tabs
    $offset = 3;
}

// WP_Query arguments
$args = array(
    'post_parent'            => $parent_id,
    'post_type'              => 'page',
    'post_status'            => 'publish',
    'order'                  => 'ASC',
    'orderby'                => 'menu_order',
    'post__not_in'           => array( $current_post ),
    'posts_per_page'         => 2,
    'offset'                 => $offset
);

// The Query
$subpages = new WP_Query( $args );

// The Loop
if ( $subpages -> have_posts() ) :
?>

<nav class="tabs sub">
    <?php
    while ( $subpages -> have_posts() ) : $subpages -> the_post();
        $a_class = make_class_from_title( get_the_title() );
    ?>
    <a class="<?php echo $a_class; ?>" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
        <span><?php the_title(); ?></span>
    </a>
    <?php endwhile; ?>
</nav>

<?php endif; wp_reset_postdata(); ?>
