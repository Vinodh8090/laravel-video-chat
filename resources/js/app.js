/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");

import Vue from "vue"; // Importing Vue instead of using require

// Making Vue available globally is not necessary if you import it
// Vue is already available within this file and can be used directly

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Automatically register Vue components if needed
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Manually registering Vue components
Vue.component(
  "example-component",
  require("./components/ExampleComponent.vue").default
);
Vue.component("video-chat", require("./components/VideoChat.vue").default);

// Uncomment the following line if AgoraChat component is needed
// Vue.component("agora-chat", require("./components/AgoraChat.vue").default);

// Streaming Components
// Ensure consistent casing in imports
Vue.component("broadcaster", require("./components/BroadCaster.vue").default);
Vue.component("viewer", require("./components/Viewer.vue").default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
  el: "#app", // Mounting Vue instance to the #app element in your HTML
});
