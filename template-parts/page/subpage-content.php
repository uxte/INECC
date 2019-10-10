<?php
/**
 * Template part for displaying subpages content
 */
?>
<main>

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>
    
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content subpage">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <?php the_content();?>
    </section>

    <?php endwhile; endif; ?>

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

        <h3><?php the_title(); ?></h3>

        <?php the_content(); ?>

        <?php endwhile; endif; wp_reset_postdata(); ?>
    </aside>

</main>
