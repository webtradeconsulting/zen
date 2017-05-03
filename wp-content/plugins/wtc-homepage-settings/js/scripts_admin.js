jQuery(document).ready( function($) {
	
	//Tabs
	$('#wtc_hs_tabs_block').tabs({
		activate: function(event, ui) {
			window.location.hash = ui.newPanel.selector;
			jQuery('html, body').animate({ scrollTop: 0 }, 0);
		}
	});
	
	// Switch to correct tab when URL changes (back/forward browser buttons)
	$(window).bind('hashchange', function() {
		if (location.hash !== '') {
			var tabNum = $('a[href="'+ location.hash +'"]').parent().index();
			$('#wtc_hs_tabs_block').tabs('option', 'active', tabNum);
		} else {
			$('#wtc_hs_tabs_block').tabs('option', 'active', 0);
		}
	});
	
	
	//Dialog
	$('#dialog-wtc').dialog({
		resizable: false,
		autoOpen: false,
		modal: true
	});
	
	
	//Sortable posts table
	$('.wtc_hs_posts_sortable').sortable({
		handle: 'td.wtc_hs_posts_order',
	});
	
	
	//Exterior
	$('#wtc_hs_exterior_all .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			thisPost.removeClass('active');
			
			$('#wtc_hs_exterior_selected tr[data-id="'+ thisPostID +'"]').remove();
		} else {
			$(this).addClass('active');
			thisPost.addClass('active');
			
			$('#wtc_hs_exterior_selected').prepend(thisPost.clone());
			$('#wtc_hs_exterior_selected tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_posts_select').append('<input type="checkbox" name="wtc_homepage_settings[exterior][]" value="'+ thisPostID +'" checked="checked" />');
			$('#wtc_hs_exterior_selected tr[data-id="'+ thisPostID +'"]').append('<td class="wtc_hs_posts_order ui-sortable-handle"></td>');
		}
	});
	$('#wtc_hs_exterior_selected .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		thisPost.remove();
		
		$('#wtc_hs_exterior_all tr[data-id="'+ thisPostID +'"]').removeClass('active');
		$('#wtc_hs_exterior_all tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_checkbox').removeClass('active');
	});
	
	
	//Interior
	$('#wtc_hs_interior_all .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			thisPost.removeClass('active');
			
			$('#wtc_hs_interior_selected tr[data-id="'+ thisPostID +'"]').remove();
		} else {
			$(this).addClass('active');
			thisPost.addClass('active');
			
			$('#wtc_hs_interior_selected').prepend(thisPost.clone());
			$('#wtc_hs_interior_selected tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_posts_select').append('<input type="checkbox" name="wtc_homepage_settings[interior][]" value="'+ thisPostID +'" checked="checked" />');
			$('#wtc_hs_interior_selected tr[data-id="'+ thisPostID +'"]').append('<td class="wtc_hs_posts_order ui-sortable-handle"></td>');
		}
	});
	$('#wtc_hs_interior_selected .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		thisPost.remove();
		
		$('#wtc_hs_interior_all tr[data-id="'+ thisPostID +'"]').removeClass('active');
		$('#wtc_hs_interior_all tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_checkbox').removeClass('active');
	});
	
	
	//Specials
	$('#wtc_hs_specials_all .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			thisPost.removeClass('active');
			
			$('#wtc_hs_specials_selected tr[data-id="'+ thisPostID +'"]').remove();
		} else {
			$(this).addClass('active');
			thisPost.addClass('active');
			
			$('#wtc_hs_specials_selected').prepend(thisPost.clone());
			$('#wtc_hs_specials_selected tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_posts_select').append('<input type="checkbox" name="wtc_homepage_settings[specials][]" value="'+ thisPostID +'" checked="checked" />');
			$('#wtc_hs_specials_selected tr[data-id="'+ thisPostID +'"]').append('<td class="wtc_hs_posts_order ui-sortable-handle"></td>');
		}
	});
	$('#wtc_hs_specials_selected .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		thisPost.remove();
		
		$('#wtc_hs_specials_all tr[data-id="'+ thisPostID +'"]').removeClass('active');
		$('#wtc_hs_specials_all tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_checkbox').removeClass('active');
	});
	
	
	//Testimonials
	$('#wtc_hs_testimonials_all .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			thisPost.removeClass('active');
			
			$('#wtc_hs_testimonials_selected tr[data-id="'+ thisPostID +'"]').remove();
		} else {
			$(this).addClass('active');
			thisPost.addClass('active');
			
			$('#wtc_hs_testimonials_selected').prepend(thisPost.clone());
			$('#wtc_hs_testimonials_selected tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_posts_select').append('<input type="checkbox" name="wtc_homepage_settings[testimonials][]" value="'+ thisPostID +'" checked="checked" />');
			$('#wtc_hs_testimonials_selected tr[data-id="'+ thisPostID +'"]').append('<td class="wtc_hs_posts_order ui-sortable-handle"></td>');
		}
	});
	$('#wtc_hs_testimonials_selected .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		thisPost.remove();
		
		$('#wtc_hs_testimonials_all tr[data-id="'+ thisPostID +'"]').removeClass('active');
		$('#wtc_hs_testimonials_all tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_checkbox').removeClass('active');
	});
	
	
	//Partners
	$('#wtc_hs_partners_all .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');
		
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			thisPost.removeClass('active');
			
			$('#wtc_hs_partners_selected tr[data-id="'+ thisPostID +'"]').remove();
		} else {
			$(this).addClass('active');
			thisPost.addClass('active');
			
			$('#wtc_hs_partners_selected').prepend(thisPost.clone());
			$('#wtc_hs_partners_selected tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_posts_select').append('<input type="checkbox" name="wtc_homepage_settings[partners][]" value="'+ thisPostID +'" checked="checked" />');
			$('#wtc_hs_partners_selected tr[data-id="'+ thisPostID +'"]').append('<td class="wtc_hs_posts_order ui-sortable-handle"></td>');
		}
	});
	$('#wtc_hs_partners_selected .wtc_hs_checkbox').live('click', function(e) {
		e.preventDefault();
		var thisPost = $(this).parents('tr');
		var thisPostID = thisPost.attr('data-id');

		thisPost.remove();

		$('#wtc_hs_partners_all tr[data-id="'+ thisPostID +'"]').removeClass('active');
		$('#wtc_hs_partners_all tr[data-id="'+ thisPostID +'"]').find('.wtc_hs_checkbox').removeClass('active');
	});


	//About
    $('#tab_about .wtc_hs_about_image_select').each(function (i, elem) {
    	i = i+1;
    	console.log(i);
        $('.wtc_hs_about_image_select'+i).live('click', function(e) {
            console.log($(this));
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
			.on('select', function(e){
				var uploaded_image = image.state().get('selection').first();
				var imageID = uploaded_image.toJSON().id;
				var imageURL = uploaded_image.toJSON().url;
				$('.wtc_hs_about_image_id'+i).val(imageID);
				$('.wtc_hs_about_image_url'+i).val(imageURL);
				$('.wtc_hs_about_image'+i).attr('src', imageURL);
			});
        });
    });

    $('#tab_inf .wtc_hs_inf_image_select').each(function (j, elem) {
        j = j+1;
        console.log(j);
        $('.wtc_hs_inf_image_select'+j).live('click', function(e) {
            console.log($(this));
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                .on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    var imageID = uploaded_image.toJSON().id;
                    var imageURL = uploaded_image.toJSON().url;
                    $('.wtc_hs_inf_image_id'+j).val(imageID);
                    $('.wtc_hs_inf_image_url'+j).val(imageURL);
                    $('.wtc_hs_inf_image'+j).attr('src', imageURL);
                });
        });
    });

    $('#tab_inf .wtc_hs_service_inf_image_select').each(function (j, elem) {
        j = j+1;
        console.log(j);
        $('.wtc_hs_service_inf_image_select'+j).live('click', function(e) {
            console.log($(this));
            e.preventDefault();
            var image = wp.media({
                title: 'Upload Image',
                multiple: false
            }).open()
                .on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    var imageID = uploaded_image.toJSON().id;
                    var imageURL = uploaded_image.toJSON().url;
                    $('.wtc_hs_service_inf_image_id'+j).val(imageID);
                    $('.wtc_hs_service_inf_image_url'+j).val(imageURL);
                    $('.wtc_hs_service_inf_image'+j).attr('src', imageURL);
                });
        });
    });




});