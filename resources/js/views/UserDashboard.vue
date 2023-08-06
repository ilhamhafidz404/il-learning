<template>
  <DashboardLayout>
    <section class="col-span-4 pr-7 py-24 text-gray-200">
      <Widget />
      <section class="grid grid-cols-8 mt-10 gap-10">
        <div class="col-span-5 p-5 shadow-xl rounded">
          <h3 class="text-2xl font-bold">Courses</h3>
          <CourseCard :courses="courses" />
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
import DashboardLayout from "./DashboardLayout.vue";

//actions
import { getCourses } from "./../api/Course";

// components
import Widget from "../components/widget.vue";
import CourseCard from "../components/cards/courseCard.vue";

export default {
  components: {
    DashboardLayout,
    //
    Widget,
    CourseCard,
  },
  data() {
    return {
      courses: null,
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
  },
  mounted() {
    this.getCoursesData();
  },
};
</script>

<style>
</style>