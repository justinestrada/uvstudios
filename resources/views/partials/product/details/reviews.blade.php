{{-- TODO: The review accordion toggle needs to be switched --}}
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
      <div id="collapseOne" class="collapse" aria-labelledby="reviewsOne" data-parent="#accordionWriteReview">
        <div class="card-body px-0">
          @php comments_template(); @endphp
        </div>
      </div>
    </div>
  </div>
</section>

<script>
// TODO: move this to scripts/modules/single-product.js
(function($) {
$(document).ready(function() {
/*
  * Reviews Pagination
  * */
if ( $('#comments').length ) {
    const postPerPage = 5;
    const commentCount = $('.commentlist .review').length;
    // if commentCount greater than 10
    if ( commentCount > postPerPage ) {
        // hide reviews eq > 10
        const tempPostPerPage = postPerPage - 1;
        $('.commentlist .review:gt(' + tempPostPerPage + ')').hide();
        // create showing results
        const results = $('<p id="reviews-pagination-results">');
        results.html('Showing 1 - 10 reviews of ' + commentCount + ' results.');
        $('.woocommerce-Reviews-title').after(results);
        // create pagination
        const reviewsPagination = $('<nav id="reviews-pagination" class="woocommerce-pagination">');
        const reviewsPaginationList = $('<ul class="page-numbers">');
        const paginationPages = Math.ceil(commentCount/postPerPage);
        for ( let i = 1; i <= paginationPages; i++ ) {
            const page = $('<li>');
            const pageLink = $('<a>');
            pageLink.addClass('page-numbers').attr('href', 'javascript:void(0);').html(i);
            if ( i === 1) {
                pageLink.addClass('current').attr('style', 'cursor: default;');
            }
            page.append(pageLink);
            reviewsPaginationList.append(page);
        }
        reviewsPagination.append(reviewsPaginationList);
        $('.commentlist').after(reviewsPagination);
        // paginatino listeners
        $('#reviews-pagination a.page-numbers').on('click', function() {
            if ( $(this).hasClass('current') ) {
                return false;
            }
            $('#reviews-pagination .page-numbers').removeClass('current').removeAttr('style');
            const page = parseInt($(this).text());
            const startIndex = ((page - 1) * postPerPage) + 1;
            const endIndex = ((page * postPerPage) < commentCount) ? page * postPerPage : commentCount;
            // hide reviews less than startIndex
            let temp = startIndex - 1;
            if ( temp ) {
                $('.commentlist .review:lt(' + temp + ')').hide();
            }
            // show reviews greater than startIndex
            temp = startIndex - 2;
            if (temp >= 9) {
                $('.commentlist .review:gt(' + temp + ')').show();
            } else {
                $('.commentlist .review').show();
            }
            // hide reviews greater than endIndex
            temp = endIndex - 1;
            $('.commentlist .review:gt(' + temp + ')').hide();
            $('#reviews-pagination-results').html('Showing ' + startIndex + ' - ' + endIndex + ' reviews of ' + commentCount + ' results.');
            $(this).addClass('current').attr('style', 'cursor: default;');
        });
    }
}
});
})(jQuery);
</script>
