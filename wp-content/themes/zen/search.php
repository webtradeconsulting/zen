<?php get_header(); ?>
	
	<?php if ( have_posts() AND get_search_query() ) : ?>
		<h1 class="page_title"><div class="container">Search Results for: <span><?php echo trim(strip_tags(get_search_query())); ?></span></div></h1>
		<div class="container content_container">
			
			<div class="page_content search_list">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="search_item">
						<h2 class="search_title">
							<?php
								$post_type = get_post_type();
								if($post_type == 'faqs') {
									$post_link = get_the_permalink(18);
									$post_title_prefix = get_the_title(18) .': ';
								} elseif($post_type == 'testimonial') {
									$post_link = get_the_permalink(33);
									$post_title_prefix = get_the_title(33) .': ';
								} else {
									$post_link = get_the_permalink();
									$post_title_prefix = '';
								}
							?>
							
							<a href="<?php echo $post_link; ?>">
								<?php 
									$title = get_the_title();
									
									if($s != '') {
										$keys= explode(" ",$s);
										$title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search_highlight">\0</span>', $title);
									}
									echo $post_title_prefix . $title;
								?>
							</a>
						</h2>
						
						<div class="search_content">
							<?php 
								$excerpt = get_the_excerpt();
								if($s != '') {
									$keys= explode(" ",$s);
									$excerpt = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search_highlight">\0</span>', $excerpt);
								}
								echo apply_filters('the_content', $excerpt);
							?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			
			<?php wtc_paging_nav(); ?>
		</div>
	<?php else : ?>
		<div class="container content_container">
			<h2 class="page_title">Search Results <?php echo (get_search_query()) ? 'for: <span>'. get_search_query() .'</span>' : '' ; ?></h2>
			<hr class="page_title_hr" />
			
			<div class="page_content">
				<div class="alert alert-danger search_no_results_title">
					Apologies, but no results were found.
				</div>
				<div class="search_no_results_btn">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="blue_btn">Home</a>
				</div>
			</div>
		</div>
	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>