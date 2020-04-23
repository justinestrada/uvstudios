
@php
// TODO: if product has rules
$product_has_discount_rules = is_product(64);
@endphp
@if (class_exists('FlycartWooDiscountRulesCartRules') && $product_has_discount_rules)
  @php
  $quantity_discounts = [
    [
      'label' => 'One Chloe $35',
      'value' => 1,
      'savings' => '&nbsp;',
    ],
    [
      'label' => 'Two Chloes $60',
      'value' => 2,
      'savings' => 'Save $10',
    ],
    [
      'label' => 'Three Chloes $90',
      'value' => 3,
      'savings' => 'Save $15',
    ],
    [
      'label' => 'Three Chloes $120',
      'value' => 4,
      'savings' => 'Save $20', 
    ]
  ];
  @endphp
  <style>
  .woo_discount_rules_variant_table,
  #default-quantity-row {
    display: none;
  }
  .savings {
    color: #007e32;
    font-size: 0.875rem;
    font-weight: bold;
  }
  </style>
  <section id="quantity-discount">
    <div class="row">
        <div class="col">
            <h6 class="mb-0">Select Quantity</h6>
        </div>
    </div>
    <div class="row">
      @foreach($quantity_discounts as $key => $option)
        <div class="col-6 mb-3">
          <span class="d-block savings text-green text-center">{!! $option['savings'] !!}</span>
          <div class="form-group mb-0">
            <label for="quantity_{{ $key + 1 }}" class="attribute-label btn btn-outline-black px-0" value="{{ $option['value'] }}">
              {{ $option['label'] }}
            </label>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  <script>
  (function($) {
  const QuantityDiscount = {
    onLoad: function() {
      if ($('#quantity-discount').length) {
        // $('.woo_discount_rules_variant_table').hide(); // solved with css
        // $('.btn-group-quantity').hide(); // solved with css
        this.onLabelClick();
      }
    },
    hideDefaultQuantity: function() {
      $('.btn-group-quantity').hide();
    },
    onLabelClick: function() {
      $('#quantity-discount .attribute-label').on('click', function() {
        const quantity = $(this).attr('value');
        $('[name="quantity"]').val(quantity);
      });
    },
  };
  $(document).ready(function() {
    QuantityDiscount.onLoad();
  });
  })(jQuery);
  </script>
@endif