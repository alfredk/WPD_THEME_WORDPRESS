/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function($) {

	// $('.hamburger').on('click', function() {
	//   $(this).toggleClass('open');
	//   var openclose = $(this).hasClass('open') ? 'Close' : 'Open';
	//   $(this).attr("title", openclose + ' Menu');
	// });


	var $container = $('.photo-index').masonry();
	enquire.register("screen and (min-width:768px)", {

    // Triggered when a media query matches.
    match : function() {
        $container.masonry({
            itemSelector: '.photo-item',
            isFitWidth: true,
            isAnimated: true,
            gutter: 10,
        });
    },      

    // Triggered when the media query transitions 
    // *from a matched state to an unmatched state*.
    unmatch : function() {
        $container.masonry('destroy');
    }   
    
  }); 
	  

} )(jQuery);
