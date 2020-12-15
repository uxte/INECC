<?php

$search     = $_REQUEST[ 'search' ];
$cat        = $_REQUEST[ 'cat' ];

// WP_Query arguments
$posts_per_page = 10;
if ( $_GET['posts_per_page'] ) {
    $posts_per_page = $_GET['posts_per_page'];
}
$args = array(
    'category_name'         => 'publications',
    'post_type'             => 'post',
    'post_status'           => 'publish',
    'order'                 => 'DESC',
    'posts_per_page'        => $posts_per_page,
    's'                     => $search,
    'cat'                   => $cat,
);

// The Query
$posts = new WP_Query( $args );

// if search
if ( isset( $search ) ) {
    $isSearchPage = true;
    $count = $posts -> post_count;
    print '<div class="search-results-header">' . $count . ' results for search term: <strong>' . $_REQUEST[ 'search' ] . ' </strong></div>';
}

// The Loop
if ( $posts -> have_posts() ) : while ( $posts -> have_posts() ) : $posts -> the_post();
?>

<article id="<?php echo $post->post_name?>">
    <h2><?php the_title(); ?></h2>
    <div class="row">
        <figure class="img col">
            <?php print get_the_post_thumbnail( $post, 'medium' ); ?>
        </figure>
        <div class="content col">
            <?php the_content();  ?>
            <time datetime="<?php echo get_the_date('c'); ?>" pubdate="pubdate"><?php print 'Published in ' . get_the_date('Y');  ?></time>
            <a class="button" href="<?php echo $post->pub_link; ?>">Download PDF</a>
        </div>
    </div>
</article>

<hr>

<?php endwhile; endif; wp_reset_postdata(); ?>

<?php if ( $posts->found_posts >= 11 && $posts_per_page != -1 || $isSearchPage ) : //If query has more than 10 posts add a "Show all" button ?>
<nav class="pagination">
    <a class="button icon show-all" href="<?php wp_guess_url(); ?>?posts_per_page=-1"> See more <span>content</span></a>
</nav>
<?php endif; ?>
