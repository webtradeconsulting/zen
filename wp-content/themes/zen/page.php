<?php get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="container content_container">
                <h1 class="page_title"><span><?php the_title(); ?></span></h1>
                <div class="page_content">
				    <?php the_content(); ?>
                </div>
			</div>
			
		<?php endwhile; ?>
	<?php else : ?>
		<?php get_template_part( 'content', '404' ); ?>
	<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>