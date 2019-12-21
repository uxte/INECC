<?php
    /* Template Name: Our Work + Search */
    get_header();
?>

<main>

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

    <section class="content subpage">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <header>
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
        </header>

        <?php endwhile; endif; wp_reset_postdata(); ?>
        
        <section class="events">
			<?php get_template_part( 'template-parts/list', 'events' ); ?>
		</section>

    </section>

</main>

<?php get_footer(); ?>
