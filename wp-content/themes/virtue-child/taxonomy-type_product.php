<?php $taxonomy = get_queried_object();
$image = get_option('z_taxonomy_image' . $taxonomy->term_id); ?>
<header class="term-header" style="background-image: url('<?php echo $image; ?>')">
    <div class="header-inner">
        <h1><?= $taxonomy->name; ?></h1>
        <?php if ($taxonomy->description != ''): ?>
            <div class="description"><?= $taxonomy->description; ?></div>
        <?php endif; ?>
    </div>
</header>

<section class="section-how-it-works shadow-bottom section-inner">
    <div class="container">
        <h3 class="hometitle">How It Works</h3>

        <div class="row">
            <?php get_template_part('structure/inc/home-part/how-it-works'); ?>
        </div>
    </div>
</section><!-- .section-how-it-works -->

<section class="section-product-list">
    <div class="container">
        <div class="row">
            <h3 class="hometitle"><?= $taxonomy->name; ?></h3>
            <?php if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part('structure/inc/product/product-format');
                endwhile;
            endif; ?>
        </div>
    </div>
</section><!-- .section-product-list -->

<section class="section-list-refers-post">
    <div class="container">
        <h3 class="title-section"><span><i class="icon icon-fire"></i>Related news & advice</span></h3>

        <div class="row">
            <?php echo do_shortcode("[reference_posts id =  $taxonomy->term_id  refers_to = 'category']"); ?>
        </div>
    </div>
</section><!-- .section-list-refers-post -->

<section id='sep-accordion' class="section-sep-accordion shadow-bottom">
    <div class="container">
        <?php echo do_shortcode("[seo_accordian id = $taxonomy->term_id refers_to = 'category']"); ?>
    </div>
</section><!-- .section-sep-accordion -->