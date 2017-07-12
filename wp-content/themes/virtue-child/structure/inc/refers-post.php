<?php $post = get_post($id_post); ?>
<?php if ($count == 1): ?>
    <div class="col-xs-6">
        <div class="inner-column">
            <a class="wrapper-link" href="<?= get_permalink($id_post); ?>">
                <?php if (has_post_thumbnail($id_post)) { ?>
                    <div class="entry-image">
                        <?= get_the_post_thumbnail($id_post, '540x360'); ?>
                    </div>
                <?php } ?>
                <div class="inner">
                    <h5 class="entry-title"><?= get_the_title($id_post); ?></h5>
                    <div class="entry-body"><?= wp_trim_words($post->post_content, 25); ?></div>
                    <div class="entry-meta"><i class="icon-time"></i><?= get_the_date('M d, Y', $id_post); ?></div>
                </div>
            </a>
        </div>
    </div>
<?php else:
    if ($count == 2) : ?>
        <div class="col-xs-6">
        <div class="row">
    <?php endif; //if ($count == 2)
    ?>
    <?php if ($count % 2 == 0) : ?>
    <div class="col-xs-12">
    <div class="row">
<?php endif; //if ($count % 2 == 0)
    ?>
    <div class="col-xs-6">
        <div class="inner-column">
            <a class="wrapper-link" href="<?= get_permalink($id_post); ?>">
                <?php if (has_post_thumbnail($id_post)) { ?>
                    <div class="entry-image">
                        <?= get_the_post_thumbnail($id_post, '300x200'); ?>
                    </div>
                <?php } ?>
                <div class="inner">
                    <h5 class="entry-title"><?= get_the_title($id_post); ?></h5>
                    <div class="entry-meta"><i class="icon-time"></i><?= get_the_date('M d, Y', $id_post); ?></div>
                </div>
            </a>
        </div>
    </div>
    <?php if ($count % 2 == 1) : ?>
    </div>
    </div>
<?php endif; //($count % 2 == 1 )
    ?>

    <?php if ($count == 5): ?>
    </div>
    </div>
<?php endif; //if ($count == 5)
endif;

