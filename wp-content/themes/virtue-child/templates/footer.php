<footer id="containerfooter" class="footerclass" itemscope>
    <div class="container">
        <div class="row">
                <?php global $virtue;
                if (isset($virtue['footer_layout'])) {
                    $footer_layout = $virtue['footer_layout'];
                } else {
                    $footer_layout = 'fourc';
                }
                if ($footer_layout == "fourc") {
                    if (is_active_sidebar('footer_1')) { ?>
                        <div class="col-md-3 col-sm-3 footercol1 dropdown">
                            <?php dynamic_sidebar('footer_1'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_2')) { ?>
                        <div class="col-md-3  col-sm-3 footercol2 dropdown">
                            <?php dynamic_sidebar('footer_2'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_3')) { ?>
                        <div class="col-md-3 col-sm-3 col-xs-6 footercol3">
                            <?php dynamic_sidebar('footer_3'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_4')) { ?>
                        <div class="col-md-3 col-sm-3 col-xs-6 footercol4">
                            <?php dynamic_sidebar('footer_4'); ?>
                        </div>
                    <?php }; ?>
                <?php } else if ($footer_layout == "threec") {
                    if (is_active_sidebar('footer_third_1')) { ?>
                        <div class="col-md-4 footercol1">
                            <?php dynamic_sidebar('footer_third_1'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_third_2')) { ?>
                        <div class="col-md-4 footercol2">
                            <?php dynamic_sidebar('footer_third_2'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_third_3')) { ?>
                        <div class="col-md-4 footercol3">
                            <?php dynamic_sidebar('footer_third_3'); ?>
                        </div>
                    <?php }; ?>
                <?php } else {
                    if (is_active_sidebar('footer_double_1')) { ?>
                        <div class="col-md-6 footercol1">
                            <?php dynamic_sidebar('footer_double_1'); ?>
                        </div>
                    <?php }
                ; ?>
                    <?php if (is_active_sidebar('footer_double_2')) { ?>
                        <div class="col-md-6 footercol2">
                            <?php dynamic_sidebar('footer_double_2'); ?>
                        </div>
                    <?php }; ?>
                <?php } ?>

<!--            <div class="footer-mobile">-->
<!--                <div class="row-line">-->
<!--                    --><?php //if ($footer_layout == "fourc") {
//                    if (is_active_sidebar('footer_1')) { ?>
<!--                        <div class="col-xs-6 footercol1">-->
<!--                            --><?php //dynamic_sidebar('footer_1'); ?>
<!--                        </div>-->
<!--                    --><?php //}; ?>
<!--                    --><?php //if (is_active_sidebar('footer_2')) { ?>
<!--                        <div class="col-xs-6 footercol2">-->
<!--                            --><?php //dynamic_sidebar('footer_2'); ?>
<!--                        </div>-->
<!--                    --><?php //}; ?>
<!--                </div>-->
<!--                <div class="row-line">-->
<!--                    --><?php //if (is_active_sidebar('footer_3')) { ?>
<!--                        <div class="col-xs-6 footercol3">-->
<!--                            --><?php //dynamic_sidebar('footer_3'); ?>
<!--                        </div>-->
<!--                    --><?php //}; ?>
<!--                    --><?php //if (is_active_sidebar('footer_4')) { ?>
<!--                        <div class="col-xs-6 footercol4">-->
<!--                            --><?php //dynamic_sidebar('footer_4'); ?>
<!--                        </div>-->
<!--                    --><?php //};
//                    }; ?>
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>

</footer>

<?php wp_footer(); ?>
