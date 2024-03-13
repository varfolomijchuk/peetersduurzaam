<?php
add_theme_support('menus');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
function gettemplates_to_enqueue_styles()
{
    wp_enqueue_style('stylesheet', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
//    wp_enqueue_style('custom-styles', get_stylesheet_directory_uri() . '/dist/css/app.css', [], time(), 'all');
    //wp_enqueue_style( 'owl-style-min', get_stylesheet_directory_uri() . '/assets/owlcarousel/assets/owl.carousel.min.css' );
    //wp_enqueue_style( 'owl-style-def', get_stylesheet_directory_uri() . '/assets/owlcarousel/assets/owl.theme.default.min.css' );

    wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/front.js', array(), null, true);
    wp_localize_script( 'script-name', 'ajax_object',
        [
            'ajaxurl' => admin_url( 'admin-ajax.php' )
        ]

    );
}
add_action('wp_enqueue_scripts', 'gettemplates_to_enqueue_styles');

function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main menu'),
            'secondary-menu' => __('Secondary menu'),
            'sidemenu-primary' => __('Sidemenu primary'),
            'sidemenu-secondary' => __('Sidemenu secondary'),
            'footer-menu-1' => __('Footer menu 1'),
            'footer-menu-2' => __('Footer menu 2'),
            'footer-menu-3' => __('Footer menu 3'),
            'footer-menu-4' => __('Footer menu 4'),
            'footer-copyright-menu' => __('Footer copyright menu')
        )
    );
}
add_action('init', 'register_my_menus');

function register_acf_blocks()
{

    register_block_type(__DIR__ . '/blocks/icon-box');
    register_block_type(__DIR__ . '/blocks/products-overview');
    register_block_type(__DIR__ . '/blocks/mega-block');
    register_block_type(__DIR__ . '/blocks/image-carousel');
    register_block_type(__DIR__ . '/blocks/logo-carousel');
    register_block_type(__DIR__ . '/blocks/cpt-carousel');
    register_block_type(__DIR__ . '/blocks/reviews-carousel');
    register_block_type(__DIR__ . '/blocks/google-reviews-carousel');
    register_block_type(__DIR__ . '/blocks/contact-form-advanced');
    register_block_type(__DIR__ . '/blocks/faq');
    register_block_type(__DIR__ . '/blocks/projects-with-testimonial');
    register_block_type(__DIR__ . '/blocks/numbered-slider');
    register_block_type(__DIR__ . '/blocks/media-wide');
    register_block_type(__DIR__ . '/blocks/single-item-slider');
    register_block_type(__DIR__ . '/blocks/profiles');
    register_block_type(__DIR__ . '/blocks/text-carousel');
    register_block_type(__DIR__ . '/blocks/partners');
    register_block_type(__DIR__ . '/blocks/vacancy-overview');
    register_block_type(__DIR__ . '/blocks/free-consultation');
    register_block_type(__DIR__ . '/blocks/icon-btns-horizontal');
}
add_action('init', 'register_acf_blocks');

// Change post URLs
add_filter(
    'register_post_type_args',
    function ($args, $post_type) {
        if ($post_type !== 'post') {
            return $args;
        }

        $args['rewrite'] = [
            'slug' => 'blog',
            'with_front' => true,
        ];

        return $args;
    },
    10,
    2
);

// Add preloader if need
add_filter('the_content', function ($content) {
    if (preg_match('#calendly\-inline\-widget#', $content)) {
        $content .= '<div class="full-preloader"><div class="lds-dual-ring"></div></div>';
    }
    return $content;
});

// Manage 'control' attr in link
function manage_youtube_link($link)
{
    if (preg_match('#controls=#', $link)) $link = preg_replace('#controls=\d#Umis', 'controls=2', $link);
    else $link .= '&amp;controls=2';
    return $link;
}
function show_template($file, $args = null, $default_folder = 'parts')
{
    echo return_template($file, $args, $default_folder);
}
function return_template($file, $args = null, $default_folder = 'parts')
{
    $file = $default_folder . '/' . $file . '.php';
    if ($args) {
        extract($args);
    }
    if (locate_template($file)) {
        ob_start();
        include(locate_template($file)); //Theme Check free. Child themes support.
        $template_content = ob_get_clean();

        return $template_content;
    }

    return '';
}

function projects_load()
{
    $response = [
        'html' => '',
        'loadMore' => '',
        'postsAvailable' => '',
        'perPage' => '',
    ];

    $cat = isset($_POST['cat']) ? $_POST['cat'] : '';
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $paged = isset($_POST['paged']) ? $_POST['paged'] : '';
    $load_more = isset($_POST['loadMore']) ? $_POST['loadMore'] : '';
    $per_page = 3;
    $args = [
        'post_type' => 'projecten',
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'paged' => $paged,
    ];

    if ($cat && $cat !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $cat
            ]
        ];
    };

    if ($type === 'all' ) {
        $args['meta_query'] = [
            [
                'key' => 'project_features_client_type',
                'compare' => 'EXISTS'
            ]
        ];
    } else {
        $args['meta_query'] = [
            [
                'key' => 'project_features_client_type',
                'value' => $type,
                'compare' => '=',
            ]
        ];
    }

    $projecten = new WP_Query($args);
    if ($load_more === 'true') {
        $response['loadMore'] =  true;
    } else {
        $response['loadMore'] =  false;
    }

    if ($projecten->have_posts()) :
        while ($projecten->have_posts()) :
            $projecten->the_post();
            $response['html'] .=  return_template('loop-projecten');
        endwhile;
    endif;
    wp_reset_query();

    $response['loadMore'];
    $response['postsAvailable'] = $projecten->found_posts;
    $response['perPage'] = $per_page;

    wp_send_json($response);
}

add_action('wp_ajax_projects_load', 'projects_load');
add_action('wp_ajax_nopriv_projects_load', 'projects_load');

function posts_load()
{
    $response = [
        'html' => '',
        'loadMore' => '',
        'postsAvailable' => '',
        'perPage' => '',
    ];

    $cat = isset($_POST['cat']) ? $_POST['cat'] : '';
    $paged = isset($_POST['paged']) ? $_POST['paged'] : '';
    $load_more = isset($_POST['loadMore']) ? $_POST['loadMore'] : '';
    $year = isset($_POST['year']) ? $_POST['year'] : '';
    $per_page = $load_more === 'true' ? 3 : 9;
    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'order'       => 'DESC',
        'posts_per_page' => $per_page,
        'paged' => $paged,
    ];


    if ($cat && $cat !== 'all') {
        $args['category_name'] = $cat;
    };

    if ($year && $year !== 'all') {
        $args['date_query'] = [
            [
                'year' => $year,
            ]
        ];
    }

    $posts = new WP_Query($args);
    if ($load_more === 'true') {
        $response['loadMore'] =  true;
    } else {
        $response['loadMore'] =  false;
    }

    if ($posts->have_posts()) :
        while ($posts->have_posts()) :
            $posts->the_post();
            $response['html'] .=  return_template('loop-posts');
        endwhile;
    endif;
    wp_reset_query();

    $response['loadMore'];
    $response['postsAvailable'] = $posts->found_posts;
    $response['perPage'] = $per_page;

    wp_send_json($response);
}

add_action('wp_ajax_posts_load', 'posts_load');
add_action('wp_ajax_nopriv_posts_load', 'posts_load');



