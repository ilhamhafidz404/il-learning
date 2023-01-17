@extends('backend.layouts.master')

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
            @foreach ($course->lecturer as $lecturer)
                <span>{{ $lecturer->name }}</span>
            @endforeach
            <a 
                href="{{ route('dashboard') }}" 
                class="text-white absolute bottom-[150px] z-50 left-0"
            >
                Kembali
            </a>
           @if (Session::has('lecturer'))
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
                grid-cols-2
                gap-5
                z-50
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
                            <h3 class="font-bold">{{ $mission->name}}</h3>
                            <h4 class="font-bold">
                                @if ($submitSubmissions->whereMissionId($mission->id)->count())    
                                    {{ 
                                        Str::limit($submitSubmissions->whereMissionId($mission->id)->count() /
                                        $mission->submission->count() * 100 , 4, '')
                                    }}
                                @else
                                    0
                                @endif
                                %
                            </h4>
                        </span>
                        <span 
                            class="
                             relative
                                mt-5
                                w-full
                                h-[5px]
                                rounded
                                bg-indigo-500/40
                                block
                                after:content-['']
                                @if ($submitSubmissions->whereMissionId($mission->id)->count() > 0)    
                                    @if ($submitSubmissions->whereMissionId($mission->id)->count()/ $mission->submission->count()*100 == 100)
                                        after:w-full
                                    @else
                                        after:w-[{{ 
                                            Str::limit($submitSubmissions->whereMissionId($mission->id)->count() /
                                            $mission->submission->count() * 100 , 2, '')
                                        }}%]
                                    @endif
                                @else
                                    after:w-[0%]
                                @endif
                                after:bg-indigo-500
                                after:h-full
                                after:absolute
                                after:rounded
                            "
                        ></span>
                    </div>
                </a>
            @empty
                <div class="text-center col-span-2 py-10">
                    <h2 class="text-8xl">😁</h2>
                    <h5 
                        class="
                            text-3xl 
                            mt-5 
                            tracking-wide
                            dark:text-white
                        "
                    >Belum ada tugas untukmu</h5>
                </div>
            @endforelse
        </div>
    </section>
@endsection