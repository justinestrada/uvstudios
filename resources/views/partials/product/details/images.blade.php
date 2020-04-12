@php
$attachment_ids = $product->get_gallery_image_ids();
$images_per_row = get_field('images_per_row');
$column_class = 'col-md-6';
$column_class .= ($images_per_row === '3') ? ' col-xl-4' : '';
@endphp
<section id="images">
  @if ( ! $attachment_ids )
    <div class="mb-4">
      @if ( $image = wp_get_attachment_image_src($product->get_image_id(), 'full') )
        <img src="{{ $image[0] }}" alt="Featured Image" class="w-100 img-fluid" style="border: 1px solid #ddd;"/>
      @else
        <div class="alert alert-info mb-0">
          <p class="text-info m-0">Add a featured image.</p>
        </div>
      @endif
    </div>
  @else
    <div id="lightgallery" class="row">
      @foreach ( $attachment_ids as $index => $attachment_id )
        @if ($image = wp_get_attachment_image_src($attachment_id, 'full'))
          <!-- lightgallery: href value is the image src -->
          <a class="{{ $column_class }} mb-4" href="{{ $image[0] }}">
            <div class="product-image rounded z-depth-1" style="background-image: url('{{ $image[0] }}')"></div>
          </a>
        @endif
      @endforeach
    </div>
  @endif
</section>
