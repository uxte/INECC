<?php
    /* Template Name: Menu page */
    get_header();
?>

<?php
wp_nav_menu( array(
    'menu'            => 'menu-page',
    'container'       => 'nav',
    'container_class' => 'menu'
));

    // $defaults = array(
    //     'menu'            => '',
    //     'container'       => 'div',
    //     'container_class' => '',
    //     'container_id'    => '',
    //     'menu_class'      => 'menu',
    //     'menu_id'         => '',
    //     'echo'            => true,
    //     'fallback_cb'     => 'wp_page_menu',
    //     'before'          => '',
    //     'after'           => '',
    //     'link_before'     => '',
    //     'link_after'      => '',
    //     'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    //     'item_spacing'    => 'preserve',
    //     'depth'           => 0,
    //     'walker'          => '',
    //     'theme_location'  => '',
    // );
?>

<?php get_footer(); ?>
