<?php get_header(); ?>
	
	<?php //Remove Sticky post from posts list
	if(is_home() || is_front_page()) {
		global $query_string;
		parse_str( $query_string, $args );
		$args['post__not_in'] = get_option('sticky_posts');
		query_posts($args);
	}
	?>
	
	<?php if ( have_posts() ) : ?>
		<h1 class="page_title"><div class="container">Blog</div></h1>
		<div class="container content_container">
			<div class="page_content">
				<div class="row blog_short_list">
					<?php $post = $posts[0]; $c=0;?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php $c++; ?>
						
						<?php if( !$paged && count($posts) > 4) { ?>
							<?php if(!$paged && $c == 1) { ?>
								<div class="col-md-6">
									<?php
										$loop = new WP_Query( //First select only main event
											array(
												'post_status' => 'publish',
												'post_type' => 'post',
												'posts_per_page' => 1,
												'post__in'  => get_option( 'sticky_posts' )
											) 
										);
									?>
									<?php if ( $loop->have_posts() ) { ?>
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
											<div class="blog_short blog_short_first">
												<div class="blog_short_img">
													<?php if ( has_post_thumbnail() ) { ?>
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail('thumb', array( 'alt' => trim( strip_tags( get_the_title() ) ), ) ); ?>
														</a>
													<?php } else { ?>
														<a href="<?php the_permalink(); ?>">
															<img src="<?php bloginfo('template_url'); ?>/images/no-image.jpg" alt="No Image" />
														</a>
													<?php } ?>
													<div class="blog_short_date"><?php echo get_the_date("F j, Y"); ?></div>
												</div>
												<div class="blog_short_title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
												<div class="blog_short_description">
													<?php 
														$str = get_the_content();
														echo cut_string($str, 200); 

													?>
												</div>
												<div class="blog_btn"><a href="<?php the_permalink(); ?>" class="blue_btn">Read More</a></div>
											</div>
										<?php endwhile; ?>
										<?php wp_reset_postdata(); ?>
									<?php } ?>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6"><?php get_template_part( 'content', 'blog' ); ?></div>
							<?php } elseif(!$paged && $c == 2) { ?>
										<div class="col-md-6"><?php get_template_part( 'content', 'blog' ); ?></div>
									</div> <?php //end of row $c==2 ?>
							<?php } elseif(!$paged && $c == 3) { ?>
									<div class="row">
										<div class="col-md-6"><?php get_template_part( 'content', 'blog' ); ?></div>
							<?php } elseif(!$paged && $c == 4) { ?>
										<div class="col-md-6"><?php get_template_part( 'content', 'blog' ); ?></div>
									</div> <?php //end of row $c==4 ?>
								</div> <?php //end of col-md-6 $c==2 ?>	
				</div> <?php //end of row ?>
				<div class="row">
							<?php } else { ?>
								<div class="col-md-3"><?php get_template_part( 'content', 'blog' ); ?></div>
								
			<?php $counter++; ?>
			<?php if ($counter % 4 == 0) { ?>
				</div>
				<div class="row">
			<?php } ?>
							<?php } ?>
						<?php } else { ?>
							<div class="col-md-3"><?php get_template_part( 'content', 'blog' ); ?></div>
			<?php $counter++; ?>
			<?php if ($counter % 4 == 0) { ?>
				</div>
				<div class="row">
			<?php } ?>
						<?php } ?>
						
					<?php endwhile; ?>
				
				</div>
			</div>	
			<?php wtc_paging_nav(); ?>
		</div>
		
	<?php else : ?>
		<?php get_template_part( 'content', '404' ); ?>
	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>