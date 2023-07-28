<template>
  <footer class="bg-gray-800 text-gray-100">
    <div class="container mx-auto px-3">
      <div class="grid lg:grid-cols-3 md:grid-cols-2 py-10 lg:gap-5 gap-10">
        <div>
          <h3 class="font-semibold text-xl">Company</h3>
          <p class="mt-5 text-sm">
            UNIVERSITAS KUNINGAN Jl. Cut Nyak Dhien No.36A, Cijoho, Kec.
            Kuningan, Kabupaten Kuningan, Jawa Barat 45513
          </p>
        </div>
        <div>
          <h3 class="font-semibold text-xl">Guideline</h3>
          <ul class="mt-5 text-sm">
            <li class="mb-3">
              <a href="{{ route('demo') }}" class="hover:font-semibold">
                Guide Il-Learning for Student
              </a>
            </li>
            <li>
              <a href="{{ route('demo') }}" class="hover:font-semibold">
                Guide Il-Learning for Lecturer
              </a>
            </li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-xl">Contact</h3>
          <ul class="mt-5 text-sm lg:block flex">
            <li class="mb-5 lg:mr-0 mr-5">
              <a
                href="https://www.instagram.com/alope.world/"
                class="flex items-center hover:text-[#bc1888] hover:font-semibold"
                target="_blank"
              >
                <span
                  class="instagramColor mr-3 p-2 rounded-full"
                  style="
                    background: linear-gradient(
                      45deg,
                      #f09433 0%,
                      #e6683c 25%,
                      #dc2743 50%,
                      #cc2366 75%,
                      #bc1888 100%
                    );
                  "
                >
                  <img src="/images/icon/instagram.png" class="w-[20px]" />
                </span>
                Instagram
              </a>
            </li>
            <li class="mb-5 lg:mr-0 mr-5">
              <a
                href=""
                class="flex items-center hover:text-[#4867aa] hover:font-semibold"
              >
                <span class="bg-[#4867aa] mr-3 p-2 rounded-full">
                  <img src="/images/icon/facebook.png" class="w-[20px]" />
                </span>
                Facebook
              </a>
            </li>
            <li class="lg:mr-0">
              <a
                href=""
                class="flex items-center hover:text-[#43bdf0] hover:font-semibold"
              >
                <span class="bg-[#43bdf0] mr-3 p-2 rounded-full">
                  <img src="/images/icon/twitter.png" class="w-[20px]" />
                </span>
                Twitter
              </a>
            </li>
          </ul>
        </div>
      </div>

      <hr class="my-5 border-slate-600" />

      <div class="md:flex items-center text-center md:text-left py-5">
        <div class="pb-5 flex items-center w-1/2 mx-auto md:m-0">
          <img src="/images/logo.png" alt="alope logo" class="w-[80px] mr-3" />
          <span>
            <h4 class="font-bold text-2xl whitespace-nowrap">IL-Learning</h4>
            <small class="block -mt-1">Alope University</small>
          </span>
        </div>
        <h5 class="lg:-translate-x-1/2 font-semibold tracking-wider md:text-xl">
          The Best University in The World!
        </h5>
      </div>
    </div>
    <div class="py-5 text-center bg-gray-900 text-sm">
      Copyright &copy; by ALOPE
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style>
</style>