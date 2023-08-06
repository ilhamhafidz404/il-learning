<template>
  <nav
    class="bg-transparent fixed py-5 text-white z-50 w-full px-5 duration-300"
  >
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <img src="/images/logo.png" alt="alope logo" class="w-[40px] mr-3" />
        <h3 class="font-semibold tracking-wider">IL-Learning</h3>
      </div>
      <div class="flex items-center">
        <div>
          <router-link to="/login">Login</router-link>
        </div>
        <div class="ml-10">
          <label class="swap swap-rotate">
            <!-- this hidden checkbox controls the state -->
            <input type="checkbox" @click="toggleTheme" />
            <!-- sun icon -->
            <svg
              class="swap-on fill-current w-6 -mb-1"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
            >
              <path
                d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"
              />
            </svg>
            <!-- moon icon -->
            <svg
              class="swap-off fill-current w-6 -mb-1"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
            >
              <path
                d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"
              />
            </svg>
          </label>
        </div>
      </div>
    </div>
  </nav>
  <header
    class="w-full h-[600px] bg-cover bg-center relative flex items-center justify-center after:content-[''] after:absolute after:inset-0 after:bg-black/40"
  >
    <div class="relative z-10 text-center">
      <h1 class="text-5xl font-bold text-gray-100 tracking-wider">
        ALOPE UNIVERSITY
      </h1>
      <h3 class="text-xl text-gray-300">The Best University in The World!</h3>
    </div>
  </header>
  <Footer />
</template>
<script>
import { mapState, mapMutations } from "vuex";
import Footer from "../components/footer.vue";
export default {
  beforeMount() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
  },
  components: {
    Footer,
  },
  methods: {
    handleScroll() {
      const nav = document.querySelector("nav");
      nav.classList.toggle("bg-base-100", scrollY > 0);
      nav.classList.toggle("bg-transparent", scrollY === 0);
      nav.classList.toggle("py-5", scrollY === 0);
      nav.classList.toggle("py-3", scrollY > 0);
      nav.classList.toggle("shadow", scrollY > 0);
      nav.classList.toggle("px-5", scrollY === 0);
      nav.classList.toggle("px-3", scrollY > 0);
    },
    ...mapMutations(["toggleTheme"]),
  },
};
</script>
<style>
* {
  font-family: "Poppins", sans-serif;
}
header {
  background-image: url("/images/auth/slide1.jpg");
}
</style>
