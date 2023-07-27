// app.js
import "./bootstrap";
import { createApp } from "vue";
import router from "./router";
import App from "./App.vue";

// const App = createApp({});

// App.use(router);
// App.mount("#app");
createApp(App).use(router).mount("#app");
