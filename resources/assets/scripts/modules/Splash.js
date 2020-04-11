import { Countdown } from '../layouts/countdown';

export const Splash = {
  onLoad: function() {
    if ($('.template-splash').length) {
      Countdown.init();
    }
  },
};
