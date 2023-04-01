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
                href="{{ route('dashboard') }}" 
                class="
                    px-5 
                    py-3 
                    border-l-[5px]
                    dark:text-white 
                    @if (Route::is('dashboard*'))
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
                href="{{ route('course.index') }}" 
                class="
                    px-5 
                    py-3 
                    border-l-[5px]
                    dark:text-white 
                    @if (Route::is('course*') || Route::is('mission*') || Route::is('submission*'))
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
                href="{{ route('classroom.index') }}" 
                class="
                    px-5 
                    py-3 
                    border-l-[5px]
                    dark:text-white 
                    @if (Route::is('classroom*'))
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
                        d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                    />
                </svg>
                Classroom
            </a>
        </li>
        @if (
            !Auth::user()->hasRole('lecturer') &&
            App\Models\Setting::select('sks_countdown')->first()->sks_countdown > now()
        )
            <li>
                <a 
                    href="{{ route('acceptsks.index') }}" 
                    class="
                        px-5 
                        py-3 
                        border-l-[5px]
                        dark:text-white 
                        @if (Route::is('acceptsks*'))
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
                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" 
                        />
                    </svg>
                    Accept SKS
                </a>
            </li>
        @endif
        <li>
            <a 
                href="{{ route('myaccount') }}" 
                class="
                    px-5 
                    py-3 
                    border-l-[5px]
                    dark:text-white 
                    @if (
                        Route::is('myaccount*') || 
                        Route::is('profile*') || 
                        Route::is('lecturer.profile*') || 
                        Route::is('password*')
                    )
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
                    ['class' => 'w-6 h-6 mr-3']
                )
                My Account
            </a>
        </li>
    </ul>
    <div class="absolute bottom-[35px] w-full px-5 hidden sm:block">
        <div class="bg-indigo-500/80 p-5 rounded text-gray-100 text-center font-semibold">
            On Development
        </div>
    </div>
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