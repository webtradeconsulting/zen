<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Plugin Name: WTC Homepage Settings
 * Description: Settings for homepage variables and content
 * Version: 2.0.0
 * Author: WebTradeConsulting
 * Author URI: http://webtradeconsulting.com
 */
add_action( 'admin_menu', 'wtc_homesettings_register_menu_page' );

function wtc_homesettings_register_menu_page() {
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	$page = add_menu_page(
		'Homepage Settings',
		'Homepage Settings',
		'edit_posts',
		'homesettings',
		'wtc_homesettings',
		'dashicons-admin-generic',
		57
	);
	add_action('admin_print_scripts-'. $page, 'wtc_homesettings_admin_scripts');
	add_action('admin_print_styles-'. $page, 'wtc_homesettings_admin_styles');
}
function wtc_homesettings_admin_scripts() {
	wp_enqueue_script('wtc_homesettings_admin_ajax', plugins_url('js/scripts_admin.js', __FILE__), array('jquery'));
	wp_localize_script('wtc_homesettings_admin_ajax', 'wtc_homesettings', array('ajaxurl' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce('wtc_homesettings_nonce')));
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jquery-ui-dialog');
	wp_enqueue_media();
}
function wtc_homesettings_admin_styles() {
	wp_register_style('wtc_homesettings_admin_style', plugins_url('css/style_admin.css', __FILE__));
	wp_enqueue_style('wtc_homesettings_admin_style');
	wp_enqueue_style('wp-jquery-ui-dialog');
}

function wtc_homesettings() {
	$default_image = plugins_url('images/noimage.jpg', __FILE__);
	
	if(isset($_POST['wtc_homepage_settings'])) {
		update_option('wtc_homepage_settings', $_POST['wtc_homepage_settings'], false);
		echo '<div id="message" class="updated fade"><p><strong>Homepage Settings updated!</strong></p></div>';
		$wtc_homepage_settings = $_POST['wtc_homepage_settings'];
	} else {
		$wtc_homepage_settings = get_option('wtc_homepage_settings');
	}
?>
	
	<div class="wrap">
		<h2>Homepage Settings</h2>
		<br />
		<input type="hidden" name="wtc_hs_default_image" value="<?php echo $default_image; ?>" />
		
		<form action="" method="post">
			<div id="wtc_hs_tabs_block">
			
				<ul class="wtc_hs_tabs">
					<li><a href="#tab_topform">Main Banner</a></li>
					<li><a href="#tab_about">Who we are</a></li>
					<li><a href="#tab_quote">Qoute Block</a></li>
					<li><a href="#tab_inf">Infographics</a></li>
				</ul>
				
				<div class="wtc_hs_tab" id="tab_topform">
					<div class="clearfix">
						<div class="wtc_hs_block wtc_hs_bg">
							<div class="wtc_hs_row">
								<label for="item1_title">First item title</label>
								<input type="text" id="item1_title" class="wtc_hs_field" name="wtc_homepage_settings[topform][item1_title]" value="<?php echo (isset($wtc_homepage_settings['topform']['item1_title'])) ? stripslashes($wtc_homepage_settings['topform']['item1_title']) : '' ; ?>" placeholder="for example - Kitchen"/>
							</div>
                            <div class="wtc_hs_row">
                                <label for="item1_text">First item text</label>
                                <textarea type="text" id="item1_text" class="wtc_hs_field" name="wtc_homepage_settings[topform][item1_text]"><?php echo (isset($wtc_homepage_settings['topform']['item1_text'])) ? stripslashes($wtc_homepage_settings['topform']['item1_text']) : '' ; ?></textarea>
                            </div>
                            <div class="wtc_hs_row">
                                <label for="first_item">Link for first item</label>
                                <input type="text" id="first_item" class="wtc_hs_field" name="wtc_homepage_settings[topform][item1_link]" value="<?php echo (isset($wtc_homepage_settings['topform']['item1_link'])) ? stripslashes($wtc_homepage_settings['topform']['item1_link']) : '' ; ?>"/>
                            </div>
						</div>
                        <div class="wtc_hs_block wtc_hs_bg">
                            <div class="wtc_hs_row">
                                <label for="item2_title">Second item title</label>
                                <input type="text" id="item2_title" class="wtc_hs_field" name="wtc_homepage_settings[topform][item2_title]" value="<?php echo (isset($wtc_homepage_settings['topform']['item2_title'])) ? stripslashes($wtc_homepage_settings['topform']['item2_title']) : '' ; ?>" placeholder="for example - Kitchen"/>
                            </div>
                            <div class="wtc_hs_row">
                                <label for="item2_text">Second item text</label>
                                <textarea type="text" id="item2_text" class="wtc_hs_field" name="wtc_homepage_settings[topform][item2_text]"><?php echo (isset($wtc_homepage_settings['topform']['item2_text'])) ? stripslashes($wtc_homepage_settings['topform']['item2_text']) : '' ; ?></textarea>
                            </div>
                            <div class="wtc_hs_row">
                                <label for="second_item">Link for second item</label>
                                <input type="text" id="second_item" class="wtc_hs_field" name="wtc_homepage_settings[topform][item2_link]" value="<?php echo (isset($wtc_homepage_settings['topform']['item2_link'])) ? stripslashes($wtc_homepage_settings['topform']['item2_link']) : '' ; ?>"/>
                            </div>
                        </div>
                        <div class="wtc_hs_block wtc_hs_bg">
                            <div class="wtc_hs_row">
                                <label for="item3_title">Third item title</label>
                                <input type="text" id="item3_title" class="wtc_hs_field" name="wtc_homepage_settings[topform][item3_title]" value="<?php echo (isset($wtc_homepage_settings['topform']['item3_title'])) ? stripslashes($wtc_homepage_settings['topform']['item3_title']) : '' ; ?>" placeholder="for example - Kitchen"/>
                            </div>
                            <div class="wtc_hs_row">
                                <label for="item3_text">Third item text</label>
                                <textarea type="text" id="item3_text" class="wtc_hs_field" name="wtc_homepage_settings[topform][item3_text]"><?php echo (isset($wtc_homepage_settings['topform']['item3_text'])) ? stripslashes($wtc_homepage_settings['topform']['item3_text']) : '' ; ?></textarea>
                            </div>
                            <div class="wtc_hs_row">
                                <label for="third_item">Link for third item</label>
                                <input type="text" id="third_item" class="wtc_hs_field" name="wtc_homepage_settings[topform][item3_link]" value="<?php echo (isset($wtc_homepage_settings['topform']['item3_link'])) ? stripslashes($wtc_homepage_settings['topform']['item3_link']) : '' ; ?>"/>
                            </div>
                        </div>
					</div>
				</div>

                <div class="wtc_hs_tab" id="tab_about">
                    <div class="clearfix">
                        <div class="wtc_hs_semiblock wtc_hs_bg">
                            <div class="wtc_hs_row">
                                <label for="about_title">About us title</label>
                                <input type="text" id="about_title" class="wtc_hs_field" name="wtc_homepage_settings[about][title]" value="<?php echo ($wtc_homepage_settings['about']['title']) ? stripslashes($wtc_homepage_settings['about']['title']) : '' ; ?>" />
                            </div>
                            <div class="wtc_hs_row">
                                <label for="about_text">About us text</label>
                                <textarea rows="5" id="about_text" class="wtc_hs_field" name="wtc_homepage_settings[about][text]"><?php echo ($wtc_homepage_settings['about']['text']) ? stripslashes($wtc_homepage_settings['about']['text']) : '' ; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                            <div class="wtc_hs_block wtc_hs_bg wtc_hs_about_block">
                                <?php
                                    if(isset($wtc_homepage_settings['about']['image'.$i])) {
                                        $image_src = wp_get_attachment_image_src($wtc_homepage_settings['about']['image'.$i]['image_id'], 'thumb');
                                    }
                                ?>
                                <img src="<?php echo (isset($image_src[0])) ? $image_src[0] : $default_image ; ?>" class="wtc_hs_about_image<?php echo $i ?>" /><br />
                                <a href="#" class="button-secondary wtc_hs_about_image_select wtc_hs_about_image_select<?php echo $i ?>">Select image</a>

                                <input type="hidden" class="wtc_hs_about_image_id<?php echo $i ?>" name="wtc_homepage_settings[about][image<?php echo $i ?>][image_id]" value="<?php echo (isset($wtc_homepage_settings['about']['image'.$i]['image_id'])) ? stripslashes($wtc_homepage_settings['about']['image'.$i]['image_id']) : '' ; ?>" />
                                <input type="hidden" class="wtc_hs_about_image_url<?php echo $i ?>" name="wtc_homepage_settings[about][image<?php echo $i ?>][image_url]" value="<?php echo (isset($wtc_homepage_settings['about']['image'.$i]['image_url'])) ? stripslashes($wtc_homepage_settings['about']['image'.$i]['image_url']) : '' ; ?>" />

                                <div class="wtc_hs_row">
                                    <label for="about_item<?php echo $i ?>_title">Title for <?php echo $i ?> item</label>
                                    <input type="text" id="about_item<?php echo $i ?>_title" class="wtc_hs_field" name="wtc_homepage_settings[about][about_item<?php echo $i ?>_title]" value="<?php echo (isset($wtc_homepage_settings['about']['about_item'.$i.'_title'])) ? stripslashes($wtc_homepage_settings['about']['about_item'.$i.'_title']) : '' ?>" placeholder="for example - Kitchen"/>
                                </div>
                                <div class="wtc_hs_row">
                                    <label for="about_item<?php echo $i ?>_text">Text for <?php echo $i ?> item</label>
                                    <textarea type="text" id="about_item<?php echo $i ?>_text" class="wtc_hs_field" name="wtc_homepage_settings[about][about_item<?php echo $i ?>_text]"><?php echo (isset($wtc_homepage_settings['about']['about_item'.$i.'_text'])) ? stripslashes($wtc_homepage_settings['about']['about_item'.$i.'_text']) : '' ?></textarea>
                                </div>
                                <div class="wtc_hs_row">
                                    <label for="about_item<?php echo $i ?>_link">Link for <?php echo $i ?> item</label>
                                    <input type="text" id="about_item<?php echo $i ?>_text" class="wtc_hs_field" name="wtc_homepage_settings[about][about_item<?php echo $i ?>_link]" value="<?php echo (isset($wtc_homepage_settings['about']['about_item'.$i.'_link'])) ? stripslashes($wtc_homepage_settings['about']['about_item'.$i.'_link']) : '' ?>"/>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
				
				<div class="wtc_hs_tab" id="tab_quote">
					<?php
						$loop = new WP_Query( 
							array(
								'post_status' => 'publish',
								'post_type' => 'service', 
								'posts_per_page' => -1,
								'ignore_sticky_posts' => 1,
								'ignore_custom_sort' => TRUE,
								'tax_query' => array(
									array(
										'taxonomy' => 'services',
										'field'    => 'slug',
										'terms'    => 'interior',
									),
								)
							)
						);
						if ( $loop->have_posts() ) {
					?>
						<div class="clearfix">
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">All Interior Services</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_interior_all">
									<tbody>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<tr data-id="<?php the_ID(); ?>" <?php echo (isset($wtc_homepage_settings['interior']) AND in_array(get_the_ID(), $wtc_homepage_settings['interior'])) ? 'class="active"' : '' ; ?>>
												<td class="wtc_hs_posts_image">
													<?php if ( has_post_thumbnail() ) { ?>
														<?php the_post_thumbnail('thumb'); ?>
													<?php } else { ?>
														<img src="<?php echo $default_image; ?>" />
													<?php } ?>
												</td>
												<td class="wtc_hs_posts_body">
													<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
													<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
												</td>
												<td class="wtc_hs_posts_select">
													<div class="wtc_hs_checkbox <?php echo (isset($wtc_homepage_settings['interior']) AND in_array(get_the_ID(), $wtc_homepage_settings['interior'])) ? 'active' : '' ; ?>"></div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
							
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">Selected Interior Services</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_interior_selected">
									<tbody class="wtc_hs_posts_sortable">
										<?php 
											if(isset($wtc_homepage_settings['interior'])) {
												$loop = new WP_Query( 
													array(
														'post_status' => 'publish',
														'post_type' => 'service', 
														'posts_per_page' => -1,
														'ignore_sticky_posts' => 1,
														'post__in' => $wtc_homepage_settings['interior'],
														'orderby' => 'post__in',
														'ignore_custom_sort' => TRUE
													)
												);
												if ( $loop->have_posts() ) {
													while ( $loop->have_posts() ) : $loop->the_post();
										?>
														<tr class="active" data-id="<?php the_ID(); ?>">
															<td class="wtc_hs_posts_image">
																<?php if ( has_post_thumbnail() ) { ?>
																	<?php the_post_thumbnail('thumb'); ?>
																<?php } else { ?>
																	<img src="<?php echo $default_image; ?>" />
																<?php } ?>
															</td>
															<td class="wtc_hs_posts_body">
																<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
																<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
															</td>
															<td class="wtc_hs_posts_select">
																<input type="checkbox" name="wtc_homepage_settings[interior][]" value="<?php the_ID(); ?>" checked="checked" />
																<div class="wtc_hs_checkbox active"></div>
															</td>
															<td class="wtc_hs_posts_order"></td>
														</tr>
										<?php 
													endwhile;
												}
											}
										?>
									</tbody>
								</table>
							</div>
							
						</div>
					<?php 
						} else {
							echo 'No interior services found! Add services first!';
						}
					?>
				</div>
				
				<div class="wtc_hs_tab" id="tab_inf">
					<?php
						$loop = new WP_Query( 
							array(
								'post_status' => 'publish',
								'post_type' => 'service', 
								'posts_per_page' => -1,
								'ignore_sticky_posts' => 1,
								'ignore_custom_sort' => TRUE
							)
						);
						if ( $loop->have_posts() ) {
					?>
						<div class="clearfix">
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">All Services</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_specials_all">
									<tbody>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<tr data-id="<?php the_ID(); ?>" <?php echo (isset($wtc_homepage_settings['specials']) AND in_array(get_the_ID(), $wtc_homepage_settings['specials'])) ? 'class="active"' : '' ; ?>>
												<td class="wtc_hs_posts_image">
													<?php if ( has_post_thumbnail() ) { ?>
														<?php the_post_thumbnail('thumb'); ?>
													<?php } else { ?>
														<img src="<?php echo $default_image; ?>" />
													<?php } ?>
												</td>
												<td class="wtc_hs_posts_body">
													<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
													<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
												</td>
												<td class="wtc_hs_posts_select">
													<div class="wtc_hs_checkbox <?php echo (isset($wtc_homepage_settings['specials']) AND in_array(get_the_ID(), $wtc_homepage_settings['specials'])) ? 'active' : '' ; ?>"></div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
							
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">Selected Specials Services</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_specials_selected">
									<tbody class="wtc_hs_posts_sortable">
										<?php 
											if(isset($wtc_homepage_settings['specials'])) {
												$loop = new WP_Query( 
													array(
														'post_status' => 'publish',
														'post_type' => 'service', 
														'posts_per_page' => -1,
														'ignore_sticky_posts' => 1,
														'post__in' => $wtc_homepage_settings['specials'],
														'orderby' => 'post__in',
														'ignore_custom_sort' => TRUE
													)
												);
												if ( $loop->have_posts() ) {
													while ( $loop->have_posts() ) : $loop->the_post();
										?>
														<tr class="active" data-id="<?php the_ID(); ?>">
															<td class="wtc_hs_posts_image">
																<?php if ( has_post_thumbnail() ) { ?>
																	<?php the_post_thumbnail('thumb'); ?>
																<?php } else { ?>
																	<img src="<?php echo $default_image; ?>" />
																<?php } ?>
															</td>
															<td class="wtc_hs_posts_body">
																<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
																<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
															</td>
															<td class="wtc_hs_posts_select">
																<input type="checkbox" name="wtc_homepage_settings[specials][]" value="<?php the_ID(); ?>" checked="checked" />
																<div class="wtc_hs_checkbox active"></div>
															</td>
															<td class="wtc_hs_posts_order"></td>
														</tr>
										<?php 
													endwhile;
												}
											}
										?>
									</tbody>
								</table>
							</div>
							
						</div>
					<?php 
						} else {
							echo 'No services found! Add services first!';
						}
					?>
				</div>
				
				<div class="wtc_hs_tab" id="tab_gallery">
					<div class="clearfix wtc_hs_block wtc_hs_bg">
						<div class="wtc_hs_row wtc_hs_row_radio">
							<label>Select gallery to show in carousel or show last 8 images from all galleries</label>
							<br /><br />
							<label><input type="radio" name="wtc_homepage_settings[gallery][view]" value="recent" <?php echo ($wtc_homepage_settings['gallery']['view'] == 'recent') ? 'checked' : '' ; ?> /> show recent 8 images </label> <label><input type="radio" name="wtc_homepage_settings[gallery][view]" value="selected" <?php echo ($wtc_homepage_settings['gallery']['view'] == 'selected') ? 'checked' : '' ; ?> /> show selected gallery</label>
						</div>
						<br /><br />
						<?php //Loop for all posts
							global $wpdb; 
							$gallery_list = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."ngg_gallery ORDER BY title ASC");
							if ($gallery_list) {
						?>
								<div class="wtc_hs_row">
									<label for="gallery_list">Select gallery</label>
									<select name="wtc_homepage_settings[gallery][album]" id="gallery_list" class="wtc_hs_field">
										<?php foreach( $gallery_list as $gallery ) { ?>
											<option value="<?php echo $gallery->gid; ?>" <?php echo ($gallery->gid == $wtc_homepage_settings['gallery']['album'] ? 'selected="selected"' : ''); ?>><?php echo $gallery->title; ?></option>
										<?php } ?>
									</select>
								</div>
						<?php 
							} else {
								echo 'No galleries found! Add gallery first!';
							}
						?>
					</div>
				</div>
				

				
				<div class="wtc_hs_tab" id="tab_testimonials">
					<?php
						$loop = new WP_Query( 
							array(
								'post_status' => 'publish',
								'post_type' => 'testimonial', 
								'posts_per_page' => -1,
								'ignore_sticky_posts' => 1,
								'ignore_custom_sort' => TRUE
							)
						);
						if ( $loop->have_posts() ) {
					?>
						<div class="clearfix">
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">All Testimonials</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_testimonials_all">
									<tbody>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<tr data-id="<?php the_ID(); ?>" <?php echo (isset($wtc_homepage_settings['testimonials']) AND in_array(get_the_ID(), $wtc_homepage_settings['testimonials'])) ? 'class="active"' : '' ; ?>>
												<td class="wtc_hs_posts_image">
													<?php if ( has_post_thumbnail() ) { ?>
														<?php the_post_thumbnail('thumb'); ?>
													<?php } else { ?>
														<img src="<?php echo $default_image; ?>" />
													<?php } ?>
												</td>
												<td class="wtc_hs_posts_body">
													<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
													<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
												</td>
												<td class="wtc_hs_posts_select">
													<div class="wtc_hs_checkbox <?php echo (isset($wtc_homepage_settings['testimonials']) AND in_array(get_the_ID(), $wtc_homepage_settings['testimonials'])) ? 'active' : '' ; ?>"></div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
							
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">Selected Testimonials</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_testimonials_selected">
									<tbody class="wtc_hs_posts_sortable">
										<?php 
											if(isset($wtc_homepage_settings['testimonials'])) {
												$loop = new WP_Query( 
													array(
														'post_status' => 'publish',
														'post_type' => 'testimonial', 
														'posts_per_page' => -1,
														'ignore_sticky_posts' => 1,
														'post__in' => $wtc_homepage_settings['testimonials'],
														'orderby' => 'post__in',
														'ignore_custom_sort' => TRUE
													)
												);
												if ( $loop->have_posts() ) {
													while ( $loop->have_posts() ) : $loop->the_post();
										?>
														<tr class="active" data-id="<?php the_ID(); ?>">
															<td class="wtc_hs_posts_image">
																<?php if ( has_post_thumbnail() ) { ?>
																	<?php the_post_thumbnail('thumb'); ?>
																<?php } else { ?>
																	<img src="<?php echo $default_image; ?>" />
																<?php } ?>
															</td>
															<td class="wtc_hs_posts_body">
																<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
																<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
															</td>
															<td class="wtc_hs_posts_select">
																<input type="checkbox" name="wtc_homepage_settings[testimonials][]" value="<?php the_ID(); ?>" checked="checked" />
																<div class="wtc_hs_checkbox active"></div>
															</td>
															<td class="wtc_hs_posts_order"></td>
														</tr>
										<?php 
													endwhile;
												}
											}
										?>
									</tbody>
								</table>
							</div>
							
						</div>
					<?php 
						} else {
							echo 'No testimonials found! Add testimonials first!';
						}
					?>
				</div>
				
				<div class="wtc_hs_tab" id="tab_partners">
					<?php
						$loop = new WP_Query( 
							array(
								'post_status' => 'publish',
								'post_type' => 'partners', 
								'posts_per_page' => -1,
								'ignore_sticky_posts' => 1,
								'ignore_custom_sort' => TRUE
							)
						);
						if ( $loop->have_posts() ) {
					?>
						<div class="clearfix">
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">All Partners</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_partners_all">
									<tbody>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<tr data-id="<?php the_ID(); ?>" <?php echo (isset($wtc_homepage_settings['partners']) AND in_array(get_the_ID(), $wtc_homepage_settings['partners'])) ? 'class="active"' : '' ; ?>>
												<td class="wtc_hs_posts_image">
													<?php if ( has_post_thumbnail() ) { ?>
														<?php the_post_thumbnail('thumb'); ?>
													<?php } else { ?>
														<img src="<?php echo $default_image; ?>" />
													<?php } ?>
												</td>
												<td class="wtc_hs_posts_body">
													<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
													<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
												</td>
												<td class="wtc_hs_posts_select">
													<div class="wtc_hs_checkbox <?php echo (isset($wtc_homepage_settings['partners']) AND in_array(get_the_ID(), $wtc_homepage_settings['partners'])) ? 'active' : '' ; ?>"></div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
							
							<div class="wtc_hs_semiblock wtc_hs_bg wtc_hs_posts_block">
								<div class="wtc_hs_subtitle">Selected Partners</div>
								<table class="wtc_hs_posts_table" id="wtc_hs_partners_selected">
									<tbody class="wtc_hs_posts_sortable">
										<?php 
											if(isset($wtc_homepage_settings['partners'])) {
												$loop = new WP_Query( 
													array(
														'post_status' => 'publish',
														'post_type' => 'partners', 
														'posts_per_page' => -1,
														'ignore_sticky_posts' => 1,
														'post__in' => $wtc_homepage_settings['partners'],
														'orderby' => 'post__in',
														'ignore_custom_sort' => TRUE
													)
												);
												if ( $loop->have_posts() ) {
													while ( $loop->have_posts() ) : $loop->the_post();
										?>
														<tr class="active" data-id="<?php the_ID(); ?>">
															<td class="wtc_hs_posts_image">
																<?php if ( has_post_thumbnail() ) { ?>
																	<?php the_post_thumbnail('thumb'); ?>
																<?php } else { ?>
																	<img src="<?php echo $default_image; ?>" />
																<?php } ?>
															</td>
															<td class="wtc_hs_posts_body">
																<div class="wtc_hs_posts_title"><?php the_title(); ?></div>
																<div class="wtc_hs_posts_content"><?php the_excerpt(); ?></div>
															</td>
															<td class="wtc_hs_posts_select">
																<input type="checkbox" name="wtc_homepage_settings[partners][]" value="<?php the_ID(); ?>" checked="checked" />
																<div class="wtc_hs_checkbox active"></div>
															</td>
															<td class="wtc_hs_posts_order"></td>
														</tr>
										<?php 
													endwhile;
												}
											}
										?>
									</tbody>
								</table>
							</div>
							
						</div>
					<?php 
						} else {
							echo 'No partners found! Add partners first!';
						}
					?>
				</div>
			</div>
			
			<hr/>
			<input type="submit" value="Save Settings" class="button-primary wtc_hs_save_button" />
		</form>
	</div>
	
	<div id="dialog-wtc" style="display: none;"></div>
	
	<script>
		var timestamp = '<?php echo time(); ?>';
	</script>
	
<?php
}
?>