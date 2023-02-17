@extends('backend.layouts.master')
@section('title')
    {{ $mission->name }}
@endsection
@section('content')
    @include('components.toast')
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
                @if (Auth::user()->hasRole('student'))
                    {{ $mission->course->lecturer[0]->user->name }}
                    <span class="sm:inline hidden">|</span>
                @endif
                <br class="sm:hidden block">
                {{ $mission->course->name }}
            </span>
            <a 
                href="{{ route('course.show', $mission->course->slug) }}" 
                class="text-white absolute bottom-[150px] z-30 left-0"
            >
                Go Back
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
                    {{ $submission->completed }}
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
                                @if (!$submission->theory)
                                    <small>{{ \Carbon\Carbon::parse($submission->deadline)->diffForHumans() }}</small>
                                @else
                                    <small class="italic">Please download the material</small>
                                @endif
                                <br>
                                <small>For <b>{{ $submission->classroom->name }}</b></small>
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
                            There are no submission for you yet
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
                                relative
                            "
                        >
                            <h3 class="font-bold">{{ $submission->name}}</h3>
                            @if (!$submission->theory)
                                <small>{{ \Carbon\Carbon::parse($submission->deadline)->diffForHumans() }}</small>
                            @else
                                <small>No time limit</small>
                            @endif
                            <br>
                            <small>For <b>{{ $submission->classroom->name }}</b></small>
                            <button 
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('deleteSubmission{{$index}}').submit();
                                "
                                class="
                                    bg-red-500 
                                    hover:bg-red-400 
                                    p-1
                                    rounded 
                                    text-white 
                                    absolute
                                    text-sm
                                    top-0 right-0
                                    m-2
                                "
                            >
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    fill="none" 
                                    viewBox="0 0 24 24" 
                                    stroke-width="1.5" 
                                    stroke="currentColor" 
                                    class="w-5"
                                >
                                    <path 
                                        stroke-linecap="round" 
                                        stroke-linejoin="round" 
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" 
                                    />
                                </svg>
                            </button>
                            <form 
                                id="deleteSubmission{{$index}}"
                                action="{{ route('submission.destroy', $submission->id) }}" 
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                            </form>
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

@section('script')
<script>
    const hideNoty= ()=>{
        const noty = document.getElementById('noty')
        noty.classList.toggle('flex');
        noty.classList.toggle('hidden');
    }
</script>
@endsection