@extends('backend.admin.master')

@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmAddLecturer'
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
                Add Student
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

        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded 
                overflow-hidden
                p-5
                mt-10
            "
        >
            <form 
                action="{{ route('admin.student.store') }}" 
                class="text-gray-100" 
                id="confirmAddLecturer"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <label for="name" class="font-bold">Name :</label>
                        <input 
                            id="name"
                            name="name"
                            type="text" 
                            class="w-full py-2 px-4 rounded dark:bg-slate-700"
                        >
                    </div>
                    <div>
                        <label for="email" class="font-bold">Email :</label>
                        <input 
                            id="email"
                            name="email"
                            type="email" 
                            class="w-full py-2 px-4 rounded dark:bg-slate-700"
                        >
                    </div>
                    <div>
                        <label for="password" class="font-bold">Password :</label>
                        <input 
                            id="password"
                            name="password"
                            type="password" 
                            class="w-full py-2 px-4 rounded dark:bg-slate-700"
                        >
                    </div>
                </div>
                
                <div class="relative mt-10">
                    <hr class="border-slate-500">
                    <span class="absolute -top-[12px] font-bold bg-slate-800 pr-5 text-gray-200">BIODATA</span>
                </div>

                <div class="mt-10 grid grid-cols-2 gap-5">
                    <div class="col-span-2">
                        <label for="file" class="font-bold">File :</label>
                        <input 
                            id="file"
                            name="file"
                            type="file" 
                            class="w-full py-2 px-4 rounded dark:bg-slate-700"
                        >
                    </div>
                    <div>
                        <label for="nim" class="font-bold">Nim :</label>
                        <input 
                            id="nim"
                            name="nim"
                            type="text" 
                            class="w-full py-2 px-4 rounded dark:bg-slate-700"
                        >
                    </div>
                    <div>
                        <label for="classroom" class="font-bold">Nim :</label>
                        <select name="classroom" id="classroom" class="w-full py-2 px-4 rounded dark:bg-slate-700">
                            <option selected hidden>-Pilih Kelas-</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <div>
                        <a
                            href="{{ route('admin.student.index') }}" 
                            class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded"
                        >
                            Kembali
                        </a>
                    </div>
                    <div>
                        <button 
                            type="reset" 
                            class="bg-red-500 hover:bg-red-400 px-5 py-2 rounded"
                        >
                            Reset
                        </button>
                        <button 
                            type="button"
                            onclick="toggleConfirm()"
                            class="bg-indigo-500 hover:bg-indigo-400 px-5 py-2 rounded"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </form>
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