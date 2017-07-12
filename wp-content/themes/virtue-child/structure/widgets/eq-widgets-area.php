<?php
/**
 * /* Widget Areas
 */
function virtue_child_widgets_init()
{
    // Main Page SubFooter Widgets
    register_sidebar(array(
        'name' => __('Section Info First', 'virtue_child'),
        'id' => 'section-info-first',
        'description' => __('These are widgets for the information on Front Page.', 'virtue_child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Section Info Second', 'virtue_child'),
        'id' => 'section-info-second',
        'description' => __('These are widgets for the information on Front Page.', 'virtue_child'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

add_action('widgets_init', 'virtue_child_widgets_init');