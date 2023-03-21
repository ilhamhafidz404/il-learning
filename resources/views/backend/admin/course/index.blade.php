@extends('backend.admin.master')
@section('title', 'Course')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmDeleteCourse'
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
        <div class="flex justify-between">
            <h1 class="text-4xl font-semibold text-white flex items-center">
                <span class="bg-white p-2 rounded mr-3">
                    @include(
                        'components.icons.bookOpen-regular-icon',
                        ['class' => 'w-10 text-indigo-500']
                    )
                </span>
                Courses
            </h1>
            <form action="" class="relative">
                <input 
                    type="text" 
                    placeholder="search" 
                    name="search" 
                    class="py-2 rounded-full px-5 w-[300px] bg-white text-gray-800"
                    @isset($_GET['search'])
                        value="{{ $_GET['search'] }}"
                    @endisset
                >
                @isset($_GET['search'])
                    <a 
                        href="{{ route('admin.course.index') }}" 
                        class="
                            text-red-500 
                            hover:text-red-600 
                            py-2
                            px-3
                            absolute
                            right-0
                        "
                    >
                        @include(
                            'components.icons.close-icon',
                            ['class' => 'w-6']
                        )
                    </a>
                @else
                <button 
                    class="
                        text-indigo-500 
                        hover:text-indigo-600 
                        py-2 
                        px-3
                        absolute
                        right-0
                    "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 100 13.5 6.75 6.75 0 000-13.5zM2.25 10.5a8.25 8.25 0 1114.59 5.28l4.69 4.69a.75.75 0 11-1.06 1.06l-4.69-4.69A8.25 8.25 0 012.25 10.5z" clip-rule="evenodd" />
                    </svg>
                </button>
                @endisset
            </form>
        </div>
        <div class="flex justify-between my-5">
            <div class="flex items-center">
                <div class="bg-white py-1 px-2 rounded flex justify-between items-center">

                    <button 
                        onclick="changeToTableView()"
                        id="tableViewButton"
                        class="
                            bg-[#5e72e4] 
                            text-white 
                            flex 
                            items-center 
                            justify-center 
                            p-1 
                            rounded
                            hover:bg-indigo-500 
                            hover:!text-white 
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M5.625 3.75a2.625 2.625 0 100 5.25h12.75a2.625 2.625 0 000-5.25H5.625zM3.75 11.25a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75zM3 15.75a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zM3.75 18.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75z" />
                        </svg>
                    </button>

                    <button 
                        onclick="changeToGridView()"
                        id="gridViewButton"
                        class="
                            ml-3 
                            hover:bg-indigo-500 
                            text-indigo-500 
                            hover:text-white 
                            flex 
                            items-center 
                            justify-center 
                            p-1 
                            rounded
                        "
                    >
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            viewBox="0 0 24 24" 
                            fill="currentColor" 
                            class="w-6 h-6"
                        >
                            <path 
                                fill-rule="evenodd" 
                                d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" 
                                clip-rule="evenodd" 
                            />
                        </svg>
                    </button>
                </div>
                <div class="ml-10">
                    <form action="">
                        <label for="" class="text-white">Sort by : </label>
                        <select name="" id="" class="px-3 rounded bg-transparent text-gray-300">
                            <option value="" class="text-black">None</option>
                            <option value="" class="text-black">Name</option>
                            <option value="" class="text-black">Date</option>
                        </select>
                    </form>
                </div>
            </div>
            <div>
                <a 
                    href="{{ route('admin.course.create') }}" 
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    Create new Course
                </a>
            </div>
        </div>

        <small class="text-white">
            <span class="font-semibold">{{ $courseCount }}</span> 
            @isset($_GET['search'])
                Course About "{{ $_GET['search'] }}"
            @else
                Course published
            @endisset
        </small>

        <style>
            #card:hover #overlayCard{
                display: block !important;
            }
        </style>
        <div id="gridView" class="grid grid-cols-2 md:grid-cols-3 gap-5 hidden">
            @forelse ($courses as $course)
                <div id="card" class="overflow-hidden rounded">
                    <div class="relative">
                        <img 
                            src="{{ asset('storage/'.$course->background) }}" 
                            alt="course background"
                            class="h-[200px] w-full object-cover object-center"
                        >
                        <div 
                            id="overlayCard"
                            class="absolute inset-0 bg-black/40 hidden"
                        >
                            <div class="flex justify-center h-full items-center">
                                <a 
                                    href="{{ route('admin.course.show', $course->slug) }}"
                                    class="
                                        bg-indigo-500 
                                        hover:bg-indigo-400 
                                        text-white 
                                        px-3 
                                        py-2 
                                        rounded
                                        mr-3
                                    "
                                >
                                    <svg 
                                        xmlns="http://www.w3.org/2000/svg" 
                                        fill="none" 
                                        viewBox="0 0 24 24" 
                                        stroke-width="1.5" 
                                        stroke="currentColor" 
                                        class="w-6 h-6"
                                    >
                                        <path 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" 
                                        />
                                        <path 
                                            stroke-linecap="round" 
                                            stroke-linejoin="round" 
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" 
                                        />
                                    </svg>
                                </a>
                                <button
                                    onclick="toggleConfirm()" 
                                    class="
                                        bg-red-500 
                                        hover:bg-red-400 
                                        text-white 
                                        px-3 
                                        py-2 
                                        rounded
                                        mr-3
                                    "
                                >
                                    @include(
                                        'components.icons.trash-solid-icon',
                                        ['class' => 'w-6']
                                    )
                                </button>
                                <a 
                                    href="{{ route('admin.course.edit', $course->slug) }}"
                                    class="
                                        bg-yellow-500 
                                        hover:bg-yellow-400 
                                        text-white 
                                        px-3 
                                        py-2 
                                        rounded
                                    "
                                >
                                    @include(
                                        'components.icons.edit-solid-icon',
                                        ['class' => 'w-6']
                                    )
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-slate-800 p-5">
                        <h3 class="dark:text-gray-100 text-gray-800 font-semibold">{{ $course->name }}</h3>
                        <small class="text-gray-400 block -mt-1">{{ $course->slug }}</small>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-10 rounded bg-slate-800 text-gray-100">
                    <h4 class="text-6xl text-center">☹️</h4>
                        <h3 class="text-center mt-3 text-xl">
                            No Course Data
                            @isset($_GET['search'])
                                About "{{ $_GET['search'] }}", <br>
                            @else
                                ,
                            @endisset
                            <a 
                                href="{{ route('admin.course.create') }}" 
                                class="text-indigo-500"
                            >
                                Create Course?
                            </a>
                        </h3>
                    </h4>
                </div>
            @endforelse
            <div class="col-span-3">
                {{ $courses->links() }}
            </div>
        </div>

        <div 
            id="tableView" 
            class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden"
        >
            <table class="w-full dark:text-gray-300 text-gray-800">
                <tr class="dark:text-white text-gray-800">
                    <th class="py-6">Name</th>
                    <th>For</th>
                    <th>Action</th>
                </tr>
                @forelse ($courses as $index => $course)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                dark:bg-slate-700
                                bg-gray-200
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[50%]">
                            <a href="{{ route('admin.course.show', $course->slug) }}">
                                {{ $course->name }}
                            </a>
                        </td>
                        <td class="py-5 pl-7 w-[30%]">
                            <a href="{{ route('admin.course.show', $course->slug) }}">
                                {{ $course->program->name . " (" . $course->program->level .")" }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center">
                                <button
                                    onclick="toggleConfirm()" 
                                    class="
                                        bg-red-500 
                                        hover:bg-red-400 
                                        text-white 
                                        px-3 
                                        py-2 
                                        rounded
                                        mr-3
                                    "
                                >
                                    @include(
                                        'components.icons.trash-solid-icon',
                                        ['class' => 'w-6']
                                    )
                                </button>
                                <form 
                                    action="{{ route('admin.course.destroy', $course->id) }}" 
                                    id="confirmDeleteCourse" 
                                    method="POST"
                                    class="hidden"
                                >
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <a 
                                    href="{{ route('admin.course.edit', $course->slug) }}"
                                    class="
                                        bg-yellow-500 
                                        hover:bg-yellow-400 
                                        text-white 
                                        px-3 
                                        py-2 
                                        rounded
                                    "
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
                                No Course Data
                                @isset($_GET['search'])
                                    About "{{ $_GET['search'] }}", <br>
                                @else
                                    ,
                                @endisset
                                <a 
                                    href="{{ route('admin.course.create') }}" 
                                    class="text-indigo-500"
                                >
                                    Create Course?
                                </a>
                            </h3>
                        </td>
                    </tr>
                @endforelse
                <tr class="bg-indigo-500">
                    <td colspan="3" class="px-10 pb-5 pt-1">
                        <div class="mt-5 w-full text-white">
                            {{ $courses->links() }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
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


    const gridView= document.querySelector('#gridView')
    const tableView= document.querySelector('#tableView')
    const tableViewButton= document.querySelector('#tableViewButton')
    const gridViewButton= document.querySelector('#gridViewButton')
    const changeToGridView= ()=>{
        gridView.classList.remove('hidden')
        tableView.classList.add('hidden')

        tableViewButton.classList.remove('bg-[#5e72e4]')
        tableViewButton.classList.add('!text-indigo-500')

        gridViewButton.classList.add('bg-[#5e72e4]')
        gridViewButton.classList.add('!text-white')
    }
    const changeToTableView= ()=>{
        gridView.classList.add('hidden')
        tableView.classList.remove('hidden')

        tableViewButton.classList.add('bg-[#5e72e4]')
        tableViewButton.classList.remove('!text-indigo-500')

        gridViewButton.classList.remove('bg-[#5e72e4]')
        gridViewButton.classList.remove('!text-white')
    }
</script>
@endsection