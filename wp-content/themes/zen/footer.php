        <footer class="footer">
            <div class="container">
                <div class="footer_logo">
                    <img src="<?php bloginfo('template_url'); ?>/images/logo-footer.png" alt="">
                </div>
                <hr class="footer_line">
                <div class="footer_nav">
                    <nav>
                        <div class="footer_nav_item">
                            <div class="menu_title">About us</div>
                            <ul>
                                <?php
                                if (has_nav_menu('footer_menu_1')) :
                                    wp_nav_menu(array('theme_location' => 'footer_menu_1'));
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="footer_nav_item">
                            <div class="menu_title">Testimonials</div>
                            <ul>
                                <?php
                                if (has_nav_menu('footer_menu_2')) :
                                    wp_nav_menu(array('theme_location' => 'footer_menu_2'));
                                endif;
                                ?>
                            </ul>
                        </div>
                        <div class="footer_nav_item">
                            <div class="menu_title">Privacy policy</div>
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
                    <div class="footer_social_stars">

                    </div>
                    <div class="footer_social_links">
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/fb-ic.png" alt=""></a>
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/tw-ic.png" alt=""></a>
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/li-ic.png" alt=""></a>
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/yt-ic.png" alt=""></a>
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/inst-ic.png" alt=""></a>
                        <a href="#"><img src="<?php bloginfo('template_url'); ?>/images/yelp-ic.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>