<?php if ($post->post_name != "menu") : ?>
    <footer class="main-footer">
        <a rel="nofollow" href="#">Back to top</a>
        <hr>

        <div class="social-media">
            <a href="https://www.facebook.com/" title="Facebook"><svg class="icon icon-facebook"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons.svg#icon-facebook"></use></svg></a>
            <a href="https://www.instagram.com/" title="Instagram"><svg class="icon icon-instagram"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons.svg#icon-instagram"></use></svg></a>
            <a href="https://www.linkedin.com/company/" title="LinkedIn"><svg class="icon icon-linkedin"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons.svg#icon-linkedin"></use></svg></a>
            <a href="https://medium.com/" title="Medium"><svg class="icon icon-medium"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons.svg#icon-medium"></use></svg></a>
            <a href="https://twitter.com/" title="Twitter"><svg class="icon icon-twitter"><use xlink:href="<?php echo get_stylesheet_directory_uri(); ?>/img/icons.svg#icon-twitter"></use></svg></a>
        </div>

        <a class="button donate" href="#">Donate to build a better future</a>

        <a class="button sitemap" href="#">Sitemap</a>

        <p class="license">This website content and code is licensed under a <a href="#">Creative Commons Attribution 4.0 International License.</a> </p>

        <address class="author">Made with love for people and the planet by <br><a rel="author" href="#">Charlene</a> + <a rel="author" href="#">Komuhn</a> </address>

    </footer>
<?php endif; ?>
    <?php wp_footer(); ?>
    </body>
</html>
