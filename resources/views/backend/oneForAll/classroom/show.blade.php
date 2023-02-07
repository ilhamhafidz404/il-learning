@extends('backend.layouts.master')

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
    <div class="bg-white dark:bg-slate-800 col-span-6 shadow-md rounded p-5">
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
                    <th class="py-4 pl-5">#</th>
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
</section>
@endsection