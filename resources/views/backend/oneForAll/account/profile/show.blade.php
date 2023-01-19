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
            class="w-[250px] h-[250px] object-cover mr-10 rounded"
        >
        <div class="flex justify-between gap-5 items-end">
            <div class="w-[60%]">
                <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
                <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>
                <p class="text-sm mt-5 text-gray-800 dark:text-gray-300">{{ $user->about }}</p>
                <div class="flex mt-10 gap-10">
                    <div>
                        <h4 class="font-semibold mb-2">{{ $user->email }}</h4>
                        @if ($user->phone)
                            <h4 class="font-semibold">{{ $user->phone }}</h4>
                        @else
                            <i class="text-gray-800 dark:text-gray-300">no phone number information</i>
                        @endif
                    </div>
                    <div>
                        @if ($user->birthday)
                            <h4 class="font-semibold mb-2">{{ $user->birthday }}</h4>
                        @else
                            <i class="text-gray-800 dark:text-gray-300">no birtday information</i>
                        @endif

                        @if ($user->address)
                            <h4 class="font-semibold">{{ $user->address }}</h4>
                        @else
                            <i class="text-gray-800 dark:text-gray-300">no address information</i>
                        @endif
                    </div>
                </div>
            </div>

            <div class="w-[40%]">
                <h6 class="font-bold">CLASSROOM</h6>
                <span class="flex items-center mt-2">
                    <span class="bg-indigo-500 inline-block rounded p-1 mr-2 text-white">
                        @include(
                            'components.icons.userCircle-solid-icon',
                            ['class' => 'w-8']
                        )
                    </span>
                    <h5 class="white-nowrap text-sm">{{ $user->classroom->name }}</h5>
                </span>
                <h6 class="font-bold mt-7">SOCIAL MEDIA</h6>
                @if (
                    !$user->facebook && 
                    !$user->twitter && 
                    !$user->instagram && 
                    !$user->tiktok && 
                    !$user->youtube && 
                    !$user->github
                )
                    <i class="text-gray-300">no social media information</i>
                @else
                    <span class="flex items-center mt-2">
                        @if ($user->facebook)
                            <a class="bg-[#1773ea] inline-block rounded p-1 mr-2">
                                <img 
                                    src="{{ asset('images/icon/facebook.png') }}" 
                                    alt="facebook logo" 
                                    class="w-[30px]"
                                >
                            </a>
                        @endif

                        @if ($user->twitter)
                            <a class="bg-[#1c9cea] inline-block rounded p-1 mr-2">
                                <img 
                                    src="{{ asset('images/icon/twitter.png') }}" 
                                    alt="twitter logo" 
                                    class="w-[30px]"
                                >
                            </a>
                        @endif

                        @if ($user->instagram)    
                            <a 
                                class="inline-block rounded p-1 mr-2" 
                                style="
                                    background: linear-gradient(
                                        45deg, 
                                        #f09433 0%, 
                                        #e6683c 25%, 
                                        #dc2743 50%, 
                                        #cc2366 75%, 
                                        #bc1888 100%
                                    );
                                "
                            >
                                <img 
                                    src="{{ asset('images/icon/instagram.png') }}" 
                                    alt="instagram logo" 
                                    class="w-[30px]"
                                >
                            </a>
                        @endif
                        
                        @if ($user->tiktok)
                            <a 
                                class="bg-[#010101] inline-block rounded p-1 mr-2" 
                            >
                                <img 
                                    src="{{ asset('images/icon/tik-tok.png') }}" 
                                    alt="tiktok logo" 
                                    class="w-[30px]"
                                >
                            </a>
                        @endif
                    </span>
                @endif
            </div>
        </div>
    </div>

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