@extends('backend.layouts.master')
@section('title')
    Accept SKS
@endsection
@section('content')
@include('components.confirmModal' , 
    [ 
        'title' => 'Are you sure?', 
        'subtitle' => 'Data that has been selected cannot be canceled again.',
        'to' => 'confirmSKS'
    ]
)
@include('components.toast')

<section 
    class="
        py-16 
        px-5
        md:py-28 
        col-span-5 
        lg:col-span-4 
        lg:pr-[70px]
    "
>

    @include('components.widgets')

    <div class="bg-indigo-500/40 border-2 border-indigo-500 p-5 rounded text-white text-center mt-10">
        <p>The last accepted SKS is {{ date('l - d F Y', strtotime($setting->sks_countdown)); }}</p>
    </div>

    <section class="p-5 mt-5 bg-white dark:bg-slate-800 shadow-md rounded text-right">
        <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
            <h3 
                class="
                    text-left
                    font-semibold
                    text-xl
                    tracking-wide
                    dark:text-indigo-500
                "
            >
                List of courses
            </h3>
            <div class="text-sm dark:text-white flex items-center">
                @if (count($acceptCourse) < 1)
                    <span 
                        class="
                            sm:bg-[#ecd06f] 
                            text-[#ecd06f] 
                            sm:text-white 
                            py-1 
                            px-1 
                            sm:px-2 
                            rounded 
                            font-bold
                            sm:mr-2
                        "
                    >[NOTE]</span>
                    Anda belum accept SKS
                @else
                    <a 
                        href="#myCourse" 
                        class="
                            text-[12px] 
                            sm:text-base 
                            text-indigo-500
                            duration-300
                            hover:font-semibold
                        "
                    >See your Course >> </a>
                @endif
            </div>
        </div>
        <form id="confirmSKS" action="{{ route('acceptsks.store') }}" method="POST">
            @csrf
            <div class="overflow-auto pb-5 md:pb-0">
                <table class="w-[800px] md:w-full text-left">
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
                                @foreach ($course->lecturer as $lecturer)
                                    @foreach ($lecturer->classroom as $classroom)
                                        @if ($classroom->id == $user->classroom_id)
                                            {{ $lecturer->user->name }}
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @empty
                        <tr class="dark:text-white">
                            <td colspan="4">
                                <span class="text-center">
                                    <h4 class="text-7xl mt-10">🤩</h4>
                                    <h3 class="text-2xl mt-5 mb-10 dark:text-indigo-500">
                                        You have taken all courses
                                    </h3>
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
            @if (count($courses))
                <div class="flex gap-5 justify-end">
                    <button 
                        class="
                            bg-red-500 
                            px-8 
                            py-2
                            rounded 
                            text-white 
                            mt-4 
                            hover:bg-red-400
                            w-1/2
                            sm:w-auto
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
                            w-1/2
                            sm:w-auto
                        "
                        onclick="toggleConfirm()"
                        type="button"
                    >
                        Submit
                    </button>
                </div>
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
                My Courses
            </h3>
            <div class="overflow-auto pb-5 md:pb-0">
                <table class="w-[800px] md:w-full text-left">
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
                                @foreach ($course->lecturer as $lecturer)
                                    @foreach ($lecturer->classroom as $classroom)
                                        @if ($classroom->id == $user->classroom_id)
                                            {{ $lecturer->user->name }}
                                            @break
                                        @endif
                                    @endforeach
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
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