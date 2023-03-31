@extends('backend.admin.master')
@section('title', 'Add Level')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Are you sure?', 
            'subtitle' => 'Class data will be added if you press yes',
            'to' => 'updateLevel'
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
                            d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" 
                        />
                    </svg>
                </span>
                Edit Level
            </h1>
        </div>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden mt-10 p-5">
            <form id="updateLevel" action="{{ route('admin.level.update', $level->id) }}" method="POST">
                @method('PUT')
                @csrf
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
                        value="{{ old('name') ?? $level->name }}"
                    >
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
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
                    >{{ old('name') ?? $level->description }}</textarea>
                    @error('description')
                        <small class="text-red-500 italic">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('admin.level.index') }}" 
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