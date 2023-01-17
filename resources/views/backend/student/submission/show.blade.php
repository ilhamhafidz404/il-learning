@extends('backend.layouts.master')

@section('content')
@include('components.confirmModal' , 
    [ 
        'title' => 'Yakin upload tugas?', 
        'subtitle' => 'Tugas akan dikumpulkan jika anda tekan yakin',
        'to' => 'upload_submission'
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
            <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $submission->mission->name }}</h1>
            <p>{{ $submission->lecturer->name }}  | {{ $submission->course->name }}</p>
            <a 
                href="{{ route('mission.show', $submission->mission->slug) }}" 
                class="text-white absolute bottom-[150px] z-50 left-0"
            >
                Kembali
            </a>
        </div>
        <div 
            class="
                -mt-[150px]
                text-gray-800
                dark:text-gray-200
                bg-white
                dark:bg-slate-800
                p-5
                rounded
                gap-5
                z-30
                relative
            "
        >
            <div class="flex items-center justify-between">
                <h2 class=" text-2xl font-semibold">{{ $submission->name }}</h2>
                @if ($submitSubmission)
                    <span class="text-white text-sm bg-emerald-500 py-1 px-2 rounded-md">Sudah mengumpulkan</span>
                @else
                    <span class="text-white text-sm bg-red-500 py-1 px-2 rounded-md">Belum mengumpulkan</span>
                @endif
            </div>
            <small>
                <span class="font-bold">Deadline :</span>
                {{ $submission->deadline }}
            </small>
            <hr class="my-3 border-slate-600">
            <p>{{ $submission->description }}</p>
            
            @if ($submitSubmission)
                <div class="mb-5 mt-10">
                    <label class="block font-bold mb-2">
                        Description
                    </label>
                    <textarea 
                        class="
                            w-full 
                            max-h-[100px] 
                            min-h-[100px] 
                            rounded 
                            bg-gray-200 
                            dark:bg-slate-700 
                            px-2 
                            py-2
                        "
                        readonly
                    >{{ $submitSubmission->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="file">File : </label>
                    Logo file
                </div>
                <div class="flex justify-between mt-10">
                    <a 
                        href="{{ route('mission.show', $submission->mission->slug) }}"
                        class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded text-white"
                    >
                        Kembali
                    </a>
                    <div>
                        <a
                            href=""
                            class="bg-red-500 hover:bg-red-400 px-5 py-3 mr-3 rounded text-white"
                        >
                            Delete Submission
                        </a>
                        <a 
                            href=""
                            class="bg-indigo-500 hover:bg-indigo-400 px-5 py-3 rounded text-white"
                        >
                            Download
                        </a>
                    </div>
                </div>
            @else
                <form 
                    id="upload_submission"
                    action="{{ route('submitsubmission') }}" 
                    class="mt-10" 
                    enctype="multipart/form-data"
                    method="POST"
                >
                    @csrf
                    <input type="text" hidden value="{{ $submission->id }}" name="submission">
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
                            Description
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            required
                            class="
                                w-full 
                                max-h-[100px] 
                                min-h-[100px] 
                                rounded 
                                bg-gray-200 
                                dark:bg-slate-700 
                                px-2 
                                py-2
                                @error('description')
                                    border-2
                                    border-red-500
                                    bg-red-500/10
                                @enderror
                            "
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="file">File : </label>
                        <input type="file" name="file" id="file" required>
                    </div>
                    <div class="flex justify-between mt-10">
                        <a 
                            href="{{ route('mission.show', $submission->mission->slug) }}"
                            class="bg-gray-500 hover:bg-gray-400 px-5 py-2 rounded text-white"
                        >
                            Kembali
                        </a>
                        <div>
                            <button
                                type="reset" 
                                class="bg-red-500 hover:bg-red-400 px-5 py-2 rounded text-white"
                            >
                                Reset
                            </button>
                            <button 
                                type="button"
                                onClick="toggleConfirm()"
                                class="bg-indigo-500 hover:bg-indigo-400 px-5 py-2 rounded text-white"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            @endif
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