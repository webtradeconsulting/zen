			<div class="blog_sidebar_item blog_sidebar_recent_posts">
				<div class="blog_sidebar_title">Recent post</div>
				<?php 
					$loop = new WP_Query( 
						array(
							'post_status' => 'publish',
							'post_type' => 'post', 
							'posts_per_page' => 3
						) 
					);
					if ( $loop->have_posts() ) {
				?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="clearfix recent_posts_item">
								<a href="<?php the_permalink(); ?>" class="recent_posts_img">
									<?php
										$blog_gallery = types_render_field("blog-gallery", array("url"=>"true", "size"=>"blog-square"));
										
										if ( has_post_thumbnail() ) {
											the_post_thumbnail('blog-square', array( 'alt' => trim( strip_tags( get_the_title() ) ), ) );
										} elseif($blog_gallery) {
											$arr = explode( ' ', $blog_gallery );
											echo '<img src="'. $arr[0] .'" alt="'. get_the_title() .'" />';
										} else {
											echo '<img src="'. get_bloginfo('template_url') .'/images/noimage-square.png" alt="No Image" />';
										}
									?>
								</a>
								<div class="recent_posts_item_preview">
									<div class="recent_posts_date"><?php echo get_the_date("F j, Y"); ?></div>
									<h2 class="recent_posts_link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<div class="recent_posts_text"><?php echo the_excerpt(); ?></div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
				<?php } ?>
				
				<a href="<?php echo get_permalink( get_option('page_for_posts' ) );?>" class="recent_posts_more_posts">more</a>
			</div>
			
			<div class="blog_sidebar_item blog_sidebar_category">
				<div class="blog_sidebar_title">Categories</div>
				<ul>
					<?php wp_list_categories('orderby=name&title_li='); ?>
				</ul>
			</div>
			
			<div class="blog_sidebar_item blog_sidebar_tags">
				<div class="blog_sidebar_title">Tags</div>
				<div class="sidebar_tags_wrap">
					<?php wp_tag_cloud(array('unit'=>'px', 'smallest'=>'15', 'largest'=>'20')); ?>
				</div>
			</div>