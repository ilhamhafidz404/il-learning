@extends('backend.admin.master')
@section('title', 'Add Program Study')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Are you sure?', 
            'subtitle' => 'Class data will be added if you press yes',
            'to' => 'storeProgramStudy'
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
                Add Program Study
            </h1>
        </div>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden mt-10 p-5">
            <form id="storeProgramStudy" action="{{ route('admin.program.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="mb-3">
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
                                    !bg-red-200
                                    dark:bg-red-500/80
                                    !border-red-500
                                    !text-gray-800
                                @enderror
                            "
                            value="{{ old('name') }}"
                        >
                        @error('name')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label 
                            for="level" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800
                                font-semibold
                                @error('level')
                                    text-red-500
                                @enderror
                            "
                        >
                            Level :
                        </label>
                        <select 
                            name="level" 
                            id="level" 
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
                                @error('level')
                                    bg-red-200
                                    dark:bg-red-500/50
                                    !border-red-500
                                @enderror
                            "
                        >
                            <option value="" selected hidden>- Select Level -</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="D3">D3</option>
                        </select>
                        @error('level')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label 
                            for="level" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800
                                font-semibold
                                @error('level')
                                    text-red-500
                                @enderror
                            "
                        >
                            Faculty :
                        </label>
                        <select 
                            name="faculty" 
                            id="faculty" 
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
                                @error('faculty')
                                    bg-red-200
                                    dark:bg-red-500/50
                                    !border-red-500
                                @enderror
                            "
                        >
                            <option value="" selected hidden>- Select Faculty -</option>
                            @foreach ($faculties as $faculty)
                                <option 
                                    @if (old('faculty') == $faculty->id)
                                        selected
                                    @endif
                                    value="{{ $faculty->id }}"
                                >{{ "Fakultas " . $faculty->name }}</option>
                            @endforeach
                        </select>
                        @error('faculty')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('admin.program.index') }}" 
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