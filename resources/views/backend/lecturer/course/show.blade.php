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
        {{-- @foreach ($course->lecturer as $lecturer)
            <span>{{ $lecturer->name }}</span>
        @endforeach --}}
        <a 
            href="{{ route('dashboard') }}" 
            class="text-white absolute bottom-[150px] z-50 left-0"
        >Kembali</a>
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
            z-50
            relative
        "
    >
        @forelse ($course->submission as $index => $submission)
            @if ($submission->classroom->id == Auth::user()->classroom->id)
                <a href="{{ route('submission.show', $submission->slug) }}">
                    <div 
                        class="
                            bg-white 
                            dark:bg-slate-600
                            p-5 
                            rounded 
                            shadow
                            dark:text-gray-200
                            @if ($index+1 == count($course->submission) && $index+1%2 > 0)
                            col-span-2
                            @endif
                        "
                    >
                        <h3 class="font-bold">{{ $submission->name}}</h3>
                        <small>{{ $submission->deadline }}</small>
                        <br>
                        <small>Untuk <b>{{ $submission->classroom->name }}</b></small>
                    </div>
                </a>
            @endif
        @empty
            <div class="text-center col-span-2 py-10">
                <h2 class="text-8xl">😁</h2>
                <h5 
                    class="
                        text-3xl 
                        mt-5 
                        tracking-wide
                        dark:text-white
                    "
                >Belum ada tugas untukmu</h5>
            </div>
        @endforelse
    </div>
</section>