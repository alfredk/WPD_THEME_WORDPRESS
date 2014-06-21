/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(document).ready(function($){
// ('#sho-gallery').click(function){

// }
var $container = $('#container');
// initialize Masonry after all images have loaded  
$container.imagesLoaded( function() {
  $container.masonry();
});

	var $container = $('.photo-index').masonry();
    //var $galleryContainer = $('.photo-box').masonry();

	enquire.register("screen and (min-width:768px)", {

    // Triggered when a media query matches.
    match : function() {
        $container.masonry({
            itemSelector: '.photo-item',
            isFitWidth: true,
            isAnimated: true,
            gutter: 10,
        });

        // $container.masonry({
        //     itemSelector: '.gallery-item',
        //     isFitWidth: true,
        //     isAnimated: true,
        //     itemSelector: '.gallery-item',
        //     columnWidth: '.gallery-item',
        //     isFitWidth: true,
        // });
    },      
    unmatch : function() {
        $container.masonry('destroy');
    }   
    
  }); 
	  
  //   var galleries = document.querySelectorAll('.photo-box');

  //   enquire.register("screen and (min-width:768px)", {

  //     for ( var i=0, len = galleries.length; i < len; i++ ) {
  //       var gallery = galleries[i];
  //       initMasonry( gallery );
  //     }
  //     match : function initMasonry( container ) {
  //       var imgLoad = imagesLoaded( container, function() {
  //         new Masonry( container, {
  //           itemSelector: '.gallery-item',
  //           columnWidth: '.gallery-item',
  //           isFitWidth: true,
  //         });
  //       });
  //     },

  //       unmatch : function() {
  //         $container.masonry('destroy');
  //     }  

  // });

    // var galleries = document.querySelectorAll('.photo-box');

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


