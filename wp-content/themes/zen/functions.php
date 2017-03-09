<?php
// General setup
function wtc_setup() {
	//Theme support
	add_theme_support('post-thumbnails');
	add_image_size( 'thumb', 600, 400, true );
	add_image_size( 'thumb_slick', 400, 200, true );
	add_image_size( 'thumb_service', 750, 390, true );
	
	// Register nav menus
	register_nav_menus(
		array(
			'top_menu' => 'Top Menu',
			'footer_menu_1' => 'Footer Menu 1',
			'footer_menu_2' => 'Footer Menu 2',
			'footer_menu_3' => 'Footer Menu 3',
			'footer_menu_4' => 'Footer Menu 4'
		)
	);

	
	//Add Woocommerce support
//	add_theme_support( 'woocommerce' );
}
add_action('after_setup_theme', 'wtc_setup');
function wtc_init_setup() {
	//Add Excerpts to Pages
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wtc_init_setup' );


//Register theme styles and js
function wtc_styles() {
	//move jquery to bottom
	remove_action('wp_head', 'wp_print_scripts');
	remove_action('wp_head', 'wp_print_head_scripts', 9);
	remove_action('wp_head', 'wp_enqueue_scripts', 1);
	
	/*
	//theme styles
	wp_enqueue_style('font_roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic');
	wp_enqueue_style('font_roboto_condensed', 'http://fonts.googleapis.com/css?family=Roboto+Condensed');
	wp_enqueue_style('bootstrap_style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0.0');
	wp_enqueue_style('owl_carousel_style', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0.0');
	wp_enqueue_style('lightgallery_style', get_template_directory_uri() . '/css/lightGallery.css', array(), '1.0.0');
	wp_enqueue_style('theme_style', get_template_directory_uri() . '/css/main.css', array(), '1.0.'.time());
	
	//theme scripts
	wp_register_script('bootstrap_script', get_template_directory_uri() . '/js/libs/bootstrap.min.js', array( 'jquery'), '1.0.0');
	wp_enqueue_script('bootstrap_script');
	wp_register_script('owl_carousel_script', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery'), '1.0.0');
	wp_enqueue_script('owl_carousel_script');
	wp_register_script('lightgallery_script', get_template_directory_uri() . '/js/lightGallery.min.js', array( 'jquery'), '1.0.0');
	wp_enqueue_script('lightgallery_script');
	wp_register_script('theme_script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery'), '1.0.'.time());
	wp_enqueue_script('theme_script');
	*/
}
add_action('wp_enqueue_scripts', 'wtc_styles', '999');


//Replace default title
add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title ) {
	if( empty( $title ) && ( is_home() || is_front_page() ) ) {
		return $title . get_bloginfo( 'description' );
	}
	return $title;
}


// Admin load css
function wtc_load_admin_style() {
	wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wtc_load_admin_style' );


//Remove admin bar css
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}


// Add a default avatar to Settings > Discussion
/*add_filter( 'avatar_defaults', 'wtc_custom_avatar' );
function wtc_custom_avatar( $avatar_defaults ) {
	$myavatar = get_bloginfo('template_directory') . '/images/avatar.jpg';
	$avatar_defaults[$myavatar] = 'DogSittingMurrieta';
	return $avatar_defaults;
}*/


//Paging
function wtc_paging_nav() {
	// if (is_singular()) {
 //        return;
 //    }
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1) {
        $links[] = $paged;
    }
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<div class="pagination_wrapper"><ul class="pagination">' . "\n";
    /** Previous Post Link */
    if (get_previous_posts_link()) {
        printf('<li class="pagination_previous">%s</li>' . "\n", get_previous_posts_link("<<"));
    }
    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="first active"' : ' class="first"';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) {
            echo '<li>ů</li>';
        }
    }
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="last active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }
    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li><span class="btn disabled">ů</span></li>' . "\n";
        }
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }
    /** Next Post Link */
    if (get_next_posts_link()) {
        printf('<li class="pagination_next">%s</li>' . "\n", get_next_posts_link(">>"));
    }
    echo '</ul></div>' . "\n";
}


//Add Missing Alt Tags To WordPress Images
function wtc_add_alt_tags($content) {
	global $post;
	preg_match_all('/<img (.*?)\/>/', $content, $images);
	if(!is_null($images)) {
		foreach($images[1] as $index => $value) {
			if(!preg_match('/alt=/', $value))  {
				$new_img = str_replace('<img', '<img alt="'.$post->post_title.'"', $images[0][$index]);
				$content = str_replace($images[0][$index], $new_img, $content);
			}
		}
	}
	return $content;
}
add_filter('the_content', 'wtc_add_alt_tags', 99999);


//Embed Video Fix
function wtc_add_video_wmode_transparent( $html ) {
	$pattern = '#(src="https?://www.youtube(?:-nocookie)?.com/(?:v|embed)/([a-zA-Z0-9-]+).")#';
	preg_match_all( $pattern, $html, $matches );
	 
	if ( count( $matches ) > 0) {
		foreach ( $matches[0] as $orig_src ) {
			if ( !strstr($orig_src, 'wmode=transparent' )) {
				$add = 'wmode=transparent"';
				 
				if ( !strstr($orig_src, '?') ) {
					$add = '?' . $add;
				}
				$new_src = substr( $orig_src, 0, -1 ) . $add;
				$html = str_replace( $orig_src, $new_src, $html );
			}
		}
	}
	return $html;
}
add_filter('the_excerpt', 'wtc_add_video_wmode_transparent', 10);
add_filter('the_content', 'wtc_add_video_wmode_transparent', 10);


// Remove MORE link from the post excerpt. Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis.
function wtc_remove_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'wtc_remove_excerpt_more' );


// Sets the post excerpt length to selected words.
function wtc_excerpt_length( $length ) {
	return 7;
}
add_filter( 'excerpt_length', 'wtc_excerpt_length' );


// Cut string with words
function cut_string($str, $length, $postfix='...', $encoding='UTF-8') {
	if (mb_strlen($str, $encoding) <= $length) {
		return $str;
	}
	
	$tmp = mb_substr($str, 0, $length, $encoding);
	return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
}


//Protect email
function wtc_protect_email($address, $before_text) {
	$address = strtolower($address);
	$coded = "";
	$unmixedkey = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789.@-";
	$inprogresskey = $unmixedkey;
	$mixedkey="";
	$unshuffled = strlen($unmixedkey);
	for ($i = 0; $i <= strlen($unmixedkey); $i++) {
		$ranpos = rand(0,$unshuffled-1);
		$nextchar = substr($inprogresskey, $ranpos, 1);
		$mixedkey .= $nextchar;
		$before = substr($inprogresskey,0,$ranpos);
		$after = substr($inprogresskey,$ranpos+1,$unshuffled-($ranpos+1));
		$inprogresskey = $before.''.$after;
		$unshuffled -= 1;
	}
	$cipher = $mixedkey;

	$shift = strlen($address);

	$txt = "<script type=\"text/javascript\">\n" .
				"<!-"."-\n";

	for ($j=0; $j<strlen($address); $j++) {
		if (strpos($cipher,$address{$j}) == -1 ) {
			$chr = $address{$j};
			$coded .= $address{$j};
		} else {
			$chr = (strpos($cipher,$address{$j}) + $shift) % strlen($cipher);
			$coded .= $cipher{$chr};
		}
	}

	$txt .= "\ncoded = \"" . $coded . "\"\n" .
			"key = \"".$cipher."\"\n".
			"shift=coded.length\n".
			"link=\"\"\n".
			"for (i=0; i<coded.length; i++) {\n" .
				"if (key.indexOf(coded.charAt(i))==-1) {\n" .
					"ltr = coded.charAt(i)\n" .
					"link += (ltr)\n" .
				"} else {\n".
					"ltr = (key.indexOf(coded.charAt(i))- shift+key.length) % key.length\n".
					"link += (key.charAt(ltr))\n".
				"}\n".
			"}\n".
			"document.write(\"<a itemprop='email' href='mailto:\"+link+\"'>".$before_text."\"+link+\"</a>\")\n" .
			"\n".
			"//-"."->\n" .
        "<" . "/script>".
		"<noscript>This e-mail address is protected from spam bots, you must enable JavaScript in your web browser to view it<"."/noscript>";

	return $txt;
}


//Generate phone number
function wtc_generate_tel($number) {
	$phone_number = stripslashes($number);
	$phone_number_link = str_replace(array('.', ' ', '(', ')', '+', '-' ), '', $phone_number);
	return $phone_number_link;
}



//Disable Srcset
function disable_srcset( $sources ) {
	return false;
}
add_filter( 'wp_calculate_image_srcset', 'disable_srcset' );
//Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );
remove_filter( 'wp_head', 'wp_make_content_images_responsive' );


//Disable rss
function fb_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">homepage</a>!') );
}
add_action('do_feed', 'fb_disable_feed', 1);
add_action('do_feed_rdf', 'fb_disable_feed', 1);
add_action('do_feed_rss', 'fb_disable_feed', 1);
add_action('do_feed_rss2', 'fb_disable_feed', 1);
add_action('do_feed_atom', 'fb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'fb_disable_feed', 1);
add_action('do_feed_atom_comments', 'fb_disable_feed', 1);


//Change Yoast seo breadcrumbs to microformats
function wtc_microdata_breadcrumb($link_output) {
	$link_output = preg_replace(
		array(
			'#<span xmlns:v="http://rdf.data-vocabulary.org/\#">#',
			'#<span typeof="v:Breadcrumb"><a href="(.*?)" .*?'.'>(.*?)</a></span>#',
			'#<span typeof="v:Breadcrumb">(.*?)</span>#','# property=".*?"#',
			'#</span>$#'
		), array(
			'',
			'<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>',
			'<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span itemprop="title">$1</span></span>',
			'',
			''
		), $link_output);
	return $link_output;
}
add_filter('wpseo_breadcrumb_output','wtc_microdata_breadcrumb');


//Custom comment template
function wtc_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
		<div class="clearfix comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
			<div class="comment-meta commentmetadata">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php printf( __('%1$s '), ucwords(get_comment_date('F j, Y  g:i A', $gmt = false, $translate = true ))); ?>
				</a>&nbsp;&nbsp;
				<?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
			</div>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>
		
		<div class="page_content">
			<?php comment_text(); ?>
		</div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

?>