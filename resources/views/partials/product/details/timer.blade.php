
@php
$timer = get_field('timer');
@endphp
@if ($timer['enable'])
  <div id="timer" class="text-center" style="display: none;" >
    <ul class="p-0 mb-3">
      <li>
        <small>Days</small>
        <span id="days" ></span>
      </li>
      <li>
        <small>Hours</small>
        <span id="hours"></span>
      </li>
      <li>
        <small>Minutes</small>
        <span id="minutes"></span>
      </li>
      <li>
        <small>Seconds</small>
        <span id="seconds"></span>
      </li>
    </ul>
    <p class="mb-0">{!! $timer['below_timer_text'] !!}</p>
  </div>
@endif
