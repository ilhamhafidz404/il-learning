<script setup>
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
      <!-- <img src="/images/auth/slide1.jpg" alt="" /> -->
      <div v-if="onLoadingGetData">
        <SkeletonLoadingCol1 :show="onLoadingGetData" />
      </div>
      <div
        v-else-if="datas.length && !onLoadingGetData"
        class="bg-base-200 p-5 rounded shadow"
      >
        <div class="text-sm breadcrumbs col-span-2 mb-7">
          <ul>
            <li>
              <router-link to="/lecturer/dashboard">Dashboard</router-link>
            </li>
            <li>Courses</li>
            <li>...</li>
            <li v-if="submission.mission">
              <router-link
                :to="'/lecturer/missions/' + submission.mission.slug"
              >
                {{ submission.mission.name }}
              </router-link>
            </li>
            <li>{{ submission.name }}</li>
          </ul>
        </div>

        <div class="overflow-x-auto">
          <table class="table">
            <!-- head -->
            <thead>
              <tr>
                <th></th>
                <th>Name</th>
                <th>On</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="(data, index) in datas"
                :key="data.id"
                class="bg-base-300"
              >
                <th>{{ index + 1 }}</th>
                <td>{{ data.user.name }}</td>
                <td>{{ diffForHumans(data.created_at) }}</td>
                <td>
                  <div
                    class="badge badge-error"
                    v-if="
                      statusSubmitSubmission(
                        data.submission.deadline,
                        data.created_at
                      )
                    "
                  >
                    LATE
                  </div>
                  <div class="badge badge-success" v-else>ON TIME</div>
                </td>
                <td>
                  <div class="flex items-center gap-3">
                    <a
                      :href="'/storage/' + data.file"
                      target="_blank"
                      class="btn btn-sm btn-primary"
                      >Download</a
                    >
                    <button
                      class="btn btn-sm btn-info"
                      v-if="data.description"
                      @click="
                        showDescriptionDetail(data.user.name, data.description)
                      "
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
                          d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z"
                        />
                      </svg>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-else class="bg-base-200 p-10 rounded shadow text-center">
        <h2 class="text-5xl">☹️</h2>
        <p class="mt-2 text-xl">No one has collected yet</p>
        <button onclick="history.back()" class="mt-5 btn btn-neutral btn-sm">
          Go Back
        </button>
      </div>
    </section>

    <dialog id="detailDescription" class="modal">
      <div class="modal-box w-11/12 max-w-2xl">
        <h3 class="font-bold text-lg">Notes from {{ show.name }}</h3>
        <p class="py-4">{{ show.description }}</p>
      </div>
      <form method="dialog" class="modal-backdrop">
        <button>close</button>
      </form>
    </dialog>
  </DashboardLayout>
</template>

<script>
// icons
import ArchiveBoxIcon from "../../../components/icons/archiveBoxIcon.vue";
import TrashIcon from "../../../components/icons/trashIcon.vue";
import PencilIcon from "../../../components/icons/pencilIcon.vue";

// api
import { showCourses } from "../../../api/Course";
import getStudentCompleteSubmission from "../../../api/_getStudentCompletedSubmission";

// components
import SkeletonLoadingCol1 from "../../../components/skeletonLoading/col1.vue";

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
    SkeletonLoadingCol1,
    //
    DashboardLayout,
    PencilIcon,
  },
  data() {
    return {
      submission: {},
      datas: [],

      show: {
        name: "",
        description: "",
      },
      //
      onLoadingGetData: false,
    };
  },
  methods: {
    async getStudentCompleteSubmissionData() {
      try {
        this.onLoadingGetData = true;
        let result = await getStudentCompleteSubmission(this.slug);
        if (result) {
          console.log(result.data);
          this.datas = result.data.submitSubmissions;
          this.submission = result.data.submission;

          this.onLoadingGetData = false;
        }
      } catch (error) {
        console.error(error);
      }
    },
    statusSubmitSubmission(deadlineDate, studentSubmitDate) {
      const deadlineOn = new Date(deadlineDate);
      const submitOn = new Date(studentSubmitDate);

      return submitOn > deadlineOn;
    },
    showDescriptionDetail(name, description) {
      document.getElementById("detailDescription").showModal();

      this.show = {
        name: name,
        description: description,
      };
    },
  },
  mounted() {
    this.getStudentCompleteSubmissionData();
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