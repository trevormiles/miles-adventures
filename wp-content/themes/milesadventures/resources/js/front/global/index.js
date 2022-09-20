import { ComponentLoader } from "@bythepixel/component-loader";
import InViewSrc from "@bythepixel/in-view-src";
import HeaderNav from "@Core/components/headerNav";

window.global = new ComponentLoader(document, [
  InViewSrc,
  HeaderNav
]);