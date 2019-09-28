<?php get_header(); ?>

<main>
    <?php while ( have_posts() ) : the_post(); ?>

    <header class="cover">
        <h1><?php the_title(); ?></h1>
    </header>

    <?php the_content(); endwhile; ?>

</main>

<?php get_footer(); ?>
