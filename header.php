<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chicago Tourism</title>
    <?php wp_head(); ?>
    <!-- my code here -->
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('style.css'); ?>">
    <!-- bootstrap icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php if (is_active_sidebar('header-widget')) : ?>
        <div class="header-widget-area">
            <?php dynamic_sidebar('header-widget'); ?>
        </div>

    <?php endif; ?>
    <header>
        <div class="container p-1">
        <div class="row c-contact d-flex align-items-center">
    <div class="main-nav d-flex align-items-center justify-content-between w-100">
       
        <a href="<?php echo home_url(); ?>" class="text-white me-3">
            <h6>Chicago Tourism <?php tel_from_admin(); ?></h6>
        </a>

    
        <ul class="c-chicago-custom">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'c-chicago-custom',
            ));
            ?>
        </ul>

        <div class="social-media d-flex align-items-center me-3">
            <?php
            $columns = [
                "Woodworks" => [
                    "url" => "https://dev-chen0969.pantheonsite.io/",
                    "class" => "bi bi-wordpress text-white"
                ],
                "Instagram" => [
                    "url" => "https://www.instagram.com/",
                    "class" => "bi bi-instagram text-white"
                ],
                "Facebook" => [
                    "url" => "https://www.facebook.com/",
                    "class" => "bi bi-facebook text-white"
                ],
                "LinkedIn" => [
                    "url" => "https://www.linkedin.com/",
                    "class" => "bi bi-linkedin text-white"
                ]
            ];

            foreach ($columns as $label => $data) {
                if (is_array($data)) {
                    echo "<div class='me-3'><a href='{$data['url']}' class='text-white'><i class='{$data['class']}'></i></a></div>";
                }
            }
            ?>
        </div>

        <div class="search-time d-flex align-items-center">
            <h5 class="text-end me-3"><?php get_search_form(); ?></h5>
            <h5><?php the_time(); ?></h5>
        </div>
    </div>
</div>
</div>
    </header>