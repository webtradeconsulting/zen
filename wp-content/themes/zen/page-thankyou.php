<?php
/**
 * Template Name: ThankYou Template
 */
?>

<?php
//Exit form page, if user doesn't come from exist form
/*if(!isset($_GET['ref'])) {
    header('Location: /');
    exit;
}*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <div class="container content_container">
            <h1 class="page_title"><span><?php the_title(); ?></span></h1>

            <div class="page_content">
                <div class="thank_you_img">
                    <img src="<?php bloginfo('template_url'); ?>/images/thank-you.png" alt="Thank you for contacting Mediacl Supply Helpline" />
                </div>

                <div class="thank_you_page_content">
                    <?php the_content(); ?>
                </div>

                <div class="text-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn_medium">Home</a>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php else : ?>
    <?php get_template_part('content', '404'); ?>
<?php endif; // end have_posts() check ?>

<?php get_footer(); ?> 