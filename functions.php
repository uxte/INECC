<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

// Add class to body based on page template
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    // Check if there's a custom body-color from post custom-fields
    if ( $body_color = get_post_meta( $post->ID, 'body-color', true ) ) {
        $classes[] = $body_color;
    }

    return $classes;
}


//Add custom menu functionality
function new_custom_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'new_custom_menu' );

//Add featured image functionality
add_theme_support( 'post-thumbnails' );

//
// function show_post($path) {
//   $post = get_page_by_path($path);
//   $content = apply_filters('the_content', $post->post_content);
//   echo $content;
// }


/**
 * Return whether the current page is a child of $id
 *
 * Note: this function must be run after the `wp` hook.
 * Otherwise, the WP_Post object is not set up, and
 * is_page() will return false.
 *
 * @param  int  $id The post ID of the parent page
 * @return bool Whether the current page is a child page of $id
 */
function is_child_of( $id ) {
  return ( is_page() && $id === get_post()->post_parent );
}

//
function open_menu () {
    $prev_url = $_SERVER['HTTP_REFERER'];
    $menu_url = get_permalink( get_page_by_path( 'menu' ) );

    if ( is_page_template('page-menu.php') ) {
        $menu_url = $prev_url;
    }

    echo $menu_url;
}


//
function make_class_from_title($title){
    $title = strtok($title, " ");
    $title = strtolower($title);
    $title = preg_replace('/[^a-z0-9 -]+/', '', $title);
    $title = str_replace(' ', '-', $title);
    return trim($title, '-');
}

?>
