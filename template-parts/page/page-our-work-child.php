<?php
/**
 * Template part for displaying page child
 */
?>
<main class="wrapper">

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content subpage">
        <header>
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
        </header>

        <?php the_content();?>
    </section>

    <?php endwhile; endif; ?>

    <?php //set_query_var( 'tabs_sub', true ); get_template_part( 'template-parts/page/page', 'tabs' ); ?>
    <?php get_template_part( 'template-parts/page/page-tabs', 'sub' ); ?>

</main>

<aside class="content parent">
    <?php
    //Get parent content
    $parent_id = $post -> post_parent;

    $args = array(
        'page_id'                => $parent_id,
        'post_type'              => array( 'page' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => 1
    );

    $parent_page = new WP_Query( $args );

    if ( $parent_page->have_posts() ) : while ( $parent_page->have_posts() ) : $parent_page->the_post(); ?>

    <header>
        <h3><?php the_title(); ?></h3>
    </header>

    <?php the_content(); ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>
</aside>
