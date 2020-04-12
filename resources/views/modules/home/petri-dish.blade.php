
@if ($section = get_field('petri_dish'))
  <section id="why" class="bg-light-gray py-5">
    <div class="container">
      <div class="row mb-3 mb-lg-5">
        <div class="col text-center">
          <h2 class="fs-3.5x mb-0">A Petri Dish <br class="d-lg-none">In Your Pocket</h2>
        </div>
      </div>
      <div class="row">
        @if ($image = $section['before_after_img'])
          <div class="col-6 col-lg-3 mb-3 mb-lg-0">
            <img src="{{ $image['url'] }}" src="{{ $image['alt'] }}" class="w-100"/>
          </div>
          <div class="col-6 col-lg-3 d-flex align-items-center">
            <div>
              <p class="h1 text-uppercase mb-5">Before</p>
              <p class="h1 text-uppercase mb-0">After<br><strong class="text-primary text-uppercase">Chloe.</strong></p>
            </div>
          </div>
        @endif
        <div class="col-lg-6 text-center text-lg-right">
          <p class="fs-1.25x mb-3 mb-lg-5">{!! $section['text'] !!}</p>
          <a href="/products/the-chloe" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
    </div>
  </section>
@endif
