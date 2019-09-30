<?php get_header(); ?>

<?php
if ( $post -> post_parent != 0 ) { // if is child page
    get_template_part( 'template-parts/page/subpage', 'content' );
} else {
    get_template_part( 'template-parts/page/page', 'content' );
}
?>

<?php get_footer(); ?>
