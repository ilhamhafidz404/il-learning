{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <title>Login | Notus JS by Creative Tim</title>
  </head>
  <body class="text-blueGray-700 antialiased">
    <main>
      <section class="relative w-full h-full py-40 min-h-screen">
        <div
          class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
          style="background-image: url({{ asset('img/register_bg_2.png') }})"
        ></div>
        <div class="container mx-auto px-4 h-full">
          <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-4/12 px-4">
              <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
              >
                <div class="rounded-t mb-0 px-6 py-6">
                  <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                      Sign in with
                    </h6>
                  </div>
                  <div class="btn-wrapper text-center">
                    <button
                      class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                      type="button"
                    >
                      <img
                        alt="..."
                        class="w-5 mr-1"
                        src="{{ asset('img/github.svg') }}"
                      />Github</button
                    ><button
                      class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                      type="button"
                    >
                      <img
                        alt="..."
                        class="w-5 mr-1"
                        src="{{ asset('img/google.svg') }}"
                      />Google
                    </button>
                  </div>
                  <hr class="mt-6 border-b-1 border-blueGray-300" />
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-blueGray-400 text-center mb-3 font-bold">
                        <small>Or sign in with credentials</small>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                for="grid-password"
                            >
                                Email
                            </label>
                            <input
                                type="email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email"
                                name="email" 
                                :value="old('email')"
                            />
                        </div>
                        <div class="relative w-full mb-3">
                            <label
                                class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                for="grid-password"
                            >
                                Password
                            </label>
                            <input
                                type="password"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Password"
                                name="password" 
                                :value="old('password')"
                            />
                        </div>
                        <div>
                            <label class="inline-flex items-center cursor-pointer">
                                <input
                                    id="customCheckLogin"
                                    type="checkbox"
                                    class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                                />
                                <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                    Remember me
                                </span>
                            </label>
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                            >
                                Sign In
                            </button>
                        </div>
                    </form>
                </div>
              </div>
              <div class="flex flex-wrap mt-6">
                <div class="w-1/2">
                  <a href="#pablo" class="text-blueGray-200"
                    ><small>Forgot password?</small></a
                  >
                </div>
                <div class="w-1/2 text-right">
                  <a href="./register.html" class="text-blueGray-200"
                    ><small>Create new account</small></a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="absolute w-full bottom-0 bg-blueGray-800 pb-6">
          <div class="container mx-auto px-4">
            <hr class="mb-6 border-b-1 border-blueGray-600" />
            <div
              class="flex flex-wrap items-center md:justify-between justify-center"
            >
              <div class="w-full md:w-4/12 px-4">
                <div
                  class="text-sm text-white font-semibold py-1 text-center md:text-left"
                >
                  Copyright © <span id="get-current-year"></span>
                  <a
                    href="https://www.creative-tim.com?ref=njs-login"
                    class="text-white hover:text-blueGray-300 text-sm font-semibold py-1"
                    >Creative Tim</a
                  >
                </div>
              </div>
              <div class="w-full md:w-8/12 px-4">
                <ul
                  class="flex flex-wrap list-none md:justify-end justify-center"
                >
                  <li>
                    <a
                      href="https://www.creative-tim.com?ref=njs-login"
                      class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                      >Creative Tim</a
                    >
                  </li>
                  <li>
                    <a
                      href="https://www.creative-tim.com/presentation?ref=njs-login"
                      class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                      >About Us</a
                    >
                  </li>
                  <li>
                    <a
                      href="http://blog.creative-tim.com?ref=njs-login"
                      class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                      >Blog</a
                    >
                  </li>
                  <li>
                    <a
                      href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-login"
                      class="text-white hover:text-blueGray-300 text-sm font-semibold block py-1 px-3"
                      >MIT License</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </section>
    </main>
  </body>
  <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
  <script src="https://kit.fontawesome.com/d02202f823.js" crossorigin="anonymous"></script>
  <script>
    /* Make dynamic date appear */
    (function () {
      if (document.getElementById("get-current-year")) {
        document.getElementById(
          "get-current-year"
        ).innerHTML = new Date().getFullYear();
      }
    })();
    /* Function for opning navbar on mobile */
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      Popper.createPopper(element, document.getElementById(dropdownID), {
        placement: "bottom-start",
      });
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }
  </script>
</html>
