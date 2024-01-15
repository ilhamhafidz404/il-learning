<template>
    <nav
        class="bg-transparent fixed py-5 dark:text-white text-gray-700 z-50 w-full px-5 duration-300"
    >
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img
                    src="/images/logo.png"
                    alt="alope logo"
                    class="w-[40px] mr-3"
                />
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
            <h3 class="text-xl text-gray-300">
                The Best University in The World!
            </h3>
        </div>
    </header>
    <body>
        <h1 class="text-center text-gray-200 my-[25px] text-xl">KATEGORI</h1>
        <div class="grid grid-cols-3 p-[15px] gap-[30px] px-[50px]">
            <div
                id="fkip"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Fakultas Keguruan Dan <br />
                    Ilmu Pendidikan
                </a>
            </div>
            <div
                id="feb"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Fakultas Ekonomi Dan <br />
                    Bisnis
                </a>
            </div>
            <div
                id="fkom"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Fakultas Ilmu <br />
                    Komputer
                </a>
            </div>
            <div
                id="hukum"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Fakultas <br />
                    hukum
                </a>
            </div>
            <div
                id="fhut"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Fakultas Kehutanan Dan <br />
                    Lingkungan
                </a>
            </div>
            <div
                id="pasca"
                class="bg-[#353535] p-[50px] text-white text-center text-2xl hover:bg-[#252525] rounded-[10PX]"
            >
                <a href="http://" class="z-50 relative">
                    Sekolah Pasca <br />
                    Sarjana
                </a>
            </div>
        </div>
        <div class="flex justify-center">
            <button
                class="bg-blue-500 hover:bg-blue-700 opacity-50 hover:opacity-100 text-white font-bold py-2 px-4 my-[25px] rounded-full"
            >
                Button
            </button>
        </div>
    </body>
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
#fkip {
    background-image: url("/images/kategori/fkip.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#fkip::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);
}
#feb {
    background-image: url("/images/kategori/feb.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#feb::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);
}
#fkom {
    background-image: url("/images/kategori/fkom.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#fkom::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);
}
#hukum {
    background-image: url("/images/kategori/hukum.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#hukum::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);
}
#fhut {
    background-image: url("/images/kategori/fhut.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#fhut::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);
}
#pasca {
    background-image: url("/images/kategori/pasca.jpg");
    background-size: cover;
    background-position: center;
    position: relative;
}
#pasca::after {
    content: "";
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.719);;
}
</style>
