<?php

define("VIRTUE_CHILD_DIR", dirname(__FILE__));
define("MAP_API_KEY", 'AIzaSyDAGxE-Zor0Ul1bNf8bHO1ONGj6mBAJAVc');

add_action('wp_enqueue_scripts', 'virtue_child_enqueue_styles');

function virtue_child_enqueue_styles()
{
    /** SlickNav */
    wp_enqueue_script('slicknav', get_stylesheet_directory_uri() . '/assets/js/SlickNav/jquery.slicknav.min.js', array('jquery'), '', true);
    wp_enqueue_style('slicknav-css', get_stylesheet_directory_uri() . '/assets/js/SlickNav/slicknav.min.css');

    wp_enqueue_script('formstyler', get_stylesheet_directory_uri() . '/assets/js/lib/jquery.formstyler.min.js', array('jquery'), '', true);
    wp_enqueue_style('formstyler-css', get_stylesheet_directory_uri() . '/assets/js/lib/jquery.formstyler.css');

    /** Style theme */
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('virtue_child_css', get_stylesheet_directory_uri() . '/assets/css/global.css', array(), '0.0.2');

    /** Include Script */
    if (is_page('contacts')) {
        wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=' . MAP_API_KEY);
        wp_enqueue_script('maps', get_stylesheet_directory_uri() . '/assets/js/maps.js', array(), '', true);
    }
    wp_enqueue_script('theme_script', get_stylesheet_directory_uri() . '/assets/js/theme.js', array(), '', true);
    wp_enqueue_script('multi-step', get_stylesheet_directory_uri() . '/assets/js/multi-step-form.js', array('jquery'), '', true);

}

add_action('after_setup_theme', 'virtue_child_setup');
function virtue_child_setup()
{

    /** Include Load Functions */
    require_once(get_stylesheet_directory() . '/structure/functions.php');
    require_once(get_stylesheet_directory() . '/structure/shortcodes.php');
    require_once(get_stylesheet_directory() . '/structure/vendor/autoload.php');

    /** Add custom image sizes */
    if (function_exists('add_image_size')) {
        add_image_size('thumb-cat', 360, 240, true);
        add_image_size('540x360', 540, 360, true);
        add_image_size('300x200', 300, 200, true);
        add_image_size('header-cat', 1900, 350, true);
    }

}

/**
 * Include theme widgets
 */
include_once('structure/widgets/eq-categories.php');
include_once('structure/widgets/eq-sidebar-form.php');
include_once('structure/widgets/eq-widgets-area.php');

/**
 * Register widgets
 */
function virtue_child_theme_widgets()
{
    register_widget("EQ_Category_Widget");
    register_widget("EQ_SidebarForm");

}

add_action('widgets_init', 'virtue_child_theme_widgets');