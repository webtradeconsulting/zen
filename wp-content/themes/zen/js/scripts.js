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
	
$(document).ready(function(){
	$('.selectpicker').selectpicker();

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

});


//Page Works on Load and Resize
jQuery(window).load(function(){
	
});
jQuery(window).resize(function() {
	
});