
@if ($text_bg_img = get_field('text_background_image'))
  <style>
  .bg-overlay {
    position: relative;
  }
  .bg-overlay::before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }
  </style>
  {{-- {{ App\asset_path('images/bg/default.jpg') }} --}}
  <section id="text-bg-img" class="bg-overlay py-5" style="background-size: cover; background-position: center; background-image: url('{{ $text_bg_img['bg_img'] }}')">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <p class="text-white font-weight-bold fs-1.25x mb-3">THE CHLOE</p>
          <hr style="width: 3rem; border: 0.25rem solid white;"/>
          <h2 class="text-white fs-lg-3.5x mb-3">FAR-UVC <br class="d-lg-none">Disinfectant Light</h2>
          <p class="text-white fs-1.25x mb-5">{!! $text_bg_img['text'] !!}</p>
          <a href="/products/the-chloe" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
    </div>
  </section>
@endif
