import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// auth
import Login from "./views/auth/Login.vue";


// admin
import AdminDashboard from "./views/admin/Dashboard.vue";

const routes = [
    { path: "/", component: Home },

    // auth
    { path: "/login", component: Login },


    // admin
    { path: "/admin/dashboard", component: AdminDashboard },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
