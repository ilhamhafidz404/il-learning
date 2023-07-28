<template>
  <section class="grid grid-cols-4 gap-5 mt-7">
    <div className="card text-gray-100 bg-primary shadow-xl rounded-md">
      <div className="card-body relative">
        <small>Your Profile</small>
        <h2 className="card-title">Profile</h2>
        <!--  -->
        <span class="absolute right-[20px] top-1/2 -translate-y-1/2">
          <AcademicCapIcon myClass="w-20" />
        </span>
      </div>
    </div>
    <div className="card text-gray-100 bg-error shadow-xl rounded-md">
      <div className="card-body relative">
        <small>Your Course</small>
        <h2 className="card-title">Courses</h2>
        <!--  -->
        <span class="absolute right-[20px] top-1/2 -translate-y-1/2">
          <BookIcon myClass="w-20" />
        </span>
      </div>
    </div>
    <div className="card text-gray-100 bg-success shadow-xl rounded-md">
      <div className="card-body relative">
        <small>Our Lecturer</small>
        <h2 className="card-title">Lecturers</h2>
        <!--  -->
        <span class="absolute right-[20px] top-1/2 -translate-y-1/2">
          <UserGroupIcon myClass="w-20" />
        </span>
      </div>
    </div>
    <div className="card text-gray-100 bg-warning shadow-xl rounded-md">
      <div className="card-body relative">
        <small>Your Profile</small>
        <h2 className="card-title">Profile</h2>
        <!--  -->
        <span class="absolute right-[20px] top-1/2 -translate-y-1/2">
          <BriefcaseIcon myClass="w-20" />
        </span>
      </div>
    </div>
  </section>
</template>

<script>
import BookIcon from "./icons/bookIcon.vue";
import UserGroupIcon from "./icons/userGroupIcon.vue";
import BriefcaseIcon from "./icons/bagBriefcaseIcon.vue";
import AcademicCapIcon from "./icons/academicCapIcon.vue";
export default {
  components: {
    BookIcon,
    UserGroupIcon,
    BriefcaseIcon,
    AcademicCapIcon,
  },
};
</script>

<style>
</style>