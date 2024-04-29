<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<!-- 	<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="60b5dcf3-2b2d-4186-9300-132a2fd7707a" data-blockingmode="auto" type="text/javascript"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/vendor/slick/slick-theme.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript"
            src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/vendor/slick.min.js"></script>
<!--    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>-->

    <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div class="container-fluid">
    <header>
        <div class="nav-container">
            <div class="header-top-container">
                <div class="container">
                    <div class="row header-top">
                        <div class="col-lg-4 col-xl-3">
                            <p class="info-mail"><a href="mailto:<?php echo get_field('contact_information','option')['e-mail'] ?>"><?php echo get_field('contact_information','option')['e-mail'] ?></a><span class="phone-dot"><a
                                            href="tel:<?php echo str_replace(' - ','',get_field('contact_information','option')['phone'] ) ?>"><?php echo get_field('contact_information','option')['phone'] ?></a></span>
                            </p></div>
                        <div class="col-lg-8 col-xl-9 text-end ">
                            <nav id="top-navigation" class="top-navigation" role="navigation">
                                <?php
                                $args = [
                                    'theme_location' => 'secondary-menu'
                                ];
                                wp_nav_menu($args);
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container header-middle-container">
                <?php
                $site_logo_id = get_theme_mod('custom_logo');
                $site_logo = wp_get_attachment_image_src($site_logo_id, 'full');
                ?>
                <div class="logo-container ">
                    <a href="/"><img src="<?php echo esc_url($site_logo[0]) ?>"
                                     alt="<?php echo get_bloginfo('name') ?>"></a>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    $args = [
                        'theme_location' => 'main-menu'
                    ];
                    wp_nav_menu($args);
                    ?>
                </nav>
                <div class="text-end"><a class="btn btn-header" href="<?php echo esc_url(site_url('/contact/gratis-adviesgesprek', 'https')); ?>"><?php echo __('Persoonlijk advies', ' peetersduurzaam'); ?></a></div>
            </div>
        </div>
    </header>
    <div class="mobile-nav-container">
        <div class="header-top-container">
            <div class="container">
                <div class="d-flex justify-content-between header-top">
					<p class="info-mail"><a href="mailto:info@peetersduurzaam.nl">info@peetersduurzaam.nl</a></p><span class="phone-dot"><a href="tel:0495230032">0495 - 230 032</a></span>
                </div>
                <div class="header-middle-container d-flex justify-content-between">
                    <?php
                    $site_logo_id = get_theme_mod('custom_logo');
                    $site_logo = wp_get_attachment_image_src($site_logo_id, 'full');
                    ?>
                    <div class="logo-container ">
                        <a href="/"><img src="<?php echo esc_url($site_logo[0]) ?>"
                                         alt="<?php echo get_bloginfo('name') ?>"></a>
                    </div>
                    <div class="mobile-menu-button-container d-flex align-items-center ">
                        <div class="hamburger-menu d-flex align-items-center justify-content-between">

                            <input type="checkbox" id="checkbox3" class="checkbox3 visuallyHidden">
                            <label class="d-flex justify-content-between" for="checkbox3">
                                <span class="menu-name">
                                </span>

                                <div class="hamburger hamburger3">
                                    <span class="bar bar1"></span>
                                    <span class="bar bar2"></span>
                                    <span class="bar bar3"></span>
                                    <span class="bar bar4"></span>
                                </div>
                            </label>
                            <div class="mobile-all-navs">
                                <div class="mobile-main-nav">
                                    <nav id="mobile-site-navigation" class="mobile-main-navigation" role="navigation">
                                        <?php

                                        wp_nav_menu([
                                            'theme_location' => 'main-menu'
                                        ]);
                                        ?>
                                    </nav>
                                </div>
                                <div class="mobile-sec-nav">
                                    <nav id="mobile-sec-navigation" class="mobile-sec-navigation" role="navigation">
                                        <?php

                                        wp_nav_menu([
                                            'theme_location' => 'secondary-menu'
                                        ]);
                                        ?>
                                    </nav>
                                </div>
                                <div><a class="w-100 btn btn-header" href="<?php echo esc_url(site_url('/contact/gratis-adviesgesprek', 'https')); ?>">Gratis adviesgesprek</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector('body');
    const menuToggle = document.querySelector('.visuallyHidden');
	
    function toggleOverflow() {

        if (menuToggle.checked) {
            body.classList.add('mobile-active');
        } else {
            body.classList.remove('mobile-active');
        }
    }

    menuToggle.addEventListener('change', toggleOverflow);

    toggleOverflow();
});

</script>