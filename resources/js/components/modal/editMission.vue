<template>
  <dialog id="editMission" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Create Mission</h3>
      <p class="text-primary text-sm">{{ courseName }}</p>
      <form action="" class="mt-5">
        <input
          type="text"
          placeholder="Type Name Mission here"
          class="input input-bordered w-full"
          v-model="selectedMission.name"
        />
      </form>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn btn-primary" @click="updateDataMission()">
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
import { updateMission } from "../../api/Mission";

export default {
  props: ["courseName", "selectedMission"],
  data() {
    return {
      formData: {
        id: this.selectedMission.id,
        name: this.selectedMission.name,
      },
    };
  },
  methods: {
    async updateDataMission() {
      const result = await updateMission(this.selectedMission);

      if (result) {
        this.$swal({
          title: "Success Update Mission",
          text: "New mission successfully updated",
          icon: "success",
        });

        this.$emit("resetGetPage");
      }
    },
  },
};
</script>

<style>
</style>