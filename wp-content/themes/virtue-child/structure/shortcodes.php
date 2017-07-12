<?php

/* ------------------------------------------------------------- */
/* SEO Content Accordion
/* ------------------------------------------------------------- */
function getSeoContent($atts)
{
    $arg = shortcode_atts(array(
        'id' => '',
        'refers_to' => ''
    ), $atts);

    global $wpdb;
    $id = ':"' . $arg['id'] . '";';
    $refers = 'refers_to_' . $arg['refers_to'];

    $querystr = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title,$wpdb->posts.post_content
                    FROM $wpdb->posts
                    JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                    AND $wpdb->posts.post_type = 'seo_content'
                    AND $wpdb->postmeta.meta_key = '$refers'
                    AND $wpdb->postmeta.meta_value LIKE '%$id%'
                    ORDER BY $wpdb->posts.post_date DESC";

    $pageposts = $wpdb->get_results($querystr);
    $output = '<div id="accordion-list" class="panel-group">';
    $i = 0;
    if (!empty($pageposts)) {
        foreach ($pageposts as $post):
            $template = new League\Plates\Engine(VIRTUE_CHILD_DIR . '/structure/inc');
            if ($i == 0) {
                $class = 'panel-row';
            } else {
                $class = 'panel-item';
            }
            $item_class = 'group-' . $i;
            $output .= $template->render('seo-content', array(
                'id_post' => $post->ID,
                'title_post' => $post->post_title,
                'content_post' => $post->post_content,
                'class' => $class,
                'item_class' => $item_class,
            ));

            $i++;
        endforeach;
    };

    $output .= '</div>';
    return $output;
}

add_shortcode('seo_accordian', 'getSeoContent');

/* ------------------------------------------------------------------------ */
/* Shortcode Category Down Down
/* ------------------------------------------------------------------------ */

function categories_dropdown()
{
    $output = '';
    $output .= '<ul class="categories_list">';
    $output .= '<li class="first-item">Choose Category';
    $output .= '<div class="list-dromdown"><div class="row row-collapse">';

    $col_left = '';
    $col_right = '';

    $query = new WP_Query(array(
        'post_type' => 'products',
        'order' => 'DESC',
        'posts_per_page' => 12
    ));
    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
                $term = wp_get_post_terms(get_the_ID(), 'type_product')[0];
                if ($term->term_id == 12) {
                    $col_left .= '<li><a href="' . get_the_permalink(). '">' .  get_the_title(). '</a></li>';
                } else {
                    $col_right .= '<li><a href="' . get_the_permalink(). '">' .  get_the_title(). '</a></li>';
                }
        endwhile;
    endif;
    if($query->post_count > 12){
        $output .= '<li><a href="/categories/">Other</a></li>';
    }

    $output .= '<div class="col-sm-6"><ul>'. $col_left .'</ul></div>';
    $output .= '<div class="col-sm-6"><ul>'. $col_right .'<li><a href="/categories/">Other</a></li></ul></div>';
    wp_reset_postdata();
    $output .= '</div></div>';
    $output .= '</li>';
    $output .= '</ul>';

    return $output;
}

add_shortcode('category_list', 'categories_dropdown');

/* ------------------------------------------------------------- */
/* Reference posts
/* ------------------------------------------------------------- */
function getReferencePosts($atts)
{
    $arg = shortcode_atts(array(
        'id' => '',
        'refers_to' => ''
    ), $atts);

    global $wpdb;
    $count = 1;
    $id = ':"' . $arg['id'] . '";';
    $refers = 'refers_to_' . $arg['refers_to'];
    $output = '';

    $querystr = "SELECT $wpdb->posts.ID, $wpdb->posts.post_title,$wpdb->posts.post_content
                    FROM $wpdb->posts
                    JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id
                    JOIN $wpdb->term_relationships ON $wpdb->posts.ID = $wpdb->term_relationships.object_id 
                    AND $wpdb->term_relationships.term_taxonomy_id = 14 
                    AND $wpdb->posts.post_type = 'post'
                    AND $wpdb->postmeta.meta_key = '$refers'
                    AND $wpdb->postmeta.meta_value LIKE '%$id%'
                    ORDER BY $wpdb->posts.post_date DESC
                    LIMIT 5";

    $pageposts = $wpdb->get_results($querystr);
    if (!empty($pageposts)) {
        foreach ($pageposts as $post):
            $template = new League\Plates\Engine(VIRTUE_CHILD_DIR . '/structure/inc');
            $output .= $template->render('refers-post', array(
                'id_post' => $post->ID,
                'count' => $count
            ));
            $count++;
        endforeach;
    };
    return $output;
}

add_shortcode('reference_posts', 'getReferencePosts');