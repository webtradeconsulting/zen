<?php
/**
 * Template Name: Contacts Template
 */
?>
<?php get_header(); ?>
<div class="container content_container">
    <h1 class="page_title"><span><?php the_title(); ?></span></h1>
</div>
<div class="map_block">
    <div class="contact_info">
        <div class="container">
            <?php
                $contact_address = types_render_field('contact-address', array('output'=> 'raw'));
                $contact_phone = types_render_field('contact-phone', array('output'=> 'raw'));
                $contact_email = types_render_field('contact-email', array('output'=> 'raw'));
                $contact_phone_href = str_replace(array('(', ')', '.', ' ', '-'), '', $contact_phone);
            ?>
            <?php if ($contact_address) { ?>
                <div class="contact_info_item">
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <i><?php echo $contact_address; ?></i>
                </div>
            <?php } ?>
            <?php if ($contact_phone) { ?>
                <div class="contact_info_item">
                    <span class="glyphicon glyphicon-earphone"></span>
                    <a href="tel:+1<?php echo $contact_phone_href; ?>"><?php echo $contact_phone; ?></a>
                </div>
            <?php } ?>
            <?php if ($contact_email) { ?>
                <div class="contact_info_item">
                    <span class="glyphicon glyphicon-envelope"></span>
                    <a href="mailto:<?php echo $contact_email; ?>"><?php echo $contact_email; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="contact_form_wrap">
        <div class="contact_form">
            <?php echo do_shortcode('[contact-form-7 id="42" title="Contact Us"]'); ?>
        </div>
    </div>
    <?php echo do_shortcode('[wpgmza id="1"]'); ?>
</div>

<?php get_footer(); ?>


