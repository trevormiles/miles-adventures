import breakpoints from './breakpoints';

export default {
  'b-0': window.matchMedia(`(min-width: ${breakpoints['b-0']}px)`),
  'b-1': window.matchMedia(`(min-width: ${breakpoints['b-1']}px)`),
  'b-2': window.matchMedia(`(min-width: ${breakpoints['b-2']}px)`),
  'b-3': window.matchMedia(`(min-width: ${breakpoints['b-3']}px)`),
  'b-4': window.matchMedia(`(min-width: ${breakpoints['b-4']}px)`),
  'b-5': window.matchMedia(`(min-width: ${breakpoints['b-5']}px)`),
  'b-6': window.matchMedia(`(min-width: ${breakpoints['b-6']}px)`),
};
