<?php
/**
 * Template part for displaying subpages in tabs
 */
?>

<?php
$parent_id = $post -> post_parent;
$offset = 0;

if ( $parent_id == 0 ) { //If it's the parent page
    $parent_id = get_queried_object_id();
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
    'offset'                 => $offset,
    'posts_per_page'         => 3
);

// The Query
$subpages = new WP_Query( $args );

// The Loop
if ( $subpages -> have_posts() ) :
?>

<nav class="tabs <?php if ($tabs_sub) { print 'sub'; }; ?>">
    <?php
    while ( $subpages -> have_posts() ) : $subpages -> the_post();
    //Mark anchor selected
    $a_class = '';

    if ( get_the_ID() == get_queried_object_id()) {
    //If tab (page) ID equals main page ID mark anchor selected
        $a_class = 'selected ';
    } elseif ( $subpages->current_post == 0 && get_queried_object_id() == $parent_id ) {
    //Or if is parent page
        $a_class = 'selected ';
    }
    if ( $tabs_sub && $a_class == 'selected ' ) {
    //If the template is located in the bottom ($tabs_sub) and is the selected post don't show it
        continue;
    }
    $a_class .= make_class_from_title( get_the_title() );
    ?>
    <a class="<?php echo $a_class; ?>" href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
    <?php endwhile; ?>
</nav>

<?php endif; wp_reset_postdata(); ?>
