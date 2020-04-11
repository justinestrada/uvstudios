
@php
$announcement = get_field('announcement', 'option');
@endphp
@if ( $announcement['show'] )
  <div id="announcement" class="w-100 py-2">
    <div class="container">
      <div class="row">
        <div class="col position-relative text-center" >
          <div class="text-white">{!! $announcement['text'] !!}</div>
          {{-- <button type="button" class="btn btn-close hover-spin" >
            <img src="{{ App\asset_path('images/icon/close.svg') }}" alt="Close" style="height: 24px; margin-top: -4px;" >
          </button> --}}
        </div>
      </div>
    </div>
  </div>
@endif
