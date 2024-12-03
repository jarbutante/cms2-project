<?php get_header();?>
<p>your search result:</p>
<div class="search-results">
    <h3>Search Results for: <?php echo get_search_query(); ?></h3>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="search-result-item">
            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
            <p class="post-date"><?php the_time('F j, Y'); ?></p>
        </div>
    <?php endwhile; else : ?>
        <p>No results found for your search.</p>
    <?php endif; ?>
</div>
<?php get_footer();?>