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
    var $galleryContainer = $('.photo-index').masonry();

	enquire.register("screen and (min-width:768px)", {

    // Triggered when a media query matches.
    match : function() {
        $container.masonry({
            itemSelector: '.photo-item',
            isFitWidth: true,
            isAnimated: true,
            gutter: 10,
        });
        // $galleryContainer.masonry({
        //     itemSelector: '.gallery-item',
        //     isFitWidth: true,
        //     isAnimated: true,
        // });
    },      
    unmatch : function() {
        $container.masonry('destroy');
    }   
    
  }); 
	  
    var galleries = document.querySelectorAll('.gallery');
    for ( var i=0, len = galleries.length; i < len; i++ ) {
      var gallery = galleries[i];
      initMasonry( gallery );
    }
    function initMasonry( container ) {
      var imgLoad = imagesLoaded( container, function() {
        new Masonry( container, {
          itemSelector: '.gallery-item',
          columnWidth: '.gallery-item',
          isFitWidth: true
        });
      });
    }

} )(jQuery);
