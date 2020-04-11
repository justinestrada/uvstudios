/* eslint-disable */
"use strict";

export const Smooth = {
  onInit: function( $scrollLink ) {
    $scrollLink.click(function(e) {
      e.preventDefault();
      $('body,html').animate({
        scrollTop: $(this.hash).offset().top
      }, 1000 );
    });
    $(window).scroll(function() {
      var scrollbarLocation = $(this).scrollTop();
      $scrollLink.each(function() {
        var sectionOffset = $(this.hash).offset().top - 20;
        if ( sectionOffset <= scrollbarLocation ) {
          $(this).parent().addClass('active');
          $(this).parent().siblings().removeClass('active');
        }
      })
    });
  },
};
