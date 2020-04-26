import { Smooth } from '../utils/smooth';
import { Timer } from '../layouts/Timer';
import { Cookie } from '../utils/Cookie';

const QuantityDiscount = {
  onLoad: function() {
    if ($('#quantity-discount').length) {
      // $('.woo_discount_rules_variant_table').hide(); // solved with css
      // $('.btn-group-quantity').hide(); // solved with css
      this.onLabelClick();
    }
  },
  onLabelClick: function() {
    $('#quantity-discount .attribute-label').on('click', function() {
      const quantity = $(this).attr('value');
      $('[name="quantity"]').val(quantity);
    });
  },
  updatePriceShown: function() {
    // selected attributes thats not a quantity_disc
    const $selected_variation = $('.attributes .attribute-label.selected:not([name="quantity_discount"])');
    const $selected_quantity_discount = $('.attribute-label[name="quantity_discount"].selected');
    if ($selected_variation.length && $selected_quantity_discount.length) {
      const selected_variation_value = $selected_variation.attr('value');
      const selected_variation_name = $selected_variation.attr('name');
      const product_variations = JSON.parse($('.variations_form').attr('data-product_variations'));
      let selected_variation_name_price = false;
      product_variations.forEach(function(variation) {
        if (variation.attributes[selected_variation_name] === selected_variation_value) {
          selected_variation_name_price = variation.display_price;
        }
      })
      const quantity = parseInt($('.variations_form [name="quantity"]').val());
      const regular_price = selected_variation_name_price * quantity;
      const total_discount = parseInt($selected_quantity_discount.attr('total_discount'));
      const sale_price = regular_price - total_discount;
      let html = '<span class="woocommerce-Price-amount amount sale-price '; 
              html += (sale_price < regular_price) ? 'text-green ' : '';
              html += 'mr-2" >';
              html += '<span class="woocommerce-Price-currencySymbol">$</span>' + sale_price;
          html += '</span>';
          if (sale_price < regular_price) {
            html += '<strike class="woocommerce-Price-amount amount regular-price" style="font-size: 1.25rem;" >';
                html += '<span class="woocommerce-Price-currencySymbol">$</span>' + regular_price;
            html += '</strike>';
          }
      $('#sticky-add-to-cart .price').html(html);
    }
  },
};

/* eslint-disable no-undef */
export const Product = {
  onLoad: function() {
    if ( $('.single-product').length) {
      Smooth.onInit( $('.smooth-scroll') );
      this.initImageGallery();
      this.onReviewCountClick();
      this.onInitAttributeLabel();
      this.onChangeQuantity();
      this.initScarcityTimer();
      this.initReviewErrorNodes();
      this.onSubmitReview();
      QuantityDiscount.onLoad();
    }
  },
  initImageGallery: function() {
    $('#lightgallery').lightGallery({
      zoom: true,
    });
  },
  onReviewCountClick: function() {
    $('[href="#reviews"]').on('click', function() {
      $('#collapseOne').collapse('toggle');
    });
  },
  onInitAttributeLabel: function() {
    // init set selected Attribute Label
    $('.variations select').each(function() {
      const select_val = $(this).val();
      $('label[value="' + select_val + '"]').addClass('selected');
    });
    // on Attribute Label Click
    $('.attributes .attribute-label').on('click', function() {
      const attribute_group = $(this).attr('name');
      $('.attribute-label[name="' + attribute_group + '"]').removeClass('selected');
      $(this).addClass('selected');
      const attribute_name = $(this).attr('name');
      const value = $(this).attr('value');
      const select = $('select[name="' + attribute_name + '"]');
      select.val(value).trigger( 'change' );
      setTimeout(function() {
        QuantityDiscount.updatePriceShown();
      }, 250);
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
    if ($('#timer').length) {
      const cookie_name = 'TIMER_END_DATE_' + Theme.product_id;
      const cookie_value = Cookie.read(cookie_name);
      const today = new Date();
      let endDate = null;
      if ( cookie_value !== null && cookie_value !== '' ) {
        endDate = new Date(cookie_value);
        // Cookie date is less than Today
        if (endDate < new Date()) {
          // then reset timer to stored duration
          endDate = this.getDefaultEndDate(today);
        }
      } else {
        endDate = this.getDefaultEndDate(today);
        // Create timer end date cookie
        Cookie.create(cookie_name, endDate, 7);
      }
      Timer.init(endDate);
      setTimeout(function() {
        if ($('#timer #days').text() === '00') {
          $('#timer #days').parent().hide();
        }
        // if ($('#timer #hours').text() === '00') {
        //   $('#timer #hours').parent().hide();
        // }
      }, 1000);
    }
  },
  getDefaultEndDate: function(endDate) {
    endDate.setDate(endDate.getDate() + parseInt(Theme.timer.duration.days));
    endDate.setHours(endDate.getHours() + parseInt(Theme.timer.duration.hours));
    endDate.setMinutes(endDate.getMinutes() + parseInt(Theme.timer.duration.minutes));
    return endDate;
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
