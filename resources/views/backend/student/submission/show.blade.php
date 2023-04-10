@extends('backend.layouts.master')
@section('title')
    {{ $submission->name }}
@endsection
@section('content')
@include('components.confirmModal' , 
    [ 
        'title' => 'Are you sure?', 
        'subtitle' => 'Tasks will be collected if you press YES',
        'to' => 'upload_submission'
    ]
)
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
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $submission->mission->name }}</h1>
            <p>
                {{ $submission->lecturer->user->name }} 
                <span class="sm:inline hidden">|</span>
                <br class="sm:hidden block">
                {{ $submission->course->name }}
            </p>
        </div>
        <div 
            class="
                -mt-[150px]
                text-gray-800
                dark:text-gray-200
                bg-white
                dark:bg-slate-800
                p-5
                rounded
                gap-5
                z-30
                relative
            "
        >
            <div class="flex items-center justify-between">
                <h2 class=" text-2xl font-semibold">{{ $submission->name }}</h2>
                @if ($submitSubmission)
                    <span class="text-white text-sm bg-emerald-500 py-1 px-2 rounded-md flex items-center">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="w-5 mr-1"
                        >
                            <path 
                                fill-rule="evenodd" 
                                d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" 
                                clip-rule="evenodd" 
                            />
                        </svg>
                        @if (!$submission->theory)
                            Already collected
                        @else
                            Already studied
                        @endif
                    </span>
                @else
                    <span class="text-white text-sm bg-red-500 py-1 px-2 rounded-md flex items-center">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="w-5 mr-1"
                        >
                            <path 
                                fill-rule="evenodd" 
                                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" 
                                clip-rule="evenodd" 
                            />
                        </svg>
                        @if (!$submission->theory)
                            Haven't collected yet
                        @else
                            Haven't studied
                        @endif
                    </span>
                @endif
            </div>
            <small>
                <span class="font-bold">Deadline :</span>
                @if ($submission->theory)
                    <i>tidak ada batas waktu</i>
                @else
                    {{ \Carbon\Carbon::parse($submission->deadline)->diffForHumans() }}
                @endif
            </small>
            <hr class="my-3 border-slate-600">
            <p>{{ $submission->description }}</p>
            
            @if (!$submission->theory)
                @if ($submitSubmission)
                    <div class="mb-5 mt-10">
                        <label class="block font-bold mb-2">
                            Description
                        </label>
                        <textarea 
                            class="
                                w-full 
                                max-h-[100px] 
                                min-h-[100px] 
                                rounded 
                                bg-gray-200 
                                dark:bg-slate-700 
                                px-2 
                                py-2
                            "
                            readonly
                        >{{ $submitSubmission->description }}</textarea>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="file">File : </label>
                        <img 
                            src="{{ asset('images/icon/fileExtensions/'.$submitSubmission->extension.'.png') }}" 
                            alt="{{ $submitSubmission->extension }}"
                            width="50"
                            class="mx-5"
                        >
                        <small>you send the {{ $submitSubmission->extension }} file in this submission</small>
                    </div>
                    <div class="flex flex-col-reverse md:flex-row justify-between mt-10">
                        <a 
                            href="{{ route('mission.show', $submission->mission->slug) }}"
                            class="
                                bg-gray-500 
                                hover:bg-gray-400 
                                px-5 py-2 rounded 
                                text-white 
                                w-full
                                md:w-auto
                                inline-block
                                text-center
                            "
                        >
                            Go Back
                        </a>
                        <div class="flex md:w-auto w-full mb-5 md:mb-0">
                            <a
                                onclick="
                                    event.preventDefault();
                                    document.getElementById('deleteSubmitSubmission').submit();
                                "
                                class="
                                    bg-red-500 
                                    hover:bg-red-400 
                                    px-5 
                                    py-3 
                                    mr-3 
                                    rounded 
                                    text-white 
                                    w-1/2 
                                    md:w-auto
                                    inline-block
                                    text-center
                                    cursor-pointer
                                "
                            >
                                Delete Submission
                            </a>
                            <form 
                                id="deleteSubmitSubmission"
                                action="{{ route('submitsubmission.destroy', $submitSubmission->id) }}"
                                method="POST"
                            >
                                @method("DELETE")
                                @csrf
                            </form>
                            <a 
                                target="_blank"
                                href="{{ asset('storage/'. $submitSubmission->file) }}"
                                class="
                                    bg-indigo-500 
                                    hover:bg-indigo-400 
                                    px-5 
                                    py-3 
                                    rounded 
                                    text-white 
                                    w-1/2 
                                    md:w-auto
                                    inline-block
                                    text-center
                                "
                            >
                                Download
                            </a>
                        </div>
                    </div>
                @else
                    <form 
                        id="upload_submission"
                        action="{{ route('submitsubmission') }}" 
                        class="mt-10" 
                        enctype="multipart/form-data"
                        method="POST"
                    >
                        @csrf
                        <input type="text" hidden value="{{ $submission->mission->id }}" name="mission">
                        <input type="text" hidden value="{{ $submission->id }}" name="submission">
                        <input type="text" hidden value="{{ Auth::user()->student[0]->classroom_id }}" name="classroom">
                        <div class="mb-5">
                            <label 
                                for="description" 
                                class="
                                    block 
                                    font-bold 
                                    mb-2 
                                    @error('description')
                                        text-red-500  
                                    @enderror
                                "
                            >
                                Description
                            </label>
                            <textarea 
                                name="description" 
                                id="description" 
                                required
                                class="
                                    w-full 
                                    max-h-[100px] 
                                    min-h-[100px] 
                                    rounded 
                                    bg-gray-200 
                                    dark:bg-slate-700 
                                    px-2 
                                    py-2
                                    @error('description')
                                        border-2
                                        border-red-500
                                        bg-red-500/10
                                    @enderror
                                "
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label 
                                for="file"
                                class="
                                    @error('file')
                                        text-red-500
                                    @enderror
                                "
                            >File : </label>
                            <input 
                                type="file" 
                                name="file" 
                                id="file" 
                                required 
                                class="
                                    file:mr-4 
                                    file:py-2 
                                    file:px-4
                                    file:rounded 
                                    file:border-0
                                    file:text-sm 
                                    file:font-semibold
                                    file:bg-indigo-500 
                                    file:text-white
                                    hover:file:bg-indigo-400"
                            >
                            @error('file')
                                <small class="text-red-500 block mt-3">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex justify-between mt-10">
                            <a 
                                href="{{ route('mission.show', $submission->mission->slug) }}"
                                class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded text-white"
                            >
                                Go Back
                            </a>
                            <div>
                                <button
                                    type="reset" 
                                    class="bg-red-500 hover:bg-red-400 px-5 py-2 rounded text-white"
                                >
                                    Reset
                                </button>
                                <button 
                                    type="button"
                                    onClick="toggleConfirm()"
                                    class="bg-indigo-500 hover:bg-indigo-400 px-5 py-2 rounded text-white"
                                >
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
            @else
                <form action="{{ route('submitsubmission') }}" method="POST">
                    @csrf
                    <input type="text" hidden value="{{ $submission->mission->id }}" name="mission">
                    <input type="text" hidden value="{{ $submission->id }}" name="submission">
                    <button 
                        class="inline-flex bg-indigo-500 hover:bg-indigo-400 rounded py-2 px-5 text-white mt-3"
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
                                d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" 
                                />
                        </svg>
                        Download Materi
                    </button>
                </form>
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

    const toggleConfirm = () =>{
        const cofirmModal= document.getElementById('confirmModal');
        cofirmModal.classList.toggle('hidden');
    }
</script>
@endsection