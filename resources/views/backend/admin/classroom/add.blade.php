@extends('backend.admin.master')
@section('title', 'Add Classroom')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Are you sure?', 
            'subtitle' => 'Class data will be added if you press yes',
            'to' => 'storeClassroom'
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
                            d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                        />
                    </svg>
                </span>
                Add Classroom
            </h1>
            {{-- <div class="bg-white">
                breadcrumbs
            </div> --}}
        </div>

        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded overflow-hidden mt-10 p-5">
            <form id="storeClassroom" action="{{ route('admin.classroom.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-5">
                    <div class="mb-10">
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
                    <div class="mb-10">
                        <label 
                            for="mentor" 
                            class="
                                block 
                                dark:text-white 
                                text-gray-800 
                                font-semibold
                                @error('mentor')
                                    text-red-500
                                @enderror
                            "
                        >
                            Mentor :
                        </label>
                        <select 
                            name="mentor" 
                            id="mentor" 
                            class="
                                w-full 
                                rounded 
                                py-2 
                                px-3 
                                dark:bg-slate-700 
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('mentor')
                                    bg-red-200
                                    dark:bg-red-500/50
                                    !border-red-500
                                @enderror
                            "
                        >
                            <option value="" selected hidden>- Select Mentor -</option>
                            @forelse ($lecturers as $lecturer)
                                <option 
                                    value="{{ $lecturer->user->name }}"
                                    @if (old('mentor') == $lecturer->user->name)
                                        selected
                                    @endif
                                >
                                    {{ $lecturer->user->name }}
                                </option>
                            @empty
                                <option disabled>
                                    <i>No Lecturer Data</i>
                                </option>
                            @endforelse
                        </select>
                        @error('mentor')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <a 
                        href="{{ route('admin.classroom.index') }}" 
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