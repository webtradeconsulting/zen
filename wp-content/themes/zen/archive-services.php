<?php get_header(); ?>
    <?php get_template_part('content', 'services-form'); ?>
    <div class="container content_container">
        <h1 class="page_title white_title"><span>Services</span></h1>
        <div class="row">
            <div class="col-md-8 pull-right services_content_block">
                <div id="gif_loader"><img src="<?php bloginfo('template_url'); ?>/images/loader.png" alt="loader"></div>
                <div class="services_content" id="service_content">
                    <?php
                        $my_id = 66;
                        $post_id_66 = get_post($my_id, ARRAY_A);
                        $content = $post_id_66['post_content'];
                        echo $content;
                    ?>
                </div>
            </div>
            <div class="col-md-4 pull-left">
                <div class="services_sidebar_border">
                    <div class="services_sidebar">
                        <?php get_template_part('content', 'services_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('content', 'services-infographics'); ?>

<?php get_footer(); ?>
