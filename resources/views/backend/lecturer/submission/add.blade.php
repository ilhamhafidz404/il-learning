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
                object-[100px]
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
            <a href="{{ route('dashboard') }}" class="text-white absolute bottom-[150px] z-50 left-0">Kembali</a>
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
                class="z-40 text-gray-800 dark:text-gray-200 col-span-2" 
                method="POST"
            >
                @csrf
                <input type="number" name="course" value="{{ $course->id }}" hidden>
                <input type="number" name="lecturer" value="{{ $lecturer->id }}" hidden>
                
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
                <div class="grid grid-cols-2 gap-5 mb-5">
                    <div>
                        <label for="classroom" class="block">Kelas</label>
                        <select 
                            name="classroom" 
                            id="classroom" 
                            class="
                                w-full 
                                px-3 
                                py-3 
                                rounded 
                                text-gray-800 
                                bg-gray-100 
                                dark:text-gray-200
                                dark:bg-slate-700
                            "
                            required
                        >
                            <option value="" hidden selected>Pilih Kelas</option>
                            @foreach ($lecturer->classroom as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
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
                            Deadline Tugas
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
                </div>
                <div class="flex justify-between mt-7">
                    <a 
                        class="mt-7 bg-gray-500 px-5 py-2 rounded hover:bg-gray-400 text-white"
                        href="{{ route('course.show', $course->slug) }}"
                    >
                        Kembali
                    </a>
                    <div>
                        <button 
                            type="reset"
                            class="
                                bg-red-500 
                                px-5 
                                py-2 
                                rounded 
                                hover:bg-red-400
                                text-white
                            "
                        >
                            Reset
                        </button>
                        <button 
                            type="submit"
                            {{-- onclick="toggleConfirm()" --}}
                            class="
                                bg-indigo-500 
                                px-5 
                                py-2 
                                rounded 
                                hover:bg-indigo-400
                                text-white
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