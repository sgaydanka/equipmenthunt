<div id='product' class="inner-wrapper">
    <?php if (have_posts()) :
    while (have_posts()) :
    the_post();
    $id_post = get_the_ID();
    setPostViews($id_post); ?>
    <header class="header-product">
        <div class="category-banner">
            <div class="container">
                <div class="breadcrumbs">
                    <span class="home"><a rel="home" href="/">Home <i class="icon icon-double-angle-right"></i></a></span>
                    <span class="term"><?php the_terms($id_post, 'type_product'); ?></span>
                    <span class="term"><i class="icon icon-double-angle-right"></i><?php the_title(); ?></span>
                </div>
            </div>
        </div>
        <section id="<?php the_ID(); ?>" class="product-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-info">
                        <div class="action-buy"><h3>Share Requirements and Get Quotes:</h3></div>
                        <div class="describe">
                            <div class="excerpt"><?php the_content(); ?></div>
                            <div class="thumbnail-image">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                }; ?>
                            </div>
                        </div>
                    </div>
                    <div class="section-form col-sm-6 col-form">
                        <div id="order-form">
                            <h1 class="product-title"><?php the_title(); ?></h1>

                            <?php
                            $form = get_field('shortcode_form',get_the_ID());
                            echo do_shortcode($form);
                            ?>
                            
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <section class="content-product">
        <div class="container">
            <section class="section-how-it-works section-inner">
                <h3 class="hometitle">How It Works</h3>

                <div class="row">
                    <?php get_template_part('structure/inc/home-part/how-it-works'); ?>
                </div>
            </section><!-- .section-how-it-works -->

            <section class="section-list-refers-post">
                <h3 class="title-section"><span>Related news & advice</span></h3>
                <div class="row">
                    <?php echo do_shortcode("[reference_posts id = $id_post  refers_to = 'product']"); ?>
                </div>
            </section><!-- .section-list-refers-post -->
        </div>
        <section id='sep-accordion' class="section-sep-accordion shadow-bottom">
            <div class="container">
                <?php echo do_shortcode("[seo_accordian id = $id_post  refers_to = 'product']"); ?>
            </div>
        </section><!-- .section-sep-accordion -->
    </section>

</div>
<?php endwhile;
endif; ?>
