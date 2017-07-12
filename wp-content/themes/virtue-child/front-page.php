<?php global $virtue;
if (isset($virtue['mobile_switch'])) {
    $mobile_slider = $virtue['mobile_switch'];
} else {
    $mobile_slider = '0';
}
if (isset($virtue['choose_slider'])) {
    $slider = $virtue['choose_slider'];
} else {
    $slider = 'mock_flex';
}
if ($mobile_slider == '1') {
    $mslider = $virtue['choose_mobile_slider'];
    if ($mslider == "flex") {
        get_template_part('templates/mobile_home/mobileflex', 'slider');
    } else if ($mslider == "video") {
        get_template_part('templates/mobile_home/mobilevideo', 'block');
    }
}
if ($slider == "flex") {
    get_template_part('templates/home/flex', 'slider');
} else if ($slider == "thumbs") {
    get_template_part('templates/home/thumb', 'slider');
} else if ($slider == "fullwidth") {
    get_template_part('templates/home/flex', 'slider-fullwidth');
} else if ($slider == "latest") {
    get_template_part('templates/home/latest', 'slider');
} else if ($slider == "carousel") {
    get_template_part('templates/home/carousel', 'slider');
} else if ($slider == "video") {
    get_template_part('templates/home/video', 'block');
} else if ($slider == "mock_flex") {
    get_template_part('templates/home/mock', 'flex');
}
?>

<div id="content" class="homepagecontent">

    <div class="main" role="main">
        <div class="entry-content">

            <?php if (isset($virtue['homepage_layout']['enabled'])) {
                $layout = $virtue['homepage_layout']['enabled'];
            }; ?>

            <div class="container section section-how-it-works">
                <h3 class="hometitle">How It Works</h3>

                <div class="row">
                    <?php get_template_part('structure/inc/home-part/how-it-works'); ?>
                </div>
            </div><!-- .section-how-it-works -->

            <div class="section section-popular-products">
                <div class="container">
                    <h3 class="hometitle">Popular Products</h3>

                    <div class="row">
                        <?php $query = new WP_Query(array(
                            'post_type' => 'products',
                            'meta_key' => 'product_views_count',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                            'posts_per_page' => 6
                        ));
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                get_template_part('structure/inc/product/product-format');
                            endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                    <a href="/categories" class="btn-main btn-trans">See more categories</a>
                </div>
            </div><!-- .section-how-it-works -->

            <div class="section section-info">
                <div class="container">
                    <?php if (is_active_sidebar('section-info-first')) : ?>
                        <?php dynamic_sidebar('section-info-first'); ?>
                        <?php echo do_shortcode('[category_list]'); ?>
                    <?php endif; ?>
                </div>
            </div><!-- .section-info -->

            <div class="section section-full-width">
                <div class="container">
                    <?php if (is_active_sidebar('section-info-second')) : ?>
                        <?php dynamic_sidebar('section-info-second'); ?>
                    <?php endif; ?>
                </div>
            </div><!-- .section-full-width -->

        </div><!-- /.main -->