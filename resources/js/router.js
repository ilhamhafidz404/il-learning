import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// auth
import Login from "./views/auth/Login.vue";
import AdminLogin from "./views/auth/AdminLogin.vue";

// admin
import AdminDashboard from "./views/admin/Dashboard.vue";
import ClassroomIndex from "./views/classroom/Index.vue";

// --------------------- user
import UserDashboard from "./views/UserDashboard.vue";
// Courses
import CourseIndex from "./views/courses/Index.vue";
import CourseShow from "./views/courses/Show.vue";

// --------------------- lecturer
import LecturerDashboard from "./views/lecturer/LecturerDashboard.vue";
// Courses
import LecturerCourseShow from "./views/lecturer/courses/Show.vue";
// Courses
import LecturerMissionShow from "./views/lecturer/missions/Show.vue";

const routes = [
    { path: "/", component: Home },

    // auth
    { path: "/login", component: Login },
    { path: "/admin/login", component: AdminLogin },

    // user
    { path: "/dashboard", component: UserDashboard },
    { path: "/courses", component: CourseIndex },
    { path: "/courses/:slug", component: CourseShow, props: true },

    // lecturer
    { path: "/lecturer/dashboard", component: LecturerDashboard },
    {
        path: "/lecturer/courses/:slug",
        component: LecturerCourseShow,
        props: true,
    },
    {
        path: "/lecturer/missions/:slug",
        component: LecturerMissionShow,
        props: true,
    },

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
