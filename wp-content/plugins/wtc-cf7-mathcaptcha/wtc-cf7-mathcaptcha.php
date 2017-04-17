<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: WTC Contact Form 7 math captcha
Description: Add Human test math captcha to Contact Form 7 plugin
Version: 2.0.1
Author: WebTradeConsulting
Author URI: http://webtradeconsulting.com
Text Domain: wtc-cf7-mathcaptcha
Domain Path: /languages
*/


function wtc_cf7_mathcaptcha_load_textdomain() {
    load_plugin_textdomain('wtc-cf7-mathcaptcha', FALSE, basename( dirname( __FILE__ ) ) . '/languages/');
}
add_action( 'plugins_loaded', 'wtc_cf7_mathcaptcha_load_textdomain' );


// Add tag to admin page (contact form 7 registers its tag pane at priority 10)
if ( is_admin() ) {
	add_action('admin_init', 'wtc_cf7_mathcaptcha_tag_add', 45);
}
function wtc_cf7_mathcaptcha_tag_add() {
	if(class_exists('WPCF7_TagGenerator')) {
		$tagGenerator = WPCF7_TagGenerator::get_instance();
		$tagGenerator->add('mathcaptcha', 'Math Captcha', 'wtc_cf7_mathcaptcha_tag_handler', true);
	} else {
		global $pagenow;
		if($pagenow != 'plugins.php') { return; }
		add_action('admin_notices', 'wtc_cf7_mathcaptcha_error');
		add_action('admin_enqueue_scripts', 'wtc_cf7_mathcaptcha_error_scripts');

		function wtc_cf7_mathcaptcha_error() {
			$out = '<div class="error" id="messages"><p>';
			if(file_exists(WP_PLUGIN_DIR.'/contact-form-7/wp-contact-form-7.php')) {
				$out .= 'The Contact Form 7 is installed, but <strong>you must activate Contact Form 7</strong> below for the <em>WTC Contact Form 7 Math Captcha</em> to work.';
			} else {
				$out .= 'The Contact Form 7 plugin must be installed for the <em>WTC Contact Form 7 Math Captcha</em> to work. <a href="'.admin_url('plugin-install.php?tab=plugin-information&plugin=contact-form-7&from=plugins&TB_iframe=true&width=600&height=550').'" class="thickbox" title="Contact Form 7">Install Now.</a>';
			}
			$out .= '</p></div>';
			echo $out;
		}
	}
}
function wtc_cf7_mathcaptcha_error_scripts() {
	wp_enqueue_script('thickbox');
}
function wtc_cf7_mathcaptcha_tag_handler($contactForm, $args = '') {
	$args = wp_parse_args($args, array());
?>
	<div class="control-box">
		<fieldset>
			<legend><?php echo __('Generate a form-tag for a Human test math captcha', 'wtc-cf7-mathcaptcha'); ?></legend>
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?></label></th>
						<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
					</tr>
					<tr>
						<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-mathcaptcha-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?></label></th>
						<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-mathcaptcha-class' ); ?>" /></td>
					</tr>
				</tbody>
			</table>
			<br />
			<div class="howto">
				<?php echo __('HTML code of this block will be', 'wtc-cf7-mathcaptcha'); ?>:
<pre style="white-space: pre-wrap;">
&lt;div class="mathcaptcha_row"&gt;
  &lt;span class="wpcf7-form-control-wrap NAME"&gt;
    &lt;label for="mathcaptcha_field"&gt;<?php echo __('Human test', 'wtc-cf7-mathcaptcha'); ?> &lt;span&gt;NUM1+NUM2=&lt;/span&gt;&lt;/label&gt;
    &lt;input type="text" name="NAME" value="" class="wpcf7-form-control wpcf7-text wpcf7-mathcaptcha CLASS" id="mathcaptcha_field" /&gt;
  &lt;/span&gt;
&lt;/div&gt;
</pre>
			</div>
		</fieldset>
	</div>
	<div class="insert-box">
		<input type="text" name="mathcaptcha" class="tag code" readonly="readonly" onfocus="this.select()" />
		<div class="submitbox">
			<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr(__('Insert Tag', 'contact-form-7')); ?>" />
		</div>
	</div>
<?php
}


// Register the mathcaptcha shortcode to CF7
add_action('wpcf7_init', 'wtc_cf7_mathcaptcha_shortcode_add');
function wtc_cf7_mathcaptcha_shortcode_add() {
	wpcf7_add_shortcode('mathcaptcha', 'wtc_cf7_mathcaptcha_shortcode_handler', true );
}
function wtc_cf7_mathcaptcha_shortcode_handler($tag) {
	$tag = new WPCF7_Shortcode($tag);
	
	if ( empty( $tag->name ) )
		return '';
	
	$validation_error = wpcf7_get_validation_error( $tag->name );
	
	$class = wpcf7_form_controls_class( $tag->type, 'wpcf7-text' );
	
	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();
	
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = 'mathcaptcha_field';
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );
	
	$atts['aria-required'] = 'true';
	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';
	
	$value = (string) reset( $tag->values );
	
	if ( wpcf7_is_posted() )
		$value = '';
	
	$atts['value'] = $value;
	$atts['type'] = 'text';
	$atts['name'] = $tag->name;
	
	$atts = wpcf7_format_atts( $atts );
	
	$captcha = str_shuffle("123456789");
	$captcha_1 = (int) $captcha[0];
	$captcha_2 = (int) $captcha[1];
	
	$captcha_title = __('Human test', 'wtc-cf7-mathcaptcha');
	
	$html = '<div class="mathcaptcha_row">';
		$html .= '<input type="hidden" name="mathcaptcha_1" value="'. $captcha_1 .'" />';
		$html .= '<input type="hidden" name="mathcaptcha_2" value="'. $captcha_2 .'" />';
		$html .= sprintf('<span class="wpcf7-form-control-wrap %1$s"><label for="mathcaptcha_field">%2$s <span>%3$s+%4$s=</span></label> <input %5$s />%6$s</span>', 
							sanitize_html_class( $tag->name ), 
							$captcha_title, 
							$captcha_1, 
							$captcha_2, 
							$atts, 
							$validation_error );
	$html .= '</div>';
	
	return $html;
}


// Validate the mathcaptcha shortcode 
add_filter('wpcf7_validate_mathcaptcha', 'wtc_cf7_mathcaptcha_validation_filter', 10, 2);
function wtc_cf7_mathcaptcha_validation_filter($result, $tag) {
	$tag = new WPCF7_Shortcode($tag);
	
	$name = $tag->name;
	
	$mathcaptcha_value = isset($_POST[$name]) ? trim(wp_unslash(strtr((string)$_POST[$name], "\n", " "))) : '';
	$mathcaptcha_1 = isset($_POST['mathcaptcha_1']) ? trim(wp_unslash(strtr((string)$_POST['mathcaptcha_1'], "\n", " "))) : '';
	$mathcaptcha_2 = isset($_POST['mathcaptcha_2']) ? trim(wp_unslash(strtr((string)$_POST['mathcaptcha_2'], "\n", " "))) : '';
	$mathcaptcha_result = $mathcaptcha_1 + $mathcaptcha_2;
	
	if ($mathcaptcha_value == '' OR $mathcaptcha_1 == '' OR $mathcaptcha_2 == '' OR $mathcaptcha_value != $mathcaptcha_result) {
		$result->invalidate( $tag, wpcf7_get_message('mathcaptcha_not_match'));
	}
	
	return $result;
}


//Validation error message
add_filter( 'wpcf7_messages', 'wpcf7_mathcaptcha_messages' );
function wpcf7_mathcaptcha_messages( $messages ) {
	return array_merge($messages, array('mathcaptcha_not_match' => array(
		'description' => __( "The code that sender entered does not match the CAPTCHA", 'contact-form-7' ),
		'default' => __( 'Your entered code is incorrect.', 'contact-form-7' )
	)));
}



//Add mathcaptcha reset after send
function wtc_mathcaptcha_reload() {
	wp_register_script('wpcf7-mathcaptcha-reload', plugins_url('js/scripts.js', __FILE__), array('jquery'));
	wp_enqueue_script('wpcf7-mathcaptcha-reload');
}
add_action('wp_enqueue_scripts', 'wtc_mathcaptcha_reload', '999');

?>