<?php
define("THEME_DIR", get_template_directory_uri());
/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

/**
 * Add custom CSS and JS
 */
function my_load_scripts($hook) {

    // create my own version codes
    //$my_js_ver  = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'js/custom.js' ));
    //$my_css_ver = date("ymd-Gis", filemtime( plugin_dir_path( __FILE__ ) . 'style.css' ));

    wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
    //wp_enqueue_script( 'custom_js', plugins_url( 'js/custom.js', __FILE__ ), array(), $my_js_ver );
    //wp_register_style( 'my_css',    plugins_url( 'style.css',    __FILE__ ), false,   $my_css_ver );
    //wp_enqueue_style ( 'my_css' );

}
add_action('wp_enqueue_scripts', 'my_load_scripts');


// Add classes to body
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

//Excerpt length
function mytheme_custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

//Filter the excerpt "read more" string.
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Add custom menu functionality
function new_custom_menu() {
  register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'new_custom_menu' );

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

//Add featured image functionality
add_theme_support( 'post-thumbnails' );

//Add custom colors to post palette
function mytheme_setup_theme_supported_features() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Blue', 'INECC' ),
            'slug' => 'blue',
            'color' => '#0055FF',
        ),
        array(
            'name' => __( 'Green', 'INECC' ),
            'slug' => 'green',
            'color' => '#1ED261',
        ),
        array(
            'name' => __( 'Orange', 'INECC' ),
            'slug' => 'orange',
            'color' => '#FF892F',
        ),
        array(
            'name' => __( 'Yellow', 'INECC' ),
            'slug' => 'yellow',
            'color' => '#FFB600',
        ),
        array(
            'name' => __( 'Yellow Light', 'INECC' ),
            'slug' => 'yellow-light',
            'color' => '#FFD600',
        ),
        array(
            'name' => __( 'Black', 'INECC' ),
            'slug' => 'black',
            'color' => '#222222',
        ),
        array(
            'name' => __( 'Blue Nav', 'INECC' ),
            'slug' => 'blue-nav',
            'color' => '#6394AB',
        ),
        array(
            'name' => __( 'Blue Nav Light', 'INECC' ),
            'slug' => 'blue-nav-light',
            'color' => '#F0F5F7',
        ),
    ) );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );
add_theme_support( 'disable-custom-colors' );

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

//Create calendar link
//https://calendar.google.com/calendar/r/eventedit?text=Take+back+your+work-life+balance&dates=20200406T150000Z/20200413T120000Z&details=For+details,+link+here:+https://www.eventbrite.com/e/take-back-your-work-life-balance-tickets-77150698817&location=Quinta+Arcadia+-+Estrada+da+Mata+do+Rei,+-+2790-335+Facho+de+Azoia+-+Portugal&sf=true
function make_cal_link( $post ) {
    $cal_link = "https://calendar.google.com/calendar/r/eventedit?";
    $cal_link .= "text=" . $post->post_title;
    $cal_link .= "&dates=" . get_the_date('Ymd\THis\Z', $post) . '/' . get_the_date('Ymd\THis\Z', $post);
    $cal_link .= "&location=" . $post->event_place;
    $cal_link .= "&sf=true";
    return $cal_link;
}

?>
