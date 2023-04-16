@extends('backend.layouts.master')
@section('title')
    Leturers
@endsection
@section('content')



    <section 
        id="lecturerDetailModal" 
        class="
            fixed 
            inset-0 
            bg-black/70 
            z-50 
            flex 
            items-center 
            justify-center 
            hidden
            duration-500
        "
    >
        <span class="absolute top-0 right-0 m-20 cursor-pointer" onclick="toggleModalLecturerDetail()">
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-10 text-white"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M6 18L18 6M6 6l12 12" 
                />
            </svg>

        </span>
        <div id="modalContent" class="bg-white p-10 rounded shadow">
            <h1 id="lecturerName">Lecturer Name</h1>
        </div>
    </section>


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
        <h1 
            class="
                flex
                items-center
                justify-center
                text-3xl 
                font-bold 
                mb-10 
                tracking-wide 
                text-gray-800
                dark:text-gray-100
            "
        >
            <span class="mr-5 bg-indigo-500 w-[50px] h-[50px] rounded-full flex items-center justify-center">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-8 text-white"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" 
                    />
                </svg>
            </span>

            ALOPE LECTURERS
        </h1>

        <form action="" class="text-center">
            <div class="relative w-[70%] mx-auto">
                <input 
                    type="text" 
                    class="
                        py-3 
                        px-3 
                        rounded
                        w-full
                        dark:bg-slate-800
                        dark:text-gray-100
                        shadow
                    "
                    placeholder="Search..."
                >

                <span class="absolute top-1/2 -translate-y-1/2 right-0 mr-4">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-6 h-6 text-indigo-500"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" 
                        />
                    </svg>
                </span>
            </div>
        </form>

        <div class="grid grid-cols-4 mt-10 gap-5">
            @foreach ($lecturers as $lecturer)
                <div 
                    class="
                        relative
                        bg-white 
                        dark:bg-slate-800 
                        shadow
                        p-5 
                        rounded 
                        text-gray-800
                        cursor-pointer
                        dark:text-gray-100 
                        text-center
                        hover:after:scale-100
                        after:content-['SeeMore']
                        after:flex
                        after:items-center
                        after:justify-center
                        after:text-white
                        after:w-[95%]
                        after:h-[95%]
                        after:bg-black/30
                        after:absolute
                        after:top-1/2
                        after:left-1/2
                        after:-translate-x-1/2
                        after:-translate-y-1/2
                        after:duration-300
                        after:scale-0
                        
                    "
                    onclick="toggleModalLecturerDetail()"
                >
                    <img 
                        src="{{ asset('storage/'.$lecturer->profile) }}" 
                        alt="{{ $lecturer->user->name }} Profile Picture"
                        class="w-full h-[200px] object-cover"
                    >
                    <h3 class="font-bold mt-5">{{ $lecturer->user->name }}</h3>
                </div>
            @endforeach
        </div>

    </section>
@endsection

@section('script')
<script>
    const toggleModalLecturerDetail= ()=>{
        const lecturerDetailModal= document.getElementById('lecturerDetailModal');

        lecturerDetailModal.classList.toggle('hidden');
    }
</script>
@endsection