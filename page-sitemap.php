<?php
    /* Template Name: Sitemap */
    get_header();
?>

<main class="wrapper">

    <header class="cover">
        <h1><?php the_title(); ?></h1>
    </header>

    <section class="content">
        
        <nav class="sitemap-nav">
            <?php
                wp_nav_menu( array(
                    'menu'            => 'top-menu',
                    'container'       => ''
                ));
            ?>
        </nav>

    </section>
    
</main>

<?php get_footer(); ?>
