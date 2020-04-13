@php
$average = $product->get_average_rating();
$rating_count = $product->get_rating_count();
@endphp
<section id="reviews-section">
  <div id="accordionWriteReview" class="mb-5">
    <div class="card">
      <div id="reviewsOne" class="card-header bg-white p-0">
        <h5 class="mb-0">
          <button class="btn btn-link text-black text-left w-100 px-2 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Reviews {{ ($rating_count) ? '(' . $rating_count . ')' : '' }}
              <span class="float-right">
                @if ($average)
                  {{-- <span class="d-inline-block star-rating text-yellow" title="Rating" style="float: none;" >
                    <span style="width: {{ ( $rating / 5 ) * 100 }}%;">
                      <strong itemprop="ratingValue" class="rating">{{ $rating }}</strong> out of 5
                    </span>
                  </span> --}}
                  <span class="d-inline-block mr-1">
                    @for ($i = 0; $i < $average; $i++)
                      @if ($i !== (int)$average)
                        <i class="fa fa-star fs-1.25x text-yellow"></i>
                      @else
                        <i class="fa fa-star-half-o fs-1.25x text-yellow"></i>
                      @endif
                    @endfor
                  </span>
                @endif
                <img src="{{ App\asset_path('images/icon/arrow.svg') }}" class="float-right" style="height: 24px; margin: 6px 0;" />
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
