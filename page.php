<?php get_header(); ?>

<?php
if ( $post -> post_parent != 0 ) { // if is child page
    get_template_part( 'template-parts/page/page', 'child' );
} else {
    get_template_part( 'template-parts/page/page', 'parent' );
}
?>

<?php get_footer(); ?>
