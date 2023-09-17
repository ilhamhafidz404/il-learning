<script setup>
// tools
import diffForHumans from "./../../../tools/diffForHumans";
</script>
<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          {{ mission.name }}
        </h1>
        <!-- <p>{{ mission.course.name }}</p> -->

        <div class="absolute right-0 bottom-[20px] flex gap-3">
          <!-- <router-link to="/mission/create/" class="btn btn-accent"
            >Add Mission</router-link
          > -->
          <router-link to="/submission/create/" class="btn btn-primary">
            Add Submission
          </router-link>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-5 bg-base-100 p-5 rounded shadow">
        <router-link
          :to="'/lecturer/mission/' + submission.slug"
          v-for="submission in submissions"
          :key="submission.id"
          class="bg-base-200 p-5 rounded hover:bg-base-300"
        >
          <h2 class="font-semibold mb-2">{{ submission.name }}</h2>
          <p class="text-sm mb-1">
            {{ diffForHumans(submission.deadline) }}
          </p>
          <h3 class="text-sm">
            For :
            <span class="font-semibold">{{ submission.classroom.name }}</span>
          </h3>
        </router-link>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
// api
import { showMission } from "../../../api/Mission";
//
import DashboardLayout from "./../../Dashboardlayout.vue";

// actions
export default {
  props: ["slug"],
  components: {
    //
    DashboardLayout,
  },
  data() {
    return {
      mission: {},
      submissions: [],
    };
  },
  methods: {
    async showMissionData() {
      try {
        let result = await showMission(this.slug);
        //
        this.mission = result.data.mission;
        this.submissions = result.data.submissions;
      } catch (error) {
        console.error(error);
      }
    },
  },
  mounted() {
    this.showMissionData();
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