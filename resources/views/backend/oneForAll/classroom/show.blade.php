@extends('backend.layouts.master')
@section('title')
    {{ $classroom->name }}
@endsection
@section('content')
    <section 
    class="
        py-16 
        px-5
        md:py-28 
        col-span-5 
        lg:col-span-4 
        lg:pr-[70px]
        grid 
        grid-cols-1
        sm:grid-cols-2
        md:grid-cols-3
        gap-5
    "
>
    <div class="bg-white dark:bg-slate-800 col-span-6 p-5 overflow-auto rounded-lg shadow hidden md:block">
        <h2 
            class="
                text-3xl 
                font-semibold 
                dark:text-indigo-500
                m-5
                text-indigo-500
            "
        >
            Classmate
            {{ $classroom->name }}
        </h2>
        <div class="overflow-auto pb-5 md:pb-0">
            <table class="w-[800px] md:w-full text-left">
                <tr class="text-white bg-indigo-500">
                    <th class="py-4 pl-5">No.</th>
                    <th class="py-4 pl-5">Student</th>
                </tr>
                @forelse ($classroom->student as $index => $student)
                    <tr
                        class="
                            dark:text-white
                            @if ($index%2 >= 1)
                                bg-gray-100 dark:bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-3 pl-3">
                            {{ $index+1 }}
                        </td>
                        <td class="py-3">
                            {{ $student->user->name }}
                        </td>
                    </tr>
                @empty
                    <tr class="dark:text-white">
                        <td colspan="4">
                            <span class="text-center">
                                <h4 class="text-7xl mt-10">☹️</h4>
                                <h3 class="text-2xl mt-5 mb-10 dark:text-indigo-500">
                                    Belum ada mahasiswa di Kelas 
                                    <span class="font-semibold text-indigo-500">{{ $classroom->name }}</span>
                                </h3>
                            </span>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    
    @foreach ($classroom->student as $index => $student)
        <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow text-white md:hidden">
            <h2 
            class="
                text-xl 
                font-semibold 
                dark:text-indigo-500
                p-3
                text-indigo-500
            "
        >
            Classmate
            {{ $classroom->name }}
        </h2>
            <div class="flex items-center space-x-2 text-sm">
                <div class="m-3"><span class="text-indigo-500 font-semibold">Student</span>: {{ $student->user->name }}</div>
            </div>
        </div>
    @endforeach
</section>
@endsection