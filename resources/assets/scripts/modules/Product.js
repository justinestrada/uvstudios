import { Smooth } from '../utils/smooth';
import { Timer } from '../layouts/Timer';
// import { Cookie } from '../utils/Cookie'; // TODO: use for countdown tracking

export const Product = {
  onLoad: function() {
    if ( $('.single-product').length) {
      Smooth.onInit( $('.smooth-scroll') );
      this.initImageGallery();
      this.onInitAttributeLabel();
      this.onChangeQuantity();
      this.initScarcityTimer();
      this.initReviewErrorNodes();
      this.onSubmitReview();
    }
  },
  initImageGallery: function() {
    $('#lightgallery').lightGallery({
      zoom: true,
    });
  },
  onInitAttributeLabel: function() {
    // init set selected Attribute Label
    $('.variations select').each(function() {
      const select_val = $(this).val();
      $('label[value="' + select_val + '"]').addClass('selected');
    });
    // on Attribute Label Click
    $('.attribute-label').on('click', function() {
      $('.attribute-label').removeClass('selected');
      $(this).addClass('selected');
      const attribute_name = $(this).attr('for');
      const value = $(this).attr('value');
      const select = $('select[name="' + attribute_name + '"]');
      select.val(value).trigger( 'change' );
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
  initScarcityTimer: function() {
    // TODO: Better conditional: if product has rules && scarcity timer activated
    // TODO: Add ACF scarcity timer to setting
    if ($('#timer').length) {
      // TODO: Countdown needs to be X amount of time from when the user visits the website
      // eslint-disable-next-line no-undef
      console.log(Theme.timer);
      Timer.init('April 24, 2020 00:00:00');
    }
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
