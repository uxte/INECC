<aside class="sidebar">

<?php if ( !is_home() && !is_page( 'Sitemap' ) ) : ?>
    <nav class="sidebar-nav" id="sidebar-nav">
        <a class="sb-menu-toggle" id="sbMenuToggle" href="#"><span class="open-menu">Quick menu access</span><span class="close-menu">Close menu</span></a>
            <?php
            wp_nav_menu( array(
                'menu'            => 'top-menu',
                'container'       => '',
                'menu_id'         => 'sbMenu',
                'menu_class'      => 'sb-menu open'
            ));
            ?>
    </nav>

    <?php
    if ( is_user_logged_in() ) {
        $pageID = get_the_ID();

        $args = array(
            'category_name'         => 'sidebar',
            'post_type'             => 'post',
            'post_status'           => 'publish',
            'order'                 => 'DESC',
            'posts_per_page'        => 1,
            'meta_query' => array(
            array(
                'key'     => 'select_page',
                'value'   => $pageID,
                'compare' => '='
            )
            )
        );
        // The Query
        $posts = new WP_Query( $args );

        // The Loop
        if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) : $posts -> the_post(); 
    ?>

            <div class="sb-post">
                <?php print get_the_post_thumbnail( $post, 'medium' ); ?>
                <div class="sb-post-content">
                    <?php the_content(); ?>
                </div>
            </div>

    <?php endwhile; endif; wp_reset_postdata(); } ?>

        <a class="back-to-top" rel="nofollow" href="#top">Back to top</a>

<?php endif; ?>

</aside>
