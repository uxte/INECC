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
            <a href="<?php echo home_url(); ?>">
    			<span>INECC - People's Voices in Policy Choices</span>
    			<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Logo" />
            </a>
		</h1>
		<nav class="main-nav">
			<a class="menu" href="<?php open_menu(); ?>">Menu</a>
		</nav>
	</header>
