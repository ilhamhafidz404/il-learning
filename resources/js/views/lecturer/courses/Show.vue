<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          {{ course.name }}
        </h1>

        <div class="absolute right-0 bottom-[20px] flex gap-3">
          <button class="btn btn-primary" onclick="createMission.showModal()">
            Add Mission
          </button>
        </div>
      </div>
      <!-- <img src="/images/auth/slide1.jpg" alt="" /> -->
      <div class="grid grid-cols-2 gap-5 bg-base-100 p-5 rounded shadow">
        <router-link
          :to="'/lecturer/missions/' + mission.slug"
          v-for="mission in missions"
          :key="mission.id"
          class="bg-base-200 p-5 rounded hover:bg-base-300"
        >
          <h2>{{ mission.name }}</h2>
          <div class="flex gap-3 mt-1">
            <ArchiveBoxIcon myClass="w-5" />
            <p class="text-sm">
              Has {{ mission.submission.length }} submissions
            </p>
          </div>
        </router-link>
      </div>
    </section>

    <CreateMissionModal
      :courseName="course.name"
      :courseId="course.id"
      @resetGetPage="showCoursesData"
    />
  </DashboardLayout>
</template>

<script>
// icons
import ArchiveBoxIcon from "../../../components/icons/archiveBoxIcon.vue";

// api
import { showCourses } from "../../../api/Course";

// components
import CreateMissionModal from "../../../components/modal/createMission.vue";

//
import DashboardLayout from "./../../Dashboardlayout.vue";

// actions
export default {
  props: ["slug"],
  components: {
    //icons
    ArchiveBoxIcon,
    // components
    CreateMissionModal,
    //
    DashboardLayout,
  },
  data() {
    return {
      course: [],
      missions: [],
      progresses: [],
    };
  },
  methods: {
    async showCoursesData() {
      try {
        let result = await showCourses(this.slug);
        //
        this.course = result.data.course;
        this.missions = result.data.missions;
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