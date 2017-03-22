<?php get_header(); ?>

<?php get_header(); ?>
<div class="services_header">

</div>
<div class="container content_container">
    <h1 class="page_title white_title"><span>Services</span></h1>
    <div class="row">
        <?php if (have_posts()) { ?>
            <?php while (have_posts()) { the_post(); ?>
                <div class="col-md-8 pull-right">
                    <div class="services_content" id="service_content">
                        <div id="gif_loader"></div>
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="col-md-4 pull-left">
            <div class="services_sidebar_border">
                <div class="services_sidebar">
                    <?php get_template_part('content', 'services_sidebar'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="services_infographics">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="infographics_item trust">
                    <div class="infographics_item_img">
                        <img src="<?php bloginfo('template_url'); ?>/images/services-trust.png" alt="">
                    </div>
                    <div class="infographics_item_text">
                        _ You Can Trust Our
                        Repair Technicians
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="infographics_item quote">
                    <div class="infographics_item_img">
                        <img src="<?php bloginfo('template_url'); ?>/images/services-quote.png" alt="">
                    </div>
                    <div class="infographics_item_text">
                        _ You get a solid quote
                        before the work starts
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="infographics_item best">
                    <div class="infographics_item_img">
                        <img src="<?php bloginfo('template_url'); ?>/images/services-best.png" alt="">
                    </div>
                    <div class="infographics_item_text">
                        _ Our experts are courteous
                        and highly-trained
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="infographics_item clean">
                    <div class="infographics_item_img">
                        <img src="<?php bloginfo('template_url'); ?>/images/services-clean.png" alt="">
                    </div>
                    <div class="infographics_item_text">
                        _ We leave your home as
                        clean as when we arrived
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


<?php get_footer(); ?>
