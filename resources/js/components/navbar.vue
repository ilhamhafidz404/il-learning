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
      <div className="flex-none">
        <div className="dropdown dropdown-end">
          <label tabIndex="{0}" className="btn btn-ghost btn-circle avatar">
            <div className="w-10 rounded-full">
              <img
                src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg"
              />
            </div>
          </label>
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
            <li @click="handleLogout">Logout</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
// window.addEventListener("scroll", function () {
//   const nav = document.querySelector("nav");
//   nav.classList.toggle("bg-base-100", scrollY > 0);
//   nav.classList.toggle("bg-transparent", scrollY == 0);
//   nav.classList.toggle("py-5", scrollY == 0);
//   nav.classList.toggle("py-3", scrollY > 0);
//   nav.classList.toggle("shadow", scrollY > 0);
//   nav.classList.toggle("px-5", scrollY == 0);
//   nav.classList.toggle("px-3", scrollY > 0);
// });
export default {
  methods: {
    async handleLogout() {
      try {
        const response = await axios.post(
          "http://127.0.0.1:8000/api/auth/logout",
          {},
          {
            headers: {
              Authorization:
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE2OTEwNTA5OTAsImV4cCI6MTY5NzA1MDkzMCwibmJmIjoxNjkxMDUwOTkwLCJqdGkiOiJyWmV5NUtEWDZtM0FMZUtGIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.jSmHCfCnvtTiztUVLjl1Y1TrkyfpmyQfGv6mvRyPSAA",
            },
          }
        );
        console.log(response);
      } catch (error) {
        console.error(error);
      }
    },
  },
};
</script>

<style>
</style>