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
            @if ($admin->mode == 'dark')
                dark bg-slate-600
            @else
                bg-gray-100
            @endif
        "
    >    
    <section id="overlay" class="fixed inset-0 hidden z-10" onclick="showProfileDropdown()"></section>

    <nav class="py-3 bg-white dark:bg-slate-800 shadow fixed left-0 top-0 right-0 z-50">
        <section class="container mx-auto flex justify-between items-center px-3 sm:px-0">
            <div class="flex items-center">
                <img 
                    src="{{ asset('images/logo.png') }}" 
                    alt="logo ALOPE" 
                    class="w-[35px] sm:w-[40px] mr-2 sm:mr-5"
                >
                <span>
                    <h2 class="text-[18px] sm:text-xl font-bold dark:text-gray-100">IL-Learning</h2>
                    <small class="text-[12px] sm:text-base block -mt-2 dark:text-gray-100">
                        ALOPE University
                    </small>
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
                    
                    @include(
                        'components.icons.sun-regular-icon', 
                        ['class' => 'w-6 h-6 dark:hidden']
                    )
                    @include(
                        'components.icons.moon-regular-icon', 
                        ['class' => 'w-6 h-6 hidden dark:block text-white']
                    )
                </a>

                <form 
                    id="changeThemeMode" 
                    action="{{ route('admin.change.theme.mode') }}" 
                    method="POST" 
                    class="d-none"
                >
                    @csrf
                </form>

                <section class="relative ml-5 flex">
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
                                src="{{ asset('storage/profile/woman2.jpg') }}" 
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
                            <p class="font-semibold dark:text-gray-100 whitespace-nowrap">
                                {{ $admin->username }}
                            </p>
                            <small 
                                class="
                                    text-gray-600 
                                    block 
                                    -mt-2 
                                    dark:text-gray-300
                                    whitespace-nowrap
                                "
                            >
                                {{ Session::get('email') }}
                            </small>
                        </span>
                    </button>
                    <div 
                        id="dropdownContainer" 
                        class="
                            mt-16
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
                                    {{-- href="{{ route('profile.show', Auth::user()->username) }}" --}}
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
                                    href="{{ route('admin.logout') }}"
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

                    <button onclick="toggleSideBar()" class="ml-10 lg:hidden">
                        @include(
                            'components.icons.bars-model4-icon', 
                            ['class' => 'w-7 h-7 dark:text-white']
                        )
                    </button>
                </section>
            </div>
            <div class="sm:hidden flex">
                <button onclick="toggleSideBar()">
                    @include(
                        'components.icons.bars-model4-icon', 
                        ['class' => 'w-7 h-7 dark:text-white']
                    )
                </button>
            </div>
        </section>
    </nav>
    
    <main class="grid grid-cols-5 gap-10">
        <aside 
            id="sidebar"
            class="
                bg-white 
                dark:bg-slate-800 
                min-h-screen 
                fixed 
                py-20 
                sm:py-28 
                w-[250px]
                duration-300
                -left-full
                dark:border-slate-600
                lg:left-0
                border-r
                sm:border-0
                sm:shadow
                z-40
            "
        >
            <ul>
                <li>
                    <a 
                        href="{{ route('admin.dashboard') }}" 
                        class="
                            px-5 
                            py-3 
                            border-l-[5px]
                            dark:text-white 
                            @if (Route::is('admin.dashboard*'))
                                border-indigo-500 
                                !text-indigo-500
                            @else
                                border-transparent 
                            @endif
                            flex 
                            items-center 
                            hover:text-indigo-500 
                        " 
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
                        href="{{ route('admin.course.index') }}" 
                        class="
                            px-5 
                            py-3 
                            border-l-[5px]
                            dark:text-white 
                            @if (Route::is('admin.course*'))
                                border-indigo-500 
                                !text-indigo-500
                            @else
                                border-transparent 
                            @endif
                            flex 
                            items-center 
                            hover:text-indigo-500 
                        " 
                    >
                        @include(
                            'components.icons.bookOpen-regular-icon',
                            ['class' => 'w-6 h-6 mr-3']
                        )
                        Course
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('admin.lecturer.index') }}" 
                        class="
                            px-5 
                            py-3 
                            border-l-[5px]
                            dark:text-white 
                            @if (Route::is('admin.lecturer*'))
                                border-indigo-500 
                                !text-indigo-500
                            @else
                                border-transparent 
                            @endif
                            flex 
                            items-center 
                            hover:text-indigo-500 
                        " 
                    >
                        @include(
                            'components.icons.userGroup-regular-icon',
                            ['class' => 'w-6 mr-3']
                        )
                        Lecturer
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('admin.student.index') }}" 
                        class="
                            px-5 
                            py-3 
                            border-l-[5px]
                            dark:text-white 
                            @if (Route::is('admin.student*'))
                                border-indigo-500 
                                !text-indigo-500
                            @else
                                border-transparent 
                            @endif
                            flex 
                            items-center 
                            hover:text-indigo-500 
                        " 
                    >
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-6 mr-3"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                            />
                        </svg>
                        Student
                    </a>
                </li>
                <li>
                    <a 
                        href="{{ route('admin.classroom.index') }}" 
                        class="
                            px-5 
                            py-3 
                            border-l-[5px]
                            dark:text-white 
                            @if (Route::is('admin.classroom*') || Route::is('mission*') || Route::is('submission*'))
                                border-indigo-500 
                                !text-indigo-500
                            @else
                                border-transparent 
                            @endif
                            flex 
                            items-center 
                            hover:text-indigo-500 
                        " 
                    >
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-6 mr-3"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                            />
                        </svg>
                        Classroom
                    </a>
                </li>
            </ul>
            <div class="absolute bottom-[35px] w-full px-5 block sm:hidden">
                <ul class="mt-auto">
                    <li class="mb-3">
                        <button 
                            class="
                                dark:bg-gray-200 
                                bg-slate-600 
                                text-dark 
                                w-full 
                                py-2 
                                rounded 
                                text-sm
                                flex
                                justify-center
                                items-center
                                dark:text-gray-800
                                text-white
                            "
                            onclick="
                                event.preventDefault();
                                document.getElementById('changeThemeMode').submit();
                            "
                        >
                            @include(
                            'components.icons.sun-regular-icon', 
                                ['class' => 'w-5 h-5 hidden dark:block mr-2']
                            )
                            @include(
                                'components.icons.moon-regular-icon', 
                                ['class' => 'w-5 h-5 dark:hidden text-white mr-2']
                            )
                            Change 
                            <span class="hidden dark:inline mx-[2px]">Light</span> 
                            <span class="dark:hidden mx-[2px]">Dark</span> 
                            Mode
                        </button>
                        <form 
                            id="changeThemeMode" 
                            action="{{ route('change.theme.mode') }}" 
                            method="POST" 
                            class="d-none"
                        >
                        @csrf
                        </form>
                    </li>
                    <li>
                        <button 
                            class="
                                bg-red-500 
                                hover:bg-red-400 
                                text-white 
                                w-full 
                                py-2 
                                rounded 
                                text-sm
                            "
                            onclick="
                                event.preventDefault();
                                document.getElementById('logout-form').submit();
                            "
                        >
                            Logout
                        </button>
                        <form 
                            id="logout-form" 
                            action="{{ route('logout') }}" 
                            method="POST" 
                            class="d-none"
                        >
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="md:hidden lg:block"></div>
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