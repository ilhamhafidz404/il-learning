<template>
  <Navbar />

  <main className="grid grid-cols-5 gap-10">
    <Sidebar />
    <slot></slot>
  </main>
</template>

<script>
import router from "@/router";

import Sidebar from "../../components/sidebar.vue";
import Navbar from "../../components/navbar.vue";
export default {
  name: "DashboardLayout",
  data() {
    return {
      authData: [],
    };
  },
  components: {
    Navbar,
    Sidebar,
  },
  mounted() {
    const dataOnStorage = localStorage.getItem("authData");
    if (dataOnStorage !== null) {
      this.authData = JSON.parse(dataOnStorage);
    } else {
      router.push("/login");
    }
  },
};
</script>
<style></style>;
