<?php get_header(); ?>

<main class="wrapper">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <header class="cover">
        <h1><?php the_title(); ?></h1>
    </header>

    <section class="content">
        <?php the_content(); endwhile; endif; ?>
    </section>
</main>

<?php get_footer(); ?>
