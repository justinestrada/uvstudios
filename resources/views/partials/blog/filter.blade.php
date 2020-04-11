@php
$categories = get_categories();
@endphp
@if ($categories)
  <section id="filters" class="mb-5">
    <div class="row d-flex justify-content-center">
      @foreach($categories as $category)
        <div class="col-auto mb-3">
          <a href="{{  get_category_link($category->term_id) }}" title="{{ $category->name }}" class="btn btn-outline-black btn-rounded" >{{ $category->name }}</a>
        </div>
      @endforeach
    </div>
  </section>
@endif
