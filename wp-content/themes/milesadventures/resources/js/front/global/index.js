import { ComponentLoader } from "@bythepixel/component-loader";
import InViewSrc from "@bythepixel/in-view-src";
import HeaderNav from "@Core/components/headerNav";
import AOS from 'aos';
import 'aos/dist/aos.css';
import PhotoSwipeLightbox from "Photoswipe/dist/photoswipe-lightbox.esm.js";
import PhotoSwipe from "Photoswipe/dist/photoswipe.esm.js";
import 'Photoswipe/dist/photoswipe.css';
import PhotoSwipeDynamicCaption from 'PhotoswipeDynamicCaptionPlugin/dist/photoswipe-dynamic-caption-plugin.esm.min.js';
import 'PhotoswipeDynamicCaptionPlugin/photoswipe-dynamic-caption-plugin.css';

window.global = new ComponentLoader(document, [
  InViewSrc,
  HeaderNav
]);

AOS.init({
  duration: 800,
  once: true,
});

const lightbox = new PhotoSwipeLightbox({
  gallerySelector: '[data-comp-gallery-lightbox]',
  childSelector: '[data-gallery-lightbox-item]',
  showHideAnimationType: 'fade',
  pswpModule: PhotoSwipe,
  loop: false
});

new PhotoSwipeDynamicCaption(lightbox, {
  captionContent: (slide) => {
    return slide.data.element.querySelector('[data-pswp-caption]')?.innerHTML;
  }
});

lightbox.init();
