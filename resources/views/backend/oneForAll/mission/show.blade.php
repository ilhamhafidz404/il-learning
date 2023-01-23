@extends('backend.layouts.master')

@section('content')
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
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $mission->name }}</h1>
            <span>
                {{ $mission->course->lecturer[0]->user->name }}
                <span class="sm:inline hidden">|</span>
                <br class="sm:hidden block">
                {{ $mission->course->name }}
            </span>
            <a 
                href="{{ route('course.show', $mission->course->slug) }}" 
                class="text-white absolute bottom-[150px] z-30 left-0"
            >
                Kembali
            </a>
           @if (Auth::user()->hasRole('lecturer'))
                <div class="flex absolute right-0 bottom-[150px] ">
                    <a 
                        href="{{ route('mission.create', ['slug' => $mission->course->slug]) }}" 
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
                        href="{{ route('submission.create', ['slug' => $mission->course->slug]) }}" 
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
                -mt-[150px]
            "
        >
            @if (Auth::user()->hasRole('student'))
                @forelse ($submissions as $index => $submission)
                    @if ($submission->classroom_id == $user->classroom_id)
                        <a href="{{ route('submission.show', $submission->slug) }}">
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
                                <h3 class="font-bold">{{ $submission->name}}</h3>
                                <small>{{ $submission->deadline }}</small>
                                <br>
                                <small>Untuk <b>{{ $submission->classroom->name }}</b></small>
                            </div>
                        </a>
                    @endif
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
                        >
                            Belum ada tugas untukmu
                        </h5>
                    </div>
                @endforelse
            @else
                @forelse ($submissions as $index => $submission)
                    <a href="{{ route('submission.show', $submission->slug) }}">
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
                            <h3 class="font-bold">{{ $submission->name}}</h3>
                            <small>{{ $submission->deadline }}</small>
                            <br>
                            <small>Untuk <b>{{ $submission->classroom->name }}</b></small>
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
                        >
                            Belum ada submission, 
                            <a 
                                href="{{ route('submission.create', ['slug' => $mission->course->slug]) }}" 
                                class="text-indigo-500"
                            >
                                Buat Submission?
                            </a>
                        </h5>
                    </div>
                @endforelse

            @endif
        </div>
    </section>
@endsection