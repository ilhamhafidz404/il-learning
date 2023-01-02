@extends('backend.layouts.master')

@section('content')
<section 
    class="
        py-16 
        md:py-28 
        col-span-5 
        lg:col-span-4 
        lg:pr-20
    "
>
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
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
        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded">
            <h2 
                class="
                    text-xl 
                    font-semibold 
                    text-gray-800 
                    dark:text-indigo-500
                    m-5
                "
            >
                Courses
            </h2>

            @forelse (Auth::user()->course as $index => $course)
                <a
                    href="{{ route('course.show', $course->slug) }}" 
                    class="
                        flex 
                        flex-col 
                        sm:flex-row 
                        gap-5 
                        items-center 
                        h-[300px] 
                        sm:h-[170px] 
                        hover:bg-gray-100 
                        dark:hover:bg-slate-700 
                        p-5
                        @if ($index+1 != count(Auth::user()->course))
                            border-b
                        @endif
                        border-gray-100
                        dark:border-slate-600
                    "
                >
                    <img 
                        src="https://www.toptal.com/designers/subtlepatterns/uploads/floor-tile.png"
                        class="w-full sm:w-[35%] h-[65%] sm:!h-full object-cover rounded "
                    >
                    <div class="w-full sm:w-[65%]">
                        <small class="dark:text-gray-100">TEKNIK INFORMATIKA S1</small>
                        <h2 
                            class="
                                text-xl 
                                font-medium 
                                mb-3 
                                dark:text-gray-100
                                uppercase
                            "
                        >
                            {{ $course->name }}
                        </h2>
                        <span>
                            @foreach ($course->lecturer as $lecturer)
                                @foreach ($lecturer->classroom as $classroom)
                                    @if ($classroom->name == Auth::user()->classroom->name)
                                        <small class="font-semibold dark:text-gray-100">
                                            {{ $lecturer->name }}
                                        </small>
                                    @endif
                                @endforeach
                            @endforeach
                            <small class="dark:text-gray-100"> | </small>
                            <small class="dark:text-gray-100">TINFC-2022-01</small>
                        </span>
                    </div>
                </a>
            @empty
                <div class="text-center my-20">
                    <h2 class="text-8xl">☹️</h2>
                    <h3 class="text-2xl mt-4 text-gray-600 dark:text-gray-200">
                        you have not received credits
                    </h3>
                </div>
            @endforelse
        </div>
        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-2 p-5 shadow-md rounded">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-indigo-500">Timeline</h2>
        </div>
    </section>
</section>
@endsection