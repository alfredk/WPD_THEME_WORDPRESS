/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function($){

var $container = $('#container');
// initialize Masonry after all images have loaded
$container.imagesLoaded( function() {
  $container.masonry();
});

	var $container = $('.photo-index').masonry();
	enquire.register("screen and (min-width:767px)", {
    // Triggered when a media query matches.
    match : function() {
        $container.masonry({
            itemSelector: '.photo-item',
            isFitWidth: true,
            isAnimated: true,
            gutter: 10,
            columnWidth: 10
        });
    },
    unmatch : function() {
        $container.masonry('destroy'); }
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
        isFitWidth: true,
      });
    });
  }



});


