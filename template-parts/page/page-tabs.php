<?php
/**
 * Template part for displaying subpages in tabs in page.php
 */
?>

<?php
$parent_id = $post -> post_parent;

if ( $parent_id == 0 ) { //If it's the parent page
    $parent_id = get_queried_object_id();
}

// WP_Query arguments
$args = array(
    'post_parent'            => $parent_id,
    'post_type'              => 'page',
    'post_status'            => 'publish',
    'order'                  => 'ASC',
    'orderby'                => 'menu_order',
);

// The Query
$subpages = new WP_Query( $args );

// The Loop
if ( $subpages -> have_posts() ) :
?>

<nav class="tabs">
    <?php
    while ( $subpages -> have_posts() ) : $subpages -> the_post();
    //Mark anchor selected
    $a_class = '';

    if ( get_the_ID() == get_queried_object_id()) {
    //If tab (page) ID equals main page ID mark anchor selected
        $a_class = 'class="selected"';
    } elseif ( $subpages->current_post == 0 && get_queried_object_id() == $parent_id ) {
    //Or if is parent page
        $a_class = 'class="selected"';
    }
    ?>
    <a <?php echo $a_class; ?> href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
    <?php endwhile; ?>
</nav>

<?php endif; ?>
