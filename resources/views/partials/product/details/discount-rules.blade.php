
@php
// TODO: if product has rules
$product_has_discount_rules = is_product(64);
@endphp
@if (class_exists('FlycartWooDiscountRulesCartRules') && $product_has_discount_rules)
  @php
  $quantity_discounts = [
    [
      'label' => 'One Chloe<span class="d-none d-lg-inline-block"> $35</span>',
      'value' => 1,
      'savings' => '&nbsp;',
      'total_discount' => 0,
      'price' => 35,
    ],
    [
      'label' => 'Two Chloes<span class="d-none d-lg-inline-block"> $60</span>',
      'value' => 2,
      'savings' => 'Save $10',
      'total_discount' => 10,
      'price' => 60,
    ],
    [
      'label' => 'Three Chloes<span class="d-none d-lg-inline-block"> $90</span>',
      'value' => 3,
      'savings' => 'Save $15',
      'total_discount' => 15,
      'price' => 90,
    ],
    [
      'label' => 'Four Chloes<span class="d-none d-lg-inline-block"> $120</span>', // 'Four Chloes $120',
      'value' => 4,
      'savings' => 'Save $20', 
      'total_discount' => 20,
      'price' => 120,
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
    <div class="row attributes">
      @foreach($quantity_discounts as $key => $option)
        <div class="col-6 mb-3">
          <span class="d-block savings text-green text-center">{!! $option['savings'] !!}</span>
          <div class="form-group mb-0">
            <label name="quantity_discount" class="attribute-label btn btn-outline-black px-0 {{ $key === 0 ? 'selected' : '' }}" value="{{ $option['value'] }}" total_discount="{{ $option['total_discount'] }}" price="{{ $option['price'] }}">
              {!! $option['label'] !!}
            </label>
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endif