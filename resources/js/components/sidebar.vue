<template>
  <aside
    id="sidebar"
    class="shadow-xl min-h-screen fixed py-24 w-[250px] duration-300 -left-full lg:left-0 border-r sm:border-0 z-40 text-gray-200"
  >
    <ul>
      <li class="mb-2">
        <router-link
          to="/dashboard"
          class="px-5 py-3 border-l-[5px] border-primary flex items-center hover:text-primary text-primary"
        >
          <CubeTransparentIcon myClass="w-5 mr-3" />
          Dashboard
        </router-link>
      </li>
      <li class="mb-2">
        <router-link
          to="/courses"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <BookIcon myClass="w-5 mr-3" />
          Course
        </router-link>
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.lecturer.index') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <UserGroupIcon myClass="w-5 mr-3" />
          Lecturer
        </a>
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.student.index') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <AcademicCapIcon myClass="w-5 mr-3" />
          Student
        </a>
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.classroom.index') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <BagBriefcaseIcon myClass="w-5 mr-3" />
          Classroom
        </a>
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.program.index') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <UserCardIcon myClass="w-5 mr-3" />
          Study Program
        </a>
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.level.index') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <BarsArrowUpIcon myClass="w-5 mr-3" />
          Level
        </a>
      </li>
      <li class="mb-2">
        <hr class="my-5" />
      </li>
      <li class="mb-2">
        <a
          href="{{ route('admin.setting') }}"
          class="px-5 py-3 border-l-[5px] border-transparent flex items-center hover:text-primary"
        >
          <CogIcon myClass="w-5 mr-3" />
          Setting
        </a>
      </li>
    </ul>
  </aside>
  <div></div>
</template>

<script>
import BookIcon from "./icons/bookIcon.vue";
import CubeTransparentIcon from "./icons/cubeTransparentIcon.vue";
import UserGroupIcon from "./icons/userGroupIcon.vue";
import BagBriefcaseIcon from "./icons/bagBriefcaseIcon.vue";
import AcademicCapIcon from "./icons/academicCapIcon.vue";
import UserCardIcon from "./icons/userCardIcon.vue";
import BarsArrowUpIcon from "./icons/barsArrowUpIcon.vue";
import CogIcon from "./icons/cogIcon.vue";
export default {
  components: {
    CubeTransparentIcon,
    BookIcon,
    UserGroupIcon,
    BagBriefcaseIcon,
    AcademicCapIcon,
    UserCardIcon,
    BarsArrowUpIcon,
    CogIcon,
  },
};
</script>

<style>
</style>