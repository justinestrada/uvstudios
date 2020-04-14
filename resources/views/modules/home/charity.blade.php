
@if ($charity = get_field('charity'))
  <section id="charity" class="container py-5">
    <div class="row">
      <div class="col-lg-4 text-center text-lg-left mb-3 mb-lg-0">
        <h2 class="text-uppercase fs-3.5x mb-3 mb-lg-5">Charity</h2>
        <h4 class="fs-2.5x mb-3 mb-lg-5">
          {!! $charity['subtitle'] !!}
        </h4>
        <div class="fs-1.25x mb-3">
          {!! $charity['text'] !!}
        </div>
        <p class="mb-0">{!! $charity['quote'] !!}</p>
      </div>
      @if ($charity['image'])
        <div class="col-lg-3 mb-3 mb-lg-0 d-flex align-items-lg-end">
          <img src="{{ $charity['image']['url'] }}" alt="{{ $charity['image']['alt'] }}" class="d-block w-100 mx-auto" style="max-width: 256px;"/>
        </div>
        <div class="col-lg-5 d-flex align-items-lg-end">
          <img src="{{ $charity['image_2']['url'] }}" alt="{{ $charity['image_2']['alt'] }}" class="w-100"/>
        </div>
      @endif
    </div>
  </section>
@endif
