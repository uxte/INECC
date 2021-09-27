
<?php /*get_template_part( 'template-parts/sidebar');*/ ?>

<footer class="main-footer wrapper">
    <a class="back-to-top" rel="nofollow" href="#top">Back to top</a>
    <hr>
    <div class="content">
        <?php get_template_part( 'template-parts/social', 'links' ); ?>
        <a class="button donate" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Donate' ) ) ); ?>">Donate to build a better future</a>
        <a class="button sitemap" href="#">Site map</a>
    </div>
    <img src="https://api.thegreenwebfoundation.org/greencheckimage/inecc.net" alt="This website is hosted Green - checked by thegreenwebfoundation.org">    
</footer>

<?php wp_footer(); ?>
</body>
</html>
