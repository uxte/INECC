<?php
/**
 * Template part for displaying subpages content in tabs in page.php
 */
?>
<section class="sub-pages tabs">
    <?php
    $parent_id = get_queried_object_id();

    // WP_Query arguments
    $args = array(
        'post_parent'            => $parent_id,
        'post_type'              => array( 'page' ),
        'post_status'            => array( 'publish' ),
        'order'                  => 'ASC',
        'orderby'                => 'menu_order',
    );

    // The Query
    $subpages = new WP_Query( $args );

    // The Loop
    if ( $subpages->have_posts() ) : ?>

    <nav class="tabs-nav">
        <?php
        while ( $subpages->have_posts() ) : $subpages->the_post();
        //Mark anchor selected
        // $a_class = '';
        // if ()
        ?>
        <a <?php //echo $a_class; ?> href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
        <?php endwhile; ?>
    </nav>

    <?php endif; $subpages->rewind_posts(); ?>
    <?php while ( $subpages->have_posts() ) : $subpages->the_post(); ?>

    <article class="sub-page tab">
        <header>
            <h2><?php the_title(); ?></h2>
        </header>
        <?php the_content(); ?>

    </article>

    <?php endwhile; wp_reset_postdata(); ?>

</section>
