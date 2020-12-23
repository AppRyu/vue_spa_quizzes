import Vue from "vue";
import router from "./router.js";
import SocialSharing from "vue-social-sharing";
import Loading from "vue-loading-overlay";
import Notifications from "vue-notification";
import "vue-loading-overlay/dist/vue-loading.css";
import axios from "axios";
import jQuery from "jquery";
import MainPage from "./components/page/MainPage";
window.$ = window.jQuery = jQuery;
require("bootstrap");

Vue.prototype.$http = axios;

axios.defaults.headers.common["Authorization"] =
    "Bearer " +
    document.querySelector('meta[name="api-token"]').getAttribute("content");

Vue.use(SocialSharing);
Vue.use(Loading);
Vue.use(Notifications);

new Vue({
    router: router,
    components: {
        app: MainPage
    }
}).$mount("#app");
