<?php get_header(); ?>

	<main>
		<header class="cover">
			<h2><?php print get_bloginfo( 'description' ); ?></h2>
			<a class="button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'About us' ) ) ); ?>">Know <span>more</span></a>
			<a class="sw-tab" title="Learn more" href="<?php echo esc_url( get_permalink( get_page_by_title( 'About us' ) ) ); ?>#sustainability"><span><span>This is a</span> low-carbon website</span></a>
		</header>

		<div class="wrap">
		<section class="our-work">

			<?php
			//Get our-work page and children
			$page = get_page_by_path('our-work');
			$parent_id = $page->ID;

			if ( $parent_id == 0 ) { //If it's the parent page
			    $parent_id = get_queried_object_id();
			}
			?>

			<header>
				<h1><?php print get_the_title($parent_id); ?></h1>
				<h2>INECC works within three main areas</h2>
			</header>

			<?php
			// WP_Query arguments
			$args = array(
			    'post_parent'            => $parent_id,
			    'post_type'              => 'page',
			    'post_status'            => 'publish',
			    'order'                  => 'ASC',
			    'orderby'                => 'menu_order',
			    'posts_per_page'         => 3
			);

			// The Query
			$subpages = new WP_Query( $args );

			// The Loop
			if ( $subpages -> have_posts() ) :

			?>

			<ul class="index">
				<?php
				while ( $subpages -> have_posts() ) : $subpages -> the_post();
				$class = get_post_meta( $post->ID, 'body-color', true );
				?>

				<li class="<?php echo $class ?>">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php the_post_thumbnail(); ?>
				</li>

				<hr>

				<?php endwhile; ?>
			</ul>
			<?php endif; wp_reset_postdata(); ?>

		</section>

		<section class="our-reach">
			<header>
				<h1>Our reach</h1>
				<h2>INECC works with the most vulnerable across India</h2>
			</header>
			<a class="button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Our reach' ) ) ); ?>">Know <span>more</span></a>
		</section>

		</div><!-- wrap -->
		<div class="wrapper">

		<?php get_template_part( 'template-parts/list-upcoming', 'events' ); ?>

        <section class="co-create">
			<h1>Co-create with us</h1>
			<div class="col">
	            <h2>Create meaningful dialogues</h2>
	            <p>Contribute to a more democratic and informed climate change dialogue our blog <strong>EcoEthic</strong> at <a href="mailto:ecoethic@inecc.net">ecoethic@inecc.net</a></p>
	            <figure class="logo-ecoethic"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-ecoethic-white.svg" alt="EcoEthic" /></figure>
			</div>
			<div class="col">
				<h2>Create a better quality of life</h2>
	            <p>Help create a better life for marginalized communities with your <strong>donations</strong>. <br>
				If you have any questions about where your money is going, contact us at <a href="mailto:info@inecc.net">info@inecc.net</a></p>
			</div>
			<div class="col">
				<figure class="icon-donate"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-donate-yellow.svg" alt="Donate icon" /></figure>
				<span><a class="button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Donate' ) ) ); ?>">Donate</a></span>
			</div>
        </section>

        <aside class="cta eco-website">
			<div class="col">
				<h1>Climate conscious on and off-line</h1>
				<h2>We work towards reducing our digital carbon footprint and more.</h2>
	            <a class="button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'About us' ) ) ); ?>#sustainability">Know <span>more</span></a>
			</div>
			<ul class="col">
				<li>A website designed & built to reduce energy consumption</li>
				<li>Lower energy usage means a lower carbon footprint</li>
				<li>A lower carbon footprint slows down Global Warming</li>
			</ul>
        </aside>

        <section class="testimonials" id="testimonials">
			<?php get_template_part( 'template-parts/testimonials' ); ?>
        </section>

		</div><!-- wrapper -->
	</main>

<?php get_footer(); ?>
