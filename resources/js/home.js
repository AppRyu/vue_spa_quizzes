import Vue from 'vue';
import App from './components/page/Home';
import VueSocialSharing from 'vue-social-sharing';

Vue.use(VueSocialSharing);

new Vue({
	el: 'app',
	components: {
		app: App,
	},
});
