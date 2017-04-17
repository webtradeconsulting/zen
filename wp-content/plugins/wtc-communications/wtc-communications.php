<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Plugin Name: WTC Communications Settings
 * Description: Settings for phone and social links
 * Version: 2.0.0
 * Author: WebTradeConsulting
 * Author URI: http://webtradeconsulting.com
 */
add_action( 'admin_menu', 'wtc_communications_register_menu_page' );

function wtc_communications_register_menu_page() {
	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	$page = add_menu_page(
		'Communications Settings',
		'Communications',
		'edit_posts',
		'wtc_communications',
		'wtc_communications',
		'dashicons-phone',
		57
	);
	add_action('admin_print_scripts-'. $page, 'wtc_communications_admin_scripts');
	add_action('admin_print_styles-'. $page, 'wtc_communications_admin_styles');
}
function wtc_communications_admin_scripts() {
	wp_enqueue_script('wtc_communications_admin', plugins_url('js/scripts_admin.js', __FILE__), array('jquery'));
	wp_enqueue_script('jquery-ui-sortable');
	wp_enqueue_script('jquery-ui-tabs');
}
function wtc_communications_admin_styles() {
	wp_register_style('wtc_communications_admin_style', plugins_url('css/style_admin.css', __FILE__));
	wp_enqueue_style('wtc_communications_admin_style');
}

function wtc_communications() {
	
	if($_POST['wtc_communications']) {
		update_option('wtc_communications', $_POST['wtc_communications'], false);
		echo '<div id="message" class="updated fade"><p><strong>Communications Settings updated!</strong></p></div>';
		$wtc_communications = $_POST['wtc_communications'];
	} else {
		$wtc_communications = get_option('wtc_communications');
	}
?>
	
	<div class="wrap">
		<h2>Communications Settings</h2>
		<br />
		
		<form action="" method="post">
			<div id="wtc_tabs_block">
				<ul class="wtc_tabs">
					<li><a href="#tab_general">General</a></li>
					<li><a href="#tab_social">Social</a></li>
				</ul>
				
				<div class="wtc_tab" id="tab_general">
					<div class="clearfix wtc_cs_block">
						<table>
							<tr>
								<td class="wtc_cs_img">
									<img src="<?php echo plugins_url('images/phone.png', __FILE__); ?>" alt="" />
								</td>
								<td>
									<label for="pa_phone">Phone number</label>
									<input type="text" id="pa_phone" class="wtc_cs_field" name="wtc_communications[phone]" value="<?php echo (isset($wtc_communications['phone'])) ? stripslashes($wtc_communications['phone']) : '' ; ?>" placeholder="Phone number, without +1." />
								</td>
							</tr>
						</table>
					</div>
					<div class="clearfix wtc_cs_block">
						<table>
							<tr>
								<td class="wtc_cs_img">
									<img src="<?php echo plugins_url('images/email.png', __FILE__); ?>" alt="" />
								</td>
								<td>
									<label for="email">Email</label>
									<input type="text" id="email" class="wtc_cs_field" name="wtc_communications[email]" value="<?php echo (isset($wtc_communications['email'])) ? stripslashes($wtc_communications['email']) : '' ; ?>" placeholder="Email address, like: email@domain.com" />
								</td>
							</tr>
						</table>
					</div>
					<div class="clearfix wtc_cs_block">
						<table>
							<tr>
								<td class="wtc_cs_img">
									<img src="<?php echo plugins_url('images/address.png', __FILE__); ?>" alt="" />
								</td>
								<td>
									<label for="address">Address</label>
									<input type="text" id="address" class="wtc_cs_field" name="wtc_communications[address]" value="<?php echo (isset($wtc_communications['address'])) ? stripslashes($wtc_communications['address']) : '' ; ?>" placeholder="Address, like: 1600 Amphitheatre Parkway, Mountain View, CA 94043" />
								</td>
							</tr>
						</table>
					</div>
				</div>
				
				<div class="wtc_tab" id="tab_social">
					<div class="wtc_cs_social_sortable">
						<?php
								$social_list = array(
									'facebook' => null,
									'twitter' => null,
									'linkedin' => null,
									'youtube' => null,
									'instagram' => null,
									'yelp' => null
								);
								$social_list = array_merge($social_list, (array)$wtc_communications['social']);
						?>
						
						<?php foreach($social_list as $key=>$value) { ?>
							<div class="clearfix wtc_cs_block">
								<table>
									<tr>
										<td class="wtc_cs_img">
											<img src="<?php echo plugins_url('images/'. $key .'.png', __FILE__); ?>" alt="" />
										</td>
										<td>
											<label for="<?php echo $key; ?>_link"><?php echo $key; ?> link</label>
											<input type="text" id="<?php echo $key; ?>_link" class="wtc_cs_field" name="wtc_communications[social][<?php echo $key; ?>][link]" value="<?php echo (isset($wtc_communications['social'][$key]['link'])) ? stripslashes($wtc_communications['social'][$key]['link']) : '' ; ?>" placeholder="link to <?php echo $key; ?> page" />
										</td>
										<td class="wtc_cs_radio">
											<label>Show link to <?php echo $key; ?></label>
											<div>
												<label><input type="radio" name="wtc_communications[social][<?php echo $key; ?>][show]" value="1" <?php echo (isset($wtc_communications['social'][$key]['show']) && $wtc_communications['social'][$key]['show'] == 1) ? 'checked' : '' ; ?> /> show</label>
												<label><input type="radio" name="wtc_communications[social][<?php echo $key; ?>][show]" value="0" <?php echo ($wtc_communications['social'][$key]['show'] == 0) ? 'checked' : '' ; ?> /> hide</label>
											</div>
										</td>
										<td class="wtc_cs_sort wtc_cs_social_sort">
											<span class="dashicons-before dashicons-sort"></span>
										</td>
									</tr>
								</table>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			
			<hr/>
			<input type="submit" value="Save Settings" class="button-primary wtc_save_button" />
		</form>
	</div>
<?php
}
?>