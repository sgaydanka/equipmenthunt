<?php
$wp_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'cat' => 2,
));

while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    <div class="wp_column col-sm-4">
        <div class="inner-column">
            <div class="wrapper-col">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="entry-image">
                        <?php the_post_thumbnail('thumb'); ?>
                    </div>
                <?php } ?>
                <div class="entry-wrap">
                    <h5><?php the_title(); ?></h5>

                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile;
wp_reset_query(); ?>
