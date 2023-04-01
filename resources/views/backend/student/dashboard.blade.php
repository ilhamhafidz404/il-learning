@section('title')
    Dashboard
@endsection
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
        <div class="col-span-6 md:col-span-4">
            <div class="bg-white dark:bg-slate-800 shadow-md rounded">
                <h2 
                    class="
                        text-xl 
                        font-semibold 
                        text-gray-800 
                        dark:text-indigo-500
                        m-5
                        mt-0
                        pt-5
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
                            src="{{ asset('storage/'.$course->background) }}"
                            class="w-full sm:w-[35%] h-[65%] sm:!h-full object-cover rounded "
                        >
                        <div class="w-full sm:w-[65%]">
                            <small class="uppercase dark:text-gray-100">
                                {{ $course->program->name . " " . $course->program->level }}
                            </small>
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
                                        @if ($classroom->name == $user->classroom->name)
                                        <small class="font-semibold dark:text-gray-100">
                                            {{ $lecturer->user->name }}
                                        </small>
                                        @endif
                                    @endforeach
                                @endforeach
                                <small class="dark:text-gray-100"> | </small>
                                <small class="dark:text-gray-100">{{ Auth::user()->student[0]->classroom->name }}</small>
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="text-center my-20 pb-10">
                        <h2 class="text-8xl">☹️</h2>
                        <h3 class="text-2xl mt-4 text-gray-600 dark:text-gray-200">
                            you have not received credits
                        </h3>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="col-span-6 md:col-span-2">
            <div class="bg-white dark:bg-slate-800 py-5 shadow-md rounded">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-indigo-500 mx-5">Upcoming Event</h2>
                <ul class="mt-3 text-gray-800 dark:text-white">
                    @forelse ($doesntCompletes as $index => $comingEvent)
                        @foreach (Auth::user()->course as $course)
                            @if($course->id == $comingEvent->submission->course->id)
                                <li class="hover:bg-gray-200 dark:hover:bg-slate-700 px-5 py-3">
                                    <a 
                                        href="{{ route('submission.show', $comingEvent->submission->slug) }}" 
                                        class="flex items-center"
                                    >
                                        @if (!$comingEvent->submission->theory)
                                            <span class="bg-indigo-500  text-white inline-block p-1 rounded mr-3">
                                                @include(
                                                    'components.icons.bookOpen-regular-icon',
                                                    ['class' => 'w-8']
                                                )
                                            </span>
                                        @else
                                            <span class="bg-yellow-500  text-white inline-block p-1 rounded mr-3">
                                                <svg 
                                                    xmlns="http://www.w3.org/2000/svg" 
                                                    fill="none" 
                                                    viewBox="0 0 24 24" 
                                                    stroke-width="1.5" 
                                                    stroke="currentColor" 
                                                    class="w-8"
                                                >
                                                    <path 
                                                        stroke-linecap="round" 
                                                        stroke-linejoin="round" 
                                                        d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" 
                                                    />
                                                </svg>
                                            </span>
                                        @endif
                                        <div class="relative w-full">
                                            <h5 class="font-semibold text">
                                            @if (!$comingEvent->submission->theory)
                                                {{ 
                                                    Str::limit(
                                                        $comingEvent->submission->name .' - '. 
                                                        $comingEvent->submission->mission->name, 20, '...'
                                                    ) 
                                                }}
                                            @else
                                                {{ 
                                                    Str::limit(
                                                        $comingEvent->submission->name .' - '. 
                                                        $comingEvent->submission->mission->name, 30, '...'
                                                    ) 
                                                }}
                                                
                                            @endif
                                            </h5>
                                            <small class="text-gray-700 dark:text-gray-300 block -mt-1">
                                                {{ $comingEvent->submission->course->name }}
                                            </small>
                                            <small 
                                                class="
                                                    absolute 
                                                    top-0 
                                                    right-0 
                                                    text-gray-700 
                                                    dark:text-gray-200 
                                                    italic
                                                "
                                            >
                                                @if (!$comingEvent->submission->theory)
                                                    {{ 
                                                        \Carbon\Carbon::parse(
                                                            $comingEvent->submission->deadline
                                                        )->diffForHumans() 
                                                    }}
                                                @endif
                                            </small>
                                        </div>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @empty
                        <div class="text-center my-10 dark:text-white">
                            <h6 class="text-6xl">😁</h6>
                            <p class="mt-5 font-bold text-xl">No assignments for you</p>
                        </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
</section>