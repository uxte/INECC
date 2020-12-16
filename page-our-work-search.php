<?php
    /* Template Name: Our Work + Search */
    get_header();
?>
<main class="wrapper">

    <?php get_template_part( 'template-parts/page/page', 'tabs' ); ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <section class="content subpage">

        <div class="wrap">

            <header>
                <h1><?php the_title(); ?></h1>
                <?php the_post_thumbnail('full', array('class' => 'icon')); ?>
            </header>

            <?php endwhile; endif; wp_reset_postdata(); ?>

            <?php if ( is_page('INECC Events') ) : ?>
            <section class="events posts" id="eventsContainer">
    			<?php get_template_part( 'template-parts/list', 'events' ); ?>
    		</section>
            <?php endif; ?>

            <?php if ( is_page('INECC Press') ) : ?>
            <section class="press posts">
    			<?php get_template_part( 'template-parts/list', 'press' ); ?>
    		</section>
            <?php endif; ?>

            <?php if ( is_page('INECC Publications') ) : ?>
            <section class="publications posts">
    			<?php get_template_part( 'template-parts/list', 'publications' ); ?>
    		</section>
            <?php endif; ?>

        </div>

        <aside class="search-filter" id="searchOrFilter">

            <div class="tabs" id="searchOrFilterTabs">
                <div class="btn-container"><a class="button search" >Search</a></div>
                <div class="btn-container"><a class="button filter" >Filter</a></div>
            </div>

            <button class="button close" id="closeSearchOrFilter"></button>

            <section class="search" id="searchBlock">
                <h2>Search</h2>

                <form class="form-search" action="<?php esc_url(get_permalink()); ?>" method="GET">

                    <input type="text" placeholder="What are you looking for?" required name="search" />

                    <div class="btn-container submit">
                        <button class="button has-white-color" type="submit">Search</button>
                    </div>

                </form>

            </section>

            <section class="filter" id="filterBlock">
                <h2>Filter</h2>

                <form class="form-filter" action="<?php esc_url(get_permalink()); ?>" method="GET">

                    <fieldset class="filter-by-areas-of-work">

                        <legend>
                            By: Key area of work
                            <em>Select one option</em>
                        </legend>

                        <?php
                            $page_name = end( explode( '-', $post->post_name ) );
                            $category = get_term_by('slug', $page_name, 'category');
                            $category_id = $category->term_id;

                            $taxonomies = array(
                                'category'
                            );

                            $args = array(
                                // 'parent'         => $category_id,
                                'child_of'       => $category_id,
                                'orderby'        => 'name',
                                'hide_empty'     => 0
                            );

                            $sub_categories = get_terms($taxonomies, $args);

                            //var_dump( $sub_categories );

                            foreach ( $sub_categories as $category ) {
                                $cat_id = $category->term_id;

                                $cat_name = preg_replace('/[ ,]+/', '', strtolower($category->name));
                                print '<label for="' . $cat_name . '">';
                                    print '<input type="radio" id="' . $cat_name . '" value="' . $cat_id . '" name="cat">';
                                print $category->name . '</label>';
                            }
                        ?>

                    </fieldset>

                    <?php if ($page_name == "events"): ?>

                    <fieldset class="filter-by-location">

                        <legend>By: Location</legend>

                        <label for="localities">States</label>

                        <select name="local" id="localities">
                            <?php
                                $localities = get_meta_values( 'event_place', 'post' );
                                print '<option disabled selected value>All states</option>';
                                if( !empty( $localities ) ) {
                                    foreach( $localities as $locality ){
                                        //$locality_val = preg_replace('/[ ,]+/', '', strtolower($locality));
                                        print '<option value="'.$locality.'">'.$locality.'</option>';
                                    }
                                }
                            ?>
                        </select>

                    </fieldset>

                    <?php endif; ?>

                    <div class="btn-container submit">
                        <button class="button has-white-color" type="submit" >Apply filter</button>
                    </div>

                </form>


            </section>
        </aside>
    </section>
</main>

<aside class="content parent wrapper">
    <?php
    //Get parent content
    $parent_id = $post -> post_parent;

    $args = array(
        'page_id'                => $parent_id,
        'post_type'              => array( 'page' ),
        'post_status'            => array( 'publish' ),
        'posts_per_page'         => 1
    );

    $parent_page = new WP_Query( $args );

    if ( $parent_page->have_posts() ) : while ( $parent_page->have_posts() ) : $parent_page->the_post(); ?>

    <header>
        <h3><?php the_title(); ?></h3>
    </header>

    <?php endwhile; endif; wp_reset_postdata(); ?>

    <?php the_content(); ?>
</aside>

<?php get_footer(); ?>
