@extends('backend.admin.master')
@section('title')
    Edit {{ $course->name }}
@endsection
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data course akan mulai ditambahkan',
            'to' => 'updateCourse'
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
                Edit Course
            </h1>
            <div>
                <button
                    onclick="changeModeEdit()"
                    id="buttonChangeMode"
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    <span id="editBackgroundButton">
                        to Edit Background
                    </span>
                    <span id="editInfoButton" class="hidden">
                        to Edit Information
                    </span>
                </button>
            </div>
        </div>

        {{-- <div class="bg-slate-800 inline-block mt-10 text-gray-100 rounded-t border-b-2 border-indigo-500">
            <button 
                id="editInfoButton"
                class="bg-[#5e72e4] px-5 py-3 rounded-tl"
                onclick="changeModeEdit()"
            >
                Edit Information
            </button>
            <button 
                id="editBackgroundButton"
                class="px-5 py-3 rounded-tr"
                onclick="changeModeEdit()"
            >
                Edit Background
            </button>
        </div> --}}
        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded-b
                rounded-r
                overflow-hidden 
                p-5
                mt-10
            "
        >
            <form 
                id="updateCourse" 
                action="{{ route('admin.course.update', $course->slug) }}" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @method("PUT")
                @csrf
                <div id="editInfo">
                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <div>
                            <label 
                                for="name" 
                                class="
                                    block 
                                    dark:text-white 
                                    text-gray-800
                                    font-semibold
                                    @error('name')
                                        text-red-500
                                    @enderror
                                "
                            >
                                Name :
                            </label>
                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="
                                    w-full 
                                    rounded 
                                    py-2 
                                    px-3 
                                    dark:bg-slate-700 
                                    bg-gray-200 
                                    dark:text-gray-100
                                    border-2
                                    border-transparent
                                    @error('name')
                                        bg-red-500/50
                                        dark:bg-red-500/40
                                        !border-red-500
                                    @enderror
                                "
                                value="{{ old('name') ?? $course->name }}"
                            >
                            @error('name')
                                <small class="text-red-500 italic">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label 
                                for="sks" 
                                class="
                                    block 
                                    dark:text-white 
                                    text-gray-800
                                    font-semibold
                                    @error('sks')
                                        text-red-500
                                    @enderror
                                "
                            >
                                SKS :
                            </label>
                            <input 
                                type="number" 
                                name="sks" 
                                id="sks" 
                                class="
                                    w-full 
                                    rounded 
                                    py-2 
                                    px-3 
                                    dark:bg-slate-700 
                                    bg-gray-200
                                    dark:text-gray-100
                                    border-2
                                    border-transparent
                                    @error('sks')
                                        bg-red-500/50
                                        dark:bg-red-500/40
                                        !border-red-500
                                    @enderror
                                "
                                value="{{ old('sks') ?? $course->sks }}"
                            >
                            @error('sks')
                                <small class="text-red-500 italic">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-5">
                        <label 
                            for="description" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800 
                                font-semibold
                                @error('description')
                                    text-red-500
                                @enderror
                            "
                        >
                            Description :
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            class="
                                w-full 
                                min-h-[150px] 
                                rounded 
                                max-h-[150px] 
                                px-3 
                                py-2 
                                dark:bg-slate-700 
                                bg-gray-200
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('description')
                                    bg-red-500/50
                                    dark:bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                        >{{ old('description') ?? $course->description }}</textarea>
                        @error('description')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div id="editBackground" class="hidden">
                    <div class="mb-5">
                        <p class="text-white font-semibold text-center mb-5">
                            BACKGROUND SAAT INI
                        </p>
                        <img 
                            src="{{ asset('storage/'.$course->background) }}" 
                            alt="{{ $course->name }} background"
                            class="w-[60%] mx-auto h-[350px] rounded object-cover object-center"
                        >
                    </div>
                    <div class="mb-5">
                        <label 
                            for="file" 
                            class="
                                block 
                                text-white 
                                font-semibold
                                @error('file')
                                    text-red-500
                                @enderror
                            "
                        >
                            Background :
                        </label>
                        <input 
                            type="file" 
                            name="file" 
                            id="file" 
                            class="
                                w-full 
                                rounded 
                                py-2 
                                px-3 
                                dark:bg-slate-700 
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('file')
                                    bg-red-500/50
                                    dark:bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            accept=".png, .jpg, .jpeg"
                        >
                        @error('file')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('admin.course.index') }}" 
                        class="bg-gray-400 hover:bg-gray-300 rounded px-5 py-2 text-white"
                    >
                        Kembali
                    </a>
                    <div>
                        <button type="reset" class="bg-red-500 hover:bg-red-400 rounded px-5 py-2 text-white">
                            Reset
                        </button>
                        <button 
                            type="button"
                            onclick="toggleConfirm()"
                            class="bg-indigo-500 hover:bg-indigo-400 rounded px-5 py-2 text-white"
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

    const changeModeEdit = () =>{
        const editInfo= document.querySelector('#editInfo');
        const editBackground= document.querySelector('#editBackground');
        
        editInfo.classList.toggle('hidden')
        editBackground.classList.toggle('hidden')

        const editBackgroundButton= document.querySelector('#editBackgroundButton');
        const editInfoButton= document.querySelector('#editInfoButton');

        editBackgroundButton.classList.toggle('hidden')
        editInfoButton.classList.toggle('hidden')
    }
</script>
@endsection