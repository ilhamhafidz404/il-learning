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
        <h1 class="font-bold text-4xl uppercase mb-2 mt-20">{{ $course->name }}</h1>
        @foreach ($course->lecturer as $lecturer)
            <span>{{ $lecturer->name }}</span>
        @endforeach
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
      <form action="{{ route('submission.store') }}" class="z-50" method="POST">
        @csrf
        <input type="number" name="course" value="{{ $course->id }}" hidden>
        <input type="number" name="lecturer" value="{{ $lecturer->id }}" hidden>
        
        <div>
            <label for="">Judul Tugas</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Keterangan Tugas</label>
            <textarea name="subtitle" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">Kelas</label>
            <select name="classroom" id="">
                <option value="">Pilih Kelas</option>
                @foreach ($lecturer->classroom as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="">Deadline Tugas</label>
            <input type="date" name="deadline">
        </div>
        <button >Submit</button>
      </form>
    </div>
</section>