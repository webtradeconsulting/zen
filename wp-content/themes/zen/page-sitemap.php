<?php
/**
 * Template Name: Sitemap Template
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="container content_container sitemap_content">
            <h1 class="page_title"><span><?php the_title(); ?></span></h1>
            <div class="sitemap_content_wrap">
                <div class="page_content">
                    <ul class="sitemap">
                        <?php // All Pages
                        $args = array(
                            'exclude'      => '94, 66, 18, 16, 2',
                            'post_type'    => 'page',
                            'post_status'  => 'publish',
                            'title_li'     => ''
                        );
                        wp_list_pages( $args );
                        ?>

                    </ul>
                    <div class="sitemap_img">
<!--                        <img src="--><?php //bloginfo('template_url'); ?><!--/images/sitemap.jpg" alt="Sitemap">-->
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <?php get_template_part( 'content', '404' ); ?>
<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
