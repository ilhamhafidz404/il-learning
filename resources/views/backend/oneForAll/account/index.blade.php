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
            src="{{ asset('storage/'.$student->profile) }}" 
            alt=""
            class="rounded-full w-[150px] h-[150px] object-cover mr-10"
        >
        <div>
            <h2 class="uppercase text-2xl font-semibold">{{ Auth::user()->name }}</h2>
            <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>
        </div>
    </div>
    <section class="grid grid-cols-3 gap-5 mt-10">
        <a 
            href="{{ route('profile.show', Auth::user()->username) }}"
            class="bg-[#2441e7] p-5 rounded text-white relative flex items-center min-h-[120px] overflow-hidden"
        >
            <div class="w-1/3">
                @include(
                    'components.icons.userCircle-solid-icon',
                    ['class' => 'w-40 h-40 absolute top-0 -left-[40px]']
                )
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
                
                @include(
                    'components.icons.key-solid-icon',
                    ['class' => 'w-36 absolute top-0 -left-[20px] rotate-[110deg]']
                )
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
                @include(
                    'components.icons.cog-solid-icon',
                    ['class' => 'w-40 h-40 absolute top-0 -left-[40px]']
                )
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