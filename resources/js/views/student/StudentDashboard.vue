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
        <div class="col-span-5 p-5 shadow rounded bg-base-200">
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
          <div v-if="courses.length">
            <CourseCard :courses="courses" />
          </div>
          <div v-else class="text-xl text-center mt-5">
            <p class="text-4xl">☹️</p>
            <h2 class="mt-2 font-semibold mb-4">You doesn't have course</h2>
          </div>
        </div>
        <div class="col-span-3">
          <div class="shadow-md bg-base-200">
            <div class="card-body p-5">
              <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                <span>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="w-6 h-6"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </span>
                Upcoming Event
              </h3>
              <div v-if="uncompleteds.length">
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
              <div v-else class="flex items-center justify-center">
                <div>
                  <span
                    class="bg-base-300 w-[80px] h-[80px] rounded-full flex items-center justify-center mx-auto"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                      class="w-12 text-error"
                    >
                      <path
                        d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z"
                      />
                      <path
                        fill-rule="evenodd"
                        d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zm6.133 2.845a.75.75 0 011.06 0l1.72 1.72 1.72-1.72a.75.75 0 111.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 11-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </span>
                  <p class="mt-2 font-bold mb-2">
                    You don't have upcoming event
                  </p>
                </div>
              </div>
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