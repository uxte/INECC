<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <?php wp_head(); ?>
  <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
  <meta name="author" content="Komuhn">

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">
  <link rel="stylesheet" media="screen and (min-width: 1025px)" href="<?php echo get_stylesheet_directory_uri(); ?>/css/full.css">

</head>

<body <?php body_class(); ?> >
	<header class="main-header">
		<h1 class="logo">
            <a href="<?php echo get_home_url(); ?>">
    			<span>INECC - People's Voices in Policy Choices</span>
                <?php if ( is_home() ) : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Logo" />
                <?php elseif ( is_page( 'menu' ) ) : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-small-white.svg" alt="Logo" />
                <?php else : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-small.svg" alt="Logo" />
                <?php endif; ?>
            </a>
		</h1>

        <a class="button icon donate" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Donate' ) ) ); ?>"></a>

        <nav class="main-nav" id="main-nav">
            <?php
            wp_nav_menu( array(
                'menu'            => 'top-menu',
                'container'       => ''
            ));
            ?>
            <?php get_template_part( 'template-parts/social', 'links' ); ?>
            <div class="buttons">
                <a class="logo" href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-small-white.svg" alt="Logo" />
                </a>
                <a class="menu" href="#menu">Menu</a>
            </div>
        </nav>

	</header>
