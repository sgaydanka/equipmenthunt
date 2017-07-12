<?php

class seoType
{

    function __construct()
    {
        add_action('init', array($this, 'register_type'));
    }

    public function register_type()
    {
        $labels = array(
            'name' => _x('SEO', 'post type general name'),
            'singular_name' => _x('SEO Content', 'post type singular name'),
            'add_new' => _x('Add SEO Content', 'book'),
            'add_new_item' => __('Add SEO Content'),
            'edit_item' => __('Edit SEO Content'),
            'new_item' => __('New SEO Content'),
            'all_items' => __('All SEO Contents'),
            'view_item' => __('View SEO Content'),
            'search_items' => __('Search SEO Content'),
            'not_found' => __('No Meme found'),
            'not_found_in_trash' => __('No Meme found in the Trash'),
            'parent_item_colon' => '',
            'menu_name' => 'SEO Content',
        );
        $args = array(
            'labels' => $labels,
            'description' => '',
            'public' => true,
            'menu_position' => 2,
            'menu_icon' => 'dashicons-welcome-view-site',
            'supports' => array('title', 'editor'),
            'has_archive' => false,
        );
        register_post_type('seo_content', $args);
    }
}
