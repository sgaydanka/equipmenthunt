<?php

class productType
{

    function __construct()
    {
        add_action('init', array($this, 'register_type'));
        add_action('init', array($this, 'register_taxonomy'));
    }

    public function register_type()
    {
        $labels = array(
            'name' => _x('Products', 'post type general name'),
            'singular_name' => _x('Products', 'post type singular name'),
            'add_new' => _x('Add Product', 'book'),
            'add_new_item' => __('Add Product'),
            'edit_item' => __('Edit Product'),
            'new_item' => __('New Product'),
            'all_items' => __('All Products'),
            'view_item' => __('View Product'),
            'search_items' => __('Search Products'),
            'not_found' => __('No Meme found'),
            'not_found_in_trash' => __('No Meme found in the Trash'),
            'parent_item_colon' => '',
            'menu_name' => 'Products',
        );
        $args = array(
            'labels' => $labels,
            'description' => '',
            'public' => true,
            'menu_position' => 2,
            'menu_icon' => 'dashicons-screenoptions',
            'supports' => array('title', 'editor', 'thumbnail'),
            'taxonomies' => array('type_product'),
            'has_archive' => true,
        );
        register_post_type('products', $args);
    }

    public function register_taxonomy()
    {
        $labels = array(
            'name' => _x('Product Categories', 'taxonomy general name'),
            'singular_name' => _x('Categories', 'taxonomy singular name'),
            'search_items' => __('Search Categories'),
            'all_items' => __('All Categories'),
            'parent_item' => __('Parent Category'),
            'parent_item_colon' => __('Parent Category:'),
            'edit_item' => __('Edit Category'),
            'update_item' => __('Update Category'),
            'add_new_item' => __('Add New Category'),
            'new_item_name' => __('New Category Name'),
            'menu_name' => __('Product Categories'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'products'),
        );

        register_taxonomy('type_product', array('products'), $args);
    }
}

