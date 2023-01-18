@extends('backend.layouts.master')

@section('content')
<section 
    class="
        py-16 
        px-5
        md:py-28 
        col-span-5 
        lg:col-span-4 
        lg:pr-[70px]
        grid grid-cols-3
        gap-5
    "
>
    @foreach ($courses as $index => $course)
        {{-- @php
            $index = rand(1, 4);
        @endphp --}}
        <div 
            class="
                bg-gradient-to-br 
                @if ($index == 4 || $index%4 == 0)
                from-[#f8c744] 
                to-[#fbdf6a] 
                @elseif ($index == 3 || $index%3 == 0)
                from-[#e2589e] 
                to-[#f16ebe] 
                @elseif ($index == 2 || $index%2 == 0)
                from-[#9a67f3] 
                to-[#86b7f5] 
                @elseif ($index == 1 || $index%1 == 0)
                from-[#9966f4] 
                to-[#b187f8] 
                @endif
                p-5 
                rounded-xl 
                text-white 
                relative
                min-h-[300px]
            "
        >
            <img 
                src="{{ asset('images/icon/phone.png') }}"
                class="w-[200px] absolute right-0 bottom-0"
            >
            <small class="mb-7 block">SEMESTER 1</small>
            <h2 class="font-semibold text-2xl w-[70%] uppercase relative z-10">{{ $course->name }}</h2>
            {{-- <ul class="text-sm list-disc ml-4 mt-3 relative z-10 w-[60%]">
                @foreach ($course->Lecturer as $lecturer) 
                    <li>{{ $lecturer->name }}</li>
                @endforeach
            </ul> --}}
            <button 
                class="
                    bg-white
                    hover:bg-gray-100/90 
                    text-gray-900 
                    mb-20 
                    absolute 
                    top-[65%] 
                    px-5 
                    py-1 
                    rounded
                "
            >
                See Detail
            </button>
            @foreach ($myCourses as $myCourse)  
                @if ($myCourse->id == $course->id)
                    <span class="flex items-center absolute w-[150px] bottom-[20px]">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" fill="currentColor" 
                            class="w-6 h-6"
                        >
                            <path 
                                fill-rule="evenodd" 
                                d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" 
                                clip-rule="evenodd" 
                            />
                        </svg>
                        <small class="block">You accept this</small>
                    </span>
                @endif
            @endforeach
        </div>
    @endforeach
</section>
@endsection