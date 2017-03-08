<?php get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
    		<h1 class="page_title"><div class="container"><?php the_title(); ?></div></h1>
            <div class="container content_container">
                <div class="page_content">
					<div class="row blog_full">
						<div class="col-md-8">
							<?php while ( have_posts() ) : the_post(); ?>	
								<div class="blog_full_social">
									<div class="blog_full_social_item" id="blog_fb">
										<div id="fb-root"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
										<script>
									           window.fbAsyncInit = function() {
									                   FB.init({
				                                           status: true, // check login status
				                                           cookie: true, // enable cookies to allow the server to access the session
				                                           xfbml: true  // parse XFBML
				                                   });
									           };
									           window.fbAsyncInit = function() {
													FB.Event.subscribe('edge.create',
														function(response) {
															jQuery('.fb_iframe_widget').css({'margin-left' : '22px'});
															ga('send', 'event', 'Social', 'Share', 'Facebook');
															console.log('Facebook Fired');
														}
													);
												};
									     </script>
									     <script type="text/javascript">
									           
									     </script>
									</div>
									<div class="blog_full_social_item">
										<div class="social_button twitter_button">
										    <div id="foo">
										        <a href="https://google.com" class="twitter-share-button" data-count="horizontal">
										    Tweet
										  </a>
										    </div>
										    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
										    <script type="text/javascript" charset="utf-8">
										        window.twttr = (function (d, s, id) {
										            var t, js, fjs = d.getElementsByTagName(s)[0];
										            if (d.getElementById(id)) return;
										            js = d.createElement(s);
										            js.id = id;
										            js.src = "//platform.twitter.com/widgets.js";
										            fjs.parentNode.insertBefore(js, fjs);
										            return window.twttr || (t = {
										                _e: [],
										                ready: function (f) {
										                    t._e.push(f)
										                }
										            });
										        }(document, "script", "twitter-wjs"));
										        twttr.events.bind('click', function(event) {
													ga('send', 'event', 'Social', 'Share', 'Twitter');
													console.log('Twitter Fired');
												});
										    </script>
										</div>
									</div>
									<div class="blog_full_social_item" id="blog_pin">
										<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-zero="true" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" alt="Pin It" /></a>
										<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
										<script type="text/javascript">
											jQuery('#blog_pin').click(function(){
												ga('send', 'event', 'Social', 'Share', 'Pinterest');
												console.log('Pinterest Fired');
											});
										</script>
									</div>
								</div>
								<!-- <div class="blog_full_social">
									<div class="blog_full_social_item">
										<div id="fb-root"></div>
										<script>(function(d, s, id) {
										  var js, fjs = d.getElementsByTagName(s)[0];
										  if (d.getElementById(id)) return;
										  js = d.createElement(s); js.id = id;
										  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
										  fjs.parentNode.insertBefore(js, fjs);
										}(document, 'script', 'facebook-jssdk'));</script>
										<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
									</div>
									<div class="blog_full_social_item">
										<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
									</div>
									<div class="blog_full_social_item pinit_button">
										<a href="//www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-zero="true" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" alt="Pin It" /></a>
										<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>
									</div>
								</div> -->
								<div class="blog_full_date"><?php echo get_the_date("F j, Y"); ?></div>
								<div class="blog_post_author"><span>By:</span> <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name'); ?></div>
								
								<div class="page_content blog_content">
									<?php $blog_media_type = types_render_field("blog-media-type", array("output"=>"raw")); ?>
										<?php if($blog_media_type == 1) { //featured ?>
											<div class="blog_media_single blog_full_single">
												<?php if ( has_post_thumbnail() ) { ?>
													<?php the_post_thumbnail('thumb', array( 'alt' => trim( strip_tags( get_the_title() ) ), ) ); ?>
												<?php } else { ?>
													<img src="<?php bloginfo('template_url'); ?>/images/no-image_large.jpg" alt="No Image" />
												<?php } ?>
											</div>
										<?php } elseif($blog_media_type == 2) { //gallery ?>
											<div class="blog_media_slider blog_full_slider owl-carousel">
												<?php
													$blog_gallery = types_render_field("blog-gallery", array("url"=>"true", "size"=>"thumb"));
													$arr = explode( ' ', $blog_gallery );
													foreach ($arr as $value) {
												?>
														<div class="item"><img src="<?php echo $value; ?>" alt="<?php the_title(); ?>" /></div>
												<?php
													}
												?>
											</div>
											<script>
												jQuery(document).ready(function(){
													jQuery('.blog_media_slider').owlCarousel({
														loop:true,
														items: 1,
														nav: true,
														navText: ''
													});
												});
											</script>
										<?php } elseif($blog_media_type == 3) { //video ?>
											<div class="blog_media_video blog_full_video embed-responsive embed-responsive-16by9">
												<?php echo types_render_field("blog-video", array("output"=>"raw")); ?>
											</div>
										<?php } ?>
								

									<?php the_content(); ?>
									
									<?php 
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									?>
								</div>
								
							<?php endwhile; ?>
						</div>
						<div class="col-md-4">
							<div class="blog_sidebar">
								<div class="blog_sidebar_title">Recent Posts</div>
								<?php 
									$loop = new WP_Query( 
										array(
											'post_status' => 'publish',
											'post_type' => 'post', 
											'posts_per_page' => 5
										) 
									);
									if ( $loop->have_posts() ) {?>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<div class="blog_sidebar_item">
												<div class="blog_sidebar_item_title">
													<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</div>
												<div class="sidebar_date"><?php echo get_the_date("F j, Y"); ?></div>
												<div class="blog_sidebar_item_description">
													<?php echo wp_trim_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="blog_more_link">read more</a>
												</div>
											</div>
										<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php else : ?>
		<?php get_template_part( 'content', '404' ); ?>
	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>