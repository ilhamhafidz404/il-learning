<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          Edit SUBMISSION
        </h1>
      </div>

      <div v-if="onLoadingGetData">
        <SkeletonLoadingCol1 :show="onLoadingGetData" />
      </div>
      <form v-else method="POST" @submit.prevent="editSubmission()">
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
              <button
                type="button"
                onclick="window.history.back()"
                class="btn btn-neutral"
              >
                Go Back
              </button>
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
import { updateSubmission, showSubmission } from "../../../api/Submission";
// icons
import TrashIcon from "../../../components/icons/trashIcon.vue";
// components
import SkeletonLoadingCol1 from "./../../../components/skeletonLoading/col1.vue";
//
import DashboardLayout from "./../LecturerDashboardlayout.vue";
//
export default {
  props: ["slug"],
  components: {
    // icons
    TrashIcon,
    // components
    SkeletonLoadingCol1,
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

      onLoadingGetData: false,
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
    async showDataSubmission(slug) {
      this.onLoadingGetData = true;
      const result = await showSubmission(slug);
      if (result) {
        this.onLoadingGetData = false;
        const [deadlineDate, dedlineTime] = result.data.deadline.split(" ");

        this.formData = {
          title: result.data.name,
          description: result.data.description,
          mission: result.data.mission_id,
          classroom: result.data.classroom_id,
          deadlineDate: deadlineDate,
          deadlineTime: dedlineTime,
          lecturer: result.data.lecturer_id,
        };
      }
    },

    async editSubmission() {
      const result = await updateSubmission(this.slug, this.formData);
      if (result) {
        this.$swal({
          title: "Success Update Submission",
          text: "Update Submission Successfully",
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
    this.showDataSubmission(this.slug);
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