;(function($) {
	'use strict';
	var $login_form = $('#bp-login-widget-form');
	var $login_trigger = $('#login-trigger');

	$login_trigger.on('click', function(e){
		console.log('hi');
		$login_form.slideToggle();
	});
})(window.jQuery);