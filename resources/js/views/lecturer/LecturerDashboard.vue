<template>
  <LecturerDashboardLayout>
    <section class="col-span-4 pr-7 py-24 dark:text-gray-200 text-gray-700">
      <Widget />
      <SkeletonLoadingDashboard
        v-if="onLoadingGetData"
        :show="onLoadingGetData"
      />
      <section v-else class="grid grid-cols-8 mt-10 gap-10">
        <div class="col-span-5 p-5 shadow-xl rounded">
          <h3 class="text-2xl font-bold">Courses</h3>
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