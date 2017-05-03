        <footer class="footer">
            <div class="container">
                <div class="footer_logo">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-footer.png" alt="">
                </div>
                <hr class="footer_line">
                <div class="footer_nav">
                    <nav>
                        <div class="footer_nav_item">
<!--                            <div class="menu_title">About us</div>-->
                            <ul>
                                <?php
                                if (has_nav_menu('footer_menu_1')) :
                                    wp_nav_menu(array('theme_location' => 'footer_menu_1'));
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="footer_nav_item">
<!--                            <div class="menu_title">Testimonials</div>-->
                            <ul>
                                <?php
                                if (has_nav_menu('footer_menu_2')) :
                                    wp_nav_menu(array('theme_location' => 'footer_menu_2'));
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="footer_nav_item">
<!--                            <div class="menu_title">Privacy policy</div>-->
                            <ul>
                                <?php
                                if (has_nav_menu('footer_menu_3')) :
                                    wp_nav_menu(array('theme_location' => 'footer_menu_3'));
                                endif;
                                ?>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="footer_social">
                    <a href="/testimonials" class="footer_social_stars"></a>
                    <?php $wtc_communications = get_option('wtc_communications'); ?>
                    <?php if(isset($wtc_communications) && isset($wtc_communications['social'])) { ?>
                        <div class="footer_social_links">
                            <?php foreach($wtc_communications['social'] as $key=>$value) { ?>
                                <?php if(isset($wtc_communications['social'][$key]['link']) && $wtc_communications['social'][$key]['show'] == 1) { ?>
                                    <a href="<?php echo stripslashes($wtc_communications['social'][$key]['link']); ?>" target="_blank">
                                        <img src="<?php bloginfo('template_url'); ?>/images/<?php echo $key; ?>-ic.png" width="22" alt="<?php echo $key; ?>"/>
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>