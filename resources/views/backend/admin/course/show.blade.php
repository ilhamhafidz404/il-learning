@extends('backend.admin.master')
@section('title')
    {{ $course->name }}
@endsection
@section('content')

    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmDeleteLecturer'
        ]
    )

    @include('components.toast')
    <span id="headerImg" class="absolute w-screen h-[400px] bg-[#5e72e4] top-0 left-0"></span>
    <section 
        class="
            py-16 
            px-5
            md:py-28 
            col-span-5 
            lg:col-span-4 
            lg:pr-[70px]
            relative
        "
    >
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-semibold text-white flex items-center">
                <span class="bg-white p-2 rounded mr-3">
                    @include(
                        'components.icons.bookOpen-regular-icon',
                        ['class' => 'w-10 text-indigo-500']
                    )
                </span>
                {{ $course->name }}
            </h1>
            <div>
                <a 
                    href="{{ route('admin.course.index') }}" 
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    Go Back
                </a>
            </div>
        </div>

        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded 
                overflow-hidden 
                mt-10
                p-5
                dark:text-gray-200
            "
        >
            <div class="flex gap-10 items-center">
                <div>
                    <img 
                        src="{{ asset('storage/'.$course->background) }}" 
                        {{-- alt="{{ $lecturer->user->username."profile" }}" --}}
                        class="w-[300px] h-[300px] object-cover object-center"
                    >
                </div>
                <div>
                    <h2 class="dark:text-gray-100 text-gray-800 text-xl font-semibold">{{ $course->name }}</h2>
                    <small class="block -mt-1 dark:text-gray-300 text-gray-500">{{ $course->slug }}</small>

                    <h5 class="mt-5 font-semibold">Description:</h5>
                    <p class="text-sm mt-1 dark:text-gray-300 text-gray-500">
                        {{ $course->description }}
                    </p>
                </div>
            </div>

            <div class="relative">
                <span class="absolute font-bold top-[-13px] pr-5 dark:bg-slate-800 bg-white">
                    {{-- {{ $lecturer->course->count() }} Total Course --}}
                    Lecturers
                </span>
                <hr class="my-10 border-slate-500"> 
                <button 
                    onclick="toggleAddCourseForm()"
                    class="
                        absolute 
                        border-2
                        dark:border-slate-600 
                        border-gray-400 
                        dark:bg-slate-800
                        bg-white
                        px-5 
                        py-2 
                        rounded 
                        -top-1/2 
                        -translate-y-1/2 
                        right-0
                        text-indigo-500
                        hover:bg-indigo-500
                        hover:border-indigo-500
                        dark:hover:text-gray-200
                        hover:!text-gray-50
                    "
                >
                    Add Lecturer for Course
                </button>
            </div>

            <table class="w-full dark:text-gray-300 rounded overflow-hidden">
                <tr class=" text-white bg-indigo-500">
                    <th class="py-6">Name</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>

                <tr class="dark:bg-slate-900 bg-gray-400 hidden" id="addCourseCol">
                    <td class="py-5 pl-7" colspan="3">
                        <form 
                            action="{{ route('admin.addCourseToLecturer') }}" 
                            class="flex items-center gap-5" 
                            method="POST"
                        >
                            @csrf
                            <input type="text" value="{{ $course->id }}" name="course" hidden>
                            <div class="w-[80%]">
                                <select 
                                    name="lecturer" 
                                    id="lecturer" 
                                    class="w-full px-3 py-2 rounded dark:bg-slate-700 bg-white"
                                >
                                    <option value="" selected hidden>-Select Lecturer-</option>
                                    @forelse ($lecturers as $lecturer)
                                        <option value="{{ $lecturer->id }}">{{ $lecturer->user->name }}</option>
                                    @empty
                                        <option disabled >No Lecturer data</option>
                                    @endforelse
                                </select>
                            </div>
                            <div>
                                <button
                                    class="bg-indigo-500 hover:bg-indigo-400 text-white px-3 py-2 rounded"
                                >
                                    Save
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
                @forelse ($course->lecturer as $index => $lecturer)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                dark:bg-slate-700
                                bg-gray-200
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[50%]">
                            <a href="">
                                {{ $lecturer->user->name }}
                            </a>
                        </td>
                        <td class="w-[30%]">
                            @foreach ($lecturer->classroom as $classroom)
                                {{ $classroom->name }}
                            @endforeach
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                <form 
                                    action="{{ 
                                        route('admin.deletelecturerforcourse', [
                                            'lecturer' => $lecturer->id, 
                                            'course' => $course->id
                                        ]) 
                                    }}" 
                                    method="POST"
                                    class="inline mr-2"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="return confirm('Are you sure deleting the lecturer for this course?')"
                                        class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded"
                                    >
                                        @include(
                                            'components.icons.trash-solid-icon',
                                            ['class' => 'w-6']
                                        )
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                No Lecturer on this Course, 
                                <span onclick="toggleAddCourseForm()" class="text-indigo-500 cursor-pointer">
                                    Add Lecturer for Course?
                                </span>
                            </h3>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>
@endsection

@section('script')
<script>
    const addCourseCol= document.getElementById('addCourseCol');
    const toggleAddCourseForm = () => {
        addCourseCol.classList.toggle('hidden');
    }

    const hideNoty= ()=>{
        const noty = document.getElementById('noty')
        noty.classList.toggle('flex');
        noty.classList.toggle('hidden');
    }
</script>
@endsection