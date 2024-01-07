<template>
  <div className="navbar bg-base-200 shadow-xl fixed z-50">
    <div class="container mx-auto">
      <div className="flex-1">
        <router-link to="/" className="inline-flex">
          <div>
            <img
              src="/images/logo.png"
              alt="logo ALOPE"
              class="w-[35px] sm:w-[40px] mr-2 sm:mr-5"
            />
          </div>
          <div>
            <h2 class="text-xl font-bold tracking-wider">IL-Learning</h2>
            <small class="block -mt-2">ALOPE University</small>
          </div>
        </router-link>
      </div>
      <!--  -->
      <div class="mr-10">
        <label class="swap swap-rotate">
          <input type="checkbox" @click="toggleTheme" />
          <!-- <SunIcon /> -->
          <svg
            class="swap-on fill-current w-6 -mb-1"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
          >
            <path
              d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"
            />
          </svg>
          <!-- <MoonIcon /> -->
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
      <div className="flex-none">
        <div className="dropdown dropdown-end">
          <div class="flex items-center">
            <label
              tabIndex="{0}"
              className="btn btn-ghost btn-circle avatar mr-3"
            >
              <div className="w-10 rounded-full">
                <img
                  src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
                />
              </div>
            </label>
            <div>
              <p class="-mb-2 font-bold">{{ authData.name }}</p>
              <small>{{ authData.classroom }}</small>
            </div>
          </div>
          <ul
            tabIndex="{0}"
            className="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52"
          >
            <li>
              <a className="justify-between">
                Profile
                <span className="badge">New</span>
              </a>
            </li>
            <li><a>Settings</a></li>
            <li @click="handleLogout">
              <span>Logout</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import router from "@/router";

// icons
import SunIcon from "./icons/sunIcon.vue";
import MoonIcon from "./icons/moonIcon.vue";
// });
export default {
  components: {
    SunIcon,
    MoonIcon,
  },
  data() {
    return {
      authData: {
        name: "",
        classroom: "",
      },

      role: "",
    };
  },
  methods: {
    handleLogout() {
      localStorage.removeItem("authData");
      router.push("/login");
    },
    toggleTheme() {
      var removeLightMode = document.querySelector(
        'link[href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css"]'
      );
      var removeDarkMode = document.querySelector(
        'link[href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css"]'
      );
      removeLightMode && removeLightMode.remove();
      removeDarkMode && removeDarkMode.remove();

      var ss = document.createElement("link");
      ss.rel = "stylesheet";

      const htmlEL = document.getElementsByTagName("html");

      const dataThemeValue = htmlEL[0].getAttribute("data-theme");
      if (dataThemeValue == "light") {
        htmlEL[0].setAttribute("data-theme", "dark");
        htmlEL[0].classList.add("dark");
        htmlEL[0].classList.remove("light");

        ss.href = "//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css";
      } else {
        htmlEL[0].setAttribute("data-theme", "light");
        htmlEL[0].classList.add("light");
        htmlEL[0].classList.remove("dark");

        ss.href =
          "//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css";
      }

      document.head.appendChild(ss);

      this.$emit("toggleTheme", dataThemeValue);
    },
  },
  mounted() {
    const dataOnStorage = localStorage.getItem("authData");
    if (dataOnStorage !== null) {
      const resAuth = JSON.parse(localStorage.getItem("authData"));
      this.role = resAuth.loginAs;

      if (this.role != "lecturer") {
        this.authData = {
          name: resAuth.user.name,
          classroom: resAuth.userData.classroom.name,
        };
      } else {
        this.authData = {
          name: resAuth.user.name,
          classroom: "Lecturer ALOPE",
        };
      }
    } else {
      router.push("/login");
    }
  },
};
</script>

<style>
</style>