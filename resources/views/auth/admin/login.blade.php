<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- Google Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
  @vite('resources/css/app.css')
  <style>
    *{
      font-family: 'Poppins', sans-serif;
    }
    input:focus ~ label {
      background-color: white;
    }
  </style>
</head>
<body class="">
  <main class="grid grid-cols-1 lg:grid-cols-2 gap-5 min-h-screen">
    <section 
      class="
        relative
        after:content-['']
        after:absolute
        after:inset-0
        after:bg-black/30
        order-2
        sm:order-1
        h-screen
        md:h-auto
      "
    >
      <div class="h-full w-full">
        <img src="{{ asset('images/auth/slide1.jpg') }}" class="h-full object-cover">
        <div 
            class="
                absolute 
                bottom-[100px] 
                text-white 
                z-10 
                pl-10 
                border-l-[5px] 
                border-blue-500 
                w-[85%]
                md:w-[45%]
                lg:w-[85%]
            "
        >
          <h1 class="text-3xl font-bold tracking-wider">ALOPE UNIVERSITY Learning</h1>
          <p class="text-sm mt-3">
            Improve the quality of your learning with the Digital Class Alope University . <br>
            With Digital Classes, the learning process becomes easier and accessible to everyone, anywhere and anytime.
          </p>
        </div>
      </div>
    </section>
    <section 
        class="
            z-20 
            right-0 
            flex 
            items-center 
            rounded
            justify-center 
            bg-white
            border-blue-500
            order-1 
            sm:order-2 
            md:right-[50px] 
            lg:right-0 
            top-0 
            md:top-1/2
            lg:top-0 
            md:-translate-y-1/2
            lg:-translate-y-0
            relative
            md:absolute 
            lg:relative
            w-auto
            md:w-[400px]
            lg:w-auto 
            py-0
            md:py-7
            lg:py-0
            border-b-0
            md:border-b-[5px]
            lg:border-b-0
            h-screen
            md:h-auto
        "
    >
      <div class="w-[80%] md:w-[85%] lg:w-[70%] text-center">
        <div class="mb-10">
          <img src="{{ asset('images/logo.png') }}" class="mx-auto mb-2 w-[70px] md:w-[50px] lg:w-[70px]">
          <h2 class="text-2xl md:text-xl lg:text-2xl font-semibold">ALOPE UNIVERSITY</h2>
          <span class="font-semibold text-indigo-500 uppercase">Login as Admin</span>
        </div>
        <form method="POST" action="{{ route('admin.login') }}">
          @csrf
          <div class="relative mb-5">
            <input 
              type="email" 
              id="email" 
              name="email"
              class="
                block 
                px-2.5 
                pb-2.5 
                pt-4 
                w-full 
                text-sm 
                text-gray-900 
                rounded-lg 
                border 
                appearance-none 
                focus:outline-none 
                focus:ring-0 
                focus:border-blue-600 
                peer 
                bg-[#f9fafe]
                @error('email')
                  border-red-500
                @enderror
              "
              value="{{old("email")}}"
              placeholder=" " 
            />
            <span 
              class="
                absolute 
                right-4 
                top-1/2 
                -translate-y-1/2 
                text-[#c6c6d2] 
                peer-focus:text-blue-600
                @error('email')
                  text-red-500
                @enderror
              "
            >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
              >
                <path 
                  stroke-linecap="round" 
                  d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" 
                />
              </svg>
            </span>
            <label 
              for="email" 
              class="
                absolute 
                text-sm 
                text-gray-500 
                duration-300 
                transform 
                -translate-y-4 
                scale-[0.9] 
                top-2 z-10 
                origin-[0] 
                px-2 
                peer-focus:px-2 
                peer-focus:text-blue-600  
                peer-placeholder-shown:scale-100 
                peer-placeholder-shown:-translate-y-1/2 
                peer-placeholder-shown:top-1/2 
                peer-focus:top-2 
                peer-focus:scale-[0.9] 
                peer-focus:-translate-y-4 
                left-1
              "
            >
              Email
            </label>
          </div>
          <div class="relative">
            <input 
              type="password" 
              id="password" 
              name="password"
              class="
                block 
                px-2.5 
                pb-2.5 
                pt-4 
                w-full 
                text-sm 
                text-gray-900 
                rounded-lg 
                border 
                appearance-none 
                focus:outline-none 
                focus:ring-0 
                focus:border-blue-600 
                peer 
                bg-[#f9fafe]
                @error('email')
                  border-red-500
                @enderror
              "
              placeholder=" " 
            />
            {{-- lock --}}
            <span 
              class="
                absolute 
                right-4 
                top-1/2 
                -translate-y-1/2 
                text-[#c6c6d2] 
                peer-focus:text-blue-600 
                peer-placeholder-shown:block 
                hidden
                @error('email')
                  text-red-500
                @enderror
              "
            >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" 
                />
              </svg>
            </span>
            {{-- eye --}}
            <span 
              class="
                absolute 
                right-4 top-1/2 
                -translate-y-1/2 
                text-[#c6c6d2] 
                peer-focus:text-blue-600 
                peer-placeholder-shown:hidden 
                block 
                cursor-pointer
                @error('email')
                  text-red-500
                @enderror
              " 
              onclick="hello()"
            >
              <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-6 h-6"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" 
                />
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" 
                />
              </svg>
            </span>
            <label 
              for="password" 
              class="
                absolute 
                text-sm 
                text-gray-500 
                duration-300 
                transform 
                -translate-y-4 
                scale-[0.9] 
                top-2 
                z-10 
                origin-[0] 
                px-2 
                peer-focus:px-2 
                peer-focus:text-blue-600 
                peer-placeholder-shown:scale-100 
                peer-placeholder-shown:-translate-y-1/2 
                peer-placeholder-shown:top-1/2 
                peer-focus:top-2 
                peer-focus:scale-[0.9] 
                peer-focus:-translate-y-4 
                left-1
              "
            >
              Password
            </label>
          </div>
          <div class="mb-10 text-right mt-1 flex justify-between">
            <div class="text-left">
              <small class="text-red-500 block">
                @error('email')
                  {{ $message }}
                @enderror
              </small>
              <small class="text-red-500 block">
                @error('password')
                  {{ $message }}
                @enderror
              </small>
            </div>
            <a href="" class="text-gray-600 text-[13px]">Lupa password?</a>
          </div>
          <div>
            <button class="bg-[#285ac4] hover:bg-[#285ac4]/80 w-full py-3 rounded text-white">
              Login
            </button>
            <span class="relative block mt-10 mb-5">
              <hr>
              <small class="absolute top-[-10px] bg-white px-3 left-1/2 -translate-x-1/2">OR</small>
            </span>
            <a 
              href="{{ route('login') }}"
              class="
                border-[#4285f4] 
                border 
                bg-[#4285f4]
                hover:bg-[#4285f4]/80 
                w-full 
                py-3 
                rounded 
                text-white 
                flex 
                justify-center 
                text-sm 
                items-center
                mb-3
              "
            >
              Login As User
            </a>
            <button class="border-[#4285f4] border hover:bg-[#4285f4]/80 w-full py-3 rounded text-[#4285f4] hover:text-white flex justify-center text-sm items-center">
              <img src="{{ asset('images/icon/google.png') }}" width="25px" class="mr-3">
              {{-- <a href="https://www.flaticon.com/free-icons/google" title="google icons">Google icons created by Freepik - Flaticon</a> --}}
              Login Using Google Account
            </button>
          </div>
        </form>
      </div>
      <footer class="absolute bottom-[25px] block md:hidden lg:block">
        <small class="text-gray-600">Copyright &copy; 2022 by ALOPE University</small>
      </footer>
    <section>
  </main>


  <script>
    function hello(){
      const password = document.getElementById("password");
      const checkAttr = password.getAttribute("type");

      if(checkAttr == "password"){
        password.setAttribute("type", "text");
      } else{
        password.setAttribute("type", "password");
      }
    }
  </script>
</body>
</html>