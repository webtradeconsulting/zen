<?php $wtc_homepage_settings = get_option('wtc_homepage_settings'); ?>
<div class="services_infographics">
    <div class="container">
        <div class="row">
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <div class="col-md-3">
                    <?php if ($i == 1) { ?>
                        <div class="infographics_item trust">
                    <?php } elseif ($i == 2) { ?>
                        <div class="infographics_item quote">
                    <?php } elseif ($i == 3) { ?>
                        <div class="infographics_item best">
                    <?php } elseif ($i == 4) { ?>
                        <div class="infographics_item clean">
                    <?php } ?>
                        <?php $services_image_src = wp_get_attachment_image_src($wtc_homepage_settings['service_infographics']['service_inf_image'.$i]['service_inf_image_id'], 'thumb'); ?>
                        <?php if ($services_image_src) { ?>
                            <div class="infographics_item_img">
                                <img src="<?php echo $services_image_src[0]; ?>" alt="<?php echo stripslashes($wtc_homepage_settings['service_infographics']['service_inf_item'.$i.'_text']); ?>">
                            </div>
                        <?php } ?>
                        <div class="infographics_item_text">
                            <?php echo $wtc_homepage_settings['service_infographics']['service_inf_item'.$i.'_text']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>