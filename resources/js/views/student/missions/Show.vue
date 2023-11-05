<script setup>
// tools
import diffForHumans from "./../../../tools/diffForHumans";
</script>
<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <p class="font-bold" v-if="mission.course">{{ mission.course.name }}</p>
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          {{ mission.name }}
        </h1>
      </div>

      <div v-if="onLoadingGetData" class="-mt-20">
        <SkeletonLoadingCol2 :show="onLoadingGetData" />
      </div>
      <div v-else>
        <div
          v-if="submissions.length"
          class="grid grid-cols-2 gap-5 bg-base-200 p-5 rounded shadow"
        >
          <div class="text-sm breadcrumbs col-span-2">
            <ul>
              <li>
                <router-link to="/dashboard"> Dashboard </router-link>
              </li>
              <li>
                <router-link to="/courses"> Course </router-link>
              </li>
              <li>
                <router-link :to="'/courses/' + mission.course.slug">
                  {{ mission.course.name }}
                </router-link>
              </li>
              <li>{{ mission.name }}</li>
            </ul>
          </div>
          <div
            class="relative"
            v-for="submission in submissions"
            :key="submission.id"
          >
            <router-link
              :to="'/submissions/' + submission.slug"
              class="bg-base-300 p-5 rounded hover:bg-base-300 w-full inline-block border-l-4 border-primary"
            >
              <h2 class="font-semibold mb-2">{{ submission.name }}</h2>
              <p class="text-sm mb-1">
                {{ diffForHumans(submission.deadline) }}
              </p>
              <h3 class="text-sm">
                For :
                <span class="font-semibold">{{
                  submission.classroom.name
                }}</span>
              </h3>
            </router-link>
          </div>
        </div>
        <div v-else class="bg-base-200 rounded shadow text-center py-10">
          <p class="text-5xl">☹️</p>
          <h3 class="text-xl mt-3 font-semibold">
            This missions doesn't have a submission
          </h3>
        </div>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
// api
import { showMission } from "../../../api/Mission";
// icons
import TrashIcon from "../../../components/icons/trashIcon.vue";
import PencilIcon from "../../../components/icons/pencilIcon.vue";

// components
import SkeletonLoadingCol2 from "../../../components/skeletonLoading/col2.vue";

//
import DashboardLayout from "./../StudentDashboardlayout.vue";
// actions
export default {
  props: ["slug"],
  components: {
    // icons
    TrashIcon,
    PencilIcon,
    // components
    SkeletonLoadingCol2,
    //
    DashboardLayout,
  },
  data() {
    return {
      mission: {},
      submissions: [],

      //
      onLoadingGetData: false,
    };
  },
  methods: {
    async showMissionData() {
      this.onLoadingGetData = true;
      try {
        let result = await showMission(this.slug);
        //
        this.mission = result.data.mission;
        this.submissions = result.data.submissions;

        this.onLoadingGetData = false;
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