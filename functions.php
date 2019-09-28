<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

// Add class to body based on page template
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {

    if ( is_page_template( 'page-menu.php' ) ) {

        $classes[] = 'page-menu';

    }

    return $classes;

}

//
function open_menu () {
    $prev_url = home_url( $wp->request );
    $menu_url = get_permalink( get_page_by_path( 'menu' ) );

    if ( is_page_template('page-menu.php') ) {
        $menu_url = $prev_url;
    }

    echo $menu_url;
}

?>
