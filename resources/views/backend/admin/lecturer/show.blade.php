@extends('backend.admin.master')

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
        <h1 class="text-4xl font-semibold text-white flex items-center">
            <span class="bg-white p-2 rounded mr-3">
                @include(
                    'components.icons.userGroup-regular-icon',
                    ['class' => 'w-10 text-indigo-500']
                )
            </span>
            {{ $lecturer->user->name }}
        </h1>

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
                        src="{{ asset('storage/'.$lecturer->profile) }}" 
                        alt="{{ $lecturer->user->username."profile" }}"
                        class="w-[300px] h-[300px] object-cover object-center"
                    >
                </div>
                <div>
                    <h2 class="text-gray-100 text-xl font-semibold">{{ $lecturer->user->name }}</h2>
                    <small>{{ $lecturer->user->username }}</small>
                </div>
            </div>

            <div class="relative">
                <span class="absolute font-bold top-[-13px] pr-5 bg-slate-800">
                    {{ $lecturer->course->count() }} Total Course
                </span>
                <hr class="my-10 border-slate-500"> 
                <button 
                    onclick="toggleAddCourseForm()"
                    class="
                        absolute 
                        border-2
                        border-slate-600 
                        bg-slate-800
                        px-5 
                        py-2 
                        rounded 
                        -top-1/2 
                        -translate-y-1/2 
                        right-0
                        text-indigo-500
                        hover:bg-indigo-500
                        hover:border-indigo-500
                        hover:text-gray-200
                    "
                >
                    Add Course for lecturer
                </button>
            </div>

            <table class="w-full dark:text-gray-300 rounded overflow-hidden">
                <tr class=" text-white bg-indigo-500">
                    <th class="py-6">Name</th>
                    <th>Action</th>
                </tr>

                <tr class="bg-slate-900 hidden" id="addCourseCol">
                    <td class="py-5 pl-7" colspan="2">
                        <form 
                            action="{{ route('admin.addCourseToLecturer') }}" 
                            class="flex items-center gap-5" 
                            method="POST"
                        >
                            @csrf
                            <input type="text" value="{{ $lecturer->id }}" name="lecturer" hidden>
                            <div class="w-[80%]">
                                <select name="course" id="course" class="w-full px-3 py-2 rounded bg-slate-700">
                                    <option value="" selected hidden>-Select Course-</option>
                                    @forelse ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @empty
                                        <option disabled>No Course Data</option>
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
                @forelse ($lecturer->course as $index => $course)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[80%]">
                            <a href="">
                                {{ $course->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center">
                                <form 
                                    {{-- action="{{ route('admin.lecturer.destroy', $lecturer->user->id) }}"  --}}
                                    method="POST"
                                    class="inline mr-2"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="toggleConfirm($index)" 
                                        class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded"
                                    >
                                        @include(
                                            'components.icons.trash-solid-icon',
                                            ['class' => 'w-6']
                                        )
                                    </button>
                                </form>
                                <a 
                                    {{-- href="{{ route('admin.lecturer.edit', $lecturer->user->username) }}" --}}
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-2 rounded"
                                >
                                    @include(
                                        'components.icons.edit-solid-icon',
                                        ['class' => 'w-6']
                                    )
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                No Course Data for This Lecturer, 
                                <span onclick="toggleAddCourseForm()" class="text-indigo-500 cursor-pointer">
                                    Add Course ?
                                </span>
                            </h3>
                        </td>
                    </tr>
                @endforelse
            </table>
            
            <div class="relative mt-20">
                <span class="absolute font-bold top-[-13px] pr-5 bg-slate-800">
                    {{ $lecturer->classroom->count() }} Total Classroom
                </span>
                <hr class="my-10 border-slate-500"> 
                <button 
                    onclick="toggleAddClassroomForm()"
                    class="
                        absolute 
                        border-2
                        border-slate-600 
                        bg-slate-800
                        px-5 
                        py-2 
                        rounded 
                        -top-1/2 
                        -translate-y-1/2 
                        right-0
                        text-indigo-500
                        hover:bg-indigo-500
                        hover:border-indigo-500
                        hover:text-gray-200
                    "
                >
                    Add Classroom for lecturer
                </button>
            </div>

            <table class="w-full dark:text-gray-300 rounded overflow-hidden">
                <tr class=" text-white bg-indigo-500">
                    <th class="py-6">Name</th>
                    <th>Action</th>
                </tr>

                <tr class="bg-slate-900 hidden" id="addClassroomCol">
                    <td class="py-5 pl-7" colspan="2">
                        <form 
                            action="{{ route('admin.addClassroomToLecturer') }}" 
                            class="flex items-center gap-5" 
                            method="POST"
                        >
                            @csrf
                            <input type="text" value="{{ $lecturer->id }}" name="lecturer" hidden>
                            <div class="w-[80%]">
                                <select name="classroom" class="w-full px-3 py-2 rounded bg-slate-700">
                                    <option value="" selected hidden>-Select Classroom-</option>
                                    @forelse ($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                    @empty
                                        <option disabled>No Classroom Data</option>
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
                @forelse ($lecturer->classroom as $index => $classroom)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[80%]">
                            <a href="">
                                {{ $classroom->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center">
                                <form 
                                    {{-- action="{{ route('admin.lecturer.destroy', $lecturer->user->id) }}"  --}}
                                    method="POST"
                                    class="inline mr-2"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        onclick="toggleConfirm($index)" 
                                        class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded"
                                    >
                                        @include(
                                            'components.icons.trash-solid-icon',
                                            ['class' => 'w-6']
                                        )
                                    </button>
                                </form>
                                <a 
                                    {{-- href="{{ route('admin.lecturer.edit', $lecturer->user->username) }}" --}}
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-3 py-2 rounded"
                                >
                                    @include(
                                        'components.icons.edit-solid-icon',
                                        ['class' => 'w-6']
                                    )
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                No Classroom Data for This Lecturer, 
                                <span onclick="toggleAddClassroomForm()" class="text-indigo-500 cursor-pointer">
                                    Add Classroom ?
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
    
    const addClassroomCol= document.getElementById('addClassroomCol');
    const toggleAddClassroomForm = () => {
        addClassroomCol.classList.toggle('hidden');
    }
</script>
@endsection