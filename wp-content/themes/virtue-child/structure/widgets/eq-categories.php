<?php
/**
 * Products Category List
 */
class EQ_Category_Widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'prodcats_widget',

            __('Product Categories', 'prodcats_widget_domain'),

            array('description' => __('A list of product categories.', 'prodcats_widget_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        $categories = get_list_categories();

        foreach ($categories as $cat) {
            echo '<li><a href="' . esc_url(get_category_link($cat->term_id)) . '">' . $cat->name . '</a></li>';
        }

        echo $args['after_widget'];
    }


    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Title', 'wpb_widget_domain');
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}