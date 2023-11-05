<script setup>
// tools
import diffForHumans from "../../../tools/diffForHumans";
</script>

<template>
  <DashboardLayout>
    <section id="bg" class="w-full right-0 h-[350px] absolute mt-16"></section>
    <section class="relative col-span-4 pr-7 z-30">
      <div class="-mt-20" v-if="onLoadingGetData">
        <SkeletonLoadingCol1 :show="onLoadingGetData" />
      </div>
      <section class="py-16 px-5 md:py-28 col-span-4 lg:pr-[70px]">
        <div class="bg-white dark:bg-slate-800 p-5 rounded text-gray-500 shadow relative">
            <div class="lg:flex items-center">
                <button type="button" id="toEditButton" class="absolute top-0 right-0 text-sm bg-indigo-400 px-4 py-2 rounded m-4 flex items-center text-white" onclick="toggleEdit()">
                    <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-6 h-6 md:mr" >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    <span class="md:inline hidden">
                        Edit my Profile
                    </span>
                </button>
                <button 
                type="button"
                id="closeEditButton"
                class="absolute top-0 right-0 text-sm 
                    bg-red-500 hover:bg-red-400 px-4 py-2  rounded m-4 flex items-center hidden text-white
                "
                onclick="toggleEdit()"
            >
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" v
                        iewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-6 h-6 md:mr-3"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M6 18L18 6M6 6l12 12" 
                        />
                    </svg>
                    <span class="md:inline hidden">
                        Close Edit
                    </span>
                </button>
                <div class="mr-10 lg:mb-0 mb-10">
                    <div class="flex items-center">
                        <!-- <img src="" alt="" class="w-[250px] h-[250px] object-cover rounded"> -->
                        <div class="ml-5 lg:hidden md:block hidden">
                            <h2 class="uppercase font-semibold text-2xl">
                                Ilham
                            </h2>
                            <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>

                            <p class="text-sm mt-5text-gray-800 dark:text-gray-300">about</p>
                        </div>
                    </div>
                    <form action="" id="changePhoto" class="hidden" method="POST" enctype="multipart/form-data">
                        <label for="profile" class="w-full text-sm bg-indigo-400 px-4 py-2 rounded mt-4 flex items-center justify-center text-white lg:w-auto md:w-[250px]">
                            <svg 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" 
                                viewBox="0 0 24 24" 
                                stroke-width="1.5" 
                                stroke="currentColor" 
                                class="w-6 h-6 mr-3"
                            >
                                <path 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" 
                                />
                                <path 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" 
                                />
                            </svg>
                            Change Photo
                        </label>
                        <input type="file" class="hidden" id="profile" name="profile" accept="image/png, image/gif, image/jpeg"
                        >
                    </form>
                </div>
            </div>

            <div class="max-w-screen-2xl my-10 p-5">
              <img class="w-32 h-32 rounded-full mx-auto" src="https://picsum.photos/200" alt="Profile picture">
              <h2 class="text-center text-2xl font-semibold mt-3">Faizal Yusuf</h2>
              <p class="text-center text-gray-600 mt-1">TINFC - 2022 - 01</p>
              <div class="flex justify-center mt-5">
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Twitter</a>
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Youtube</a>
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Instagram</a>
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Facebook</a>
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">Tiktok</a>
              <a href="#" class="text-blue-500 hover:text-blue-700 mx-3">GitHub</a>
            </div>
            
            <div class="mt-5 mx-5">
                <h3 class="text-xl font-semibold">Profile</h3>
                <p class="text-gray-600 mt-2">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati quod, dolore quo nesciunt laboriosam reiciendis rerum asperiores eius laudantium ratione fugiat sit amet perferendis nostrum tenetur impedit quidem perspiciatis aliquam.
                </p>
            </div>
            <div class="flex justify-center mt-5">
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">NIM</h3>
                    <p class="text-gray-600 mt-2">
                        202208100
                    </p>
                </div>
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">Semester</h3>
                    <p class="text-gray-600 mt-2">
                        Semester 3
                    </p>
                </div>
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">Gender</h3>
                    <p class="text-gray-600 mt-2">
                        Laki-laki
                    </p>
                </div>
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">Birthday</h3>
                    <p class="text-gray-600 mt-2">
                        20 January 2003
                    </p>
                </div>
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">Phone</h3>
                    <p class="text-gray-600 mt-2">
                        08129@@@@@
                    </p>
                </div>
                <div class="mt-5 mx-5">
                    <h3 class="text-xl font-semibold">Alamat</h3>
                    <p class="text-gray-600 mt-2">
                        Kuningan Jawa Barat.
                    </p>
                </div>
            </div>
        </div>
        </div>
      </section>
    </section>
  </DashboardLayout>
</template>

<script>
// component
import SkeletonLoadingCol1 from "../../../components/skeletonLoading/col1.vue";

import DashboardLayout from "./../StudentDashboardLayout.vue";

// Actions
export default {
  props: ["username"],
  components: {
    SkeletonLoadingCol1,
    DashboardLayout
  },
  data() {
    descriptionInput: "";
    onLoadingGetData: false;
  },
}
</script>