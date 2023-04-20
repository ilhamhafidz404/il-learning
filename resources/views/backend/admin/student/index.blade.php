@extends('backend.admin.master')
@section('title', 'Student')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmDeleteStudent'
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
        <div class="flex-row md:flex justify-between">
            <h1 class="text-4xl font-semibold text-white flex items-center md:mb-0 mb-5">
                <span class="bg-white p-2 rounded mr-3">
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-10 text-indigo-500"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                        />
                    </svg>
                </span>
                Students
            </h1>
            <form action="" class="relative">
                <input 
                    type="text" 
                    placeholder="search" 
                    name="search" 
                    class="py-2 rounded-full px-5 md:w-[300px] w-full bg-white text-gray-800"
                    @isset($_GET['search'])
                        value="{{ $_GET['search'] }}"
                    @endisset
                >
                @isset($_GET['search'])
                    <a 
                        href="{{ route('admin.student.index') }}" 
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
        <div class="flex justify-between items-center my-5">
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
                    href="{{ route('admin.student.create') }}" 
                    class="
                        bg-white 
                        hover:bg-white/80 
                        text-indigo-500 
                        px-3 
                        md:px-5 
                        md:py-3 
                        py-2 
                        rounded 
                        font-semibold
                        flex
                        items-center
                    "
                >
                    <span class="sm:hidden inline-block">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-7"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </span>
                    <span class="sm:inline-block hidden">Create new Student Account</span>
                </a>
            </div>
        </div>

        <small class="text-white">
            <span class="font-semibold">{{ $students->count() }}</span> 
            Stundent now
        </small>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-auto">
            <div>
                <table class="w-full dark:text-gray-300">
                    <tr class="dark:text-white text-gray-800">
                        <th class="py-6 min-w-[300px]">NIM</th>
                        <th class="py-6 min-w-[300px]">Name</th>
                        <th class="py-6 min-w-[300px]">Semester</th>
                        <th class="min-w-[150px]">Action</th>
                    </tr>
                    @forelse ($students as $index => $student)
                        <tr
                            class="
                                @if ($index%2 == 0)
                                    dark:bg-slate-700
                                    bg-gray-200
                                @endif
                            "
                        >
                            <td class="py-5 pl-7 w-[30%]">
                                {{ $student->nim }}
                            </td>
                            <td class="py-5 pl-7 w-[80%]">
                                <a href="{{ route('admin.student.show', $student->user->username) }}">
                                    {{ $student->user->name }}
                                </a>
                            </td>
                            <td class="py-5 pl-7 text-center">
                                {{ $student->semester }}
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center">
                                    <form 
                                        action="{{ route('admin.student.destroy', $student->user->id) }}" 
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
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-10">
                                <h4 class="text-6xl text-center">☹️</h4>
                                <h3 class="text-center mt-3 text-xl">
                                    No Student Data, 
                                    <a href="{{ route('admin.student.create') }}" class="text-indigo-500">
                                        Create Student Account?
                                    </a>
                                </h3>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="bg-indigo-500">
                        <td colspan="5" class="px-10 pb-5 pt-1">
                            <div class="mt-5 w-full text-white">
                                {{$students->links()}}
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
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
</script>
@endsection