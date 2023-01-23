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
                action="{{ route('change.theme.mode') }}" 
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
                            src="{{ asset('storage/'.$user->profile) }}" 
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
                            {{ Auth::user()->name }}
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
                            {{ Auth::user()->email }}
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
                                href="{{ route('profile.show', Auth::user()->username) }}"
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