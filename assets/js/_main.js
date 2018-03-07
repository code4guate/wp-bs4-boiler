jQuery(function($){
	// DOM is ready

	/*===============================
	    # Bootstrap Toggle Animation
	 ===============================*/
	$('.navbar-collapse').on('show.bs.collapse', function() {
		$('.navbar-toggle').removeClass('collapsed');
	});

	$('.navbar-collapse').on('hidden.bs.collapse', function() {
		$('.navbar-toggle').addClass('collapsed');
	});

	/*===========================
	    # Object Fit Polyfill
	 ===========================*/
	objectFitImages();

	/*===========================
	    # matchHeight
	    - https://github.com/liabru/jquery-match-height#usage
	 ===========================*/
	// ! not included by default !
	// you must prefix the filename with an underscore and run 'gulp js' (if not already running 'gulp watch')

	//$('.item').matchHeight({
	// options
	// });

});