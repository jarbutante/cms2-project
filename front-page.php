<?php get_header(); ?>
<main id="main-content" class="container">
    <div class="row">
        <!-- main content -->
        <div class="col-md-10">
            <div class="contaier">
                <div class="row">
                    <!-- hero banner -->
                    <div class="col-md-12">
                        <div>
                            <?php get_template_part('template-parts/part', 'hero'); ?>
                        </div>
                    </div>
                    <!-- bp cards -->
                    <div class="section-1"> 
                    <div class="col-md-12">
                        <div class="row">
                        <h2>Plan Your Chicago Adventure</h2>
                            <?php
                            $args = array(
                                'posts_per_page' => 6,
                                'post_type'      => 'post'
                            );
                            $latest_posts = new WP_Query($args);

                            if ($latest_posts->have_posts()) :
                                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                                    <div class="col-md-4 mt-4 mb-4">
                                        <div class="card custom-card c-card">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo mb_strimwidth( get_the_title(), 0, 100, '...' ); ?></h5>
                                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></p> </br>
                                                <a href="<?php the_permalink(); ?>" class="c-card__btn">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                    </div>

                    <!-- main content -->
                    
                    <div class="col-md-12">
                        <?php
                        // Render Elementor or WP content
                        if (have_posts()) :
                            while (have_posts()) : the_post();
                                the_content();
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
<?php get_template_part('template-parts/part', 'carousel'); ?>
<?php get_footer(); ?>