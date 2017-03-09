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
            <div class="contact_info_item">
                <span class="glyphicon glyphicon-map-marker"></span>
                <i>House no: 985, Martin Road <br>
                CA, USA</i>
            </div>
            <div class="contact_info_item">
                <span class="glyphicon glyphicon-earphone"></span>
                <a href="tel:+12154319393">(215) 431-9393</a>
            </div>
            <div class="contact_info_item">
                <span class="glyphicon glyphicon-envelope"></span>
                <a href="mailto:info@ZenAppliance.com">info@ZenAppliance.com</a>
            </div>
        </div>
    </div>
    <div class="contact_form_wrap">
        <div class="contact_form">
            <form action="">
                <p class="contact_form_title">_ Send us a message now. <br>
                    We are very responsive in message.</p>
                <div class="form_field">
                    <input type="text" name="" id="" placeholder="your name">
                </div>
                <div class="form_field">
                    <input type="email" name="" id="" placeholder="your name">
                </div>
                <div class="form_field">
                    <textarea rows="1" placeholder="message"></textarea>
                </div>
                <div class="form_field">
                    <input type="submit" value="Send message">
                </div>
            </form>
        </div>
    </div>
    <?php echo do_shortcode('[wpgmza id="1"]'); ?>
</div>

<?php get_footer(); ?>


