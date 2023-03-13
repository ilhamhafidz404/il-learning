@extends('backend.admin.master')
@section('title', 'Lecturer')
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
        x-data="{ 'modal': false }"
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
                        href="{{ route('admin.lecturer.index') }}" 
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
            <div class="flex">
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

                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative ml-3"
                >
                    <!-- Button -->
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="
                            flex 
                            items-center 
                            gap-2 
                            bg-emerald-500 
                            hover:bg-emerald-400 
                            px-5 
                            rounded-md
                            h-full
                            text-white
                        "
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                        </svg>
                        Excel

                        <!-- Heroicon: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                    >
                        <a 
                            href="{{ route('admin.lecturerExportExcel') }}" 
                            class="
                                flex 
                                items-center 
                                w-full 
                                first-of-type:rounded-t-md 
                                last-of-type:rounded-b-md 
                                px-4 
                                py-2.5 
                                text-left 
                                text-sm 
                                hover:bg-gray-200 
                                disabled:text-gray-500
                            "
                        >
                            Export Data
                        </a>

                        <a 
                            @click="modal = true" 
                            class="
                                flex 
                                items-center 
                                w-full 
                                first-of-type:rounded-t-md 
                                last-of-type:rounded-b-md 
                                px-4 
                                py-2.5 
                                text-left 
                                text-sm 
                                hover:bg-gray-200 
                                disabled:text-gray-500
                            "
                        >
                            Import Data
                        </a>
                        
                        <a 
                            href="{{ asset('./excel/template.xlsx') }}"
                            class="
                                flex 
                                items-center 
                                w-full 
                                first-of-type:rounded-t-md 
                                last-of-type:rounded-b-md 
                                px-4 
                                py-2.5 
                                text-left 
                                text-sm 
                                hover:bg-gray-200 
                                disabled:text-gray-500
                                cursor-pointer
                            "
                            
                        >
                            Excel Template
                        </a>
                    </div>
                </div>

                <div
                    id="importModal"
                    class="
                        hidden
                        fixed 
                        inset-0 
                        z-50 
                        flex 
                        items-center 
                        justify-center 
                        overflow-auto 
                        bg-black/70
                    "
                    x-show="modal"
                >
                    <div 
                        class="
                            bg-gray-200 
                            dark:bg-slate-800 
                            dark:text-white 
                            rounded 
                            px-10 
                            py-3
                            border-t-[5px]
                            border-indigo-500
                        "
                    >
                        <form action="{{ route('admin.lecturerImportExcel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="" class="block mb-2 mt-5">Upload your excel file :</label>
                            <input type="file" name="file" accept=".xlsx,.xls,.csv">
                            <div class="flex justify-between mt-10">
                                <button 
                                    @click="modal = false"
                                    type="button"
                                    class="
                                        px-5 
                                        py-2 
                                        rounded 
                                        bg-red-500 
                                        hover:bg-red-400 
                                        text-white
                                    "
                                >
                                    Close
                                </button>
                                <button 
                                    type="submit"
                                    class="
                                        px-5 
                                        py-2 
                                        rounded 
                                        bg-indigo-500 
                                        hover:bg-indigo-400 
                                        text-white
                                    "
                                >
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <span class="font-semibold">{{ $lecturerCount }}</span> 
            Lecturer now
        </small>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden">
            <table class="w-full dark:text-gray-300">
                <tr class="dark:text-white text-gray-800">
                    <th class="py-6">Name</th>
                    <th>Action</th>
                </tr>
                @forelse ($lecturers as $index => $lecturer)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                dark:bg-slate-700
                                bg-gray-200
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[80%]">
                            <a href="{{ route('admin.lecturer.show', $lecturer->user->username) }}">
                                {{ $lecturer->user->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center justify-center">
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
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                No Lecturer Data
                                <a href="{{ route('admin.lecturer.create') }}" class="text-indigo-500">
                                    Create Lecturer Account?
                                </a>
                            </h3>
                        </td>
                    </tr>
                @endforelse
                <tr class="bg-indigo-500">
                    <td colspan="2" class="px-10 pb-5 pt-1">
                        <div class="mt-5 w-full text-white">
                            {{ $lecturers->links() }}
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </section>
@endsection

@section('script')
<script>
    setTimeout(() => {
        document.getElementById('importModal').classList.remove('hidden');
    }, 1000);
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