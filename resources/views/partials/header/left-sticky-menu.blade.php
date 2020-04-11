
<section id="left-sticky-menu">
  <svg id="curve" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" version="1.1" id="menu-bg" x="0px" y="0px" width="80px" height="330px" viewBox="0 0 80 330" xml:space="preserve" fill="#070707">
    <path id="menu-unnactive" d="M0,0c0,85.5,80,86.5,80,167S0,244.5,0,330V0z" data-original="M0,0c0,85.5,80,86.5,80,167S0,244.5,0,330V0z"></path>
    <path id="menu-active" d="M0,0c0,85.5,0.797,86.5,0.797,167S0,244.5,0,330V0z"></path>
  </svg>
  <button type="button" class="btn btn-toggle-full-screen-menu" aria-label="Toggle" data-toggle="modal" data-target="#fullScreenModal">
    <span class="sr-only">Toggle</span>
    <img src="{{ App\asset_path('images/icon/menu-bars-white.svg') }}" alt="Open" class="menu-bars"/>
    <img src="{{ App\asset_path('images/icon/close.svg') }}" alt="Close" class="hover-spin close"/>
  </button>
</section>
