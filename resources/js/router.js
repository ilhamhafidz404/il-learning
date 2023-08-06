import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// auth
import Login from "./views/auth/Login.vue";

// admin
import AdminDashboard from "./views/admin/Dashboard.vue";

// --------------------- user
import UserDashboard from "./views/UserDashboard.vue";

// Courses
import CourseIndex from "./views/courses/Index.vue";

const routes = [
    { path: "/", component: Home },

    // auth
    { path: "/login", component: Login },

    // user
    { path: "/dashboard", component: UserDashboard },
    { path: "/courses", component: CourseIndex },

    // admin
    { path: "/admin/dashboard", component: AdminDashboard },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
