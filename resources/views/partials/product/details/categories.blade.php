
@php
$categories = wc_get_product_category_list( $product->get_id() );
@endphp
<p class="categories text-dark-gray">{!! $categories !!}</p>
