
@php
$social = get_field('social', 'option');
@endphp
@if ($social)
  <ul class="social-icons" >
    @if ($social['instagram'])
      <li class="mr-3">
        <a href="{{ $social['instagram'] }}" title="View Instagram" target="_blank" >
          @if ($color === 'white')
            <img src="{{ App\asset_path('images/social/instagram.svg') }}" alt="Instagram" target="_blank" style="height: 28px;" />
          @elseif ($color === 'black')
            <img src="{{ App\asset_path('images/social/instagram-black.svg') }}" alt="Instagram" style="height: 28px;" />
          @endif
        </a>
      </li>
    @endif
    @if ($social['facebook'])
      <li class="{{ $social['twitter'] ? 'mr-3' : '' }}">
        <a href="{{ $social['facebook'] }}" title="Vie Facebook" target="_blank" >
          @if ($color === 'white')
            <img src="{{ App\asset_path('images/social/facebook.svg') }}" alt="Facebook" target="_blank" style="height: 28px;" />
          @elseif ($color === 'black')
            <img src="{{ App\asset_path('images/social/facebook-black.svg') }}" alt="Facebook" style="height: 28px;" />
          @endif
        </a>
      </li>
    @endif
    @if ($social['twitter'])
      <li>
        <a href="{{ $social['twitter'] }}" title="View Twitter" target="_blank" >
          @if ($color === 'white')
            <img src="{{ App\asset_path('images/social/twitter.svg') }}" alt="Twitter" target="_blank" style="height: 28px;" />
          @elseif ($color === 'black')
            <img src="{{ App\asset_path('images/social/twitter-black.svg') }}" alt="Twitter" style="height: 28px;" />
          @endif
        </a>
      </li>
    @endif
  </ul>
@endif
