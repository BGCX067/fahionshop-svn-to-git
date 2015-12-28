/**
 * create closure
 */
(function($) {
// plugin definition

	$.fn.layoutHeight = function(options) {
		var defaults = {
   			offSet: 24
  		};
		var options = $.extend(defaults, options);
		return this.each(function() {  
			winH = $.fn.layoutHeight.windowHeight();
			var headerHeight = $('#header').height();
			var footerHeight = $('#footer').height();
			var navHeight = $('#subnav').height();
			var contentHeight = $(this).height();
			heightNeeded = winH - (headerHeight + footerHeight + navHeight + options.offSet);
			
			var $this = $(this);
			if(contentHeight < (headerHeight + footerHeight + navHeight + options.offSet + contentHeight)) {
				if (typeof document.body.style.maxHeight == "undefined") {
					$($this).css('height', heightNeeded); 
				}
				$($this).css('min-height', heightNeeded); 
			}
		});	
	};

// get window height

	$.fn.layoutHeight.windowHeight = function() {
		var alto= 0;
		if( typeof( window.innerWidth ) == 'number' ) {
			alto= window.innerHeight;
		} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
			alto= document.documentElement.clientHeight;
		} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
		alto= document.body.clientHeight;
		}
		return alto;
	};


// end of closure

})(jQuery);
