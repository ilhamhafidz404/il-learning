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
<body 
    class="
    @if (Auth::user()->mode == 'dark')
        dark bg-slate-600
    @else
        bg-gray-100
    @endif
    "
>    
    <section id="overlay" class="fixed inset-0 hidden z-10" onclick="showProfileDropdown()"></section>

    <nav class="py-3 bg-white dark:bg-slate-800 shadow fixed left-0 top-0 right-0 z-10">
        <section class="container mx-auto flex justify-between items-center px-3 sm:px-0">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo ALOPE" class="w-[35px] sm:w-[40px] mr-2 sm:mr-5">
                <span>
                    <h2 class="text-[18px] sm:text-xl font-bold dark:text-gray-100">IL-Learning</h2>
                    <small class="text-[12px] sm:text-base block -mt-2 dark:text-gray-100">ALOPE University</small>
                </span>
            </div>
            <div class="items-center hidden sm:flex">
                <a
                    href="/change-mode"
                    class="
                        w-full 
                        block 
                        text-gray-700 
                        dark:text-gray-100 
                        text-sm 
                        font-[400]
                    "
                    onclick="
                            event.preventDefault();
                            document.getElementById('changeThemeMode').submit();
                        "
                >
                    <svg 
                        id="sun"
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-6 h-6 dark:hidden"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" 
                        />
                    </svg>
                    <svg 
                        id="moon"
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-6 h-6 hidden dark:block text-white"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" 
                        />
                    </svg>
                </a>

                <form id="changeThemeMode" action="{{ route('change.theme.mode') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <section class="relative ml-5">
                    <button 
                        onclick="showProfileDropdown()" 
                        class="flex items-center focus:border-0"
                    >
                        <div class="w-[50px] h-[50px] mr-4 
                                    border-2 
                                    p-[2px] 
                                    border-black 
                                    rounded-full
                                    dark:border-gray-100">
                            <img 
                                src="{{ asset('images/profile/profile.jpg') }}" 
                                alt="profile photo"
                                class="
                                    w-full 
                                    h-full
                                    object-cover 
                                    rounded-full
                                "
                            >
                        </div>
                        <span class="text-left">
                            <p class="font-semibold dark:text-gray-100">{{ Auth::user()->name }}</p>
                            <small 
                                class="
                                    text-gray-600 
                                    block 
                                    -mt-2 
                                    dark:text-gray-300
                                "
                            >
                                {{ Auth::user()->email }}
                            </small>
                        </span>
                    </button>
                    <div 
                        id="dropdownContainer" 
                        class="
                            mt-3 
                            min-w-[200px] 
                            absolute 
                            right-[50px] 
                            hidden 
                            rounded 
                            border 
                            dark:border-slate-700
                            shadow 
                            bg-white
                            dark:bg-slate-800
                        "
                    >
                        <ul>
                            <li class="hover:bg-gray-200 dark:hover:bg-slate-700 px-3 py-2">
                                <a 
                                    href=""
                                    class="
                                        w-full 
                                        block 
                                        text-gray-700 
                                        dark:text-gray-100 
                                        text-sm 
                                        font-[400]
                                    "
                                >
                                    Profile
                                </a>
                            </li>
                            <li class="hover:bg-gray-200 dark:hover:bg-slate-700 px-3 py-2">
                                <a 
                                    href=""
                                    class="
                                        w-full 
                                        block 
                                        text-gray-700 
                                        dark:text-gray-100 
                                        text-sm 
                                        font-[400]
                                    "
                                >
                                    Setting
                                </a>
                            </li>
                            <hr class="dark:border-slate-700">
                            <li class="hover:bg-gray-200 dark:hover:bg-slate-700 px-3 py-2">
                                <a 
                                    href="{{ route('logout') }}"
                                    class="
                                        w-full 
                                        block 
                                        text-gray-700 
                                        dark:text-gray-100 
                                        text-sm 
                                        font-[400]
                                    "
                                    onclick="
                                            event.preventDefault();
                                            document.getElementById('logout-form').submit();
                                        "
                                >
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="sm:hidden flex">
                <button onclick="toggleSideBar()">
                    =
                </button>
            </div>
        </section>
    </nav>

    <main class="grid grid-cols-5 gap-10">
        @include('backend.layouts.sidebar')
        @yield('content')
    </main>


    <script>
        function showProfileDropdown(){
            const dropdownContainer= document.getElementById('dropdownContainer');
            const overlay= document.getElementById('overlay');
            dropdownContainer.classList.toggle('hidden')
            overlay.classList.toggle('hidden')
        }

        function toggleSideBar(){
            const sidebar= document.getElementById("sidebar");
            sidebar.classList.toggle("left-0")
            sidebar.classList.toggle("-left-full")
        }

    </script>
    @yield('script')
</body>
</html>