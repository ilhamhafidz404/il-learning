import { createRouter, createWebHistory } from "vue-router";

import Home from "./views/Home.vue";

// auth
import Login from "./views/auth/Login.vue";
import AdminLogin from "./views/auth/AdminLogin.vue";

// admin
import AdminDashboard from "./views/admin/Dashboard.vue";

// --------------------- student
import StudentDashboard from "./views/student/StudentDashboard.vue";
// Courses
import CourseIndex from "./views/student/courses/Index.vue";
import CourseShow from "./views/student/courses/Show.vue";
// missions
import MissionShow from "./views/student/missions/Show.vue";
// submissions
import SubmissionShow from "./views/student/submissions/Show.vue";
// classroom
import ClassroomIndex from "./views/student/classrooms/Index.vue";
//
import AcceptCredits from "./views/student/credits/Index.vue";
// profile
import ProfileShow from "./views/student/profile/Show.vue";

// --------------------- lecturer
import LecturerDashboard from "./views/lecturer/LecturerDashboard.vue";
// Courses
import LecturerCourseShow from "./views/lecturer/courses/Show.vue";
// Mission
import LecturerMissionShow from "./views/lecturer/missions/Show.vue";
// Submission
import LecturerSubmissionCreate from "./views/lecturer/submissions/Create.vue";
import LecturerSubmissionEdit from "./views/lecturer/submissions/Edit.vue";
import LecturerSubmissionShow from "./views/lecturer/submissions/Show.vue";

const routes = [
    { path: "/", component: Home },

    // auth
    { path: "/login", component: Login },
    { path: "/admin/login", component: AdminLogin },

    // student
    { path: "/dashboard", component: StudentDashboard },
    // courses
    { path: "/courses", component: CourseIndex },
    { path: "/courses/:slug", component: CourseShow, props: true },
    // missions
    { path: "/missions/:slug", component: MissionShow, props: true },
    // sibmissions
    { path: "/submissions/:slug", component: SubmissionShow, props: true },

    { path: "/accept-credits", component: AcceptCredits },

    // profile
    { path: "/profile/:username", component: ProfileShow, props: true },

    // lecturer
    { path: "/lecturer/dashboard", component: LecturerDashboard },
    //
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
    //
    {
        path: "/lecturer/submissions/create",
        component: LecturerSubmissionCreate,
    },
    {
        path: "/lecturer/submissions/:slug/edit",
        component: LecturerSubmissionEdit,
        props: true,
    },
    {
        path: "/lecturer/submissions/:slug",
        component: LecturerSubmissionShow,
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
