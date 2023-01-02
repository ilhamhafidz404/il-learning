@extends('backend.layouts.master')

@section('content')
@include('backend.components.confirmModal')
@include('backend.components.successToast')

<section class="py-28 col-span-4 pr-20">
    <section class="grid grid-cols-4 gap-5">
        <a
            href="" 
            class="
                w-full 
                bg-[#2441e7] 
                text-white 
                p-5 
                rounded 
                flex 
                items-center 
                justify-between
            "
        >
            <div>
                <small>Your Profile</small>
                <h4 class="text-xl font-semibold">Profile</h4>
            </div>
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-16 h-16"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                />
            </svg>
        </a>
        <a 
            href=""
            class="
                w-full 
                bg-[#ff1053] 
                text-white 
                p-5 
                rounded 
                flex 
                items-center 
                justify-between
            "
        >
            <div>
                <small>Your Course</small>
                <h4 class="text-xl font-semibold">Courses</h4>
            </div>
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-16 h-16"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" 
                />
            </svg>

        </a>
        <a 
            href="{{ route('lecturers') }}"
            class="
                w-full 
                bg-[#00a78e] 
                text-white 
                p-5 
                rounded 
                flex 
                items-center 
                justify-between
            "
        >
            <div>
                <small>Our Lecturer</small>
                <h4 class="text-xl font-semibold">Lecturers</h4>
            </div>
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-16 h-16"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" 
                />
            </svg>

        </a>
        <a 
            href=""
            class="
                w-full 
                bg-[#ecd06f] 
                text-white 
                p-5 
                rounded 
                flex 
                items-center 
                justify-between
            "
        >
            <div>
                <small>Your Class</small>
                <h4 class="text-xl font-semibold">Classmate</h4>
            </div>
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke-width="1.5" 
                stroke="currentColor" 
                class="w-16 h-16"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                />
            </svg>
        </a>
    </section>
    <section class="p-5 mt-10 bg-white dark:bg-slate-800 shadow-md rounded text-right">
        <div class="flex justify-between items-center">
            <h3 
                class="
                    text-left
                    font-semibold
                    text-xl
                    mb-4
                    tracking-wide
                    dark:text-indigo-500
                "
            >
                List Mata Kuliah
            </h3>
            <div class="text-sm dark:text-white">
                @if (count($acceptCourse) < 1)
                    <span 
                        class="
                            bg-[#ecd06f] 
                            text-white 
                            py-1 
                            px-2 
                            rounded 
                            font-bold
                        "
                    >[NOTE]</span>
                    Anda belum accept SKS
                @else
                    <a 
                        href="#myCourse" 
                        class="
                            text-base 
                            text-indigo-500
                            duration-300
                            hover:font-semibold
                        "
                    >lihat mata kuliah anda >> </a>
                @endif
            </div>
        </div>
        <form id="confirmSKS" action="{{ route('acceptsks.store') }}" method="POST">
            @csrf
            <table class="w-full text-left">
                <tr class="text-white bg-indigo-500">
                    <th class="py-6"></th>
                    <th>Course</th>
                    <th>SKS</th>
                    <th>Lecturer</th>
                </tr>
                @forelse ($courses as $index => $course)
                    <tr
                        class="
                            dark:text-white
                            @if ($index%2 >= 1)
                                bg-gray-100 dark:bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-2 pl-5">
                            <input 
                                id="course{{$index}}"
                                name="select[]" 
                                type="checkbox" 
                                value="{{ $course->id }}"
                                class="scale-[1.3]"
                            >
                        </td>
                        <td>
                            <label 
                                class="cursor-pointer" 
                                for="course{{$index}}"
                            >
                                {{ $course->name }}
                            </label>
                        </td>
                        <td>
                            {{ $course->sks }}
                        </td>
                        <td>
                            @foreach ($course->Lecturer as $lecturer)
                                {{ $lecturer->name }}
                            @endforeach
                        </td>
                    </tr>
                @empty
                    <tr class="dark:text-white">
                        <td colspan="4">
                            <span class="text-center">
                                <h4 class="text-7xl mt-10">🤩</h4>
                                <h3 class="text-2xl mt-5 mb-10 dark:text-indigo-500">
                                    Anda sudah mengambil semua mata Kuliah
                                </h3>
                            </span>
                        </td>
                    </tr>
                @endforelse
            </table>
            @if (count($courses))
                <button 
                    class="
                        bg-red-500 
                        px-8 
                        py-2
                        rounded 
                        text-white 
                        mt-4 
                        hover:bg-red-400
                    "
                    type="reset"
                >
                    Reset
                </button>
                <button 
                    class="
                        bg-indigo-500 
                        px-8 
                        py-2
                        rounded 
                        text-white 
                        mt-4 
                        hover:bg-indigo-400
                    "
                    onclick="toggleConfirm()"
                    type="button"
                >
                    Submit
                </button>
            @endif
        </form>
    </section>

    {{--  --}}

    @if (count($acceptCourse) > 0)
        <section 
            id="myCourse"
            class="p-5 mt-10 bg-white dark:bg-slate-800 shadow-md rounded text-right"
        >
            <h3 
                class="
                    text-left
                    font-semibold
                    text-xl
                    mb-4
                    tracking-wide
                    dark:text-emerald-500
                "
            >
                Mata Kuliah Saya
            </h3>
            <table class="w-full text-left">
                <tr class="text-white bg-emerald-500">
                    <th class="py-4 pl-5">Course</th>
                    <th class="py-4 pl-5">SKS</th>
                    <th>Lecturer</th>
                </tr>
                @foreach ($acceptCourse as $index => $course)
                    <tr
                        class="
                            dark:text-white
                            @if ($index%2 > 0)
                                bg-gray-100 dark:bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-2 pl-5">{{ $course->name }}</td>
                        <td>{{ $course->sks }}</td>
                        <td>
                            @foreach ($course->Lecturer as $lecturer)
                                {{ $lecturer->name }}
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
    @endif
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