@extends('backend.admin.master')
@section('title', 'Add Lecturer')
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
                Lecturers
            </h1>
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
                action="{{ route('admin.lecturer.store') }}" 
                class="text-gray-100" 
                id="confirmAddLecturer"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="grid grid-cols-3 gap-5">
                    <div>
                        <label 
                            for="name" 
                            class="
                                font-bold 
                                @error('name') text-red-500 @enderror 
                                dark:text-gray-100 
                                text-gray-800
                            "
                        >
                            Name :
                        </label>
                        <input 
                            id="name"
                            name="name"
                            type="text" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-200
                                border-2
                                text-gray-800
                                dark:text-gray-100
                                border-transparent
                                @error('name')
                                    !border-red-500
                                    !bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            value="{{ old('name') }}"
                        >
                        @error('name')
                            <small class="text-red-500 italic">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label 
                            for="email" 
                            class="
                                font-bold 
                                @error('email') text-red-500 @enderror 
                                dark:text-gray-100 
                                text-gray-800
                            "
                        >
                            Email :
                        </label>
                        <input 
                            id="email"
                            name="email"
                            type="email" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-200
                                text-gray-800
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('email')
                                    !border-red-500
                                    !bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <small class="text-red-500 italic">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div>
                        <label 
                            for="password" 
                            class="
                                font-bold 
                                @error('password') text-red-500 @enderror 
                                dark:text-gray-100 
                                text-gray-800
                            "
                        >
                            Password :
                        </label>
                        <input 
                            id="password"
                            name="password"
                            type="password" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-200
                                text-gray-800
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('password')
                                    !border-red-500
                                    !bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                        >
                        @error('password')
                            <small class="text-red-500 italic">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                
                <div class="relative mt-10">
                    <hr class="border-slate-500">
                    <span 
                        class="
                            absolute 
                            -top-[12px] 
                            font-bold 
                            dark:bg-slate-800 
                            bg-white 
                            pr-5 
                            dark:text-gray-200
                            text-gray-800
                        "
                    >
                        BIODATA
                    </span>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-2 gap-5">
                        <div class="mb-5">
                            <label 
                                for="nip" 
                                class="
                                font-bold 
                                @error('nip') text-red-500 @enderror 
                                dark:text-gray-100 
                                text-gray-800
                            "
                            >
                                NIP :
                            </label>
                            <input 
                                id="nip"
                                name="nip"
                                type="text" 
                                class="
                                    w-full 
                                    py-2 
                                    px-4 
                                    rounded 
                                    dark:bg-slate-700
                                    bg-gray-200
                                text-gray-800
                                dark:text-gray-100
                                    border-2
                                    border-transparent
                                    @error('nip')
                                        !border-red-500
                                        !bg-red-500/40
                                        !border-red-500
                                    @enderror
                                "
                                value="{{ old('nip') }}"
                            >
                            @error('nip')
                                <small class="text-red-500 italic">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div>
                            <label 
                                for="file" 
                                class="
                                font-bold 
                                @error('file') text-red-500 @enderror 
                                dark:text-gray-100 
                                text-gray-800
                            "
                            >
                                Profile :
                            </label>
                            <input 
                                id="file"
                                name="file"
                                type="file" 
                                class="
                                    w-full 
                                    py-2 
                                    px-4 
                                    rounded 
                                    dark:bg-slate-700
                                    bg-gray-200
                                    dark:text-gray-200
                                    text-gray-800
                                    border-2
                                    border-transparent
                                    @error('file')
                                        !border-red-500
                                        !bg-red-500/40
                                        !border-red-500
                                    @enderror
                                "
                                accept=".png, .jpg, .jpeg"
                            >
                            @error('file')
                                <small class="text-red-500 italic">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div> 
                    <div>
                        <label 
                            for="gender" 
                            class="
                                font-bold 
                                block 
                                mb-3
                                dark:text-gray-100 
                                text-gray-800
                            "
                        >
                            Jenis Kelamin :
                        </label>
                        
                        <span class="inline-block mr-10">
                            <input 
                                id="man"
                                name="gender"
                                type="radio" 
                                value="man"
                                checked
                            >
                            <label for="man" class="dark:text-gray-200 text-gray-800">Laki-laki</label>
                        </span>

                        <span>
                            <input 
                                id="woman"
                                name="gender"
                                type="radio" 
                                value="woman"
                                @if (old('gender') == 'woman')
                                    checked
                                @endif
                            >
                            <label for="woman" class="dark:text-gray-200 text-gray-800">Perempuan</label>
                        </span>
                    </div>
                </div>
                <div class="flex justify-between mt-14">
                    <div>
                        <a
                            href="{{ route('admin.lecturer.index') }}" 
                            class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded"
                        >
                            Go Back
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