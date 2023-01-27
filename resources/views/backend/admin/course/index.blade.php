@extends('backend.admin.master')

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
            <form action="">
                <input 
                    type="text" 
                    placeholder="search" 
                    name="search" 
                    class="py-2 rounded-full px-5 w-[300px] bg-white text-gray-800"
                    @isset($_GET['search'])
                        value="{{ $_GET['search'] }}"
                    @endisset
                >
                <button class="bg-indigo-500 hover:bg-indigo-400 text-white py-2 px-3 rounded">Search</button>
                @isset($_GET['search'])
                    <a 
                        href="{{ route('admin.student.index') }}" 
                        class="bg-red-500 hover:bg-red-400 text-white py-3 px-3 rounded"
                    >
                        cancel
                    </a>
                @endisset
            </form>
        </div>
        <div class="flex justify-between mt-5">
            <div>
                <div class="bg-white py-1 px-2 rounded flex justify-between items-center">
                    <button class="bg-[#5e72e4] text-white flex items-center justify-center p-1 rounded">
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
                                d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                            />
                        </svg>
                    </button>
                    <button 
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
                        @include(
                            'components.icons.bookOpen-regular-icon',
                            ['class' => 'w-6']
                        )
                    </button>
                </div>
            </div>
            <div>
                <a href="" class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold">
                    Create new Course
                </a>
            </div>
        </div>
        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded mt-5 overflow-hidden">
            <table class="w-full dark:text-gray-300">
                <tr class=" text-white">
                    <th class="py-6">Name</th>
                    <th>Action</th>
                </tr>
                @forelse ($courses as $index => $course)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7">{{ $course->name }}</td>
                        <td>
                            <button
                                onclick="toggleConfirm()" 
                                class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded"
                            >
                                delete
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
                            <button 
                                class="bg-emerald-500 hover:bg-emerald-400 text-white px-3 py-2 rounded"
                                onclick="showModal({{$course}})"
                            >
                                show
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                Tidak ada mahasiswa dengan NIM 
                                <span class="text-indigo-500">{{ $_GET['search'] }}</span>
                            </h3>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
        {{-- <div class="mt-5 w-full">
            {{$students->links()}}
        </div> --}}
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