<div id="sidebar_prime" class="sidebar">
    <?php if(is_active_sidebar('my_sidebar')):?>
    <?php dynamic_sidebar('my_sidebar');?>
    <?php else:?>
        <h5>Ha! no sidebar here.</h5>
    <?php endif;?>
</div>