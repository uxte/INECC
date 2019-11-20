<?php get_header(); ?>

	<main>
		<header class="cover">
			<h2><?php print get_bloginfo( 'description' ); ?></h2>
			<a class="button" href="http://">Know <span>more</span></a>
			<a class="sw" title="Learn more" href="#"><span>This is a sustainable website</span></a>
		</header>

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
			<figure><img src="" alt="" /></figure>
			<a class="button" href="http://">Know <span>more</span></a>
		</section>

		<section class="events">
			<h1>Upcoming events</h1>

			<article class="event">
				<h1>Name of event</h1>
				<p>Description of event in two or three lines continuations of event in two or three lines of event in two or three lines</p>
                <div class="wrapper">
                    <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb.svg" alt="Thumb" /></figure>
    				<footer>
    					<time datetime="2019-07-01" pubdate="pubdate">July 01, 2019</time>
    					<address>Place/City</address>
    					<a href="http://">Facebook event</a>
    				</footer>
                </div>
			</article>

		</section>

        <section class="co-create">
            <h1>Co-create with us...</h1>
            <h2>A better dialogue</h2>
            <p>Contribute to a more democratic and informed climate change dialogue our blog EcoEthic at ecoethic@inecc.net</p>
            <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb.svg" alt="Thumb" /></figure>
            <h2>A better dialogue</h2>
            <p>Help create a better life for the marginalized with your donations.</p>
            <figure><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb.svg" alt="Thumb" /></figure>
            <p>If you have any questions about where your money is going, contact us at info@inecc.net</p>
        </section>

        <aside class="cta eco-website">
            <h1><span>inecc.net is an</span> eco-conscious website</h1>
            <a class="button" href="#">Know <span>more</span></a>
        </aside>

        <section class="testimonials">
            <blockquote>
                <p>INECC workshop helped me in conceptually understanding the climate discourse and its link with the education and gender work I was involved with. I have been able to build on the learnings and strengthen our engagement with women SHGs and young girls on energy and climate in Varanasi. I owe this to INECC.</p>
                <footer>
                    <cite class="author">Ranjana Gaur</cite>
                    <cite class="title">Secretary, Social Action and Research Centre; Varanasi</cite>
                    <figure>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/thumb.svg" alt="Thumb" />
                    </figure>
                </footer>

            </blockquote>
        </section>

	</main>

<?php get_footer(); ?>
