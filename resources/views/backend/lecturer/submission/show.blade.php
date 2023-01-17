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
        <h1 class="font-bold text-4xl uppercase mb-2 mt-20">Mission Name</h1>
        <p>{{ $submission->lecturer->name }}  | {{ $submission->course->name }}</p>
        <a href="{{ route('dashboard') }}" class="text-white absolute bottom-[150px] z-50 left-0">Kembali</a>
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
        <div class="flex justify-between items-center">
            <h2 class=" text-2xl font-semibold">{{ $submission->name }}</h2>
            <span class="text-white text-sm bg-red-500 py-1 px-2 rounded-md">
                {{ $submitSubmissions->count() }} / {{ $userCount }}
            </span>
        </div>
        <p>
            <span class="font-bold">Deadline :</span>
            {{ $submission->deadline }}
        </p>
        <h3 class="font-bold mt-3">Description :</h3>
        <p>{{ $submission->description }}</p>
        <hr class="my-3 border-slate-600">

        <section class="mt-10">
            @forelse ($submitSubmissions as $submission)
                <div 
                    class="
                        text-gray-800 
                        dark:text-white
                        bg-gray-200 
                        dark:bg-slate-700 
                        rounded 
                        p-5 
                        flex 
                        items-center 
                        justify-around 
                        border-l-[5px] 
                        border-l-emerald-500 
                        text-center 
                        mb-3
                    "
                >
                    <div class="w-[25%] flex">
                        {{-- <p class="mr-3">{{ $submission->user->email }}</p> --}}
                        <p class="mr-3">20220810052</p>
                        <p class="uppercase font-semibold">{{ $submission->user->name }}</p>
                    </div>
                    <p class="w-[15%]">18:00 12-1-2002</p>
                    <p class="w-[50%]">
                        {{ $submission->description }}
                    </p>
                    <span>
                        <a 
                            target="_blank"
                            href="{{ asset('storage/'. $submission->file) }}" 
                            class="w-[10%] bg-indigo-500 py-2 px-5 rounded hover:bg-indigo-400 text-white"
                        >
                            Download
                        </a>
                    </span>
                </div>
            @empty
                <div class="text-center my-20">
                    <h2 class="text-8xl">☹️</h2>
                    <h3 class="text-2xl mt-4 text-gray-600 dark:text-gray-200">
                        Belum ada yang mengumpulkan tugas
                        <span class="font-semibold text-indigo-500">{{ $submission->name }}</span>
                    </h3>
                </div>
            @endforelse
        </section>
    </div>
</section>
@endsection