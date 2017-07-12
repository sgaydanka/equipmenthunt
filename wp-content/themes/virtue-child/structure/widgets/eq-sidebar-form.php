<?php

/**
 * Products Category List
 */
class EQ_SidebarForm extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'eq_sidebarform_widget',

            __('EQ Sidebar Form', 'eq_sidebarform_widget_domain'),

            array('description' => __('EQ Sidebar Form', 'eq_sidebarform_widget_domain'),)
        );
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        get_template_part('structure/inc/sidebar-form');

        echo $args['after_widget'];
    }

}