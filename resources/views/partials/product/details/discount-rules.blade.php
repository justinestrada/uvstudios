
@php
$discount_rules = get_field('discount_rules');
@endphp
@if ($discount_rules && class_exists('FlycartWooDiscountRulesCartRules'))
  @if ($discount_rules['enable'])
    @if ($rules = $discount_rules['rules'])
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
          @foreach($rules as $key => $option)
            <div class="col-6 mb-3">
              <span class="d-block savings text-green text-center">{!! $option['savings'] !!}</span>
              <div class="form-group mb-0">
                <label name="quantity_discount" class="attribute-label btn btn-outline-black px-0 {{ $key === 0 ? 'selected' : '' }}" value="{{ $option['value'] }}" total_discount="{{ $option['total_discount'] }}" price="{{ $option['price'] }}" sale_price="{{ $option['sale_price'] }}">
                  {!! $option['label'] !!}
                </label>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    @else
      <div class="alert alert-info">
        <p class="text-info mb-0">Discount Rules missing</p>
      </div>
    @endif
  @endif
@endif
