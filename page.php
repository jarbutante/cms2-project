<?php get_header(); ?>
<main id="main-content" class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        // Render Elementor or WP content
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content(); // This is required for Elementor to work properly
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- side bar -->
        <div class="col-md-2">
            <?php get_sidebar('my_sidebar'); ?>
        </div>
    </div>
</main>
<?php echo do_shortcode('[button_shortcode button_name="changed"]');?>
<?php get_footer(); ?>