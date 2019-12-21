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

        <section class="events">
			<?php get_template_part( 'template-parts/list', 'events' ); ?>
		</section>

    </section>

    <?php endwhile; endif; ?>

</main>
frrr

<?php get_footer(); ?>
