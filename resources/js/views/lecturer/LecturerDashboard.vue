<template>
  <LecturerDashboardLayout>
    <section class="col-span-4 pr-7 py-24 dark:text-gray-200 text-gray-700">
      <Widget />
      <SkeletonLoadingDashboard
        v-if="onLoadingGetData"
        :show="onLoadingGetData"
      />
      <section v-else class="grid grid-cols-8 mt-10 gap-10">
        <div class="col-span-5 p-5 shadow-xl rounded bg-base-200">
          <h3 class="text-2xl font-bold flex items-center gap-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor"
              class="w-6 h-6"
            >
              <path
                fill-rule="evenodd"
                d="M6 3a3 3 0 00-3 3v12a3 3 0 003 3h12a3 3 0 003-3V6a3 3 0 00-3-3H6zm1.5 1.5a.75.75 0 00-.75.75V16.5a.75.75 0 001.085.67L12 15.089l4.165 2.083a.75.75 0 001.085-.671V5.25a.75.75 0 00-.75-.75h-9z"
                clip-rule="evenodd"
              />
            </svg>
            Courses
          </h3>
          <CourseCard :courses="courses" :isLecturer="true" />
        </div>
      </section>
    </section>
  </LecturerDashboardLayout>
</template>

<script>
import LecturerDashboardLayout from "./LecturerDashboardLayout.vue";

//actions
import getCourseLecturer from "./../../api/_getCourseLecturer";

// components
import Widget from "../../components/widget.vue";
import CourseCard from "../../components/cards/courseCard.vue";
import SkeletonLoadingDashboard from "../../components/skeletonLoading/dashboard.vue";

export default {
  components: {
    LecturerDashboardLayout,
    //
    Widget,
    CourseCard,
    SkeletonLoadingDashboard,
  },
  data() {
    return {
      courses: null,

      onLoadingGetData: false,
    };
  },
  methods: {
    async getCoursesData(lecturerId) {
      this.onLoadingGetData = true;
      try {
        let result = await getCourseLecturer(lecturerId);
        if (result) {
          this.onLoadingGetData = false;

          this.courses = result.data.courses;
        }
      } catch (error) {
        console.error(error);
      }
    },
  },
  mounted() {
    const authData = JSON.parse(localStorage.getItem("authData"));

    this.getCoursesData(authData.userData.id);
  },
};
</script>

<style>
</style>