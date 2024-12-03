<?php get_header(); ?>

<div class="container">
    <?php
    if (have_posts()): while (have_posts()): the_post();
    ?>

            <div class="row g-2">
                <h5><?php the_category('|'); ?></h5>
                <h3 class="col-12"><?php the_title(); ?></h3>
                <p class="col-12"><?php the_content(); ?></p>
                <div class="col-6 text-center"><?php previous_post_link('< %link'); ?></div>
                <div class="col-6 text-center"><?php next_post_link('%link >'); ?></div>
            </div>
            <div class="row">
                <div class="col-12"> <?php comments_popup_link('no comments'); ?></div>
            </div>

    <?php
        endwhile;
    endif;
    ?>
</div>
<?php get_footer(); ?>