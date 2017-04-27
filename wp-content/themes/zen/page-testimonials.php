<?php
/**
 * Template Name: Testimonials Template
 */
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <div class="container content_container">
        <h1 class="page_title white_title"><span><?php the_title(); ?></span></h1>
        <div class="testimonials_items row">
            <?php
            $loop = new WP_Query( //First select only main event
                array(
                    'post_status' => 'publish',
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1,
                )
            );
            ?>

            <?php if ($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post(); ?>
                    <div class="testimonials_item">
                        <div class="testimonials_item_inner">
                            <div class="testimonials_avatar">
                                <img src="" alt="">
                            </div>
                            <div class="testimonials_title"><?php the_title(); ?></div>
                            <div class="testimonials_text">
                                 <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="testimonials_form_block">
        <div class="container">
            <div class="contact_form_wrap testimonials_form_wrap">
                <div class="contact_form">
                    <?php echo do_shortcode('[contact-form-7 id="89" title="TestimonialsForm"]'); ?>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <?php get_template_part( 'content', '404' ); ?>
<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
