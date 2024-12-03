<?php // wp_enqueue_style is a function that allows you to add a stylesheet to your WordPress site
function primary_stylesheet()
{
    wp_enqueue_style(
        'chicago_tourism_stylesheet', //name of your stylesheet
        get_stylesheet_uri(), //use to get the URL of the current theme's stylesheet
        array(), //depedencies, none here
        wp_get_theme()->get('version'), //used for cache busting
        'all' //media type, 'all' is the most common value, it means that the stylesheet is applicable to all media types
    );
}
// Add_action is a hook that allows you to add a function to a specific point in the execution of WordPress
add_action('wp_enqueue_scripts', 'primary_stylesheet', 5);

function load_bootstrap()
{
    wp_enqueue_style(
        'bootstrap-css',
        get_theme_file_uri('assets/media/bootstrap-5.3.3-dist/css/bootstrap.min.css')
    );
    wp_enqueue_script(
        'bootstrap-js',
        get_theme_file_uri('assets/media/bootstrap-5.3.3-dist/js/bootstrap.js'),
        array('jquery'),
        '',
        true
    );
}
add_action('wp_enqueue_scripts', 'load_bootstrap');

// carousel function
function load_carousel()
{
    wp_enqueue_script(
        'carousel-js',
        get_theme_file_uri('assets/media/front-carousel.js'),
        array('jquery'),
        '',
        true
    );
}
add_action('wp_enqueue_scripts', 'load_carousel');


// footer functions
function reg_menus()
{
    register_nav_menus(
        array(
            'Footer_Nav' => __('footer nav'),
            'Footer_Nav_2' => __('footer nav 2'),
            'Footer_Nav_3' => __('footer nav 3'),
        )
    );
};
add_action('init', 'reg_menus');

// sidebar function
function new_sidebar()
{
    register_sidebar(
        array(
            'id' => 'my_sidebar',
            'name' => 'new_sidebar',
            'description' => 'See! new sidebar!',
            'before_widget' => '<div id="%1$s" class="widget-%2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget_title">',
            'after_title' => '</h3>'
        )
    );
};
add_action('widgets_init', 'new_sidebar');

// header widget
function chicagoT_header_widget()
{
    register_sidebar(array(
        'name'          => __('Header', 'mytheme'),
        'id'            => 'header-widget',
        'description'   => __('A widget area displayed at the topmost part of the header.', 'mytheme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'chicagoT_header_widget');

// footer widget 
function chicagoT_footer_widget()
{
    register_sidebar(array(
        'name'          => __('Footer', 'mytheme'),
        'id'            => 'footer-widget',
        'description'   => __('A widget area displayed at the topmost part of the footer.', 'mytheme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'chicagoT_footer_widget');

// contact shortcode
function contact_us($atts, $content)
{
    $named_atts = shortcode_atts(
        array(
            'link' => 'https://google.com',
            'button_name' => 'this is test shrt code',
            'class' => ''
        ),
        $atts,
        'button_shortcode'
    );
    $content = '<a target="_blank" class="' . $named_atts['class'] . '" href="' . $named_atts['link'] . '">' . $named_atts['button_name'] . '</a>';
    return $content;
}
add_shortcode('button_shortcode', 'contact_us');

// bs shortcode
function bootstrap_btn($atts, $content)
{
    $named_atts = shortcode_atts(
        array(
            'link' => 'https://getbootstrap.com/',
            'button_name' => 'Go find how we made this web!',
            'class' => ''
        ),
        $atts,
        'bs-btn'
    );
    $content = '<a target="_blank" class="btn btn-primary m-t3 mb-3' . $named_atts['class'] . '" href="' . $named_atts['link'] . '">' . $named_atts['button_name'] . '</a>';
    return $content;
}
add_shortcode('bs_btn', 'bootstrap_btn');

// tel settings

function admin_add_tel_page()
{
    add_options_page(
        'Contact Settings',
        'Contact Settings',
        'manage_options',
        'contact-settings',
        'mytheme_render_settings_page'
    );
}
add_action('admin_menu', 'admin_add_tel_page');

// Render the settings page
function mytheme_render_settings_page()
{
?>
    <div class="wrap">
        <h1>Contact Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('contact_settings_group');
            do_settings_sections('contact-settings');
            submit_button();
            ?>
        </form>
    </div>
<?php
}

// Register the settings
function mytheme_register_settings()
{
    register_setting('contact_settings_group', 'contact_tel_number');

    add_settings_section(
        'contact_settings_section',
        'Contact Information',
        null,
        'contact-settings'
    );

    add_settings_field(
        'contact_tel_field',
        'Telephone Number',
        'mytheme_render_tel_field',
        'contact-settings',
        'contact_settings_section'
    );
}
add_action('admin_init', 'mytheme_register_settings');

// Render the telephone input field
function tel_from_admin()
{
    $tel = get_option('contact_tel_number', '');
    echo esc_attr($tel);
}
