<?php get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
		
		<h1 class="page_title"><div class="container"><?php echo single_cat_title( '', false ); ?></div></h1>
		<div class="container content_container">
			
			<div class="row">
				<div class="col-md-8">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'blog' ); ?>
					<?php endwhile; ?>
					<?php wtc_paging_nav(); ?>
				</div>
				<div class="blog_sidebar col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		
		<script>
			jQuery(document).ready(function(){
				jQuery('.blog_media_slider').owlCarousel({
					loop:true,
					items: 1,
					nav: true,
					navText: ['<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>','<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>']
				});
			});
		</script>
		
	<?php else : ?>
		<?php get_template_part( 'content', '404' ); ?>
	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>