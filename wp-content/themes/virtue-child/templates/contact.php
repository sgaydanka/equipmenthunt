<?php

/** Template Name: Contact Page */

get_header(); ?>

<div id="content" class="categoriescontent">
    <div class="main" role="main">
        <div class="container entry-content">
            <?php while (have_posts()): the_post(); ?>
                <div class="page-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </div>
                <div class="row">
                    <div class="col-sm-5 contact-info">
                        <?php the_content(); ?>
                    </div>
                    <div class="col-sm-7 contact-map">
                        <div id="map"></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
