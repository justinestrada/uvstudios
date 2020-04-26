import { Timer } from '../layouts/Timer';

export const Splash = {
  onLoad: function() {
    if ($('.template-splash').length) {
      Timer.init();
    }
  },
};
