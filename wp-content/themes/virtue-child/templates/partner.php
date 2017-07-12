<?php

/** Template Name: Partners Page */

get_header(); ?>

<div id="content" class="categoriescontent">
    <div class="main" role="main">
        <div class="entry-content">
            <?php while (have_posts()):
                the_post(); ?>
                <div class="page-header" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
                    <div class="container">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <div class="section section-form">
                    <div class="container">
                        <?php $content = get_field('details', get_the_ID());
                        if ($content) {
                            echo $content;
                        }; ?>
                    </div>
                </div>

                <div class="section section-how-it-works">
                    <div class="container">
                        <h2>How It Works</h2>
                        <div class="row">
                            <?php $count = 0;
                            while ($count < 3):
                                $count++;
                                $icon = get_field('icon_' . $count, get_the_ID());
                                $title = get_field('title_' . $count, get_the_ID());
                                $description = get_field('description_' . $count, get_the_ID()); ?>
                                <div class="wp_column col-sm-4">
                                    <div class="inner-column">
                                        <div class="wrapper-col">
                                            <div class="entry-image">
                                                <img src="<?php echo $icon['url']; ?>">
                                            </div>
                                            <div class="entry-wrap">
                                                <h5><?php echo $title ?></h5>

                                                <div class="entry-content">
                                                    <?php echo $description; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <a href="#" class="btn-main btn-trans">GET IT TOUCH</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
