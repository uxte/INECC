<?php
    /* Template Name: Our Work + Search */
    get_header();
?>

<main>

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content subpage">
        <header>
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
        </header>

        <?php endwhile; endif; wp_reset_postdata(); ?>

        <?php if ( is_page('INECC Events') ) : ?>
        <section class="events">
			<?php get_template_part( 'template-parts/list', 'events' ); ?>
		</section>
        <?php endif; ?>

        <?php if ( is_page('INECC Press') ) : ?>
        <section class="press">
			<?php get_template_part( 'template-parts/list', 'press' ); ?>
		</section>
        <?php endif; ?>

        <?php if ( is_page('INECC Publications') ) : ?>

        <section class="publications">
			<?php get_template_part( 'template-parts/list', 'publications' ); ?>
		</section>
        <?php endif; ?>

    </section>

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

    <?php endwhile; endif; wp_reset_postdata(); ?>
    
    <?php the_content(); ?>
</aside>

<?php get_footer(); ?>
