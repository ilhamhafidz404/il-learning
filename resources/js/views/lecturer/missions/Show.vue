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
        <div
          class="relative"
          v-for="submission in submissions"
          :key="submission.id"
        >
          <router-link
            :to="'/lecturer/mission/' + submission.slug"
            class="bg-base-200 p-5 rounded hover:bg-base-300 w-full inline-block"
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
          <button
            @click="confirmDelete(submission.id)"
            class="btn btn-error h-full absolute right-0 top-0 rounded-r rounded-l-none dark:text-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              class="w-6 h-6"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
              />
            </svg>
          </button>
        </div>
      </div>
    </section>

    <!-- Open the modal using ID.showModal() method -->
    <button class="btn" onclick="my_modal_5.showModal()">open modal</button>
    <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
      <div class="modal-box">
        <h3 class="font-bold text-lg">Hello!</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
          <form method="dialog">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
          </form>
        </div>
      </div>
    </dialog>
  </DashboardLayout>
</template>

<script>
// api
import { showMission } from "../../../api/Mission";
import { deleteSubmission } from "../../../api/Submission";
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
    async deleteMissionData(id) {
      const result = await deleteSubmission(id);
      console.log(id);
      if (result) {
        this.$swal({
          title: "Success Delete Submission",
          text: "Delete Submission Successfully",
          icon: "success",
        });

        this.showMissionData();
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