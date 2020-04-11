
export const LeftStickyMenu = {
  onLoad: function() {
    LeftStickyMenu.onScroll();
    setTimeout(function() {
      if (LeftStickyMenu.scrolledBelowFold()) {
        $('#left-sticky-menu').addClass('active');
      }
    }, 1000);
    LeftStickyMenu.listenFullScreenModal();
  },
  onScroll: function() {
    $(window).on('scroll', function() {
      if (LeftStickyMenu.scrolledBelowFold()) {
        $('#left-sticky-menu').addClass('active');
      } else {
        $('#left-sticky-menu').removeClass('active');
      }
    });
  },
  scrolledBelowFold: function() {
    return $(window).scrollTop() >= $('#header').height();
  },
  listenFullScreenModal: function() {
    $('#fullScreenModal').on('shown.bs.modal', function () {
      // console.log('shown');
      LeftStickyMenu.toggle();
    });
    $('#fullScreenModal').on('hidden.bs.modal', function () {
      // console.log('hidden');
      LeftStickyMenu.unToggle();
    });
  },
  toggle: function() {
    // $(this).removeAttr('data-toggle').removeAttr('data-target');
    // $(this).attr('data-dismiss', 'modal');
    $('#left-sticky-menu .btn-toggle-full-screen-menu').addClass('toggled');
  },
  unToggle: function() {
    // $(this).removeAttr('data-dismiss');
    // $(this).attr('data-toggle', 'modal').attr('data-target', '#fullScreenModal');
    $('#left-sticky-menu .btn-toggle-full-screen-menu').removeClass('toggled');
  },
};
