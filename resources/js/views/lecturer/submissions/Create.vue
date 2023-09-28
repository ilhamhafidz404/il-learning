<script setup>
// tools
import diffForHumans from "./../../../tools/diffForHumans";

// import VueDatePicker from "@vuepic/vue-datepicker";
// import "@vuepic/vue-datepicker/dist/main.css";
</script>
<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          ADD SUBMISSION
        </h1>
      </div>

      <form method="POST" @submit.prevent="createSubmission()">
        <div
          class="grid grid-cols-2 gap-5 bg-base-100 p-5 rounded shadow mb-20"
        >
          <div class="col-span-2 form-control w-full">
            <label class="label font-semibold"> Title Submission </label>
            <input
              type="text"
              class="input input-bordered w-full"
              v-model="formData.title"
            />
          </div>
          <div class="col-span-2 form-control w-full">
            <label class="label font-semibold"> Description </label>
            <textarea
              class="textarea textarea-bordered h-24"
              v-model="formData.description"
            ></textarea>
          </div>
          <div class="form-control w-full">
            <label class="label font-semibold"> Select Mission </label>
            <select
              class="select select-bordered w-full"
              v-model="formData.mission"
            >
              <option
                v-for="mission in missions"
                :key="mission.id"
                class="font-light"
                :value="mission.id"
              >
                {{ mission.name }}
              </option>
            </select>
          </div>
          <div class="form-control w-full">
            <label class="label font-semibold"> Select Classroom </label>
            <select
              class="select select-bordered w-full"
              v-model="formData.classroom"
            >
              <option
                v-for="classroom in classrooms"
                :key="classroom.id"
                class="font-light"
                :value="classroom.id"
              >
                {{ classroom.name }}
              </option>
            </select>
          </div>
          <div class="form-control w-full">
            <label class="label font-semibold"> Deadline Date </label>
            <input
              type="date"
              class="input input-bordered w-full"
              v-model="formData.deadlineDate"
            />
          </div>
          <div class="form-control w-full">
            <label class="label font-semibold"> Deadline Time </label>
            <input
              type="time"
              class="input input-bordered w-full"
              v-model="formData.deadlineTime"
            />
          </div>
          <div class="col-span-2 flex justify-between items-center">
            <div>
              <router-link to="/lecturer/mission" class="btn btn-neutral"
                >Go Back</router-link
              >
            </div>
            <div>
              <button class="btn btn-error" type="reset">Reset</button>
              <button class="btn btn-primary ml-2" type="submit">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </section>
  </DashboardLayout>
</template>

<script>
// api action
import { getMission } from "../../../api/Mission";
import { getClassrooms } from "../../../api/Classroom";
import { insertSubmission } from "../../../api/Submission";
// icons
import TrashIcon from "../../../components/icons/trashIcon.vue";
//
import DashboardLayout from "./../LecturerDashboardlayout.vue";
//
export default {
  props: ["slug"],
  components: {
    // icons
    TrashIcon,
    //
    DashboardLayout,
  },
  data() {
    return {
      missions: [],
      classrooms: [],

      formData: {
        title: "",
        description: "",
        mission: 0,
        classroom: 0,
        deadlineDate: "",
        deadlineTime: "",
        lecturer: 0,
      },
    };
  },
  methods: {
    async getMissionData() {
      try {
        let result = await getMission();
        //
        this.missions = result.data;
      } catch (error) {
        console.error(error);
      }
    },
    async getClassroomData() {
      try {
        let result = await getClassrooms();
        //
        this.classrooms = result.data;
      } catch (error) {
        console.error(error);
      }
    },

    async createSubmission() {
      const dataOnLocalStorage = JSON.parse(localStorage.getItem("authData"));

      this.formData.lecturer = dataOnLocalStorage.userData.id;

      const result = await insertSubmission(this.formData);
      if (result) {
        this.$swal({
          title: "Success Add Submission",
          text: "Create Submission Successfully",
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            window.history.back();
          }
        });
      }
    },
  },
  mounted() {
    this.getMissionData();
    this.getClassroomData();
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