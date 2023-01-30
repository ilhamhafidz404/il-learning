@extends('backend.layouts.master')

@section('content')

    @include('components.confirmModal' , 
        [ 
            'title' => 'Yakin Menambah Mission', 
            'subtitle' => 'Pastikan data/keterangan sudah sesuai',
            'to' => 'addMission'
        ]
    )
    @include('components.toast')
    <section 
        class="
            col-span-5 
            lg:col-span-4 
            py-16 
            md:py-28 
            px-3
            sm:px-8
            lg:pr-20
        "
    >
        <img 
            src="{{ asset('images/auth/slide1.jpg') }}"
            class="
                absolute 
                top-0 
                left-0 
                w-full 
                -z-10 
                h-[400px] 
                object-cover 
                object-center
                lg:object-[100px]
            "
        >
        <span
            class="
                absolute 
                top-0 
                left-0 
                w-full 
                -z-10 
                h-[400px]
                bg-black/30
            "
        ></span>
        <div class="text-white relative h-[300px]">
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $course->name }}</h1>
            <span class="text-emerald-500 font-bold">ADD MISSION </span>
            {{-- @foreach ($course->lecturer as $lecturer)
                <span>| {{ $lecturer->name }}</span>
            @endforeach --}}
            <a 
                href="{{ route('course.show', $course->slug) }}" 
                class="text-white absolute bottom-[150px] z-30 left-0"
            >
                Kembali
            </a>
        </div>
        <div 
            class="
                -mt-[150px]
                bg-white
                dark:bg-slate-800
                p-5
                rounded
                grid
                grid-cols-2
                gap-5
            "
        >
            <form 
                id="addMission"
                action="{{ route('mission.store') }}" 
                class="z-30 text-gray-800 dark:text-gray-200 col-span-2" 
                method="POST"
            >
                @csrf
                <div class="mb-5">
                    <label 
                        for="name" 
                        class="
                            block
                            font-bold
                            mb-2
                            @error('name')
                                text-red-500
                            @enderror
                        "
                    >
                        Judul Mission
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="
                            rounded 
                            py-2 
                            px-3 
                            w-full 
                            text-gray-800 
                            dark:text-gray-200 
                            @error('name')
                                border-2
                                border-red-500
                                bg-red-500/10
                            @else
                                bg-gray-100 
                                dark:bg-slate-700
                            @enderror
                        "
                        required
                        value="{{ old('name') }}"
                    >
                    @error('name')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label 
                        for="course" 
                        class="
                            @error('course')
                                text-red-500
                            @enderror
                            block
                            font-semibold
                        "
                    >Course</label>
                    <select 
                        name="course" 
                        id="course" 
                        class="
                            w-full 
                            px-3 
                            py-3 
                            rounded
                            bg-gray-100 
                            dark:text-gray-200
                            dark:bg-slate-700
                            @error('course')
                                text-red-500
                                bg-red-500/10
                            @else
                                text-gray-800 
                            @enderror
                        "
                        required
                    >
                        <option value="" hidden selected>Pilih Course</option>
                        @foreach ($user->course as $course)
                            <option 
                                {{ old('course') == $course->id ? "selected" : "" }}
                                value="{{ $course->id }}"
                            >
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex flex-wrap justify-between md:flex-row flex-col-reverse mt-10 items-center">
                    <a 
                        class="
                            bg-gray-500 
                            px-5 
                            py-2 
                            rounded 
                            hover:bg-gray-400 
                            text-white 
                            md:w-auto 
                            w-full 
                            text-center
                        "
                        href="{{ route('course.show', $course->slug) }}" 
                    >
                        Kembali
                    </a>
                    <div class="flex gap-4 md:w-auto w-full md:mb-0 mb-3">
                        <button 
                            type="reset"
                            class="
                                bg-red-500 
                                px-5 
                                py-2 
                                rounded 
                                hover:bg-red-400
                                text-white
                                md:w-auto
                                w-1/2
                            "
                        >
                            Reset
                        </button>
                        <button 
                            type="button"
                            onclick="toggleConfirm()"
                            class="
                                bg-indigo-500 
                                px-5 
                                py-2 
                                rounded 
                                hover:bg-indigo-400
                                text-white
                                md:w-auto
                                w-1/2
                            "
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