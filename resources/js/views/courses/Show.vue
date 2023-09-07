<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <h1 class="text-3xl text-gray-200 uppercase font-bold">
        {{ course.name }}
      </h1>
      <!-- <img src="/images/auth/slide1.jpg" alt="" /> -->
      <div class="bg-base-100 p-5 rounded mt-20">
        <h1>{{ course }}</h1>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
import { showCourses } from "../../api/Course";
import DashboardLayout from "./../Dashboardlayout.vue";

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

<style scoped>
#bg {
  background: url("/images/auth/slide1.jpg");
  background-position-x: 70px;
  background-position-y: -500px;
  background-size: cover;
}
#bg::after {
  background-color: rgba(0, 0, 0, 0.4);
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
}
</style>