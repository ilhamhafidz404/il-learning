<template>
  <router-link
    v-for="course in courses"
    :key="course.id"
    :to="link + course.slug"
    class="btn btn-ghost flex flex-col gap-5 items-center h-[300px] sm:h-[170px] p-5 text-left"
  >
    <img
      :src="'/storage/' + course.background"
      class="w-full sm:w-[35%] h-[65%] sm:!h-full object-cover rounded"
    />
    <div class="w-full sm:w-[65%]">
      <small class="uppercase dark:text-gray-200 text-gray-700">
        {{ "TEKNIK INFORMATIKA" + " " + "S1" }}
      </small>
      <h2
        class="text-xl font-medium mb-3 dark:text-gray-200 text-gray-700 uppercase"
      >
        {{ course.name }}
      </h2>
      <span>
        <small
          class="font-semibold dark:text-gray-200 text-gray-700 capitalize"
        >
          {{ "Sherly Gina Supratman, M.Kom," }}
        </small>
        <!-- @endif @endforeach @endforeach -->
        <small class="dark:text-gray-200 text-gray-700"> | </small>
        <small class="dark:text-gray-200 text-gray-700">{{
          "TINFC-2022-01"
        }}</small>
      </span>
    </div>
  </router-link>
</template>

<script>
export default {
  props: ["courses", "isLecturer"],
  data() {
    return {
      link: "/courses/",
    };
  },
  mounted() {
    if (this.isLecturer) {
      this.link = "/lecturer/courses/";
    }
  },
};
</script>

<style>
</style>