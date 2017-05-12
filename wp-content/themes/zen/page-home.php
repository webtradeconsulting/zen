<?php
/**
 * Template Name: Homepage Template
 */
?>
<?php get_header(); ?>
    <?php $wtc_homepage_settings = get_option('wtc_homepage_settings'); ?>
		<div class="main_slider">
            <div class="main_call_master_block">
                <div class="container">
                    <?php
                        $label = $wtc_homepage_settings['topform']['label'];
                        $options = $wtc_homepage_settings['topform']['select'];
                        $options_array = explode(PHP_EOL, $options);
                        $btn_text = $wtc_homepage_settings['topform']['btn_text'];
                        $btn_link = $wtc_homepage_settings['topform']['btn_link'];
                    ?>
                    <div class="main_call_master_field">
                        <label for="master_call"><?php echo $label; ?></label>
                        <select id="master_call" class="selectpicker">
                            <?php for ($i = 0; $i < sizeof($options_array); $i++) { ?>
                                <option value="<?php echo $options_array[$i]; ?>"><?php echo $options_array[$i]; ?></option>
                            <?php } ?>
                        </select>
                        <a href="<?php echo $btn_link; ?>" class="main_call_btn"><?php echo $btn_text; ?></a>
                    </div>
                </div>
            </div>
            <div class="main_slider_right">
                <a href="<?php echo stripslashes($wtc_homepage_settings['topform']['item1_link']); ?>" class="main_slider_right_item">
                    <i><?php echo $wtc_homepage_settings['topform']['item1_title']; ?></i>
                    <span><?php echo $wtc_homepage_settings['topform']['item1_text']; ?></span>
                    <b>→</b>
                </a>
                <a href="<?php echo stripslashes($wtc_homepage_settings['topform']['item2_link']); ?>" class="main_slider_right_item">
                    <i><?php echo $wtc_homepage_settings['topform']['item2_title']; ?></i>
                    <span><?php echo $wtc_homepage_settings['topform']['item2_text']; ?></span>
                    <b>→</b>
                </a>
                <a href="<?php echo stripslashes($wtc_homepage_settings['topform']['item3_link']); ?>" class="main_slider_right_item">
                    <i><?php echo $wtc_homepage_settings['topform']['item3_title']; ?></i>
                    <span><?php echo $wtc_homepage_settings['topform']['item3_text']; ?></span>
                    <b>→</b>
                </a>
            </div>
            <div class="main_slider_arrow"></div>
		</div>
		<div class="main_about">
			<div class="container">
				<div class="col-md-4">
					<div class="main_about_text">
						<h2><a href="<?php the_permalink(35); ?>"><?php echo stripslashes($wtc_homepage_settings['about']['title']); ?></a></h2>
						<p>
                            <?php echo stripslashes($wtc_homepage_settings['about']['text']); ?> <br>
                            <a href="<?php the_permalink(35); ?>" class="about_link">Read More</a>
						</p>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <div class="main_about_img col-md-4 col-sm-6 col-xs-12">
                                <?php $image_src = wp_get_attachment_image_src($wtc_homepage_settings['about']['image'.$i]['image_id'], 'thumb'); ?>
                                <?php if(isset($wtc_homepage_settings['about']['image'.$i])) { ?>
                                    <?php if(isset($image_src[0])) { ?>
                                        <img src="<?php echo $image_src[0]; ?>" alt="<?php echo $wtc_homepage_settings['about']['about_item'.$i.'_title']; ?>" />
                                    <?php } ?>
                                <?php } ?>
                                <?php if ($wtc_homepage_settings['about']['about_item'.$i.'_link']) { ?>
                                <a href="<?php echo stripslashes($wtc_homepage_settings['about']['about_item'.$i.'_link']); ?>" class="main_about_overlay main_slider_right_item">
                                    <i><?php echo $wtc_homepage_settings['about']['about_item'.$i.'_title']; ?></i>
                                    <span><?php echo $wtc_homepage_settings['about']['about_item'.$i.'_text']; ?></span>
                                    <b>→</b>
                                </a>
                                <?php } else { ?>
                                    <a href="<?php echo $image_src[0]; ?>" data-src="<?php echo $image_src[0]; ?>" class="main_about_overlay main_about_overlay_gallery main_slider_right_item ">
                                        <i><?php echo $wtc_homepage_settings['about']['about_item'.$i.'_title']; ?></i>
                                        <span><?php echo $wtc_homepage_settings['about']['about_item'.$i.'_text']; ?></span>
                                        <b>→</b>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="main_help">
			<div class="main_help_quote">
				<div class="main_help_quote_text">
					<p><?php echo stripslashes($wtc_homepage_settings['quote']['text']); ?></p>
					<div class="quote_footer">
						<span><?php echo stripslashes($wtc_homepage_settings['quote']['author']); ?></span>
					</div>
                    <a href="<?php the_permalink(87); ?>" class="quote_btn">All Testimonials</a>
				</div>
			</div>
            <?php
                $request_title = $wtc_homepage_settings['request']['title'];
                $request_btn_text = $wtc_homepage_settings['request']['btn_title'];
                $request_btn_link = $wtc_homepage_settings['request']['btn_link'];
            ?>
			<div class="container main_help_container">
				<div class="help_form">
					<h2><?php echo $request_title; ?></h2>
                    <a href="<?php echo $request_btn_link; ?>" class="help_btn"><?php echo $request_btn_text; ?></a>
				</div>
			</div>
		</div>
		<div class="main_infographics">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-sm-6 col-xs-12 main_infographics_item main_infographics_item_title">
						<h2><?php echo $wtc_homepage_settings['infographics']['title']; ?></h2>
					</div>
                    <?php for ($i = 1; $i <=5; $i++) { ?>
                        <?php if(isset($wtc_homepage_settings['infographics']['inf_image'.$i])) { ?>
                            <?php $image_src_info = wp_get_attachment_image_src($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_id'], 'thumb'); ?>
                            <?php if(isset($image_src_info[0])) { ?>
                                <div class="col-sm-4 col-sm-6 col-xs-12 main_infographics_item">
                                    <img src="<?php echo $image_src_info[0]; ?>" alt="">
                                    <span><?php echo $wtc_homepage_settings['infographics']['inf_item'.$i.'_title']; ?></span>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>