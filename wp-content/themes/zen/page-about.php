<?php
/**
 * Template Name: About Template
 */
?>

<?php get_header(); ?>
    <div class="container content_container">
        <?php if (have_posts()) { ?>
            <?php while(have_posts()) {
                the_post(); ?>
                <h1 class="page_title white_title"><span><?php the_title(); ?></span></h1>
                <div class="about_info_block clearfix">
                    <div class="about_img">
                        <img src="<?php bloginfo('template_url'); ?>/images/about-img.jpg" alt="About us">
                    </div>
                    <div class="about_info">
                        <div class="page_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
                <div class="about_text_block">
                    <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo.
                        Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim.</p>
                </div>
        <?php }
        } else {
            get_template_part('content', '404');
        } ?>
    </div>
<?php get_footer(); ?>