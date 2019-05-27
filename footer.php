        <footer class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'Secondary',
                            'container_class' => 'footer_nav_bar'
                        )); ?>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?php my_social_icons_output(); ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <p class="text-center">Copyright &copy; <?php echo date("Y"); ?> Medical Research Institute of New Zealand . All rights reserved.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-center">Theme Developed by <a href="http://www.richard-hpa.com" target="blank">Richard Hpa Design</a></p>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
        <script type="text/javascript">
            <?php if(get_theme_mod('customTheme_Image_Slide_Time')): ?>
                var timing = Number(<?= get_theme_mod('customTheme_Image_Slide_Time'); ?>);
            <?php else: ?>
                var timing = 3000;
            <?php endif; ?>
            jQuery('#myCarousel').carousel({ interval: timing, cycle: true });
            jQuery('#studiescarousel').carousel({ interval: timing, cycle: true });
        </script>
    </body>
</html>
