import { ComponentLoader } from "@bythepixel/component-loader";
import InViewSrc from "@bythepixel/in-view-src";
import HeaderNav from "@Core/components/headerNav";
import AOS from 'aos';
import 'aos/dist/aos.css';

window.global = new ComponentLoader(document, [
  InViewSrc,
  HeaderNav
]);

AOS.init({
  duration: 800,
  once: true,
});
