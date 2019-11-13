<?php
    /* Template Name: Our Work */
    get_header();
?>

<?php
if ( $post -> post_parent != 0 ) { // if is child page
    get_template_part( 'template-parts/page/page-our-work', 'child' );
} else {
    get_template_part( 'template-parts/page/page-our-work', 'parent' );
}
?>

<?php get_footer(); ?>
