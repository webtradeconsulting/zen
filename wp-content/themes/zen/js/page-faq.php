<?php
/**
 * Template Name: FAQ Template
 */
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <div class="container content_container">
        <h1 class="page_title white_title"><span><?php the_title(); ?></span></h1>
        <div class="page_content">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>

            <?php
            $loop = new WP_Query( //First select only main event
                array(
                    'post_status' => 'publish',
                    'post_type' => 'faqs',
                    'posts_per_page' => -1,
                )
            );
            ?>
            <?php if ( $loop->have_posts() ) { ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="faq_item">
                        <div class="faq_title">
                            <a href="#">_<?php the_title(); ?></a>
                        </div>
                        <div class="faq_content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php } ?>

        </div>
    </div>

<?php else : ?>
    <?php get_template_part( 'content', '404' ); ?>
<?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
