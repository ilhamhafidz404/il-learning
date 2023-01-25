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
        grid 
        grid-cols-1
        sm:grid-cols-2
        md:grid-cols-3
        gap-5
    "
>
    @foreach ($courses as $index => $course)
        <div 
            class="
                bg-white
                dark:bg-slate-800
                p-5 
                rounded-xl 
                text-gray-800
                dark:text-white 
                relative
                shadow
                min-h-[250px]
            "
        >
            <section id="{{ 'front'.$index }}" class="flex flex-wrap w-full h-full">
                <div class="w-full">
                    <small class="mb-7 block">SEMESTER 1</small>
                    <h2 class="font-semibold text-2xl w-[70%] uppercase relative z-10">{{ $course->name }}</h2>
                    <ul class="text-sm list-disc ml-4 mt-3 relative z-10 w-[60%]">
                        @foreach ($course->Lecturer as $lecturer) 
                            <li class="text-sm text-gray-500 dark:text-slate-300">{{ $lecturer->user->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex items-end justify-between w-full">
                    <button 
                        onclick="flipCard({{ $index }})"
                        class="
                            text-white
                            bg-indigo-500
                            hover:bg-indigo-400
                            px-5 
                            py-2
                            rounded
                            mt-10
                        "
                    >
                        See Detail
                    </button>
                    @foreach ($myCourses as $myCourse)  
                        @if ($myCourse->id == $course->id)
                            <span class="flex items-center">
                                <svg 
                                    xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" fill="currentColor" 
                                    class="w-6 h-6 mr-2 text-emerald-500"
                                >
                                    <path 
                                        fill-rule="evenodd" 
                                        d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" 
                                        clip-rule="evenodd" 
                                    />
                                </svg>
                                <small class="block">You accept this</small>
                            </span>
                            @break
                        @endif
                    @endforeach
                </div> 
            </section>

            <section id="{{ 'back'.$index }}" class="flex-wrap w-full h-full hidden">
                <div class="w-full">
                    {{ $course->description }}
                </div>
                <div class="flex items-end justify-between w-full">
                    <button 
                        onclick="flipCard({{ $index }})"
                        class="
                            text-white
                            bg-red-500
                            hover:bg-red-400
                            px-5 
                            py-2
                            rounded
                            mt-10
                        "
                    >
                        Cancel Detail
                    </button>
                </div>
            </section>
        </div>
    @endforeach
</section>
@endsection


@section('script')
<script>
    const flipCard = (index) =>{
        const front = document.getElementById('front'+ index);
        const back = document.getElementById('back'+ index);

        front.classList.toggle('hidden');
        back.classList.toggle('hidden');
        front.classList.toggle('flex');
        back.classList.toggle('flex');
    }
</script>
@endsection
