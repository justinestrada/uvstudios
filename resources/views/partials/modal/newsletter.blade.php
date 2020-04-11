
@php
$newsletter_modal = get_field('newsletter_modal');
@endphp
@if ($newsletter_modal['enable'])
  <div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="border-radius: 0.5rem;" >
        <div class="modal-body p-0">
          <button type="button" class="close hover-spin" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          @if ( $newsletter_modal['image'] )
            <img src="{{ $newsletter_modal['image']['url'] }}" alt="{{ $newsletter_modal['image']['alt'] }}" class="img-fluid w-100" />
          @endif
          <div class="text-center p-5">
            <h3 style="font-size: 4rem;" >GET 10% OFF</h3>
            <p>today and also receive all of our future discounts and newsletters right to your email.</p>
            {!! do_shortcode('[mc4wp_form id="' . $newsletter_modal['mc4wp_form_id'] . '"]') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endif
