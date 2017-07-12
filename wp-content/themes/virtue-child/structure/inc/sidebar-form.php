<div class="sidebar-form">
    <div class="inner">
        <h4>Start Comparing Quotes and Save.</h4>
        <p>What products are you looking for?</p>
        <select class="select-product">
            <option value="">Please Select</option>
            <?php
            $query = new WP_Query(array(
                'post_type' => 'products',
                'order' => 'DESC',
                'posts_per_page' => -1
            ));
            if ($query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    echo '<option value="' . get_the_permalink() . '"> ' . get_the_title() . '</option>';
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
        </select>
    </div>
    <a href="" class="continue-step">Continue <i class="icon-caret-right"></i></a>
</div>