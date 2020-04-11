{{--
  Template Name: My Account
--}}

@extends('layouts.app')

<?php
?>
@section('content')
<style>
.nav-pills .nav-link {
  color: black;
  font-family: "Oswald", sans-serif !important;
  text-transform: uppercase;
}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: black;
  background-color: transparent;
  border-radius: 70px;
  font-family: "Oswald", sans-serif !important;
  border-bottom: 3px solid #ffe135;
  border-radius: 0;
}

.nav-pills .nav-item {
  margin-right: 1rem;
}

.nav-pills .nav-item:last-child {
  margin-right: 0;
}

/*
.template-my-account .woocommerce {
  display: none;
}
*/
</style>
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page.breadcrumb')
    {!! do_shortcode('[woocommerce_my_account]') !!}
    <div class="row justify-content-center mb-5">
      <div class="col-auto text-center">
        <h2 class="text-center text-uppercase mb-0">My Account</h2>
      </div>
    </div>
    <div class="row justify-content-center mb-5">
      <div class="col-auto">
        <ul class="nav nav-pills mx-auto mb-5" id="pills-tab" role="tablist" style="width: fit-content;">
          <li class="nav-item">
            <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-orders-tab" data-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-billing-tab" data-toggle="pill" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Billing</a>
          </li>
        </ul>
        <div id="pills-tabContent" class="tab-content">
          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            @php
            /*
            App\giftoflifecbd_my_addresses()
            App\giftoflifecbd_edit_address()
            */
            @endphp
          </div>
          <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="pills-orders-tab">orders</div>
          <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="pills-billing-tab">billing</div>
        </div>
      </div>
    </div>
  @endwhile
<script>
(function($) {
$('#addresses .btn-edit-address').on('click', function() {
  const address = $(this).attr('data-address');
  $(this).hide();
  $('#' + address).hide();
  $('#' + address + '-form').removeClass('d-none');
});
})(jQuery);
</script>
@endsection
