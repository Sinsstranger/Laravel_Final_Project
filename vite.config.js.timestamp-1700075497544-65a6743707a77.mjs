// vite.config.js
import { defineConfig } from "file:///C:/OSPanel/domains/Laravel_Final_Project/node_modules/vite/dist/node/index.js";
import laravel from "file:///C:/OSPanel/domains/Laravel_Final_Project/node_modules/laravel-vite-plugin/dist/index.mjs";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/bootstrap.min.css",
        "resources/css/open-iconic-bootstrap.min.css",
        "resources/css/animate.css",
        "resources/css/owl.carousel.min.css",
        "resources/css/owl.theme.default.min.css",
        "resources/css/magnific-popup.css",
        "resources/css/aos.css",
        "resources/css/ionicons.min.css",
        "resources/css/flaticon.css",
        "resources/css/icomoon.css",
        "resources/css/style.css",
        "resources/css/app.css",
        "resources/css/bootstrap.min.css",
        "resources/js/jquery.min.js",
        "resources/js/jquery-migrate-3.0.1.min.js",
        "resources/js/popper.min.js",
        "resources/js/bootstrap.js",
        "resources/js/jquery.easing.1.3.js",
        "resources/js/jquery.waypoints.min.js",
        "resources/js/jquery.stellar.min.js",
        "resources/js/owl.carousel.min.js",
        "resources/js/jquery.magnific-popup.min.js",
        "resources/js/aos.js",
        "resources/js/jquery.animateNumber.min.js",
        "resources/js/scrollax.min.js",
        "resources/js/main.js",
        "resources/js/app.js"
      ],
      refresh: true
    })
  ],
  server: {
    hmr: {
      host: "localhost"
    }
  }
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJDOlxcXFxPU1BhbmVsXFxcXGRvbWFpbnNcXFxcTGFyYXZlbF9GaW5hbF9Qcm9qZWN0XCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCJDOlxcXFxPU1BhbmVsXFxcXGRvbWFpbnNcXFxcTGFyYXZlbF9GaW5hbF9Qcm9qZWN0XFxcXHZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9DOi9PU1BhbmVsL2RvbWFpbnMvTGFyYXZlbF9GaW5hbF9Qcm9qZWN0L3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSc7XG5pbXBvcnQgbGFyYXZlbCBmcm9tICdsYXJhdmVsLXZpdGUtcGx1Z2luJztcbi8vaW1wb3J0IGxhcmF2ZWwgZnJvbSAndml0ZS1wbHVnaW4tZXh0ZXJuYWxpemUtZGVwZW5kZW5jaWVzJztcblxuZXhwb3J0IGRlZmF1bHQgZGVmaW5lQ29uZmlnKHtcbiAgICBwbHVnaW5zOiBbXG4gICAgICAgIGxhcmF2ZWwoe1xuICAgICAgICAgICAgaW5wdXQ6IFtcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9ib290c3RyYXAubWluLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3Mvb3Blbi1pY29uaWMtYm9vdHN0cmFwLm1pbi5jc3MnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvY3NzL2FuaW1hdGUuY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9vd2wuY2Fyb3VzZWwubWluLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3Mvb3dsLnRoZW1lLmRlZmF1bHQubWluLmNzcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9jc3MvbWFnbmlmaWMtcG9wdXAuY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9hb3MuY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9pb25pY29ucy5taW4uY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9mbGF0aWNvbi5jc3MnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvY3NzL2ljb21vb24uY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2Nzcy9zdHlsZS5jc3MnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvY3NzL2FwcC5jc3MnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvY3NzL2Jvb3RzdHJhcC5taW4uY3NzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS5taW4uanMnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvanF1ZXJ5LW1pZ3JhdGUtMy4wLjEubWluLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL3BvcHBlci5taW4uanMnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvYm9vdHN0cmFwLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS5lYXNpbmcuMS4zLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS53YXlwb2ludHMubWluLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS5zdGVsbGFyLm1pbi5qcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9vd2wuY2Fyb3VzZWwubWluLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS5tYWduaWZpYy1wb3B1cC5taW4uanMnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvYW9zLmpzJyxcbiAgICAgICAgICAgICAgICAncmVzb3VyY2VzL2pzL2pxdWVyeS5hbmltYXRlTnVtYmVyLm1pbi5qcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9zY3JvbGxheC5taW4uanMnLFxuICAgICAgICAgICAgICAgICdyZXNvdXJjZXMvanMvbWFpbi5qcycsXG4gICAgICAgICAgICAgICAgJ3Jlc291cmNlcy9qcy9hcHAuanMnXG4gICAgICAgICAgICBdLFxuICAgICAgICAgICAgcmVmcmVzaDogdHJ1ZSxcbiAgICAgICAgfSksXG4gICAgXSxcbiAgICBzZXJ2ZXI6IHtcbiAgICAgICAgaG1yOiB7XG4gICAgICAgICAgICBob3N0OiAnbG9jYWxob3N0JyxcbiAgICAgICAgfSxcbiAgICB9LFxufSk7XG4iXSwKICAibWFwcGluZ3MiOiAiO0FBQWtULFNBQVMsb0JBQW9CO0FBQy9VLE9BQU8sYUFBYTtBQUdwQixJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUN4QixTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixPQUFPO0FBQUEsUUFDSDtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsUUFDQTtBQUFBLFFBQ0E7QUFBQSxRQUNBO0FBQUEsTUFDSjtBQUFBLE1BQ0EsU0FBUztBQUFBLElBQ2IsQ0FBQztBQUFBLEVBQ0w7QUFBQSxFQUNBLFFBQVE7QUFBQSxJQUNKLEtBQUs7QUFBQSxNQUNELE1BQU07QUFBQSxJQUNWO0FBQUEsRUFDSjtBQUNKLENBQUM7IiwKICAibmFtZXMiOiBbXQp9Cg==
