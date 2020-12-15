<aside class="sidebar">

<?php if ( is_user_logged_in() ) : ?>

<?php
$args = array(
    'category_name'         => 'sidebar',
    'post_type'             => 'post',
    'post_status'           => 'publish',
    'order'                 => 'DESC'
);
// The Query
$posts = new WP_Query( $args );

// The Loop
if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) : $posts -> the_post(); ?>

    <div class="sb-post">
        <?php the_title(); ?>
        <?php the_content(); ?>
    </div>

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php endif; ?>

<?php if ( !is_home() && !is_page( 'Sitemap' ) ) : ?>
    <nav class="sidebar-nav" id="sidebar-nav">
    <?php
    wp_nav_menu( array(
        'menu'            => 'top-menu',
        'container'       => '',
        'menu_id'         => 'sb-menu'
    ));
    ?>
    </nav>
<?php endif; ?>

</aside>
