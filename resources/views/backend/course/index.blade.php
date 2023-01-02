@extends('backend.layouts.master')

@section('content')
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
        "
    >
        <ul>
            <li>
                <a 
                    href="{{ route('dashboard') }}" 
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
            <li>
                <a 
                    href="{{ route('course.index') }}" 
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
                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" 
                        />
                    </svg>
                    Course
                </a>
            </li>
            <li>
                <a 
                    href="{{ route('acceptsks.index') }}" 
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
                            d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" 
                        />
                    </svg>
                    Accept SKS
                </a>
            </li>
        </ul>
    </aside>
    <div class="md:hidden lg:block"></div>
    
</main>
@endsection