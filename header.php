<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php wp_title(); ?> - <?php bloginfo( 'name' ); ?></title>
  <?php wp_head(); ?>

  <meta name="description" content="INECC">
  <meta name="author" content="Komuhn">

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css">
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
		<nav class="main-nav">
            <?php if ( !is_page_template( 'page-menu.php' ) ) : ?>
            <a class="button icon donate" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Donate' ) ) ); ?>"><span>Donate</span></a>
            <?php endif; ?>
            <?php if ( is_page( 'menu' ) ) : ?>
			<a class="menu open" href="<?php open_menu(); ?>">Menu</a>
            <?php else : ?>
            <a class="menu" href="<?php open_menu(); ?>">Menu</a>
            <?php endif; ?>
		</nav>
	</header>
