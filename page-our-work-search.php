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

        <aside class="search-filter" id="searchContainer">

            <div class="tabs">
                <div class="btn-container"><a class="button search" href="#search">Search</a></div>
                <div class="btn-container"><a class="button filter" href="#filter">Filter</a></div>
            </div>

            <section class="search" id="search">
                <h2>Search</h2>

                <form class="form-search" action="." method="GET">

                    <input type="text" placeholder="What are you looking for?" name="s" />

                    <div class="btn-container submit">
                        <button class="button has-white-color" type="submit" >Search</button>
                    </div>

                </form>

                <a class="button close" href="#"></a>

            </section>

            <section class="filter" id="filter">
                <h2>Filter</h2>

                <form class="form-filter" action="." method="GET">

                    <fieldset class="filter-by-areas-of-work">

                        <legend>
                            By: Key area of work
                            <em>Select one option</em>
                        </legend>

                        <?php
                            $parent_cat = get_the_category();
                            $category_id = $parent_cat[0]->cat_ID;
                            $categories = get_categories( array(
                                'orderby' => 'name',
                                'parent'  => $category_id
                            ) );
                            foreach ( $categories as $category ) {
                                $cat_ID = $category->cat_ID;
                                $cat_name = preg_replace('/[ ,]+/', '', strtolower($category->name));
                                print '<label for="' . $cat_name . '">';
                                    print '<input type="radio" id="' . $cat_name . '" name="cat" value="' . $cat_ID . '" >';
                                print $category->name . '</label>';
                            }
                        ?>

                    </fieldset>

                    <fieldset class="filter-by-location">

                        <legend>By: Location</legend>

                        <label for="localities">States</label>

                        <select name="localities" id="localities">
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

                    <div class="btn-container submit">
                        <button class="button has-white-color" type="submit" >Apply filter</button>
                    </div>

                </form>

                <!-- <div class="btn-container open tab"><a class="button open" href="#filter">Filter</a></div> -->
                <a class="button close" href="#"></a>

            </section>

            <?php /*
                $s = $_GET['s'];
                $local = $_GET['localities'];
                $cat = $_GET['cat'];

                $args = array(
                    'post_type'              => 'post',
                    'post_status'            => 'publish',
                    'order'                  => 'DESC',
                    'cat'                    => $cat,
                );
                if(!empty($local)) {
                    $args = array(
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'event_place',
                                'value' => ''.$local.''
                            )
                        )
                            );
                }
                if(!empty($s)) {
                    $args = array(
                        's' => $s,
                    );
                }
                // The Query
                $posts = new WP_Query( $args );

                // The Loop
                if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) :
                    $posts -> the_post();

            ?>

                    <article class="event slide <?php echo $class_hide;?>" id="<?php echo $post->post_name?>">
                        <h2><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'INECC Events' ) ) ) . "#" . $post->post_name ?>"><?php the_title(); ?></a></h2>
                        <div class="row">
                            <div class="col">
                                <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php print get_the_date('M \<\s\p\a\n\>d\<\/\s\p\a\n\>');  ?></time>
                                <div class="img"><?php print get_the_post_thumbnail( $post, 'medium' ); ?></div>
                                <!-- <figure><img src="/img/thumb.svg" alt="Thumb" /></figure> -->
                            </div>
                            <div class="col">
                                <address><?php print $post->event_place; ?></address>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <footer class="row">
                            <div class="col">
                                <a class="button icon calendar" href="<?php echo make_cal_link($post); ?>" target="_blank">Add to my <span>calendar</span></a>
                            </div>
                            <div class="col">
                                <a class="button icon facebook" rel="noreferrer nofollow" href="<?php echo $post->event_fb; ?>">Find out <span>more on</span></a>
                            </div>
                        </footer>
                    </article>

                    <hr>

            <?php endwhile; endif; wp_reset_postdata(); */ ?>

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
