<template>
  <DashboardLayout>
    <section class="mt-24 grid gap-5 grid-cols-3 col-span-4 pr-7">
      <h1>{{ course }}</h1>
    </section>
  </DashboardLayout>
</template>

<script>
import { showCourses } from "../../api/Course";
import DashboardLayout from "../DashboardLayout.vue";

// actions
export default {
  props: ["slug"],
  components: {
    DashboardLayout,
  },
  data() {
    return {
      course: [],
    };
  },
  methods: {
    async showCoursesData() {
      try {
        let result = await showCourses(this.slug);
        this.course = result.data;
        console.log(this.course);
      } catch (error) {
        console.error(error);
      }
    },
  },
  mounted() {
    this.showCoursesData();
  },
};
</script>

<style>
</style>