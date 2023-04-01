@extends('backend.layouts.master')
@section('title')
    {{ $course->name }}
@endsection
@section('content')
    {{-- @if (Session::has('lecturer') and Session::get('lecturer'))
        @include('backend.lecturer.course.show')
    @else
        @include('backend.student.course.show')
    @endif --}}
    <section 
        class="
            col-span-5 
            lg:col-span-4 
            py-16 
            md:py-28 
            px-3
            sm:px-8
            lg:pr-20
        "
    >
        <img 
            src="{{ asset('images/auth/slide1.jpg') }}"
            class="
                absolute 
                top-0 
                left-0 
                w-full 
                -z-10 
                h-[400px] 
                object-cover 
                object-center
                lg:object-[100px]
            "
        >
        <span
            class="
                absolute 
                top-0 
                left-0 
                w-full 
                -z-10 
                h-[400px]
                bg-black/30
            "
        ></span>
        <div class="text-white relative h-[300px]">
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $course->name }}</h1>
            @if (Auth::user()->hasRole('student'))
                @foreach ($course->lecturer as $lecturer)
                    <span>{{ $lecturer->user->name }}</span>
                @endforeach
            @endif
            <a 
                href="{{ route('dashboard') }}" 
                class="text-white absolute bottom-[150px] z-30 left-0"
            >
                Go Back
            </a>
           @if (Auth::user()->hasRole('lecturer'))
                <div class="flex absolute right-0 bottom-[150px] ">
                    <a 
                        href="{{ route('mission.create', ['slug' => $course->slug]) }}" 
                        class="
                            bg-emerald-500 
                            hover:bg-emerald-400 
                            px-5 
                            py-2 
                            rounded 
                            mb-3
                            mr-3
                        "
                    >
                        Add Mission
                    </a>
                    <a 
                        href="{{ route('submission.create', ['slug' => $course->slug]) }}" 
                        class="
                            bg-indigo-500 
                            hover:bg-indigo-400 
                            px-5 
                            py-2 
                            rounded 
                            mb-3
                        "
                    >
                        Add Submission
                    </a>
                </div>
           @endif
        </div>

        <div 
            class="
                -mt-[150px]
                bg-white
                dark:bg-slate-800
                p-5
                rounded
                grid
                grid-cols-1
                md:grid-cols-2
                gap-5
                z-30
                relative
            "
        >
            @forelse ($missions as $index => $mission)
                <a href="{{ route('mission.show', $mission->slug) }}">
                    <div 
                        class="
                            bg-white
                            dark:bg-slate-600
                            p-5 
                            rounded 
                            shadow
                            dark:text-gray-200
                        "
                    >
                        <span class="flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">{{ $mission->name}}</h3>
                                <small class="flex items-center">
                                    <svg 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor" 
                                        class="w-4 h-4 mr-2"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                    </svg>
                                    Has {{ $mission->submission->count() }} submission
                                </small>
                            </div>
                            <h4 class="font-bold">
                                @if (Auth::user()->hasRole('student'))
                                    @php
                                        $onProgress =false;
                                    @endphp
                                    @foreach ($progresses as $progress)
                                        @if ($progress->mission_id == $mission->id)
                                            @php
                                                $onProgress =true;
                                            @endphp
                                            {{ 
                                                Str::limit(
                                                    $progress->progress / $progress->submission_count * 100, 4, ''
                                                )
                                            }}
                                            @break
                                        @endif
                                    @endforeach
                                    @if (!$onProgress)
                                        0
                                    @endif
                                    %
                                @endif
                            </h4>
                        </span>
                        @if (Auth::user()->hasRole('student'))
                            <progress   
                                @if ($onProgress)
                                    value=
                                    "@foreach ($progresses as $progress)
                                        @if ($progress->mission_id == $mission->id)
                                            {{$progress->progress / $progress->submission_count * 100}}@break 
                                        @endif 
                                    @endforeach" 
                                @else
                                    value="0"
                                @endif
                                max="100" 
                                class="
                                    relative
                                    mt-5
                                    w-full
                                    h-[5px]
                                    rounded
                                    bg-slate-300
                                "
                            ></progress>
                        @endif
                        {{-- <span 
                            class="
                                relative
                                mt-5
                                w-full
                                h-[5px]
                                rounded
                                bg-indigo-500/40
                                block
                                after:content-['']
                                after:bg-indigo-500
                                after:h-full
                                after:absolute
                                after:rounded
                            "
                        ></span> --}}
                    </div>
                </a>
            @empty
                <div class="text-center col-span-2 py-10">
                    <h2 class="text-8xl">😁</h2>
                    <h5 
                        class="
                            text-2xl 
                            mt-5 
                            tracking-wide
                            dark:text-white
                        "
                    >
                        @if (Auth::user()->hasRole('student'))
                            There are no assignments for you yet
                        @else
                            You haven't added a task for <br>
                            <span class="text-indigo-500 text-3xl uppercase">{{ $course->name }}</span>
                        @endif
                    </h5>
                </div>
            @endforelse
        </div>
    </section>
@endsection