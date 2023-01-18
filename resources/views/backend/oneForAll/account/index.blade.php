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
    "
>
    <div 
        class="
            bg-white 
            dark:bg-slate-800 
            p-5 
            rounded 
            dark:text-white 
            shadow
            flex
            items-center
        "
    >
        <img 
            src="{{ asset('storage/'.$user->profile) }}" 
            alt=""
            class="rounded-full w-[150px] h-[150px] object-cover mr-10"
        >
        <div>
            <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
            <small class="text-gray-300 text-base">20220810052</small>
        </div>
    </div>
    <section class="grid grid-cols-3 gap-5 mt-10">
        <a 
            href=""
            class="bg-[#2441e7] p-5 rounded text-white relative flex items-center min-h-[120px] overflow-hidden"
        >
            <div class="w-1/3">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-40 h-40 absolute top-0 -left-[40px]"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                    />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold">See My Account</h3>
                <p class="text-sm">Detail About Me</p>
            </div>
        </a>

        <a 
            href=""
            class="bg-[#ff1053] p-5 rounded text-white relative flex items-center min-h-[120px] overflow-hidden"
        >
            <div class="w-1/3">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-40 h-40 absolute top-0 -left-[40px]"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                    />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold">Manage Auth</h3>
                <p class="text-sm">Change account information</p>
            </div>
        </a>

        <a 
            href=""
            class="bg-[#00a78e] p-5 rounded text-white relative flex items-center min-h-[120px] overflow-hidden"
        >
            <div class="w-1/3">
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-40 h-40 absolute top-0 -left-[40px]"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M21 7.5l-2.25-1.313M21 7.5v2.25m0-2.25l-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3l2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75l2.25-1.313M12 21.75V19.5m0 2.25l-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" 
                    />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold">Account Setting</h3>
                <p class="text-sm">Manage Your Account</p>
            </div>
        </a>
    </section>

    <section 
        class="p-5 mt-10 bg-white dark:bg-slate-800 shadow-md rounded text-right"
    >
        @if (count($acceptCourse) > 0)
            <h3 
                class="
                    text-left
                    font-semibold
                    text-xl
                    mb-4
                    tracking-wide
                    dark:text-emerald-500
                "
            >
                Mata Kuliah Saya
            </h3>
            <div class="overflow-auto pb-5 md:pb-0">
                <table class="w-[800px] md:w-full text-left">
                    <tr class="text-white bg-emerald-500">
                        <th class="py-4 pl-5">Course</th>
                        <th class="py-4 pl-5">SKS</th>
                        <th>Lecturer</th>
                    </tr>
                    @foreach ($acceptCourse as $index => $course)
                        <tr
                            class="
                                dark:text-white
                                @if ($index%2 > 0)
                                    bg-gray-100 dark:bg-slate-700
                                @endif
                            "
                        >
                            <td class="py-2 pl-5">{{ $course->name }}</td>
                            <td>{{ $course->sks }}</td>
                            <td>
                                @foreach ($course->Lecturer as $lecturer)
                                    {{ $lecturer->name }}
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="text-center col-span-2 py-10">
                <h2 class="text-8xl">☹️</h2>
                <h5 
                class="
                text-3xl 
                mt-5 
                tracking-wide
                dark:text-white
                "
                >
                    Kamu Belum Mengisi SKS,
                    <a href="{{ route('acceptsks.index') }}" class="text-indigo-500">isi SKS?</a>
                </h5>
            </div>
        @endif
    </section>
</section>
@endsection