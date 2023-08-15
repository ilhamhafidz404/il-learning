<template>
  <nav
    class="bg-transparent fixed py-5 dark:text-white text-gray-700 z-50 w-full px-5 duration-300"
  >
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <img src="/images/logo.png" alt="alope logo" class="w-[40px] mr-3" />
        <h3
          class="font-semibold tracking-wider dark:text-gray-200 text-gray-800"
        >
          IL-Learning
        </h3>
      </div>
      <div class="flex items-center dark:text-gray-200 text-gray-800">
        <div>
          <router-link to="/login">Login</router-link>
          <!-- <a href="/login">Login</a> -->
        </div>
        <div class="ml-10">
          <label class="swap swap-rotate">
            <input type="checkbox" @click="toggleTheme" />
            <SunIcon />
            <MoonIcon />
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
import Footer from "../components/footer.vue";
import SunIcon from "../components/icons/sunIcon.vue";
import MoonIcon from "../components/icons/moonIcon.vue";
export default {
  components: {
    Footer,
    SunIcon,
    MoonIcon,
  },
  beforeMount() {
    window.addEventListener("scroll", this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener("scroll", this.handleScroll);
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
    // ...mapMutations(["toggleTheme"]),
    toggleTheme() {
      const htmlEL = document.getElementsByTagName("html");
      const dataThemeValue = htmlEL[0].getAttribute("data-theme");
      if (dataThemeValue == "light") {
        htmlEL[0].setAttribute("data-theme", "dark");
        htmlEL[0].classList.add("dark");
        htmlEL[0].classList.remove("light");
      } else {
        htmlEL[0].setAttribute("data-theme", "light");
        htmlEL[0].classList.add("light");
        htmlEL[0].classList.remove("dark");
      }
      // console.log(htmlEl);
    },
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
