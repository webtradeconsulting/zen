jQuery(document).ready(function($){
	$(document).on('mailsent.wpcf7', function () {
		if($('.mathcaptcha_row').length) {
			shuffle = function(o){
				for(var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
				return o;
			};
			var mathcaptcha_rand = shuffle([1, 2, 3, 4, 5, 6, 7, 8, 9]);
			var mathcaptcha_1 = mathcaptcha_rand[0];
			var mathcaptcha_2 = mathcaptcha_rand[1];
			$('input[name="mathcaptcha_1"]').val(mathcaptcha_1);
			$('input[name="mathcaptcha_2"]').val(mathcaptcha_2);
			$('.mathcaptcha_row label span').empty().html(mathcaptcha_1 +'+'+ mathcaptcha_2 +'=');
		}
	});
});