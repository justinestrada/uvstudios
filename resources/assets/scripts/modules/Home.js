
export const Home = {
  onLoad: function() {
    Home.onShowNewsletter();
  },
  onShowNewsletter: function() {
    setTimeout(function() {
      if ( !$('.modal.show').length ) {
        $('#newsletterModal').modal('show');
      }
    }, 20000) // 20s
  },
};
