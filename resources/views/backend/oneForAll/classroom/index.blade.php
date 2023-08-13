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
            Classroom
        </h2>
        <div class="overflow-auto pb-5 md:pb-0">
            <table class="w-[800px] md:w-full text-left">
                <tr class="text-white bg-indigo-500">
                    <th class="py-4 pl-5">No.</th>
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
                        <td class="pl-5 whitespace-nowrap">
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
                        <td class="whitespace-nowrap">
                            {{ $classroom->mentor }}
                        </td>
                        <td class="whitespace-nowrap">
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

    {{-- responsive di mobile --}}

    @foreach ($classrooms as $index => $classroom)
        <div class="bg-white dark:bg-slate-800 p-4 rounded-lg shadow text-white md:hidden">
            <div class="flex items-center space-x-2 text-sm">
                    <div class="underline underline-offset-4 decoration-2 decoration-indigo-500">
                        <a 
                                        href="{{ route('classroom.show', $classroom->slug) }}"
                                    >
                                    {{ $classroom->name }}
                                    </a>
                            </div>
                            <div>{{ $classroom->mentor }}</div>
                            <div>{{ $classroom->student->count() }}</div>
            </div>
        </div>
    @endforeach
</section>
@endsection