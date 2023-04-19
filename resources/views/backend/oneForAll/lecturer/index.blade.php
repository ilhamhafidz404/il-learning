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
        {{-- onclick="toggleModalLecturerDetail()" --}}
    >
        <div 
            id="modalContent" 
            class="
                dark:bg-slate-800 
                bg-white 
                p-7 
                rounded 
                shadow 
                grid 
                md:grid-cols-3 
                md:w-[70%]
                w-[95%] 
                items-center 
                relative
                box-border
            "
        >

            <span 
                class="absolute top-0 right-0 md:m-7 m-3 cursor-pointer"
                onclick="toggleModalLecturerDetail()"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="md:w-10 w-7 text-indigo-500"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M6 18L18 6M6 6l12 12" 
                    />
                </svg>
            </span>

            <div class="md:block flex justify-center">
                <img 
                    src="" 
                    alt="" 
                    id="lecturerImg" 
                    class="md:w-[300px] md:h-[300px] md:mt-0 mt-10 object-cover"
                >
            </div>
            <div class="col-span-2">
                <h1 
                    id="lecturerName" 
                    class="
                        text-2xl 
                        font-bold 
                        text-gray-800 
                        dark:text-gray-100
                    "
                >Lecturer Name</h1>
                <small id="lecturerNIP" class="text-sm text-gray-500 dark:text-gray-300"></small>

                <p class="mt-10 flex items-center">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-8 text-indigo-500 mr-3"
                    >
                        <path 
                            stroke-linecap="round" 
                            d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25" 
                        />
                    </svg>
                    <span id="lecturerEmail" class="text-gray-600 dark:text-gray-200"></span>
                </p>
            </div>
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
                md:flex
                text-center
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
            <span 
                class="
                    mx-auto 
                    md:mx-0
                    md:mr-5 
                    bg-indigo-500 
                    w-[50px] 
                    h-[50px] 
                    rounded-full
                    md:flex 
                    inline-flex 
                    items-center 
                    justify-center
                    md:mb-0
                    mb-3
                "
            >
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

            <br>

            ALOPE LECTURERS
        </h1>

        <form action="" class="text-center">
            <div class="relative md:w-[70%] w-full mx-auto">
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
                    name="q"
                    value="{{ $_GET['q'] ?? ""}}"
                >

                @if (isset($_GET['q']) && $_GET['q'] != '')
                    <a href="{{ route('lecturer.index') }}" class="absolute top-1/2 -translate-y-1/2 right-0 mr-4">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-7 text-red-500"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M6 18L18 6M6 6l12 12" 
                            />
                        </svg>
                    </a>
                @else
                    <button class="absolute top-1/2 -translate-y-1/2 right-0 mr-4">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-7 text-indigo-500"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" 
                            />
                        </svg>
                    </button>
                @endif
            </div>
        </form>

        <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 mt-10 gap-5">
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
                    onclick="toggleModalLecturerDetail(
                        `{{ $lecturer->user->name }}`,
                        `{{ $lecturer->profile }}`,
                        `{{ $lecturer->nip }}`,
                        `{{ $lecturer->user->email }}`,
                    )"
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
    const toggleModalLecturerDetail= (name, img, nip, email)=>{
        const lecturerDetailModal= document.getElementById('lecturerDetailModal');
        lecturerDetailModal.classList.toggle('hidden');

        document.getElementById('lecturerName').innerHTML= name;
        document.getElementById('lecturerImg').src= `storage/${img}`;
        document.getElementById('lecturerNIP').innerHTML= nip;
        document.getElementById('lecturerEmail').innerHTML= email;

    }
</script>
@endsection