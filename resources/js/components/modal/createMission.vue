<template>
  <dialog id="createMission" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Create Mission</h3>
      <p class="text-primary text-sm">{{ courseName }}</p>
      <form @submit.prevent="insertDataMission()" class="mt-5">
        <input
          type="text"
          placeholder="Type Name Mission here"
          class="input input-bordered w-full"
          v-model="formData.name"
        />
        <small>{{ validation }}</small>
      </form>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn btn-primary" @click="insertDataMission()">
            Save
          </button>
          <button class="btn ml-2" @click="resetForm()">Close</button>
        </form>
      </div>
    </div>
  </dialog>
</template>

<script>
// actions
import { insertMission } from "../../api/Mission";

export default {
  props: ["courseName", "courseId"],
  data() {
    return {
      formData: {
        name: "",
        courseId: 0,
      },

      validation: "",
    };
  },
  methods: {
    async insertDataMission() {
      if (this.formData.name) {
        // isi data courseid
        this.formData.courseId = this.courseId;

        const result = await insertMission(this.formData);

        this.resetForm();

        if (result) {
          if (result.data.code == "IL-01") {
            this.$swal({
              title: "Success Add Mission",
              text: "New mission successfully added",
              icon: "success",
            });

            this.$emit("resetGetPage");
          } else {
            this.$swal({
              title: "The Name Already Exist",
              text: "Please use a different name",
              icon: "error",
            });
          }
        }
      } else {
        this.$swal({
          title: "Field Name is Required",
          text: "Please input the name mission",
          icon: "error",
        });
      }
    },
    resetForm() {
      this.formData.courseId = 0;
      this.formData.name = "";
    },
  },
};
</script>

<style>
</style>