import Component from '@bythepixel/component-loader';
import { eventThrottle } from '../../utility';

export default class HeaderNav extends Component {
  static loaderPriority = 'in-view';
  static selector = '[data-comp-header-nav]';

  constructor(containerEl) {
    super(containerEl);
    this.trigger = this.$container.querySelector('[data-trigger]');
    this.activeClass = 'header-nav--active';
    this.mainNavBreakpoint = '768px';
    this.addTriggerListener();
    this.addWindowResizeListener();
    console.log('test');
  }

  addTriggerListener() {
    this.trigger.addEventListener('click', () => {
      this.toggleMobileMenu();
    });
  }

  toggleMobileMenu() {
    this.$container.classList.toggle(this.activeClass);
    this.toggleBodyStyle(this.$container.classList.contains(this.activeClass));
  }

  addWindowResizeListener() {
    window.addEventListener('resize', eventThrottle(() => {
      if (window.matchMedia(`(min-width: ${this.mainNavBreakpoint})`).matches && this.$container.classList.contains(this.activeClass)) {
        this.toggleMobileMenu();
      }
    }, 200));
  }

  toggleBodyStyle(toggleOpen) {
    if (toggleOpen) {
      Object.assign(document.body.style, {
        position: 'fixed',
        height: '100%',
        width: '100%',
      });
    } else {
      Object.assign(document.body.style, {
        position: 'static',
        height: null,
        width: null,
      });
    }
  }
}
