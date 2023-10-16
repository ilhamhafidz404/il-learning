<script setup>
import diffForHumans from "../../tools/diffForHumans";
</script>
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
        <div class="col-span-3">
          <div class="shadow-md">
            <div class="card-body">
              <h3 class="text-xl font-bold mb-4">Upcoming Event</h3>
              <router-link
                :to="'submissions/' + uncompleted.submission.slug"
                class="flex items-center gap-2 mb-5"
                v-for="uncompleted in uncompleteds"
                :key="uncompleted.id"
              >
                <span class="bg-primary inline-block p-2 rounded">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                    />
                  </svg>
                </span>
                <div class="w-full">
                  <p class="font-bold pb-0">
                    {{ uncompleted.submission.name }}
                  </p>
                  <small class="block -mt-[5px]"
                    >Mission 1 - Algoritma Pemrogramman</small
                  >
                </div>
                <small class="w-[100px]">{{
                  diffForHumans(uncompleted.submission.deadline)
                }}</small>
              </router-link>
            </div>
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
import getUncompetedSubmission from "../../api/_getUncompletedSubmission";

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
      uncompleteds: [],

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
    async getUncompletedSubmissionData() {
      let result = await getUncompetedSubmission();
      if (result) {
        this.uncompleteds = result.data;
      }
    },
  },
  mounted() {
    this.getCoursesData();
    this.getUncompletedSubmissionData();
  },
};
</script>

<style>
</style>