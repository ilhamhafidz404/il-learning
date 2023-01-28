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
        <div class="flex justify-between">
            <h1 class="text-4xl font-semibold text-white flex items-center">
                <span class="bg-white p-2 rounded mr-3">
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10 text-indigo-500']
                    )
                </span>
                Lecturers
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
        <div class="flex justify-between my-5">
            <div class="bg-white py-1 px-2 rounded flex justify-between items-center">
                <button class="bg-[#5e72e4] text-white flex items-center justify-center p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M5.625 3.75a2.625 2.625 0 100 5.25h12.75a2.625 2.625 0 000-5.25H5.625zM3.75 11.25a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75zM3 15.75a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75zM3.75 18.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5H3.75z" />
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div>
                <a 
                    href="{{ route('admin.lecturer.create') }}" 
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    Create new Lecturer Account
                </a>
            </div>
        </div>

        <small class="text-white">
            <span class="font-semibold">{{ $lecturers->count() }}</span> 
            Lecturer now
        </small>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden">
            <table class="w-full dark:text-gray-300">
                <tr class=" text-white">
                    <th class="py-6">Name</th>
                    <th>Action</th>
                </tr>
                @forelse ($lecturers as $index => $lecturer)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[80%]">
                            <a href="{{ route('admin.lecturer.show', $lecturer->user->username) }}">
                                {{ $lecturer->user->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center">
                                <form 
                                    action="{{ route('admin.lecturer.destroy', $lecturer->user->id) }}" 
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
                                {{-- <form 
                                    action="{{ route('admin.lecturer.destroy', $lecturer->user->id) }}" 
                                    id="{{'confirmDeleteLecturer'. $index}}" 
                                    method="POST"
                                    class="hidden"
                                >
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
                                <a 
                                    href="{{ route('admin.lecturer.edit', $lecturer->user->username) }}"
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