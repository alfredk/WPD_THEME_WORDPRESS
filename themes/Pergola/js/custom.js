/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function($){

/**
 * initialize Masonry after all images have loaded
 */
var $container = $('#container');
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


  /**
   * Search Toggle
   */
  $( '.search-toggle' ).on( 'click', function( event ) {
    var that    = $( this ),
      wrapper = $( '.search-box-wrapper' );

    that.toggleClass( 'active' );
    wrapper.toggleClass( 'hide' );

    if ( that.is( '.active' ) || $( '.search-toggle .screen-reader-text' )[0] === event.target ) {
      wrapper.find( '.search-field' ).focus();
    }
  });


});


