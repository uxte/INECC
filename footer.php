
<?php get_template_part( 'template-parts/sidebar'); ?>

<footer class="main-footer wrapper">
    <a class="back-to-top" rel="nofollow" href="#top">Back to top</a>
    <hr>

    <?php get_template_part( 'template-parts/social', 'links' ); ?>
    <a class="button donate" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Donate' ) ) ); ?>" title="Donate">Donate to build a better future</a>
    <a class="button sitemap" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Site map' ) ) ); ?>" title="Site map">Site map</a>

</footer>

<?php wp_footer(); ?>
</body>
</html>
