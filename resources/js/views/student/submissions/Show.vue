<script setup>
// tools
import diffForHumans from "./../../../tools/diffForHumans";
</script>
<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <p class="font-bold" v-if="submission.mission">
          {{ submission.mission.name }}
        </p>
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          {{ submission.name }}
        </h1>
      </div>

      <div v-if="onLoadingGetData" class="-mt-20">
        <SkeletonLoadingCol1 :show="onLoadingGetData" />
      </div>
      <div v-else class="bg-base-200 p-5 mb-20 rounded shadow">
        <div class="text-sm breadcrumbs col-span-2 mb-5">
          <ul>
            <li>
              <router-link to="/dashboard"> Dashboard </router-link>
            </li>
            <li>
              <router-link to="/courses"> Course </router-link>
            </li>
            <li>...</li>
            <li v-if="submission.mission">
              <router-link :to="'/missions/' + submission.mission.slug">
                {{ submission.mission.name }}
              </router-link>
            </li>
            <li>
              {{ submission.name }}
            </li>
          </ul>
        </div>
        <div class="flex items-center justify-between">
          <div>
            <h1 class="text-xl font-semibold">{{ submission.name }}</h1>
            <p>Deadline : {{ diffForHumans(submission.deadline) }}</p>
          </div>
          <div>
            <span
              v-if="Object.keys(submitSubmissionData).length"
              class="bg-success text-white px-5 py-2 rounded text-sm"
            >
              Has been collected
            </span>
            <span v-else class="bg-error text-white px-5 py-2 rounded text-sm">
              Haven't collected
            </span>
          </div>
        </div>
        <hr class="my-5 dark:border-gray-600" />
        <form
          enctype="multipart/form-data"
          @submit.prevent="uploadSubmission()"
        >
          <div class="form-control">
            <label class="label"> Description </label>
            <textarea
              class="textarea textarea-bordered h-24"
              placeholder="-"
              v-model="descriptionInput"
            ></textarea>
          </div>
          <div class="form-control mt-5">
            <label class="label"> File </label>
            <input
              type="file"
              ref="submissionFile"
              class="file-input file-input-bordered w-[500px]"
            />
          </div>
          <div class="mt-5">
            <a
              :href="'/storage/' + submitSubmissionData.file"
              target="_blank"
              v-if="Object.keys(submitSubmissionData).length"
              class="btn btn-info"
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
                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"
                />
              </svg>
              Download
            </a>
          </div>
          <p class="text-error italic">{{ errorMessage }}</p>
          <div class="mt-16 flex justify-between items-center">
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
        </form>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
// api
import { showSubmission } from "../../../api/Submission";
import submitSubmission from "./../../../api/_submitSubmission";
import { showSubmitSubmission } from "./../../../api/SubmitSubmissions";

// components
import SkeletonLoadingCol1 from "../../../components/skeletonLoading/col1.vue";

//
import DashboardLayout from "./../StudentDashboardlayout.vue";
// actions
export default {
  props: ["slug"],
  components: {
    // components
    SkeletonLoadingCol1,
    //
    DashboardLayout,
  },
  data() {
    return {
      submission: {},
      submitSubmissionData: {},

      //
      descriptionInput: "",
      onLoadingGetData: false,

      //
      errorMessage: "",
    };
  },
  methods: {
    async showSubmitsubmissionData(mission, submission) {
      const result = await showSubmitSubmission(mission, submission);

      if (result) {
        if (result.data.message == "have been collected") {
          this.submitSubmissionData = result.data.submitSubmission;

          this.descriptionInput = this.submitSubmissionData.description;
        }
      }
    },

    async showSubmissionData() {
      this.onLoadingGetData = true;
      let result = await showSubmission(this.slug);
      if (result) {
        this.onLoadingGetData = false;

        this.submission = result.data;

        // ambil sata submitsubmission
        this.showSubmitsubmissionData(
          this.submission.mission_id,
          this.submission.id
        );
      }
    },
    async uploadSubmission() {
      this.errorMessage = "";

      const file = this.$refs.submissionFile.files[0];

      if (!file) {
        this.errorMessage = "File is required!";
        return;
      }

      // get data user di local storage
      const authDataString = localStorage.getItem("authData");
      const authData = authDataString ? JSON.parse(authDataString) : null;

      const formData = new FormData();
      formData.append("file", file);
      formData.append("description", this.descriptionInput);
      formData.append("mission", this.submission.mission_id);
      formData.append("submission", this.submission.id);
      formData.append("classroom", authData.userData.classroom_id);
      formData.append("user", authData.user.id);

      let result = await submitSubmission(formData);
      if (result) {
        this.showSubmissionData();

        this.$swal({
          title: "Success Submit Submission",
          text: "Submit Submission Successfully",
          icon: "success",
        });
      }
    },
  },
  mounted() {
    this.showSubmissionData();
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