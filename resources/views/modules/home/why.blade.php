
@if ($section = get_field('why'))
  <section id="why" class="container py-5">
    <div class="row mb-3">
      <div class="col-lg-5 text-center text-lg-left mb-3 mb-lg-0">
        <h2 class="text-uppercase fs-lg-3.5x mb-3 mb-lg-5">Why UVC?</h2>
        <p class="fs-1.25x mb-3 mb-lg-5">
          {!! $section['text'] !!}
        </p>
        <a href="/blog" class="btn btn-outline-primary">Learn More</a>
      </div>
      @if ($image = $section['image'])
        <div class="col-lg-7">
          <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" class="w-100"/>
        </div>
      @endif
    </div>
    <div class="row">
      @if ($bottom_row_img_1 = $section['bottom_row_img_1'])
        <div class="col-lg-5 mb-3 mb-lg-0">
          <img src="{{ $bottom_row_img_1['url'] }}" alt="{{ $bottom_row_img_1['alt'] }}" class="w-100"/>
        </div>
      @endif
      @if ($bottom_row_img_2 = $section['bottom_row_img_2'])
        <div class="col-lg-7 mb-3 mb-lg-0 d-flex align-items-center">
          <img src="{{ $bottom_row_img_2['url'] }}" alt="{{ $bottom_row_img_2['alt'] }}" class="w-100"/>
        </div>
      @endif
    </div>
  </section>
@endif