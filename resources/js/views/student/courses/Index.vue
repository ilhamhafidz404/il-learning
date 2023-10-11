<script setup>
import limitStr from "./../../../tools/limitStr.ts";
</script>

<template>
  <Loading :show="isLoading" />
  <DashboardLayout>
    <section class="mt-24 grid gap-5 grid-cols-3 col-span-4 pr-7">
      <div
        v-for="course in courses"
        :key="course.id"
        class="card bg-base-100 shadow-xl"
      >
        <router-link :to="'/courses/' + course.slug">
          <figure class="p-3">
            <img
              :src="'/storage/' + course.background"
              :alt="course.name"
              class="w-full min-h-[200px] max-h-[200px] rounded-md object-cover"
            />
          </figure>
          <div class="card-body">
            <small>
              {{ course.program.name }} ({{ course.program.level }})</small
            >
            <h2 class="card-title -mt-2">{{ course.name }}</h2>
            <p>{{ limitStr(course.description, 70) }}</p>
            <!-- <div class="card-actions justify-end mt-5">
            <button class="btn btn-secondary btn-sm">See My Course</button>
            <button class="btn btn-primary btn-sm">Read More</button>
          </div> -->
          </div>
        </router-link>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from "./../StudentDashboardLayout.vue";
import Loading from "./../../../components/loading.vue";

// actions
import { getCourses } from "./../../../api/Course";
export default {
  components: {
    DashboardLayout,
    Loading,
  },
  data() {
    return {
      courses: [],
      isLoading: false,
    };
  },
  methods: {
    async getCoursesData() {
      this.isLoading = false;
      try {
        let result = await getCourses();
        this.isLoading = true;
        this.courses = result.data;
      } catch (error) {
        console.error(error);
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