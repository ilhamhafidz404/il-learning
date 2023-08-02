<template>
  <Loading :show="isLoading" />
  <!--  -->
  <main class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
    <section
      class="relative after:content-[''] after:absolute after:inset-0 after:bg-black/30 order-2 sm:order-1 h-screen md:h-auto"
    >
      <div class="h-full w-full">
        <img src="/images/auth/slide1.jpg" class="h-full object-cover w-full" />
        <div
          class="absolute bottom-[100px] text-white z-10 pl-10 border-l-[5px] border-primary w-[85%] md:w-[45%] lg:w-[85%]"
        >
          <h1 class="text-3xl font-bold tracking-wider">
            ALOPE UNIVERSITY Learning
          </h1>
          <p class="text-sm mt-3">
            Improve the quality of your learning with the Digital Class Alope
            University. <br />
            With Digital Classes, the learning process becomes easier and
            accessible to everyone, anywhere, and anytime.
          </p>
        </div>
      </div>
    </section>
    <section
      class="z-20 right-0 flex items-center rounded justify-center border-blue-500 order-1 sm:order-2 md:right-[50px] lg:right-0 top-0 md:top-1/2 lg:top-0 md:-translate-y-1/2 lg:-translate-y-0 relative md:absolute lg:relative w-auto md:w-[400px] lg:w-auto py-0 md:py-7 lg:py-0 border-b-0 md:border-b-[5px] lg:border-b-0 h-screen md:h-auto bg-[#1d232a]"
    >
      <div class="w-[80%] md:w-[85%] lg:w-[70%] text-center">
        <div class="mb-10">
          <img
            src="/images/logo.png"
            class="mx-auto mb-2 w-[70px] md:w-[50px] lg:w-[70px]"
          />
          <h2 class="text-2xl md:text-xl lg:text-2xl font-semibold">
            ALOPE UNIVERSITY
          </h2>
        </div>
        <form @submit.prevent="handleSubmit()">
          <div class="form-control mb-5">
            <div class="input-group">
              <input
                type="text"
                placeholder="Email"
                class="input input-bordered w-full"
                v-model="formData.email"
              />
              <button
                class="btn btn-square"
                :class="{
                  'btn-error text-white': formStatus.code == 'IL-02',
                }"
                type="button"
              >
                <AtIcon myClass="w-6 h-6" />
              </button>
            </div>
          </div>

          <div class="form-control mb-5">
            <div class="input-group">
              <input
                type="password"
                placeholder="Password"
                class="input input-bordered w-full"
                v-model="formData.password"
              />
              <button
                class="btn btn-square"
                :class="{
                  'btn-error text-white': formStatus.code == 'IL-02',
                }"
                type="button"
              >
                <!-- {{-- lock --}} -->
                <LockIcon myClass="w-6 h-6" />
                <!-- <EyeIcon myClass="w-6 h-6" /> -->
              </button>
            </div>
          </div>

          <div class="mb-10 text-right mt-1 flex justify-between">
            <div class="text-left text-error text-sm">
              {{ formStatus.message }}
            </div>
            <a href="" class="text-gray-600 text-[13px]">Lupa password?</a>
          </div>

          <div>
            <button class="btn btn-primary w-full">Login</button>
            <span class="relative block mt-10 mb-5">
              <hr class="border-[#363c44]" />
              <small
                class="absolute top-[-10px] dark:bg-[#1d232a] bg-white px-3 left-1/2 -translate-x-1/2"
                >OR</small
              >
            </span>
            <a
              href="{{ route('admin.login') }}"
              class="btn btn-primary w-full mb-3"
            >
              Login As Admin
            </a>
            <button class="btn btn-outline btn-primary w-full">
              <img src="images/icon/google.png" width="25px" class="mr-3" />
              <!-- {{-- <a href="https://www.flaticon.com/free-icons/google" title="google icons">Google icons created by Freepik - Flaticon</a> --}} -->
              Login Using Google Account
            </button>
          </div>
        </form>
      </div>
      <footer class="absolute bottom-[25px] block md:hidden lg:block">
        <small class="text-gray-600"
          >Copyright &copy; 2022 by ALOPE University</small
        >
      </footer>
    </section>
  </main>
</template>

<script>
import axios from "axios";
import router from "@/router";

//ation
import { login } from "./../../api/Auth";

// components
import Loading from "../../components/loading.vue";
// icons
import AtIcon from "../../components/icons/atEmailIcon.vue";
import EyeIcon from "../../components/icons/eyeIcon.vue";
import LockIcon from "../../components/icons/lockIcon.vue";

export default {
  components: { LockIcon, EyeIcon, AtIcon, Loading },
  data() {
    return {
      formData: {
        email: "",
        password: "",
      },

      formStatus: {
        code: "",
        message: "",
      },

      isLoading: true,
    };
  },
  methods: {
    resetFormStatus() {
      this.formStatus = {
        message: "",
        code: "",
      };
    },
    async handleSubmit() {
      // reset fromSatatus
      this.resetFormStatus();
      this.isLoading = false;
      const result = await login(this.formData);
      if (result) {
        this.isLoading = true;
        this.formStatus = {
          message: result.data.message,
          code: result.data.code,
        };

        if (this.formStatus.code == "IL-01") {
          router.push("/admin/dashboard");
        }
      }
    },
  },
};
</script>

<style>
</style>
