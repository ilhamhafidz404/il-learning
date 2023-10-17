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
      <div v-if="onLoadingGetData">
        <SkeletonLoadingCol2 :show="onLoadingGetData" :isLecturer="true" />
      </div>
      <div
        v-else-if="missions.length && !onLoadingGetData"
        class="grid grid-cols-2 gap-5 bg-base-200 p-5 rounded shadow"
      >
        <div class="relative" v-for="mission in missions" :key="mission.id">
          <router-link
            :to="'/lecturer/missions/' + mission.slug"
            class="bg-base-300 p-5 rounded hover:bg-base-300 block"
          >
            <h2>{{ mission.name }}</h2>
            <div class="flex gap-3 mt-1">
              <ArchiveBoxIcon myClass="w-5" />
              <p class="text-sm">
                Has {{ mission.submission.length }} submissions
              </p>
            </div>
          </router-link>
          <div class="h-full flex items-center absolute right-[20px] top-0">
            <button
              @click="editMission(mission.slug, mission.name)"
              class="btn btn-info rounded-l rounded-r-none rounded-none dark:text-gray-100"
            >
              <PencilIcon myClass="w-6 h-6" />
            </button>
            <button
              @click="confirmDelete(mission.id)"
              class="btn btn-error rounded-r rounded-l-none dark:text-gray-100"
            >
              <TrashIcon myClass="w-6 h-6" />
            </button>
          </div>
        </div>
      </div>
      <div v-else class="bg-base-200 py-10 rounded shadow text-center">
        <h2 class="text-5xl">☹️</h2>
        <p class="mt-2 text-xl">this course doesn't have mission</p>
      </div>
    </section>

    <CreateMissionModal
      :courseName="course.name"
      :courseId="course.id"
      @resetGetPage="showCoursesData"
    />

    <EditMissionModal
      :courseName="course.name"
      :selectedMission="editedMission"
      @resetGetPage="showCoursesData"
    />
  </DashboardLayout>
</template>

<script>
// icons
import ArchiveBoxIcon from "../../../components/icons/archiveBoxIcon.vue";
import TrashIcon from "../../../components/icons/trashIcon.vue";
import PencilIcon from "../../../components/icons/pencilIcon.vue";

// api
import { showCourses } from "../../../api/Course";
import { deleteMission } from "../../../api/Mission";

// components
import CreateMissionModal from "../../../components/modal/createMission.vue";
import EditMissionModal from "../../../components/modal/editMission.vue";
import SkeletonLoadingCol2 from "../../../components/skeletonLoading/col2.vue";

//
import DashboardLayout from "./../LecturerDashboardlayout.vue";

// actions
export default {
  props: ["slug"],
  components: {
    //icons
    ArchiveBoxIcon,
    TrashIcon,
    PencilIcon,
    // components
    CreateMissionModal,
    EditMissionModal,
    SkeletonLoadingCol2,
    //
    DashboardLayout,
    PencilIcon,
  },
  data() {
    return {
      course: [],
      missions: [],
      progresses: [],

      // for edit
      editedMission: {
        slug: 0,
        name: "",
      },

      //
      onLoadingGetData: false,
    };
  },
  methods: {
    async showCoursesData() {
      try {
        this.onLoadingGetData = true;
        let result = await showCourses(this.slug);
        if (result) {
          this.course = result.data.course;
          this.missions = result.data.missions;

          this.onLoadingGetData = false;
        }
      } catch (error) {
        console.error(error);
      }
    },
    editMission(slug, name) {
      document.getElementById("editMission").showModal();

      this.editedMission.slug = slug;
      this.editedMission.name = name;
    },
    //
    async deleteMissionData(id) {
      const result = await deleteMission(id);
      if (result) {
        this.$swal({
          title: "Success Delete Mission",
          text: "Delete Mission Successfully",
          icon: "success",
          theme: "dark",
        });

        this.showCoursesData();
      }
    },
    confirmDelete(id) {
      // Use sweetalert2
      this.$swal({
        title: "Are you sure?",
        text: "You won't be able to delete this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteMissionData(id);
        }
      });
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