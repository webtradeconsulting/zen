// Viewport Bugfixes
if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  var msViewportStyle = document.createElement('style');
  msViewportStyle.appendChild(
	document.createTextNode(
	  '@-ms-viewport{width:auto!important}'
	)
  );
  document.querySelector('head').appendChild(msViewportStyle)
}

jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() > 50) {
        jQuery('body').addClass('fixed');
    } else {
        jQuery('body').removeClass('fixed');
    }
});

$(document).ready(function(){
	$('.selectpicker').selectpicker();

	$('.main_slider_arrow').click(function () {
        $('html, body').animate({scrollTop: $('.main_about').offset().top - $('header').outerHeight()}, 400);
    });

    //404 page open
    $('.not_found_search a').click(function() {
        if($('.not_found_search form').is(':visible')) {
            $('.not_found_search form').slideUp(200);
        } else {
            $('.not_found_search form').slideDown(200);
        }
        return false;
    });

    $('#contact_message').attr('rows', 1);

    jQuery('.header_search_open').live('click', function() {
        if($('.header_search').hasClass('active')) {
            $('.header_search').removeClass('active');
        } else {
            $('.header_search').addClass('active');
            setTimeout(function(){
                $('.header_search_form').find('input').focus();
            }, 400);
        }
    });
    $(document).mousedown(function (e) {
        if (!$('.header_search_form').is(e.target) && !$('.header_search span').is(e.target) && $('.header_search_form').has(e.target).length == 0) {
            $('.header_search').removeClass('active');
        }
    });

    //FAQ
    $('.faq_item').first().addClass('active').find('.faq_content').css('display', 'block');
    $('.faq_title a').click(function(){
        if($(this).parents('.faq_item').hasClass('active')) {
            $(this).parents('.faq_item').find('.faq_content').slideUp(200, function(){
                $(this).parents('.faq_item').removeClass('active');
            });
        } else {
            $('.faq_item.active .faq_content').slideUp(200, function(){
                $('.faq_item.active').removeClass('active');
            });
            $(this).parents('.faq_item').find('.faq_content').slideDown(200, function(){
                $(this).parents('.faq_item').addClass('active');
            });
        }
        return false;
    });

    AjaxContent.init({containerDiv:"#service_content",contentDiv:"#service_content"}).ajaxify_links(".services_sidebar a");

    var service_links = $('.services_sidebar .has_children li');

    service_links.click(function() {
        service_links.removeClass('active');
        service_links.parent().parent().parent().removeClass('active');
        if ($(this).attr('href') == window.location.href) {
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('active');
        }
    });

    $('#master_call').change(function() {
        $('.main_call_master_block a').attr('href').append('?ref=' + $('#master_call option').val());
    });

    $('.main_about').lightGallery({
        selector: '.main_about .main_about_overlay_gallery',
        loop: true,
        thumbnail: false,
        autoplayControls: false,
        download: false
    });

    //GoogleMaps nozoom
    var googlemap = $('.googlemap');
    googlemap.css("pointer-events", "none");

    $('.map_block').click(function () {
        $(this).find('.googlemap').css("pointer-events", "auto");
        console.log(googlemap)
    });
    googlemap.mouseleave(function() {
        googlemap.css("pointer-events", "none");
    });

    $('.testimonials_items').owlCarousel({
        loop:true,
        items: 3,
        margin: 30,
        nav: true,
        navText: ['<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>','<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>'],
        dots: true
    });

});

var AjaxContent = function(){
    var container_div = '';
    var content_div = '';
    return {
        getContent : function(url){
            jQuery(container_div).animate({opacity:0},
                function(){
                    jQuery('#gif_loader').show();
                    jQuery(container_div).load(url+" "+content_div,
                        function(){
                            jQuery(container_div).animate({opacity:1});
                            jQuery('#gif_loader').hide();
                        }
                    );
                });
        },
        ajaxify_links: function(elements){
            jQuery(elements).click(function(){
                AjaxContent.getContent(this.href);
                history.pushState(null, null, this.href);
                return false;
            });
        },
        init: function(params){
            container_div = params.containerDiv;
            content_div = params.contentDiv;
            return this;
        }
    }
}();


//Page Works on Load and Resize
jQuery(window).load(function(){

});
jQuery(window).resize(function() {

});