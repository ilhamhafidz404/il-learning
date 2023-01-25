@extends('backend.admin.master')

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
            py-16 
            px-5
            md:py-28 
            col-span-5 
            lg:col-span-4 
            lg:pr-[70px]
        "
    >
        @include('components.widgets') 
        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded 
                mt-5 
                overflow-hidden
                p-5
                flex
                gap-10
                w-full
            "
        >
            <div>
                <img 
                    src="{{ asset('storage/'. $lecturer->profile) }}" 
                    alt=""
                    class="w-[200px]"
                >
            </div>
            <div class="dark:text-white flex gap-10 justify-between w-full">
                <div class="w-1/2"> 
                    <h1 class="text-xl font-semibold ">{{ $lecturer->user->name }}</h1>
                    <small class="text-gray-300 text-sm">{{ $lecturer->user->email }}</small>
                </div>
                <div class="w-1/2">   
                    <h3 class="font-semibold flex mb-3">
                        @include(
                            'components.icons.bookOpen-regular-icon',
                            ['class' => 'w-6 h-6 mr-3']
                        )
                        Mata Kuliah
                    </h3>
                    <ul class="list-disc text-gray-300 text-sm">
                        @foreach ($lecturer->course as $course)
                            <li>
                                {{ $course->name }}
                            </li>
                        @endforeach
                    </ul>
                    <h3 class="font-semibold flex mb-3 mt-5">
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-6 h- mr-3"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" 
                            />
                        </svg>
                        Kelas
                    </h3>
                    <ul class="list-disc text-gray-300 text-sm">
                        @foreach ($lecturer->classroom as $classroom)
                            <li>
                                {{ $classroom->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded 
                mt-5 
                overflow-hidden
                p-5
            "
        >
            <h3 class="text-2xl font-semibold text-indigo-500 mb-5">Courses</h3>
            <form 
                action="{{ route('admin.lecturer.update', ['submit' => 'course']) }}" 
                method="POST" 
                class="dark:text-white grid grid-cols-3"
            >
                @csrf
                <input type="text" name="lecturer" value="{{ $lecturer->id }}" hidden>
                @foreach ($courses as $course)
                    <div class="mb-3">
                        <input 
                            id="{{ $course->slug }}" 
                            type="checkbox" 
                            value="{{ $course->id }}" 
                            name="courses[]"
                        >
                        <label 
                            for="{{ $course->slug }}"
                            class="ml-3 font-semibold"
                        >
                            {{ $course->name }}
                        </label>
                    </div>
                @endforeach
                <div class="col-span-3 mt-5">
                    <button 
                        {{-- type="button" --}}
                        {{-- onclick="toggleConfirm()" --}}
                        class="bg-indigo-500 hover:bg-indigo-500 px-5 py-2 rounded"
                    >
                        submit
                    </button>
                </div>
            </form>
        </div>

        <div 
            class="
                bg-white 
                dark:bg-slate-800 
                col-span-6 
                md:col-span-4 
                shadow-md 
                rounded 
                mt-5 
                overflow-hidden
                p-5
            "
        >
            <h3 class="text-2xl font-semibold text-indigo-500 mb-5">Classroom</h3>
            <form 
                action="{{ route('admin.lecturer.update', ['submit' => 'classroom']) }}" 
                method="POST" 
                class="dark:text-white grid grid-cols-4"
            >
                @csrf
                <input type="text" name="lecturer" value="{{ $lecturer->id }}" hidden>
                @foreach ($classrooms as $classroom)
                    <div class="mb-3">
                        <input 
                            id="{{ $classroom->id }}" 
                            type="checkbox" 
                            value="{{ $classroom->id }}" 
                            name="classrooms[]"
                        >
                        <label 
                            for="{{ $classroom->id }}"
                            class="ml-3 font-semibold"
                        >
                            {{ $classroom->name }}
                        </label>
                    </div>
                @endforeach
                <div class="col-span-3 mt-5">
                    <button 
                        {{-- type="button" --}}
                        {{-- onclick="toggleConfirm()" --}}
                        class="bg-indigo-500 hover:bg-indigo-500 px-5 py-2 rounded"
                    >
                        submit
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const modal = document.getElementById('modal');
        const showModal= (student) => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.getElementById('name').textContent = student.user.name
            document.getElementById('nim').textContent = student.nim
        }    
        const hideModal= () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
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