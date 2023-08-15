<template>
  <div className="navbar bg-base-100 shadow-xl fixed z-50">
    <div class="container mx-auto">
      <div className="flex-1">
        <router-link to="/" className="flex">
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
          <SunIcon />
          <MoonIcon />
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
  conmponents: {
    MoonIcon,
    SunIcon,
  },
  data() {
    return {
      authData: {
        name: "",
        classroom: "",
      },
    };
  },
  methods: {
    handleLogout() {
      localStorage.removeItem("authData");
      router.push("/login");
    },
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
  mounted() {
    const dataOnStorage = localStorage.getItem("authData");
    if (dataOnStorage !== null) {
      const resAuth = JSON.parse(localStorage.getItem("authData"));
      this.authData = {
        name: resAuth.user.name,
        classroom: resAuth.user.classroom.name,
      };
    } else {
      router.push("/login");
    }
  },
};
</script>

<style>
</style>