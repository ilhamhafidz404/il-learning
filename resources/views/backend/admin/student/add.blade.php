@extends('backend.admin.master')
@section('title', 'Add Student')
@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Are you sure?', 
            'subtitle' => 'Make sure student account correctly',
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
                            d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" 
                        />
                    </svg>
                </span>
                Add Student
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
                action="{{ route('admin.student.store') }}" 
                class="text-gray-100" 
                id="confirmAddLecturer"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="grid md:grid-cols-3 gap-5">
                    <div>
                        <label 
                            for="name" 
                            class="
                                font-bold 
                                @error('name') text-red-500 @enderror
                                dark:text-gray-200
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
                                text-gray-800
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('name')
                                    !border-red-500
                                    !bg-red-500/40
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
                            for="email" 
                            class="
                                font-bold 
                                @error('email') text-red-500 @enderror
                                dark:text-gray-200
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
                                @enderror
                            "
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label 
                            for="password" 
                            class="
                                font-bold 
                                @error('password') text-red-500 @enderror
                                dark:text-gray-200
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
                                @enderror
                            "
                        >
                        @error('password')
                            <small class="text-red-500 italic">{{ $message }}</small>
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

                <div class="mt-10 md:grid md:grid-cols-2 gap-5">
                    <div class="mb-3">
                        <label 
                            for="program" 
                            class="
                                font-bold 
                                @error('program') text-red-500 @enderror
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            Select Program Study :
                        </label>
                        <select 
                            name="program" 
                            id="program" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-200
                                border-2
                                border-transparent
                                dark:text-gray-200
                                text-gray-800
                                @error('program')
                                    !border-red-500
                                    !bg-red-500/40
                                @enderror
                            "
                        >
                            <option value="" selected hidden>-Select Program Study-</option>
                            @forelse ($programs as $program)
                                <option 
                                    value="{{ $program->id }}"
                                    @if (old('program') == $program->id)
                                        selected
                                    @endif
                                    data-code="{{ $program->code }}"
                                    id-program="{{ $program->id }}"
                                    data-faculty="Fakultas {{ $program->faculty->name }}"
                                    code-faculty="{{ $program->faculty->code }}"
                                    code-year="{{ now()->year }}"
                                    code-order="{{ ($studentCount) ? $lastIdStudent->id+1 : 1 }}"
                                >
                                    {{ $program->name }}
                                </option>
                            @empty
                                <option disabled>No Program Study Data</option>
                            @endforelse
                        </select>
                        @error('program')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label 
                            for="faculty" 
                            class="
                                font-bold 
                                @error('faculty') text-red-500 @enderror
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            Faculty :
                        </label>
                        <input 
                            id="faculty"
                            name="faculty"
                            type="text" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-300
                                text-gray-800
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('faculty')
                                    !border-red-500
                                    !bg-red-500/40
                                @enderror
                                placeholder:text-gray-800
                                dark:placeholder:text-gray-200
                            "
                            value="{{ old('faculty') }}"
                            placeholder="Select Program Study First"
                            readonly
                        >
                        @error('faculty')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label 
                            for="nim" 
                            class="
                                font-bold 
                                @error('nim') text-red-500 @enderror
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            NIM :
                        </label>
                        <input 
                            id="nim"
                            name="nim"
                            type="text" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-300
                                text-gray-800
                                dark:text-gray-100
                                border-2
                                border-transparent
                                @error('nim')
                                    !border-red-500
                                    !bg-red-500/40
                                @enderror
                            "
                            value="{{ old('nim') }}"
                            readonly
                        >
                        @error('nim')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label 
                            for="classroom" 
                            class="
                                font-bold 
                                @error('classroom') text-red-500 @enderror
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            Classroom :
                        </label>
                        <select 
                            name="classroom" 
                            id="classroom" 
                            class="
                                w-full 
                                py-2 
                                px-4 
                                rounded 
                                dark:bg-slate-700
                                bg-gray-300
                                border-2
                                border-transparent
                                dark:text-gray-200
                                text-gray-800
                                @error('classroom')
                                    !border-red-500
                                    !bg-red-500/40
                                @enderror
                            "
                            readonly
                        >
                            <option value="" selected hidden id="selectClassroom">Select Program Study First</option>
                            @forelse ($classrooms as $classroom)
                                <option 
                                    value="{{ $classroom->id }}"
                                    id-program="{{ $classroom->program_id }}"
                                    @if (old('classroom') == $classroom->id)
                                        selected
                                    @endif
                                >
                                    {{ $classroom->name }}
                                </option>
                            @empty
                                <option disabled selected>No Classroom Data</option>
                            @endforelse
                            <option class="hidden" id="ifNoClassOnPrody">No Classroom Data</option>
                        </select>
                        @error('classroom')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-span-2 mb-3">
                        <label 
                            for="file" 
                            class="
                                font-bold 
                                @error('file') text-red-500 @enderror
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            File :
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
                                border-2
                                border-transparent
                                dark:text-gray-200
                                text-gray-800
                                @error('file')
                                    !border-red-500
                                    !bg-red-500/40
                                @enderror
                            "
                            accept=".png, .jpg, .jpeg"
                        >
                        @error('file')
                            <small class="text-red-500 italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label 
                            for="gender" 
                            class="
                                font-bold 
                                block 
                                mb-3
                                dark:text-gray-200
                                text-gray-800
                            "
                        >
                            Gender :
                        </label>
                        
                        <span class="inline-block mr-10">
                            <input 
                                id="man"
                                name="gender"
                                type="radio" 
                                value="man"
                                checked
                            >
                            <label for="man" class="text-gray-800 dark:text-gray-200">Laki-laki</label>
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
                            <label for="woman" class="text-gray-800 dark:text-gray-200">Perempuan</label>
                        </span>
                    </div>
                </div>
                <div class="flex justify-between mt-14">
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

    const program = document.getElementById("program");
    const classroom = document.getElementById("classroom");
    const faculty = document.getElementById("faculty");
    const nim = document.getElementById("nim");

    const defaultSelectInClassroom = document.getElementById('selectClassroom')

    program.addEventListener("change", function() {

        defaultSelectInClassroom.innerHTML = "-Select Classroom-";
        

        const selectedOption = program.options[program.selectedIndex];
        programCode = selectedOption.getAttribute("data-code");
        programId = selectedOption.getAttribute("id-program");

        facultyCode = selectedOption.getAttribute("code-faculty");
        yearCode = selectedOption.getAttribute("code-year");
        orderCode = selectedOption.getAttribute("code-order");

        if(orderCode.length == 1){
            nim.value = `${yearCode}${facultyCode}${programCode}00${orderCode}`
        } else if(orderCode.length == 2){
            nim.value = `${yearCode}${facultyCode}${programCode}0${orderCode}`
        } else{
            nim.value = `${yearCode}${facultyCode}${programCode}${orderCode}`
        }

        // hilangkan efek readonly untuk select classroom ketika select prodi sudah dipilih
        classroom.readonly = false
        classroom.classList.add('bg-gray-200')
        classroom.classList.remove('bg-gray-300')
        
        // ambil semua data option dari classroom-nya
        for(let i= 0; i < classroom.options.length; i++){
            // hapus semua class hidden optionyya terlebuh dahulu sebelum di cek
            classroom.options[i].classList.remove('hidden');

            // cek jika data id-program pada option tersebut tidak sama dengan id program dari option program
            if(classroom.options[i].getAttribute("id-program") != programId){
                // hilangkan/hapus option tersebut
                classroom.options[i].classList.add('hidden');
            }
        }

        defaultSelectInClassroom.selected = true
        

        faculty.value = selectedOption.getAttribute("data-faculty");
    });
</script>
@endsection