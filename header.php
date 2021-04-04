<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <?php if ( is_single() && comments_open() ): ?>

        <?php wp_enqueue_script('comment-reply'); ?>
        
    <?php endif ?>
</head>
<body <?php body_class(); ?>>

    
    <?php 

        $options = get_theme_mod('slan_settings');


        // Facebook url
        if ( ! empty($options['top_header_facebook_link']) ) {
            $facebook_url = $options['top_header_facebook_link'];
        }

        // Twitter url
        if ( ! empty($options['top_header_twitter_link']) ) {
            $twitter_url = $options['top_header_twitter_link'];
        }

        // Instagram url
        if ( ! empty($options['top_header_instagram_link']) ) {
            $instagram_url = $options['top_header_instagram_link'];
        }

        // Logo
        if ( ! empty($options['logo']) ) {
            $logo = $options['logo'];
        } else{
            $logo = IMAGES . '/logoslanhotel.jpg';
        }


     ?>


<header>
    <div class="header-inner">
        <div class="top-bar">
            <div class="container">
                <ul class="social-top-bar">
                    <?php if ( isset($facebook_url) ): ?>
                        <li>
                            <a href="<?php echo esc_url($facebook_url); ?>" class="text-black">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if ( isset($twitter_url) ): ?>
                        <li>
                            <a href="<?php echo esc_url($twitter_url); ?>">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if ( isset($instagram_url) ): ?>
                        <li>
                            <a href="<?php echo esc_url($instagram_url); ?>">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <div class="logo-container">
            <a href="#">
                <h1 class="d-none"><?php bloginfo('name'); ?></h1>
                <img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <nav class="main-menu-container">
            <div class="container">
                <?php wp_nav_menu(array(

                    'theme_location' => 'main-menu',
                    'menu_class' => 'main-menu',
                    'menu_id' => 'mainMenu'

                )); ?>


                <?php // get_search_form(); ?>

                <a href="#" class="mobile-menu-button" id="mobileMenuButton">
                    <?php _e('MENÚ PRINCIPAL', 'slan') ?> <i class="fas fa-bars"></i>
                </a>
            </div>
        </nav>
    </div>
</header>