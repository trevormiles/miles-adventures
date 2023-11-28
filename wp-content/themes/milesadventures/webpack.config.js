const path = require("path");

module.exports = {
  resolve: {
    alias: {
      "ma:foundation": path.resolve(__dirname, "resources/scss/abstracts/foundation"),
      "ma:utility": path.resolve(__dirname, "resources/scss/abstracts/utility"),
      "@Core": path.resolve(__dirname, "resources/js/core"),
      "@Utility$": path.resolve(__dirname, "resources/js/core/utility"),
      "@Constants": path.resolve(__dirname, "resources/js/core/constants"),
      "@Front": path.resolve(__dirname, "resources/js/front"),
      "Photoswipe": path.resolve(__dirname, "node_modules/photoswipe"),
      "PhotoswipeDynamicCaptionPlugin": path.resolve(__dirname, "node_modules/photoswipe-dynamic-caption-plugin")
    },
  },
};
