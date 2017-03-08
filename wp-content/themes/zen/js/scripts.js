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


});


//Page Works on Load and Resize
jQuery(window).load(function(){
	
});
jQuery(window).resize(function() {
	
});