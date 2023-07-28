<template>
  <nav
    class="bg-transparent fixed py-5 text-white z-50 w-full px-5 duration-300"
  >
    <div class="container mx-auto flex justify-between items-center">
      <div class="flex items-center">
        <img src="/images/logo.png" alt="alope logo" class="w-[40px] mr-3" />
        <h3 class="font-semibold tracking-wider">IL-Learning</h3>
      </div>
      <div>
        <a href="/login">Login</a>
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
export default {
  components: {
    Footer,
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