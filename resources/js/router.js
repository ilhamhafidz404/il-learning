import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// admin
import AdminDashboard from "./views/admin/Dashboard.vue";
import ClassroomIndex from "./views/classroom/Index.vue"

const routes = [
    { path: "/", component: Home },

    // admin
    { path: "/admin/dashboard", component: AdminDashboard },
    { path: "/classroom/index", component: ClassroomIndex },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
