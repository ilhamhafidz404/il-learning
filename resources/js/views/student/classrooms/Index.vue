<template>
  <DashboardLayout>
    <section class="mt-24 grid grid-cols-2 gap-7 col-span-4 pr-7">
      <div
        v-for="classroom in classrooms"
        :key="classroom.id"
        class="card shadow-2xl"
      >
        <div class="card-body">
          <div class="flex justify-between items-center w-full">
            <div>
              <h2 class="card-tittle font-extrabold font-3xl">{{ classroom.name }}</h2>
              <p class="font-thin text-sm">{{ classroom.mentor }}</p>
            </div>
            <span
              class="indicator-item indicator-middle indicator-end badge badge-primary"
              >{{ classroom.program_id }}</span
            >
          </div>
        </div>
      </div>
    </section>
  </DashboardLayout>
</template>

<script>
import DashboardLayout from "./../StudentDashboardLayout.vue";

//actions
import { getClassrooms } from "./../../../api/Classroom";
export default {
  components: {
    DashboardLayout,
  },
  data() {
    return {
      classrooms: [],
    };
  },
  methods: {
    async getDataClassroom() {
      try {
        const result = await getClassrooms();
        this.classrooms = result.data;
      } catch {
        console.log("error");
      }
    },
  },
  mounted() {
    this.getDataClassroom();
  },
};
</script>

<style></style>