@extends('backend.admin.master')
@section('title', $student->user->name)
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
        <div class="flex-row md:flex items-center justify-between">
            <h1 class="text-4xl font-semibold text-white md:flex items-center">
                <span class="bg-white p-2 rounded mr-3 inline-block">
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10 text-indigo-500']
                    )
                </span>
                <br>
                {{ $student->user->name }}
            </h1>
            <div class="md:mt-0 mt-10">
                <a 
                    href="{{ route('admin.student.index') }}" 
                    class="bg-white hover:bg-white/80 text-indigo-500 px-5 py-3 rounded font-semibold"
                >
                    Go Back
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
            <div class="flex-row md:flex gap-10 items-center md:text-left text-center">
                <div>
                    <img 
                        src="{{ asset('storage/'.$student->profile) }}" 
                        alt="{{ $student->user->username."profile" }}"
                        class="w-[300px] h-[300px] object-cover object-center md:mx-0 mx-auto"
                    >
                </div>
                <div class="md:mt-0 mt-10">
                    <h2 class="dark:text-gray-100 text-gray-800 text-xl font-semibold">
                        {{ $student->user->name }}
                    </h2>
                    <small class="text-gray-500 dark:text-gray-200">{{ $student->user->email }}</small>
                </div>
            </div>

            <div class="relative">
                <span class="absolute font-bold top-[-13px] pr-5 dark:bg-slate-800 bg-white">
                    {{ $user->course->count() }} Total Course
                </span>
                <hr class="my-10 border-slate-500">
            </div>

            <div class="overflow-auto">
                <div>
                    <table class="w-full dark:text-gray-300 rounded overflow-hidden">
                        <tr class=" text-white bg-indigo-500">
                            <th class="py-6 min-w-[350px]">Name</th>
                            <th class="min-w-[300px]">Lecturer</th>
                            <th class="min-w-[100px]">SKS</th>
                        </tr>
                        @forelse ($user->course as $index => $course)
                            <tr
                                class="
                                    @if ($index%2 == 0)
                                        dark:bg-slate-700
                                        bg-gray-200
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
            </div>
        </div>
    </section>
@endsection