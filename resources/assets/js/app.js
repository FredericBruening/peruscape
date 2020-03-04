require('./bootstrap');

window.Vue = require('vue');

import LazyLoadDirective from "./directives/lazyload";
Vue.directive("lazyload", LazyLoadDirective);


Vue.component('feed', require('./components/InstagramFeed.vue').default);

let app = new Vue({
    el: '#app'
});
