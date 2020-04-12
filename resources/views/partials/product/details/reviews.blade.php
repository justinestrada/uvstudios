@php
$rating = $product->get_average_rating();
@endphp
<section id="reviews-section">
  <div id="accordionWriteReview" class="mb-5">
    <div class="card">
      <div id="reviewsOne" class="card-header bg-white p-0">
        <h5 class="mb-0">
          <button class="text-left btn-transparent btn-block p-0 py-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Reviews {{ ($rating_count = $product->get_rating_count()) ? '(' . $rating_count . ')' : '' }}
              <span class="float-right">
                @if ($rating)
                  {{-- <span class="d-inline-block star-rating text-yellow" title="Rating" style="float: none;" >
                    <span style="width: {{ ( $rating / 5 ) * 100 }}%;">
                      <strong itemprop="ratingValue" class="rating">{{ $rating }}</strong> out of 5
                    </span>
                  </span> --}}
                  <span class="d-inline-block">
                    @for ($i = 0; $i < $rating; $i++)
                      <i class="fa fa-star"></i>
                    @endfor
                  </span>
                @endif
                <i class="fa fa-angle-down" style="font-size: 1.5rem;" aria-hidden="true"></i>
              </span>
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="collapse show" aria-labelledby="reviewsOne" data-parent="#accordionWriteReview">
        <div class="card-body px-0">
          @php comments_template(); @endphp
        </div>
      </div>
    </div>
  </div>
</section>
