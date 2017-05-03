jQuery(document).ready( function($) {
	//Tabs
	$('#wtc_tabs_block').tabs({
		activate: function(event, ui) {
			window.location.hash = ui.newPanel.selector;
			jQuery('html, body').animate({ scrollTop: 0 }, 0);
		}
	});
	
	// Switch to correct tab when URL changes (back/forward browser buttons)
	$(window).bind('hashchange', function() {
		if (location.hash !== '') {
			var tabNum = $('a[href="'+ location.hash +'"]').parent().index();
			$('#wtc_tabs_block').tabs('option', 'active', tabNum);
		} else {
			$('#wtc_tabs_block').tabs('option', 'active', 0);
		}
	});
	
	//Sortable
	$('.wtc_cs_social_sortable').sortable({
		handle: '.wtc_cs_social_sort',
	});
});