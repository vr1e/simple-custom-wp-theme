        <footer>
            <p>This is my footer</p>
<!-- adds secondary menu to footer content -->
            <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
        </footer>

    </div><!-- .container end -->

<!-- footer hook to reference JavaScript files -->
        <?php wp_footer(); ?>
    </body>
</html>