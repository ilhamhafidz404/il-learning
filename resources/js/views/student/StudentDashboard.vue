<template>
  <DashboardLayout>
    <section class="col-span-4 pr-7 py-24 dark:text-gray-200 text-gray-700">
      <Widget />
      <SkeletonLoadingDashboard
        v-if="onLoadingGetData"
        :show="onLoadingGetData"
      />
      <section v-else class="grid grid-cols-8 mt-10 gap-10">
        <div class="col-span-5 p-5 shadow-xl rounded">
          <h3 class="text-2xl font-bold">Courses</h3>
          <div v-if="courses.length">
            <CourseCard :courses="courses" />
          </div>
          <div v-else class="text-xl text-center mt-5">
            <p class="text-4xl">☹️</p>
            <h2 class="mt-2 font-semibold mb-4">You doesn't have course</h2>
          </div>
        </div>
        <div class="shadow-md col-span-3">
          <div class="card-body">
            <h3 class="text-xl font-bold">Upcoming Event</h3>
          </div>
        </div>
      </section>
    </section>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from "./StudentDashboardLayout.vue";

//actions
import { getCourses } from "../../api/Course";

// components
import Widget from "../../components/widget.vue";
import CourseCard from "../../components/cards/courseCard.vue";
import SkeletonLoadingDashboard from "../../components/skeletonLoading/dashboard.vue";

export default {
  components: {
    DashboardLayout,
    //
    Widget,
    CourseCard,
    SkeletonLoadingDashboard,
  },
  data() {
    return {
      courses: [],

      onLoadingGetData: false,
    };
  },
  methods: {
    async getCoursesData() {
      this.onLoadingGetData = true;
      let result = await getCourses();
      if (result) {
        this.onLoadingGetData = false;
        this.courses = result.data;
      }
    },
  },
  mounted() {
    this.getCoursesData();
  },
};
</script>

<style>
</style>