@php
$contact = get_field('contact', 'option');
@endphp
@if ( $contact && $contact['phone'] )
  <section id="contact" class="bg-black py-5" style="background-image: url('{{ App\asset_path('images/leaves-white.png') }}')">
    <div class="container ">
      <div class="row">
        <div class="col-auto">
          <a href="tel:+1{{ $contact['phone'] }}" class="btn btn-white btn-circle mb-3" title="Call" >
            <img src="{{ App\asset_path('images/icon/phone.svg') }}" alt="Phone" style="height: 24px;" />
          </a>
        </div>
        <div class="col">
          <h3 class="text-white mb-3" >Phone Hours</h3>
          <p class="text-white mb-0">Monday - Friday: 8am - 6pm PST<br>Saturday: 8am - 3pm PST</p>
        </div>
      </div>
    </div>
  </section>
@endif
