<?php
/**
 * Template Name: Request Service Template
 */
?>
<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>
        <div class="main_help">
            <div class="help_form">
                <div class="container content_container">
                    <h1 class="page_title white_title"><span><?php the_title(); ?></span></h1>
                    <div class="request_form">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php bloginfo('template_url'); ?>/images/request.png" alt="Request Service">
                            </div>
                            <div class="col-md-8">
                                <?php echo do_shortcode('[contact-form-7 id="109" title="RequestForm"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php get_template_part( 'content', '404' ); ?>
    <?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
