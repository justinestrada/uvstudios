import { Smooth } from '../utils/smooth';

export const Product = {
  onLoad: function() {
    if ( $('.single-product').length) {
      Smooth.onInit( $('.smooth-scroll') );
      Product.onVariationsAttributeChange();
      Product.onChangeQuantity();
      Product.initReviewErrorNodes();
      Product.onSubmitReview();
    }
  },
  onVariationsAttributeChange: function() {
    $('.attribute-input').on('change', function() {
      const input_name = $(this).attr('name');
      const variation_id = $('input[name="' + input_name + '"]:checked').attr('variation_id');
      const input_text = $('input[name="' + input_name + '"]:checked').parent().text();
      $('.single-product .cart input[name="variation_id"]').val(variation_id);
      const toggle = $(this).parent().parent().prev();
      toggle.html(input_text);
      $(this).parent().parent().css('min-width', toggle.width());
    });
  },
  onChangeQuantity: function() {
    $('.btn-plus, .btn-minus').on( 'click', function() {
      // Get current quantity values
      const qty = $('input[name="quantity"]');
      const val = parseFloat(qty.val());
      const max = parseFloat(qty.attr( 'max' ));
      const min = parseFloat(qty.attr( 'min' ));
      const step = parseFloat(qty.attr( 'step' ));
      // Change the value if plus or minus
      if ( $( this ).hasClass('btn-plus') ) {
        if ( max && ( max <= val ) ) {
          qty.val( max );
        } else {
          qty.val( val + step );
        }
      } else {
        if ( min && ( min >= val ) ) {
          qty.val( min );
        } else if ( val > 1 ) {
          qty.val( val - step );
        }
      }
    });
  },
  initReviewErrorNodes: function() {
    $('.comment-form-rating').append('<p class="comment-form-error text-danger" style="display: none;">Please select a rating.</p>');
    $('.comment-form-comment').append('<p class="comment-form-error text-danger" style="display: none;">Please leave a comment.</p>');
    $('.comment-form-author').append('<p class="comment-form-error text-danger" style="display: none;">Please enter your name.</p>');
    $('.comment-form-email').append('<p class="comment-form-error text-danger" style="display: none;">Please enter your email.</p>');
  },
  onSubmitReview: function() {
    $('#commentform #submit').on('click', function() {
      if ( $('#commentform #rating').val() === '' ) {
        $('#commentform .comment-form-rating .comment-form-error').show();
      } else {
        $('#commentform .comment-form-rating .comment-form-error').hide();
      }
    });
    $('#commentform').submit( function(e) {
      if ( $('#commentform #comment').val() === '' ) {
        e.preventDefault();
        $('#commentform .comment-form-comment .comment-form-error').show();
      } else {
        $('#commentform .comment-form-comment .comment-form-error').hide();
      }
      if ( $('#commentform #author').val() === '' ) {
        e.preventDefault();
        $('#commentform .comment-form-author .comment-form-error').show();
      } else {
        $('#commentform .comment-form-author .comment-form-error').hide();
      }
      if ( $('#commentform #email').val() === '' || $('#commentform #email').val().indexOf('@') == -1 ) {
        e.preventDefault();
        $('#commentform .comment-form-email .comment-form-error').show();
      } else {
        $('#commentform .comment-form-email .comment-form-error').hide();
      }
    });
  },
};
