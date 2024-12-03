<footer class="container">
    <div class="row">
        <div class="col-12">
            <?php
            get_template_part('template-parts/part', 'contact');
            ?>
            <?php if (is_active_sidebar('footer-widget')) : ?>
                <div class="footer-widget-area">
                    <?php dynamic_sidebar('footer-widget'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12"><?php echo do_shortcode('[bs_btn]'); ?></div>
        <div class="col-md-4">
            <div class="c-footer c-footer__first">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'Footer_Nav',
                        'manu_class' => 'footer_menu',
                        'container' => 'nav',
                    )
                );
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="c-footer c-footer__second">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'Footer_Nav_2',
                        'manu_class' => 'footer_menu',
                        'container' => 'nav',
                    )
                );
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="c-footer c-footer__third">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'Footer_Nav_3',
                        'manu_class' => 'footer_menu',
                        'container' => 'nav',
                    )
                );
                ?>
            </div>
        </div>
    </div>

</footer>
<!-- wp_footer is for editors -->
<?php wp_footer(); ?>
</body>

</html>