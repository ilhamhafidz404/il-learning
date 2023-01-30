@extends('backend.layouts.master')

@section('content')

    @include('components.confirmModal' , 
        [ 
            'title' => 'Yakin Menambah Submission', 
            'subtitle' => 'Pastikan data/keterangan sudah sesuai',
            'to' => 'addSubmission'
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
            <span class="text-indigo-500 font-bold">ADD SUBMISSION </span>
            {{-- @foreach ($course->lecturer as $lecturer)
                <span>| {{ $lecturer->user->name }}</span>
            @endforeach --}}
             <a 
                href="{{ route('course.show', $course->slug) }}" 
                class="text-white absolute bottom-[150px] z-30 left-0"
            >
                Kembali
            </a>
            <button 
                onclick="changeType()" 
                class="absolute bottom-[150px] right-0 bg-indigo-500 px-5 py-2 rounded mb-3"
            >
                <span id="upTheory">Upload Materi</span>
                <span id="upWork" class="hidden">Upload Tugas</span>
            </button>
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
                id="addSubmission"
                action="{{ route('submission.store') }}" 
                class="z-30 text-gray-800 dark:text-gray-200 col-span-2" 
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <input type="number" name="course" value="{{ $course->id }}" hidden>
                <input type="number" name="lecturer" value="{{ $user->id }}" hidden>
                
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
                        Judul Tugas
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
                <div class="mb-5">
                    <label 
                        for="description" 
                        class="
                            block
                            font-bold
                            mb-2
                            @error('description')
                                text-red-500
                            @enderror
                        "
                    >
                        Keterangan Tugas
                    </label>
                    <textarea 
                        name="description" 
                        id="description"
                        placeholder="-"
                        class="
                            w-full 
                            max-h-[100px] 
                            min-h-[100px] 
                            px-3 
                            py-2 
                            rounded 
                            text-gray-800 
                            dark:text-gray-200
                            @error('description')
                                border-2
                                border-red-500
                                bg-red-500/10
                            @else
                                bg-gray-100 
                                dark:bg-slate-700
                            @enderror
                        "
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-red-500">{{ $message }}</small>
                    @enderror
                </div>
                <div class="grid md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label 
                            for="mission" 
                            class="
                                block
                                font-bold
                                mb-2
                                @error('mission')
                                    text-red-500
                                @enderror
                            "
                        >Mission</label>
                        <select 
                            name="mission" 
                            id="mission" 
                            class="
                                w-full 
                                px-3 
                                py-2 
                                rounded 
                                text-gray-800 
                                dark:text-gray-200
                                @error('mission')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @else
                                    bg-gray-100 
                                    dark:bg-slate-700
                                @enderror
                            "
                            required
                        >
                            <option value="" hidden selected>Pilih Mission</option>
                            @forelse ($missions as $mission)
                                <option 
                                    {{ old('mission') == $mission->id ? "selected" : "" }}
                                    value="{{ $mission->id }}"
                                >
                                    {{ $mission->name }}
                                </option>
                            @empty
                                <option disabled>Anda belum membuat mission</option>
                            @endforelse
                        </select>
                        @error('mission')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label 
                            for="classroom" 
                            class="
                                block
                                font-bold
                                mb-2
                                @error('classroom')
                                    text-red-500
                                @enderror
                            "
                        >Kelas</label>
                        <select 
                            name="classroom" 
                            id="classroom" 
                            class="
                                w-full 
                                px-3 
                                py-2 
                                rounded 
                                text-gray-800 
                                dark:text-gray-200
                                @error('classroom')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @else
                                    bg-gray-100 
                                    dark:bg-slate-700
                                @enderror
                            "
                            required
                        >
                            <option value="" hidden selected>Pilih Kelas</option>
                            @forelse ($user->classroom as $classroom)
                                <option 
                                    {{ old('lecturer') == $user->id ? "selected" : "" }}
                                    value="{{ $classroom->id }}"
                                >
                                    {{ $classroom->name }}
                                </option>
                            @empty
                                <option disabled>Anda belum ditugaskan dikelas manapun</option>
                            @endforelse
                        </select>
                        @error('classroom')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div id="forTugas" class="grid md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label 
                            for="deadline" 
                            class="
                                block
                                font-bold
                                mb-2
                                @error('deadline')
                                    text-red-500
                                @enderror
                            "
                        >
                            Tanggal Deadline Tugas
                        </label>
                        <input 
                            type="date"
                            name="deadline" 
                            id="deadline" 
                            class="
                                w-full 
                                px-3 
                                py-2 
                                rounded 
                                text-gray-800 
                                dark:text-gray-200
                                @error('deadline')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @else
                                    bg-gray-100 
                                    dark:bg-slate-700
                                @enderror
                            "
                            required
                            value="{{ old('deadline') }}"
                        >
                        @error('deadline')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label 
                            for="time_deadline" 
                            class="
                                block
                                font-bold
                                mb-2
                                @error('time_deadline')
                                    text-red-500
                                @enderror
                            "
                        >
                            Waktu Deadline Tugas
                        </label>
                        <input 
                            type="time"
                            name="time_deadline" 
                            id="time_deadline" 
                            class="
                                w-full 
                                px-3 
                                py-2 
                                rounded 
                                text-gray-800 
                                dark:text-gray-200
                                @error('time_deadline')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @else
                                    bg-gray-100 
                                    dark:bg-slate-700
                                @enderror
                            "
                            required
                            value="{{ old('time_deadline') }}"
                        >
                        @error('time_deadline')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div id="forMateri" class="hidden">
                    <label 
                            for="theory" 
                            class="
                                block
                                font-bold
                                mb-2
                                @error('materi')
                                    text-red-500
                                @enderror
                            "
                        >
                            Materi Pembelajaran
                        </label>
                        <input 
                            type="file"
                            name="theory" 
                            id="theory" 
                            class="
                                w-full 
                                px-3 
                                py-2 
                                rounded 
                                text-gray-800 
                                dark:text-gray-200
                                @error('theory')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @else
                                    bg-gray-100 
                                    dark:bg-slate-700
                                @enderror
                            "
                            required
                            value="{{ old('theory') }}"
                        >
                        @error('theory')
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
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
<script>
    const changeType = () =>{
        const forTugas= document.getElementById('forTugas');
        const forMateri= document.getElementById('forMateri');
        const upWork= document.getElementById('upWork');
        const upTheory= document.getElementById('upTheory');

        forTugas.classList.toggle('hidden');
        forMateri.classList.toggle('hidden');
        forTugas.classList.toggle('grid');
        forMateri.classList.toggle('grid');
        // 
        upWork.classList.toggle('hidden');
        upTheory.classList.toggle('hidden');
    }
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