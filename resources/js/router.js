import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// auth
import Login from "./views/auth/Login.vue";

// admin
import AdminDashboard from "./views/admin/Dashboard.vue";
import ClassroomIndex from "./views/classroom/Index.vue";

// --------------------- user
import UserDashboard from "./views/UserDashboard.vue";

// Courses
import CourseIndex from "./views/courses/Index.vue";
import CourseShow from "./views/courses/Show.vue";

const routes = [
    { path: "/", component: Home },

    // auth
    { path: "/login", component: Login },

    // user
    { path: "/dashboard", component: UserDashboard },
    { path: "/courses", component: CourseIndex },
    { path: "/courses/:slug", component: CourseShow, props: true },

    //classroom
    { path: "/classrooms", component: ClassroomIndex },

    // admin
    { path: "/admin/dashboard", component: AdminDashboard },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
