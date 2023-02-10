@extends('backend.admin.master')

@section('content')
    @include('components.confirmModal' , 
        [ 
            'title' => 'Apakah anda yakin?', 
            'subtitle' => 'Data yang sudah terpilih tidak bisa di batalkan lagi.',
            'to' => 'confirmDeleteLecturer'
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
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-semibold text-white flex items-center">
                <span class="bg-white p-2 rounded mr-3">
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10 text-indigo-500']
                    )
                </span>
                {{ $student->user->name }}
            </h1>
            <div>
                <a 
                    href="{{ route('admin.student.index') }}" 
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    Kembali
                </a>
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
                overflow-hidden 
                mt-10
                p-5
                dark:text-gray-200
            "
        >
            <div class="flex gap-10 items-center">
                <div>
                    <img 
                        src="{{ asset('storage/'.$student->profile) }}" 
                        alt="{{ $student->user->username."profile" }}"
                        class="w-[300px] h-[300px] object-cover object-center"
                    >
                </div>
                <div>
                    <h2 class="text-gray-100 text-xl font-semibold">{{ $student->user->name }}</h2>
                    <small>{{ $student->user->email }}</small>
                </div>
            </div>

            <div class="relative">
                <span class="absolute font-bold top-[-13px] pr-5 bg-slate-800">
                    {{ $user->course->count() }} Total Course
                </span>
                <hr class="my-10 border-slate-500">
            </div>

            <table class="w-full dark:text-gray-300 rounded overflow-hidden">
                <tr class=" text-white bg-indigo-500">
                    <th class="py-6">Name</th>
                    <th>Lecturer</th>
                    <th>SKS</th>
                </tr>
                @forelse ($user->course as $index => $course)
                    <tr
                        class="
                            @if ($index%2 == 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7 w-[50%]">
                            <a href="">
                                {{ $course->name }}
                            </a>
                        </td>
                        <td class="text-center">
                            @foreach ($course->lecturer as $lecturer)
                                @foreach ($lecturer->classroom as $classroom)
                                    @if ($classroom->id == $student->classroom_id)
                                        {{ $lecturer->user->name }}
                                    @endif
                                @endforeach
                            @endforeach
                        </td>
                        <td class="text-center">
                            {{ $course->sks }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                No Course Data for This Stundent
                            </h3>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </section>
@endsection