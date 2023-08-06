<script setup>
import limitStr from "../../tools/limitStr.ts";
</script>

<template>
  <DashboardLayout>
    <section class="mt-24 grid gap-5 grid-cols-3 col-span-4 pr-7">
      <div
        v-for="course in courses"
        :key="course.id"
        class="card bg-base-100 shadow-xl"
      >
        <figure class="p-3">
          <img
            :src="'/storage/' + course.background"
            :alt="course.name"
            class="w-full min-h-[200px] max-h-[200px] rounded-md object-cover"
          />
        </figure>
        <div class="card-body">
          <h2 class="card-title">{{ course.name }}</h2>
          <p>{{ limitStr(course.description, 50) }}</p>
          <div class="card-actions justify-end">
            <button class="btn btn-primary">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from "../DashboardLayout.vue";

// actions
import { getCourses } from "../../api/Course";
export default {
  components: {
    DashboardLayout,
  },
  data() {
    return {
      courses: [],
    };
  },
  methods: {
    async getCoursesData() {
      try {
        let result = await getCourses();
        this.courses = result.data;
        console.log(this.courses);
      } catch (error) {
        console.error(error);
      }
    },
    limitStr() {},
  },
  mounted() {
    this.getCoursesData();
  },
};
</script>

<style>
</style>