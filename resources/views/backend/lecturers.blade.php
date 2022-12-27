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
<body class="bg-gray-100">
    
    <section id="overlay" class="fixed inset-0 hidden z-10" onclick="showProfileDropdown()"></section>

    <nav class="py-3 bg-white dark:bg-slate-800 shadow fixed left-0 top-0 right-0 z-10">
        <section class="container mx-auto flex justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo ALOPE" class="w-[40px] mr-5">
                <span>
                    <h2 class="text-xl font-bold dark:text-gray-100">IL-Learning</h2>
                    <small class="block -mt-2 dark:text-gray-100">ALOPE University</small>
                </span>
            </div>
            <div class="flex items-center">
                <button class="mr-5" onclick="toggleDarkMode()">
                    <svg 
                        id="sun"
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
                        class="w-6 h-6 hidden text-white"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" 
                        />
                    </svg>
                </button>

                <section class="relative">
                    <button onclick="showProfileDropdown()" class="flex items-center focus:border-0">
                        <img 
                            src="{{ asset('images/profile/profile.jpg') }}" 
                            alt="profile photo"
                            class="
                                w-[50px] 
                                h-[50px] 
                                object-cover 
                                rounded-full 
                                mr-4 
                                border-2 
                                p-[2px] 
                                border-black 
                                dark:border-gray-100
                            "
                        >
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
        </section>
    </nav>

    <main class="grid grid-cols-5 gap-10">
        <aside class="bg-white dark:bg-slate-800 min-h-screen fixed py-28 w-[250px]">
            <ul>
                <li>
                    <a 
                        href="{{ route('dashboard') }}" 
                        class="px-5 py-3 border-indigo-500 border-l-[5px] flex items-center hover:text-indigo-500 text-indigo-500"
                    >
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
                                d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                            />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a 
                        href="" 
                        class="px-5 py-3 dark:text-white border-transparent border-l-[5px] flex items-center hover:text-indigo-500"
                    >
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
                                d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                            />
                        </svg>
                        Dashboard
                    </a>
                </li>
            </ul>
        </aside>
        <div></div>
        <section class="py-28 col-span-4 pr-20">
            <section class="grid grid-cols-4 gap-5">
                <a
                    href="" 
                    class="
                        w-full 
                        bg-[#2441e7] 
                        text-white 
                        p-5 
                        rounded 
                        flex 
                        items-center 
                        justify-between
                    "
                >
                    <div>
                        <small>Your Profile</small>
                        <h4 class="text-xl font-semibold">Profile</h4>
                    </div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-16 h-16"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                        />
                    </svg>
                </a>
                <a 
                    href=""
                    class="
                        w-full 
                        bg-[#ff1053] 
                        text-white 
                        p-5 
                        rounded 
                        flex 
                        items-center 
                        justify-between
                    "
                >
                    <div>
                        <small>Your Course</small>
                        <h4 class="text-xl font-semibold">Courses</h4>
                    </div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-16 h-16"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" 
                        />
                    </svg>

                </a>
                <a 
                    href="{{ route('lecturers') }}"
                    class="
                        w-full 
                        bg-[#00a78e] 
                        text-white 
                        p-5 
                        rounded 
                        flex 
                        items-center 
                        justify-between
                    "
                >
                    <div>
                        <small>Our Lecturer</small>
                        <h4 class="text-xl font-semibold">Lecturers</h4>
                    </div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-16 h-16"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" 
                        />
                    </svg>

                </a>
                <a 
                    href=""
                    class="
                        w-full 
                        bg-[#ecd06f] 
                        text-white 
                        p-5 
                        rounded 
                        flex 
                        items-center 
                        justify-between
                    "
                >
                    <div>
                        <small>Your Class</small>
                        <h4 class="text-xl font-semibold">Classmate</h4>
                    </div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-16 h-16"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                        />
                    </svg>
                </a>
            </section>
            <section class="grid grid-cols-6 gap-5 mt-10">
                <div class="col-span-4">
                    <h2 
                        class="
                            text-xl 
                            font-semibold 
                            text-gray-800 
                            dark:text-indigo-500
                            m-5
                        "
                    >
                        Lecturers
                    </h2>
                    @foreach ($lecturers as $lecturer)
                        <section 
                            class="bg-white dark:bg-slate-800 rounded shadow p-5 flex items-center gap-5 mb-3 relative"
                        >
                            <img 
                                src="{{ asset('images/profile/lecturers/1.jpg') }}" 
                                alt="profile"
                                class="w-[100px] h-[100px] object-cover rounded" 
                            >
                            <div class="flex items-center gap-10 justify-between">
                                <div>
                                    <h3 class="font-normal text-xl uppercase -mb-1 dark:text-gray-100">
                                        {{ $lecturer->name }}
                                    </h3>
                                    <small class="text-gray-600 dark:text-gray-300">20220810052</small>
                                </div>
                                <div>
                                    @foreach ($lecturer->course as $course)
                                        <small class="block">{{ $course->name }}</small>
                                    @endforeach
                                    @foreach ($lecturer->classroom as $classroom)
                                        <small>{{ $classroom->name }}</small>
                                    @endforeach
                                </div>
                            </div>
                            <button
                                onclick="changeLecturer(
                                    '{{ asset('images/profile/lecturers/1.jpg') }}',
                                    '{{ $lecturer->name }}'
                                )" 
                                class="absolute right-0 top-1/2 -translate-y-1/2 mr-7"
                            >
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1.5" 
                                    stroke="currentColor" 
                                    class="w-6 h-6 text-gray-400 dark:text-indigo-500"
                                >
                                    <path 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round" 
                                        d="M8.25 4.5l7.5 7.5-7.5 7.5" 
                                    />
                                </svg>
                            </button>
                        </section>
                    @endforeach
                </div>
                <div class="bg-white dark:bg-slate-800 col-span-2 p-5 shadow-md rounded">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-indigo-500 mb-5">
                        Lecturer Detail
                    </h2>
                    <img 
                        id="lecturerDetailPhoto"
                        src="{{ asset('images/profile/lecturers/1.jpg') }}" 
                        alt="profile"
                        class="w-full h-[250px] object-cover rounded" 
                    >
                    <span class="text-center">
                        <h2 
                            id="lecturerDetailName"
                            class="uppercase mt-5 text-xl font-semibold dark:text-gray-100"
                        >
                            Ilham Hafidz
                        </h2>
                        <small class="block text-gray-600 dark:text-gray-300">20220810052</small>
                    </span>
                </div>
            </section>
        </section>
    </main>


    <script>
        function showProfileDropdown(){
            const dropdownContainer= document.getElementById('dropdownContainer');
            const overlay= document.getElementById('overlay');
            dropdownContainer.classList.toggle('hidden')
            overlay.classList.toggle('hidden')
        }

        const toggleDarkMode = () =>{
            const moon= document.getElementById('moon');
            const sun= document.getElementById('sun');
            const body = document.getElementsByTagName("body")[0];

            moon.classList.toggle('hidden');
            sun.classList.toggle('hidden');
            body.classList.toggle('dark');
            body.classList.toggle('bg-gray-100');
            body.classList.toggle('bg-slate-700');
        }

        const changeLecturer = (photo, name) =>{
            const lecturerPhoto= document.getElementById('lecturerDetailPhoto');
            const lecturerName= document.getElementById('lecturerDetailName');

            lecturerPhoto.src= photo;
            lecturerName.innerHTML= name;
        }
    </script>
</body>
</html>