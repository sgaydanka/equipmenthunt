<?php
/** Template Name: Customizable Categories */

get_header();
$categories = get_list_categories(); ?>

<div id="content" class="categoriescontent">
    <div class="main" role="main">
        <div class="container entry-content">
            <div class="section-list-category">
                <?php foreach ($categories as $term) : ?>
                    <h1 class="title-section category-title"><span><i
                                    class="icon icon-tags"></i><?php echo $term->name; ?></span></h1>
                    <div class="row">
                        <?php $query = new WP_Query(array(
                            'post_type' => 'products',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'type_product',
                                    'field' => 'slug',
                                    'terms' => $term->slug
                                ),
                            ),
                            'order' => 'DESC',
                            'posts_per_page' => 6
                        ));

                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                                $icon = get_field('product_icon', get_the_ID()); ?>
                                <div class="wp_column col-sm-3">
                                    <div class="inner-column">
                                        <a class="tag-link" href="<?php echo get_permalink(get_the_ID()); ?>">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <img class="product_icon" src="<?php echo $icon['url']; ?>">
                                            <?php } ?>
                                            <h4><?php the_title(); ?></h4>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                    <a href="/products/<?php echo $term->slug; ?>" class="btn-main btn-trans">More Details</a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
