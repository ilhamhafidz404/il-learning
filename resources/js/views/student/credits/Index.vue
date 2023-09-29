<template>
  <DashboardLayout>
    <section class="mt-24 col-span-4 pr-7">
      <div class="alert alert-info">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          class="stroke-current shrink-0 w-6 h-6"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          ></path>
        </svg>
        <span>Peringatan terakhir FRS</span>
      </div>

      <SkeletonLoadingCol1 v-if="onLoadingGetData" :show="onLoadingGetData" />
      <div v-else class="mt-10 mb-10">
        <div className="overflow-x-auto">
          <table className="table table-zebra">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Credit</th>
                <th>Lecturer</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course in courses" :key="course.id" class="hover">
                <td>
                  <div class="form-control">
                    <label
                      class="label cursor-pointer"
                      @click="onSelectCourse(course.id)"
                    >
                      <input
                        type="checkbox"
                        class="checkbox checkbox-primary"
                      />
                    </label>
                  </div>
                </td>
                <td>{{ course.name }}</td>
                <td>{{ course.sks }}</td>
                <td>-</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="mt-5 flex gap-3 justify-end">
          <button class="btn btn-error">Reset</button>
          <button class="btn btn-primary" @click="submitCredits()">
            Submit
          </button>
        </div>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
// api
import { getCourses } from "../../../api/Course";
import acceptCredits from "../../../api/_acceptCredits";

// components
import SkeletonLoadingCol1 from "./../../../components/skeletonLoading/col1.vue";

//
import DashboardLayout from "./../StudentDashboardLayout.vue";

export default {
  components: {
    DashboardLayout,
    // components
    SkeletonLoadingCol1,
  },
  data() {
    return {
      courses: [],
      selectedCourses: [],

      onLoadingGetData: false,
    };
  },
  methods: {
    async getDataCourses() {
      this.onLoadingGetData = true;
      const result = await getCourses(true);
      this.onLoadingGetData = false;
      if (result) {
        this.courses = result.data;
      }
    },
    onSelectCourse(id) {
      if (!this.selectedCourses.includes(id)) {
        this.selectedCourses.push(id);
      } else {
        const index = this.selectedCourses.indexOf(id);
        this.selectedCourses.splice(index, 1);
      }
    },
    async submitCredits() {
      const result = await acceptCredits(this.selectedCourses);
      if (result) {
        this.$swal({
          title: "Success Accept Credits",
          text: "Credits Success to accept",
          icon: "success",
        });
      }
    },
  },
  mounted() {
    this.getDataCourses();
  },
};
</script>

<style>
</style>