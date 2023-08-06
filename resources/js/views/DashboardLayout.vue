<template>
  <Navbar />

  <main className="grid grid-cols-5 gap-10">
    <Sidebar />
    <slot></slot>
  </main>
</template>

<script>
import Sidebar from "../components/sidebar.vue";
import Navbar from "../components/navbar.vue";
export default {
  name: "DashboardLayout",
  components: {
    Navbar,
    Sidebar,
  },
};
</script>

<style>
</style>