<?php
/**
 * Template Name: Homepage Template
 */
?>
<?php get_header(); ?>
		<div class="main_slider">
            <div class="main_call_master_block">
                <div class="container">
                    <?php echo do_shortcode('[contact-form-7 id="43" title="Main Slider Form"]'); ?>
                </div>
            </div>
            <div class="main_slider_right">
                <a href="#" class="main_slider_right_item">
                    <i>Kitchen</i>
                    <span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
                    <b href="#">→</b>
                </a>
                <a href="#" class="main_slider_right_item">
                    <i>Kitchen</i>
                    <span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
                    <b href="#">→</b>
                </a>
                <a href="#" class="main_slider_right_item">
                    <i>Kitchen</i>
                    <span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
                    <b href="#">→</b>
                </a>
            </div>
		</div>
		<div class="main_about">
			<div class="container">
				<div class="col-md-4">
					<div class="main_about_text">
						<h2>Who we are</h2>
						<p>
							This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
							Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
							sem nibh id elit.
							Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
						</p>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img1.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img2.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img3.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img4.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img5.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
						<div class="main_about_img col-md-4 col-sm-6">
							<img src="<?php bloginfo('template_url'); ?>/images/about-img6.jpg" alt="">
							<a href="#" class="main_about_overlay main_slider_right_item">
								<i>KITCHEN</i>
								<span>Whether you love to cook or just appreciate having modern conveniences, you know ...</span>
								<b href="#">→</b>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main_help">
			<div class="main_help_quote">
				<div class="main_help_quote_text">
					<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis
						sem nibh id elit. </p>
					<div class="quote_footer">
						<span>Kevin Green</span>
					</div>
				</div>
			</div>
			<div class="container main_help_container">
				<div class="help_form">
					<h2>How can we help?</h2>
					<form action="">
						<div class="main_form_field">
							<label for="main_email">your email</label>
							<input id="main_email" type="email">
						</div>
						<div class="main_form_next_btn">
							<a href="#">→</a>
						</div>
						<div class="help_form_submit">
							<input type="submit" value="Let's go">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="main_infographics">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 main_infographics_item main_infographics_item_title">
						<h2>infographics</h2>
					</div>
					<div class="col-sm-4 main_infographics_item">
						<img src="<?php bloginfo('template_url'); ?>/images/infographics1.png" alt="">
						<span>Fast service</span>
					</div>
					<div class="col-sm-4 main_infographics_item">
						<img src="<?php bloginfo('template_url'); ?>/images/infographics2.png" alt="">
						<span>High quality</span>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 main_infographics_item">
						<img src="<?php bloginfo('template_url'); ?>/images/infographics3.jpg" alt="">
						<span>Experienced technicians</span>
					</div>
					<div class="col-sm-4 main_infographics_item">
						<img src="<?php bloginfo('template_url'); ?>/images/infographics4.png" alt="">
						<span>Fair pricing</span>
					</div>
					<div class="col-sm-4 main_infographics_item">
						<img src="<?php bloginfo('template_url'); ?>/images/infographics5.png" alt="">
						<span>Quality parts</span>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>