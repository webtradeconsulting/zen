<div class="blog_short">
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
	<div class="blog_short_description"><?php echo wp_trim_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="blog_more_link">read more </a></div>
</div>