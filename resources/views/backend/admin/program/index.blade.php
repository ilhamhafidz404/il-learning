@extends('backend.admin.master')
@section('title', 'Program Study')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmDeletePrody'
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
                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" 
                        />
                    </svg>
                </span>
                Program Study
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
                        href="{{ route('admin.program.index') }}" 
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
                    href="{{ route('admin.program.create') }}" 
                    class="
                        bg-white 
                        hover:bg-white/80 
                        text-indigo-500 
                        md:px-5 
                        md:py-3 
                        px-3
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
                    <span class="sm:inline-block hidden">Create new Program Study</span>
                </a>
            </div>
        </div>

        <small class="text-white">
            <span class="font-semibold">{{ $programs->count() }}</span> 
            Program Study now
        </small>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-auto">
            <div>
                <table class="w-full dark:text-gray-300">
                    <tr class="dark:text-white text-gray-800">
                        <th class="py-6 min-w-[300px]">Name</th>
                        <th class="py-6 min-w-[100px]">Level</th>
                        <th class="min-w-[150px]">Action</th>
                    </tr>
                    @forelse ($programs as $index => $program)
                        <tr
                            class="
                                @if ($index%2 == 0)
                                    dark:bg-slate-700
                                    bg-gray-200
                                @endif
                            "
                        >
                            <td class="py-5 pl-7 w-[70%]">
                                <a href="#">
                                    {{ $program->name }}
                                </a>
                            </td>
                            <td class="text-center">
                                {{ $program->level }}
                            </td>
                            <td class="text-center">
                                <div class="flex items-center justify-center">
                                    <a 
                                        href="{{ route('admin.program.edit', $program->slug) }}"
                                        class="
                                            bg-yellow-500 
                                            hover:bg-yellow-400 
                                            text-white 
                                            px-3 
                                            py-2 
                                            rounded
                                            mr-3
                                        "
                                    >
                                        @include(
                                            'components.icons.edit-solid-icon',
                                            ['class' => 'w-6']
                                        )
                                    </a>

                                    <form 
                                        id="confirmDeletePrody"
                                        action="{{ route('admin.program.destroy', $program->id) }}" 
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
                                    No Program Study Data, 
                                    <a href="{{ route('admin.program.create') }}" class="text-indigo-500">
                                        Create Program Study?
                                    </a>
                                </h3>
                            </td>
                        </tr>
                    @endforelse
                    <tr class="bg-indigo-500">
                        <td colspan="3" class="px-10 pb-5 pt-1">
                            <div class="mt-5 w-full text-white">
                                {{$programs->links()}}
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