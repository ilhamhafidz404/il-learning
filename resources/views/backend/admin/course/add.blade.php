@extends('backend.admin.master')
@section('title', 'Add Course')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Are you Sure?', 
            'subtitle' => 'The course data will be added if press yes',
            'to' => 'storeCourse'
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
                Add Course
            </h1>
        </div>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden mt-10 p-5">
            <form 
                id="storeCourse" 
                action="{{ route('admin.course.store') }}" 
                method="POST" 
                enctype="multipart/form-data"
            >
                @csrf
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
                                    !text-red-500
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
                                dark:text-gray-100
                                bg-gray-200
                                border-2
                                border-transparent
                                @error('name')
                                    !bg-red-500/50
                                    dark:bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            value="{{ old('name') }}"
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
                                    !text-red-500
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
                                dark:text-gray-100
                                bg-gray-200
                                border-2
                                border-transparent
                                @error('sks')
                                    !bg-red-500/50
                                    dark:bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            value="{{ old('sks') }}"
                        >
                        @error('sks')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-5">
                    <div class="mb-5">
                        <label 
                            for="file" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800 
                                font-semibold
                                @error('file')
                                    !text-red-500
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
                                bg-gray-200
                                border-2
                                border-transparent
                                @error('file')
                                    !bg-red-500/50
                                    dark:bg-red-500/40
                                    !border-red-500
                                @enderror
                            "
                            accept=".png, .jpg, .jpeg, .svg"
                        >
                        @error('file')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @else
                            @if (old('name') || old('sks') || old('description'))
                                <small class="text-emerald-500 italic">
                                    the image has been validated, but Please input the image again!
                                </small>
                            @endif
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label 
                            for="program" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800
                                font-semibold
                                @error('program')
                                    text-red-500
                                @enderror
                            "
                        >
                            Study Program :
                        </label>
                        <select 
                            name="program" 
                            id="program" 
                            class="
                                w-full 
                                rounded 
                                py-2 
                                px-3 
                                dark:bg-slate-700 
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('program')
                                    bg-red-200
                                    dark:bg-red-500/50
                                    !border-red-500
                                @enderror
                            "
                        >
                            <option value="" selected hidden>- Select Program -</option>
                            @forelse ($programs as $program)
                                <option 
                                    value="{{ $program->id }}"
                                    @if (old('program') == $program->id)
                                        selected
                                    @endif
                                >
                                    {{ $program->name . " (". $program->level .")" }}
                                </option>
                            @empty
                                <option disabled>
                                    <i>No Program Data</i>
                                </option>
                            @endforelse
                        </select>
                        @error('program')
                            <small class="text-red-500">{{ $message }}</small>
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
                                !text-red-500
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
                            dark:text-gray-100
                            bg-gray-200
                            border-2
                            border-transparent
                            @error('description')
                                !bg-red-500/50
                                dark:bg-red-500/40
                                !border-red-500
                            @enderror
                        "
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('admin.course.index') }}" 
                        class="bg-gray-400 hover:bg-gray-300 rounded px-5 py-2 text-white"
                    >
                        Go Back
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
</script>
@endsection