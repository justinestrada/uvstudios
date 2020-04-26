
export const QuickView = {
  onLoad: function() {
    QuickView.onClick();
    // QuickView.onModalShown();
  },
  onClick: function() {
    $('button[data-target="#quickViewModal"]').on('click', function() {
      const post_id = $(this).attr('data-post-id');
      QuickView.onShowProductDetails(post_id);
    });
  },
  // onModalShown: function() {
  //   $('#quickViewModal').on('shown.bs.modal', function () {
  //     console.log($(this).text());
  //   });
  // },
  onShowProductDetails: function(post_id) {
    QuickView.hideProductDetails();
    QuickView.fetchProductByID(post_id).then( function (product) {
      // console.log('res', product);
      QuickView.showProductDetails(product);
    }).catch(function(err) {
      console.error(err);
    });
  },
  showProductDetails: function(product) {
    $('.quick-view-img').attr('src', product.theme_meta.thumbnail).attr('alt', product.title.rendered);
    $('.quick-view-title').attr('href', product.link).html(product.title.rendered);
    $('.quick-view-excerpt').html(product.excerpt.rendered);
    $('.quick-view-price').html(product.theme_meta.price);
    $('.quick-view-link').attr('href', product.link);
    if (product.theme_meta.default_variation_id) {
      $('.quick-view-cart').val(product.theme_meta.default_variation_id);
    } else {
      $('.quick-view-cart').val(product.id);
    }
    $('.quick-view-loading-row').hide();
    $('.quick-view-row').show();
  },
  hideProductDetails: function() {
    $('.quick-view-loading-row').show();
    $('.quick-view-row').hide();
  },
  fetchProductByID: function(post_id) {
    return new Promise( (resolve, reject) => {
      $.ajax({
        method: 'GET',
        // eslint-disable-next-line no-undef
        url: Theme.rest_url + '/product/' + post_id,
      }).done(function(res) {
        resolve(res);
      }).fail(function(err) {
        reject(err);
      });
    });
  },
};
