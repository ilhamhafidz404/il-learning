<script setup>
import diffForHumans from "./../../../tools/diffForHumans";
</script>
<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="mt-40 relative z-30 col-span-4 pr-7">
      <div class="relative h-[200px]">
        <h1 class="text-3xl text-gray-200 uppercase font-bold">
          <!-- {{ course.name }} -->
        </h1>
      </div>
      <!-- <img src="/images/auth/slide1.jpg" alt="" /> -->
      <div v-if="onLoadingGetData">
        <SkeletonLoadingCol1 :show="onLoadingGetData" />
      </div>
      <div
        v-else-if="datas.length && !onLoadingGetData"
        class="bg-base-100 p-5 rounded shadow"
      >
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
              <!-- row 1 -->
              <tr
                v-for="(data, index) in datas"
                :key="data.id"
                class="bg-base-200"
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
                  <a
                    :href="'/storage/' + data.file"
                    target="_blank"
                    class="btn btn-sm btn-primary"
                    >Download</a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div v-else class="bg-base-100 p-5 rounded shadow text-center">
        <h2 class="text-5xl">☹️</h2>
        <p class="mt-2 text-xl">this course doesn't have mission</p>
      </div>
    </section>
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
      datas: [],
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