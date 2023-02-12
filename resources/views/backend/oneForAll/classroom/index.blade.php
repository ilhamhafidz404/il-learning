@extends('backend.layouts.master')
@section('title')
    Classroom
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
            Classroom
        </h2>
        <div class="overflow-auto pb-5 md:pb-0">
            <table class="w-[800px] md:w-full text-left">
                <tr class="text-white bg-indigo-500">
                    <th class="py-4 pl-5">#</th>
                    <th class="py-4 pl-5">Classroom</th>
                    <th>Mentor</th>
                    <th>Student Count</th>
                </tr>
                @forelse ($classrooms as $index => $classroom)
                    <tr
                        class="
                            dark:text-white
                            @if ($index%2 >= 1)
                                bg-gray-100 dark:bg-slate-700
                            @endif
                        "
                    >
                        <td class="pl-5">
                            {{ $index+1 }}
                        </td>
                        <td class="py-3">
                            <a 
                                href="{{ route('classroom.show', $classroom->slug) }}"
                                class="cursor-pointer ml-3"
                            >
                                {{ $classroom->name }}
                            </a>
                        </td>
                        <td>
                            {{ $classroom->mentor }}
                        </td>
                        <td>
                            {{ $classroom->student->count() }}
                        </td>
                    </tr>
                @empty
                    <tr class="dark:text-white">
                        <td colspan="4">
                            <span class="text-center">
                                <h4 class="text-7xl mt-10">🤩</h4>
                                <h3 class="text-2xl mt-5 mb-10 dark:text-indigo-500">
                                    Anda sudah mengambil semua mata Kuliah
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