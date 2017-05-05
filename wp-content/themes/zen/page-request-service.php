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
                        <form>
                            <div class="main_form_field">
                                <label for="name">your name</label>
                                <input id="name" type="text">
                            </div>
                            <div class="main_form_field">
                                <label for="email">your email</label>
                                <input id="email" type="email">
                            </div>
                            <div class="main_form_field">
                                <label for="phone">Phone number</label>
                                <input id="phone" type="tel">
                            </div>
                            <div class="main_form_field">
                                <label for="address">Street Address</label>
                                <input id="address" type="text">
                            </div>
                            <div class="main_form_field">
                                <label for="city">City</label>
                                <input id="city" type="text">
                            </div>
                            <div class="main_form_field">
                                <label for="state">State (CA only)</label>
                                <input id="state" type="text" value="California" disabled>
                            </div>
                            <div class="main_form_field">
                                <label for="zip">Zip*</label>
                                <input id="zip" type="tel">
                            </div>
                            <div class="main_form_field">
                                <label for="broken">What is broken?</label>
                                <select id="master_call" class="selectpicker">
                                    <option value="">Washing machine</option>
                                    <option value="">Washing machine</option>
                                    <option value="">Washing machine</option>
                                    <option value="">Washing machine</option>
                                </select>
                            </div>
                            <div class="main_form_field">
                                <label for="details">What is broken?</label>
                                <textarea id="details"></textarea>
                            </div>
                            <div class="main_form_field">
                                <label for="contactme">What is broken?</label>
                                <select id="contactme" class="selectpicker">
                                    <option value="">Phone</option>
                                    <option value="">Email</option>
                                    <option value="">Text</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <?php get_template_part( 'content', '404' ); ?>
    <?php endif; // end have_posts() check ?>

<?php get_footer(); ?>
