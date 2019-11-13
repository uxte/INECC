<?php
/**
 * Template part for displaying pages parent
 */
?>
<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="cover">
        <h1><?php the_title(); ?></h1>
    </header>

    <section class="content">
        <?php the_content(); endwhile; endif; ?>
    </section>

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

    <?php
    //Show first subpage
    $parent_id = get_queried_object_id();

    // WP_Query arguments
    $args = array(
        'post_parent'            => $parent_id,
        'post_type'              => 'page',
        'post_status'            => 'publish',
        'order'                  => 'ASC',
        'posts_per_page'         => 1
    );

    // The Query
    $subpage = new WP_Query( $args );

    // The Loop
    if ( $subpage->have_posts() ) : ?>

    <section class="content subpage">

        <?php while ( $subpage->have_posts() ) : $subpage->the_post(); ?>

        <header>
            <h2><?php the_title(); ?></h2>
            <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
        </header>
        <?php the_content(); ?>

    </section>

    <?php endwhile; endif; wp_reset_postdata(); ?>

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

</main>
