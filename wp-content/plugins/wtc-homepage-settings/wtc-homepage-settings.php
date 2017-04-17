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
                                <div class="wtc_hs_about_block_image">
                                    <img src="<?php echo (isset($image_src[0])) ? $image_src[0] : $default_image ; ?>" class="wtc_hs_about_image<?php echo $i ?>" /><br />
                                    <a href="#" class="button-secondary wtc_hs_about_image_select wtc_hs_about_image_select<?php echo $i ?>">Select image</a>

                                    <input type="hidden" class="wtc_hs_about_image_id<?php echo $i ?>" name="wtc_homepage_settings[about][image<?php echo $i ?>][image_id]" value="<?php echo (isset($wtc_homepage_settings['about']['image'.$i]['image_id'])) ? stripslashes($wtc_homepage_settings['about']['image'.$i]['image_id']) : '' ; ?>" />
                                    <input type="hidden" class="wtc_hs_about_image_url<?php echo $i ?>" name="wtc_homepage_settings[about][image<?php echo $i ?>][image_url]" value="<?php echo (isset($wtc_homepage_settings['about']['image'.$i]['image_url'])) ? stripslashes($wtc_homepage_settings['about']['image'.$i]['image_url']) : '' ; ?>" />
                                </div>
                                <div class="wtc_hs_row_container">
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
                            </div>
                        <?php } ?>
                    </div>
                </div>
				
				<div class="wtc_hs_tab" id="tab_quote">
                    <div class="wtc_hs_block wtc_hs_bg wtc_hs_about_block">
                        <div class="wtc_hs_row">
                            <label for="qoute_text">Text for Quote Block</label>
                            <textarea id="qoute_text" class="wtc_hs_field" name="wtc_homepage_settings[quote][text]"><?php echo (isset($wtc_homepage_settings['quote']['text'])) ? stripslashes($wtc_homepage_settings['quote']['text']) : '' ?></textarea>
                            <label for="qoute_author">Quote's author</label>
                            <input type="text" id="qoute_author" class="wtc_hs_field" name="wtc_homepage_settings[quote][author]" value="<?php echo (isset($wtc_homepage_settings['quote']['author'])) ? stripslashes($wtc_homepage_settings['quote']['author']) : '' ?>"/>
                        </div>
                    </div>
				</div>
				
				<div class="wtc_hs_tab" id="tab_inf">
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <div class="wtc_hs_block wtc_hs_bg wtc_hs_about_block">
                            <?php
                            if(isset($wtc_homepage_settings['infographics']['inf_image'.$i])) {
                                $image_src = wp_get_attachment_image_src($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_id'], 'thumb');
                            }
                            ?>
                            <div class="wtc_hs_about_block_image">
                                <img src="<?php echo (isset($image_src[0])) ? $image_src[0] : $default_image ; ?>" class="wtc_hs_inf_image<?php echo $i ?>" /><br />
                                <a href="#" class="button-secondary wtc_hs_inf_image_select wtc_hs_inf_image_select<?php echo $i ?>">Select image</a>

                                <input type="hidden" class="wtc_hs_inf_image_id<?php echo $i ?>" name="wtc_homepage_settings[infographics][inf_image<?php echo $i ?>][inf_image_id]" value="<?php echo (isset($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_id'])) ? stripslashes($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_id']) : '' ; ?>" />
                                <input type="hidden" class="wtc_hs_inf_image_url<?php echo $i ?>" name="wtc_homepage_settings[infographics][inf_image<?php echo $i ?>][inf_image_url]" value="<?php echo (isset($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_url'])) ? stripslashes($wtc_homepage_settings['infographics']['inf_image'.$i]['inf_image_url']) : '' ; ?>" />
                            </div>
                            .
                            <div class="wtc_hs_row">
                                <label for="inf_item<?php echo $i ?>_title">Title for <?php echo $i ?> item</label>
                                <input type="text" id="inf_item<?php echo $i ?>_title" class="wtc_hs_field" name="wtc_homepage_settings[infographics][inf_item<?php echo $i ?>_title]" value="<?php echo (isset($wtc_homepage_settings['infographics']['inf_item'.$i.'_title'])) ? stripslashes($wtc_homepage_settings['infographics']['inf_item'.$i.'_title']) : '' ?>" placeholder="for example - Kitchen"/>
                            </div>
                        </div>
                    <?php } ?>
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