<div class="wp_column col-sm-4 product-format">
    <div class="inner-column">
        <a class="tag-link" href="<?php echo get_permalink(get_the_ID()); ?>">
            <?php if (has_post_thumbnail()) { ?>
                <div class="product_image">
                    <?php the_post_thumbnail(array(600,600)); ?>
                </div>
            <?php } ?>
            <h4><?php the_title(); ?></h4>
        </a>
    </div>
</div>