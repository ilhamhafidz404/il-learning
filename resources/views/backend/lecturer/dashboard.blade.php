<section 
    class="
        py-16 
        px-5
        md:py-28 
        col-span-5 
        lg:col-span-4 
        lg:pr-[70px]
    "
>
    @include('components.widgets')    
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

            @forelse ($courses as $index => $course)
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