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
                object-[100px]
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
            {{-- <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $course->name }}</h1>
            @foreach ($course->lecturer as $lecturer)
                <span>{{ $lecturer->name }}</span>
            @endforeach --}}
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">Mission Name</h1>
            <p>{{ $submission->lecturer->name }}  | {{ $submission->course->name }}</p>
            <a href="{{ route('dashboard') }}" class="text-white absolute bottom-[150px] z-50 left-0">Kembali</a>
        </div>
        <div 
            class="
                -mt-[150px]
                text-gray-200
                bg-white
                dark:bg-slate-800
                p-5
                rounded
                gap-5
                z-50
                relative
            "
        >
            <h2 class=" text-2xl font-semibold">{{ $submission->name }}</h2>
            <small>
                <span class="font-bold">Deadline :</span>
                {{ $submission->deadline }}
            </small>
            <hr class="my-3 border-slate-600">
            <p>{{ $submission->subtitle }}</p>
            <span class="text-sm bg-red-500 py-1 px-2 rounded-md">Belum mengumpulkan</span>
            <form 
                action="{{ route('submitsubmission') }}" 
                class="mt-10" 
                enctype="multipart/form-data"
                method="POST"
            >
                @csrf
                <input type="text" readonly value="{{ $submission->id }}" name="submission">

                <div class="mb-5">
                    <label for="description" class="block">Description</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="w-full max-h-[100px] min-h-[100px] rounded bg-slate-700 px-2 py-2"
                    ></textarea>
                </div>
                <div class="mb-3">
                    <label for="file">File : </label>
                    <input type="file" name="file" id="file">
                </div>
                <div class="flex justify-between mt-10">
                    <a 
                        href="{{ route('dashboard') }}"
                        class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded"
                    >
                        Kembali
                    </a>
                    <div>
                        <button
                            type="reset" 
                            class="bg-red-500 hover:bg-red-400 px-5 py-2 rounded"
                        >
                            Reset
                        </button>
                        <button 
                            type="submit"
                            class="bg-indigo-500 hover:bg-indigo-400 px-5 py-2 rounded"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection