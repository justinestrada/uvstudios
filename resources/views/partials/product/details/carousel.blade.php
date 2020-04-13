
@if ( $product->get_image_id() )
  <style>
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    filter: invert(100%);
  }
  </style>
  @php
  $attachment_ids = $product->get_gallery_image_ids();
  @endphp
  @if ( $attachment_ids && $product->get_image_id() )
    <div class="row">
      <div class="d-none d-lg-block col-lg-4 col-xl-3">
        <div class="carousel-thumbnail card rounded active" style="background-image: url('{{ wp_get_attachment_image_src($product->get_image_id(), 'full')[0] }}');"
           data-target="#carouselProduct" data-slide-to="0" ></div>
        @foreach ( $attachment_ids as $index => $attachment_id )
          @php
          $image = wp_get_attachment_image_src($attachment_id, 'full');
          @endphp
          <div class="carousel-thumbnail card rounded" style="background-image: url('{{ $image[0] }}');"
              data-target="#carouselProduct" data-slide-to="{{ ($index + 1) }}" ></div>
        @endforeach
      </div>
      <div class="col-lg-8 col-xl-9 mb-5 mb-lg-0">
        <div id="carouselProduct" class="carousel slide" data-ride="carousel" data-interval="false" >
          <div class="carousel-inner rounded" style="border: 1px solid rgba(7, 7, 7, 0.125);">
            <div class="carousel-item active" style="background-image: url('{{ wp_get_attachment_image_src($product->get_image_id(), 'full')[0] }}');">
              <span class="visibility-hidden" style="visibility: hidden;">Slide</span>
            </div>
            @foreach ( $attachment_ids as $index => $attachment_id )
              @php
              $image = wp_get_attachment_image_src($attachment_id, 'full');
              @endphp
              <div class="carousel-item" style="background-image: url('{{ $image[0] }}');">
                <span class="visibility-hidden" style="visibility: hidden;">Slide</span>
              </div>
            @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselProduct" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselProduct" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <ol class="carousel-indicators">
            <li data-target="#carouselProduct" data-slide-to="0" class="active"></li>
            @foreach ( $attachment_ids as $index => $attachment_id )
              <li data-target="#carouselProduct" data-slide-to="{{ ($index + 1) }}"></li>
            @endforeach
          </ol>
        </div>
      </div>
    </div>
    <div id="carousel-thumbnails" class="row d-lg-none">
      <div class="col">
        <div class="carousel-thumbnail card rounded active" style="background-image: url('{{ wp_get_attachment_image_src($product->get_image_id(), 'full')[0] }}');"
          data-target="#carouselProduct" data-slide-to="0" ></div>
      </div>
      @foreach ( $attachment_ids as $index => $attachment_id )
        @php
        $image = wp_get_attachment_image_src($attachment_id, 'full');
        @endphp
        <div class="col">
          <div class="carousel-thumbnail card rounded" style="background-image: url('{{ $image[0] }}');"
            data-target="#carouselProduct" data-slide-to="{{ ($index + 1) }}" ></div>
        </div>
      @endforeach
    </div>
  @endif
@else
  <div class="alert-info">
    <p class="text-info m-0">Please set a featured image & product images.</p>
  </div>
@endif
<script>
(function($) {
$('.carousel-thumbnail').on('click', function() {
  $('.carousel-thumbnail').removeClass('active');
  $(this).addClass('active');
});
})(jQuery);
</script>
