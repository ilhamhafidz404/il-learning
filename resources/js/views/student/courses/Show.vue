<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <h1 class="text-3xl text-gray-200 uppercase font-bold">
        {{ course.name }}
      </h1>
      <!-- <img src="/images/auth/slide1.jpg" alt="" /> -->
      <div v-if="onLoadingGetData" class="mt-52">
        <SkeletonLoadingCol2 :show="onLoadingGetData" />
      </div>
      <div v-else>
        <div
          v-if="missions.length"
          class="grid grid-cols-2 gap-5 bg-base-200 p-5 rounded mt-32 shadow"
        >
          <div class="text-sm breadcrumbs col-span-2">
            <ul>
              <li><a>Home</a></li> 
              <li><a>Documents</a></li> 
              <li>Add Document</li>
            </ul>
          </div>
          <router-link
            :to="'/missions/' + mission.slug"
            v-for="mission in missions"
            :key="mission.id"
            class="bg-base-300 p-5 rounded hover:bg-base-300"
          >
            <h2>{{ mission.name }}</h2>
            <div class="flex gap-3 mt-1">
              <ArchiveBoxIcon myClass="w-5" />
              <p class="text-sm">
                Has {{ mission.submission.length }} submissions
              </p>
            </div>
            <div
              class="relative"
              v-for="progress in progresses"
              :key="progress.id"
            >
              <progress
                v-if="progress.mission_id == mission.id"
                class="progress progress-primary w-full mt-5"
                :value="
                  progressCount(progress.submission_count, progress.progress)
                "
                max="100"
              ></progress>

              <p
                class="absolute top-[-5px] right-0"
                v-if="progress.mission_id == mission.id"
              >
                {{
                  progressCount(progress.submission_count, progress.progress) +
                  "%"
                }}
              </p>
            </div>
          </router-link>
        </div>
        <div v-else class="bg-base-200 rounded shadow text-center py-10 mt-32">
          <p class="text-5xl">☹️</p>
          <h3 class="text-xl mt-3 font-semibold">
            This Course doesn't have a mission
          </h3>
        </div>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
// icons
import ArchiveBoxIcon from "./../../../components/icons/archiveBoxIcon.vue";

// tools
import limitStr from "./../../../tools/limitStr";

// api
import { showCourses } from "./../../../api/Course";
import { getProgresses } from "./../../../api/Progress";

// components
import SkeletonLoadingCol2 from "../../../components/skeletonLoading/col2.vue";

//
import DashboardLayout from "./../StudentDashboardlayout.vue";

// actions
export default {
  props: ["slug"],
  components: {
    //icons
    ArchiveBoxIcon,
    // components
    SkeletonLoadingCol2,
    //
    DashboardLayout,
  },
  data() {
    return {
      course: [],
      missions: [],
      progresses: [],

      onLoadingGetData: false,
    };
  },
  methods: {
    async showCoursesData() {
      this.onLoadingGetData = true;
      let result = await showCourses(this.slug);
      if (result) {
        this.onLoadingGetData = false;
        //
        this.course = result.data.course;
        this.missions = result.data.missions;
      }
    },
    async getProgressMissions() {
      let result = await getProgresses();
      if (result) {
        this.progresses = result.data;
      }
    },
  },
  computed: {
    progressCount() {
      return (submissionCount, progress) => {
        const percentage = (progress / submissionCount) * 100;
        return limitStr(String(percentage), 4, "");
      };
    },
  },
  mounted() {
    this.showCoursesData();
    this.getProgressMissions();
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