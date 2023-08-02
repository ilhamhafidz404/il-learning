// app.js
import "./bootstrap";
import { createApp } from "vue";
import router from "./router";
import App from "./App.vue";
import store from "./store";

// new Vue({
//     store,
//     render: (h) => h(App),
// }).$mount("#app");

createApp(App).use(store).use(router).mount("#app");
