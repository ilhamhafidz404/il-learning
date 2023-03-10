@extends('backend.layouts.master')
@section('title')
    {{ $student->user->name }}
@endsection
@section('content')

@include('components.toast')

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
            text-gray-800
            dark:text-white 
            shadow 
            relative
        "
    >
        <div class="lg:flex items-center">
            <button 
                type="button"
                id="toEditButton"
                class="
                    absolute 
                    top-0 
                    right-0 
                    text-sm 
                    bg-indigo-500 
                    hover:bg-indigo-400 
                    px-4 
                    py-2 
                    rounded
                    m-4
                    flex 
                    items-center
                    text-white
                "
                onclick="toggleEdit()"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" 
                    viewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-6 h-6 md:mr-3"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" 
                    />
                </svg>
                <span class="md:inline hidden">
                    Edit my Profile
                </span>
            </button>

            <button 
                type="button"
                id="closeEditButton"
                class="
                    absolute 
                    top-0 
                    right-0 
                    text-sm 
                    bg-red-500 
                    hover:bg-red-400 
                    px-4 
                    py-2 
                    rounded
                    m-4
                    flex 
                    items-center
                    hidden
                    text-white
                "
                onclick="toggleEdit()"
            >
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    fill="none" v
                    iewBox="0 0 24 24" 
                    stroke-width="1.5" 
                    stroke="currentColor" 
                    class="w-6 h-6 md:mr-3"
                >
                    <path 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        d="M6 18L18 6M6 6l12 12" 
                    />
                </svg>
                <span class="md:inline hidden">
                    Close Edit
                </span>
            </button>
            
            <div class="mr-10 lg:mb-0 mb-10">
                <div class="flex items-center">
                    <img 
                        src="{{ asset('storage/'.$student->profile) }}" 
                        alt=""
                        class="w-[250px] h-[250px] object-cover rounded"
                    >

                    <div class="ml-5 lg:hidden md:block hidden">
                        <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
                        <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>

                        @if ($student->about)
                            <p class="text-sm mt-5 text-gray-800 dark:text-gray-300">{{ $student->about }}</p>
                        @else
                            <i class="text-gray-800 dark:text-gray-300 block mt-5">no About information</i>
                        @endif
                    </div>
                </div>

                <form
                    id="changePhoto" 
                    class="hidden"
                    action="{{ route('profile.update', $student->id) }}" 
                    method="POST" 
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <label 
                        for="profile"
                        class="
                            w-full
                            text-sm 
                            bg-indigo-500 
                            hover:bg-indigo-400 
                            px-4 
                            py-2 
                            rounded
                            mt-4
                            flex 
                            items-center
                            justify-center
                            text-white
                            lg:w-auto
                            w-[250px]
                        "
                    >
                        <svg 
                            xmlns="http://www.w3.org/2000/svg" 
                            fill="none" 
                            viewBox="0 0 24 24" 
                            stroke-width="1.5" 
                            stroke="currentColor" 
                            class="w-6 h-6 mr-3"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" 
                            />
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" 
                            />
                        </svg>
                        Change Photo
                    </label>
                    <input 
                        type="file" 
                        id="profile" 
                        name="profile" 
                        class="hidden" 
                        accept="image/png, image/gif, image/jpeg"
                    >
                </form>

            </div>
            <form 
                action="{{ route('profile.update', $student->id) }}" 
                method="POST" 
                class="w-full"
                id="editFrofileForm"
            >
                @csrf
                @method('PUT')

                <div id="cardProfile" class="lg:flex justify-between gap-5 items-end w-full">
                    <div id="show" class="lg:w-[60%] w-full">
                        <div class="lg:block md:hidden block">
                            <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
                            <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>
            
                            @if ($student->about)
                                <p class="text-sm mt-5 text-gray-800 dark:text-gray-300">{{ $student->about }}</p>
                            @else
                                <i class="text-gray-800 dark:text-gray-300 block mt-5">no About information</i>
                            @endif
                        </div>
        
                        <div class="md:flex mt-10 gap-10">
                            <div>
                                <h4 class="font-semibold flex items-center mb-2">
                                    @include(
                                        'components.icons.email-regular-icon', 
                                        ['class' => 'w-6 mr-3']
                                    )
                                    {{ $user->email }}
                                </h4>

                                @if ($student->phone)
                                    <h4 class="font-semibold flex items-center mb-2">
                                        @include(
                                            'components.icons.phone-regular-icon', 
                                            ['class' => 'w-6 mr-3']
                                        )
                                        {{ $student->phone }}
                                    </h4>
                                @else
                                    <i 
                                        class="
                                            text-gray-800 
                                            dark:text-gray-300 
                                            md:inline
                                            block 
                                            mb-2
                                        "
                                    >no phone number information</i>
                                @endif
                            </div>
                            <div>
                                @if ($student->birthday)
                                    <h4 class="font-semibold mb-2 flex items-center mb-2">
                                        @include(
                                            'components.icons.cake-regular-icon', 
                                            ['class' => 'w-6 mr-3']
                                        )
                                        {{ $student->birthday }}
                                    </h4>
                                @else
                                    <i 
                                        class="
                                            text-gray-800 
                                            dark:text-gray-300 
                                            md:inline
                                            block 
                                            mb-2
                                        "
                                    >no birthday information</i>
                                @endif
        
                                @if ($student->address)
                                    <h4 class="font-semibold flex items-center">
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg" 
                                            fill="none" 
                                            viewBox="0 0 24 24" 
                                            stroke-width="1.5" 
                                            stroke="currentColor" 
                                            class="w-6 h-6 mr-3"
                                        >
                                            <path 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round" 
                                                d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" 
                                            />
                                        </svg>
                                        {{ $student->address }}
                                    </h4>
                                @else
                                    <i class="text-gray-800 dark:text-gray-300 block">no address information</i>
                                @endif
                            </div>
                        </div>
                    </div>
        
                    <div id="edit" class="lg:w-[60%] hidden">
                        <div class="lg:block hidden">
                            <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
                            <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>
                        </div>
        
                        <div class="flex mt-10 gap-10">
                            <div class="md:w-auto w-full">
                                <div class="lg:block grid md:grid-cols-2 md:gap-5">
                                    <div class="relative mb-3">
                                        <input 
                                            name="phone"
                                            type="number" 
                                            value="{{ $student->phone }}"
                                            class="dark:bg-slate-700 bg-gray-200 pr-4 py-2 rounded pl-12 w-full"
                                            placeholder="Phone Number"
                                        >
                                        <span 
                                            class="
                                                absolute 
                                                bg-indigo-500/90
                                                h-full 
                                                left-0 
                                                rounded-l 
                                                flex 
                                                items-center 
                                                justify-center
                                                top-0
                                                px-2
                                            "
                                        >
                                            @include(
                                                'components.icons.phone-regular-icon', 
                                                ['class' => 'w-6 text-white']
                                            )
                                        </span>
                                    </div>
                                    
                                    <div class="relative mb-3">
                                        <input 
                                            name="birthday"
                                            type="date" 
                                            value="{{ $student->birthday }}"
                                            class="
                                                dark:bg-slate-700 
                                                bg-gray-200 
                                                pr-4 
                                                py-2 
                                                rounded 
                                                pl-12 
                                                w-full 
                                                text-gray-800
                                                dark:text-gray-100
                                            "
                                        >
                                        <span 
                                            class="
                                                absolute 
                                                bg-indigo-500/90
                                                h-full 
                                                left-0 
                                                rounded-l 
                                                flex 
                                                items-center 
                                                justify-center
                                                top-0
                                                px-2
                                            "
                                        >
                                            @include(
                                                'components.icons.cake-regular-icon', 
                                                ['class' => 'w-6 text-white']
                                            )
                                        </span>
                                    </div>
                                </div>
            
                                <div class="relative mb-3">
                                    <input 
                                        name="address"
                                        type="text" 
                                        value="{{ $student->address }}"
                                        class="dark:bg-slate-700 bg-gray-200 pr-4 py-2 rounded pl-12 w-full"
                                        placeholder="Address"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            bg-indigo-500/90
                                            h-full 
                                            left-0 
                                            rounded-l 
                                            flex 
                                            items-center 
                                            justify-center
                                            top-0
                                            px-2
                                        "
                                    >
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg" 
                                            fill="none" 
                                            viewBox="0 0 24 24" 
                                            stroke-width="1.5" 
                                            stroke="currentColor" 
                                            class="w-6 text-white"
                                        >
                                            <path 
                                                stroke-linecap="round" 
                                                stroke-linejoin="round" 
                                                d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" 
                                            />
                                        </svg>
                                    </span>
                                </div>
        
                                <textarea 
                                    name="about" 
                                    class="
                                        dark:bg-slate-700 
                                        bg-gray-200
                                        px-4 
                                        py-2 
                                        rounded 
                                        mb-3 
                                        max-h-[150px] 
                                        min-h-[150px]
                                        w-full
                                    " 
                                    placeholder="About"
                                ></textarea>
                            </div>
                        </div>
                    </div>
        
                    <div class="lg:w-[40%] w-full gap-10 lg:mt-0 mt-10 lg:block md:flex block">
                        <div id="classroom">
                            <h6 class="font-bold">CLASSROOM</h6>

                            <span class="flex items-center mt-2">
                                <span class="bg-indigo-500 inline-block rounded p-1 mr-2 text-white">
                                    @include(
                                        'components.icons.userCircle-solid-icon',
                                        ['class' => 'w-8']
                                    )
                                </span>
                                <h5 class="white-nowrap text-sm">{{ $student->classroom->name }}</h5>
                            </span>
                        </div>

                        <div>
                            <h6 class="font-bold lg:mt-7 md:mt-0 mt-7">SOCIAL MEDIA</h6>

                            <div id="editSocialMedia" class="hidden mt-3 grid-cols-2 gap-5">
                                
                                <div class="relative mb-3">
                                    <input 
                                        name="instagram"
                                        type="text" 
                                        value="{{ $student->instagram }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Instagram"
                                    >
                                    <span 
                                        class="absolute top-0 left-0 h-full px-2 flex items-center rounded-l"
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
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>

                                <div class="relative mb-3">
                                    <input 
                                        name="facebook"
                                        type="text" 
                                        value="{{ $student->facebook }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Facebook"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            top-0 
                                            left-0 
                                            h-full 
                                            px-2 
                                            flex 
                                            items-center 
                                            rounded-l 
                                            bg-[#1773ea]
                                        "
                                    >
                                        <img 
                                            src="{{ asset('images/icon/facebook.png') }}" 
                                            alt="facebook logo" 
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>

                                <div class="relative mb-3">
                                    <input 
                                        name="twitter"
                                        type="text" 
                                        value="{{ $student->twitter }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Twitter"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            top-0 
                                            left-0 
                                            h-full 
                                            px-2 
                                            flex 
                                            items-center 
                                            rounded-l 
                                            bg-[#1c9cea] 
                                        "
                                    >
                                        <img 
                                            src="{{ asset('images/icon/twitter.png') }}" 
                                            alt="twitter logo" 
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>

                                <div class="relative mb-3">
                                    <input 
                                        name="tiktok"
                                        type="text" 
                                        value="{{ $student->tiktok }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Tiktok"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            top-0 
                                            left-0 
                                            h-full 
                                            px-2 
                                            flex 
                                            items-center 
                                            rounded-l 
                                            bg-[#010101] 
                                        "
                                    >
                                        <img 
                                            src="{{ asset('images/icon/tiktok.png') }}" 
                                            alt="tiktok logo" 
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>
                                
                                <div class="relative mb-3">
                                    <input 
                                        name="youtube"
                                        type="text" 
                                        value="{{ $student->youtube }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Youtube"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            top-0 
                                            left-0 
                                            h-full 
                                            px-2 
                                            flex 
                                            items-center 
                                            rounded-l 
                                            bg-[#ff0000] 
                                        "
                                    >
                                        <img 
                                            src="{{ asset('images/icon/youtube.png') }}" 
                                            alt="youtube logo" 
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>
                                
                                <div class="relative mb-3">
                                    <input 
                                        name="github"
                                        type="text" 
                                        value="{{ $student->github }}"
                                        class="dark:bg-slate-700 bg-gray-200 px-4 py-2 rounded lg:w-auto w-full pl-12"
                                        placeholder="Github"
                                    >
                                    <span 
                                        class="
                                            absolute 
                                            top-0 
                                            left-0 
                                            h-full 
                                            px-2 
                                            flex 
                                            items-center 
                                            rounded-l 
                                            bg-[#201c1f] 
                                        "
                                    >
                                        <img 
                                            src="{{ asset('images/icon/github.png') }}" 
                                            alt="github logo" 
                                            class="w-[25px]"
                                        >
                                    </span>
                                </div>
                            </div>

                            <div id="showSocialMedia">
                                @if (
                                    !$student->facebook && 
                                    !$student->twitter && 
                                    !$student->instagram && 
                                    !$student->tiktok && 
                                    !$student->youtube && 
                                    !$student->github
                                )
                                    <i class="text-gray-800 dark:text-gray-300 block" id="showSocialMedia">no Social Media information</i>
                                @else
                                    <span class="flex items-center mt-2">
                                        @if ($student->facebook)
                                            <a 
                                                href="https://www.facebook.com/{{ $student->facebook }}"
                                                target="_blank"
                                                class="
                                                    bg-[#1773ea] 
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                "
                                            >
                                                <img 
                                                    src="{{ asset('images/icon/facebook.png') }}" 
                                                    alt="youtube logo" 
                                                    class="w-full"
                                                >
                                            </a>
                                        @endif
                
                                        @if ($student->twitter)
                                            <a 
                                                href="https://twitter.com/{{ $student->twitter }}"
                                                target="_blank"
                                                class="
                                                    bg-[#1c9cea] 
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                "
                                            >
                                                <img 
                                                    src="{{ asset('images/icon/twitter.png') }}" 
                                                    alt="youtube logo" 
                                                    class="w-full"
                                                >
                                            </a>
                                        @endif
                                        
                                        @if ($student->youtube)
                                            <a 
                                                href="https://youtube.com/{{ $student->youtube }}"
                                                target="_blank"
                                                class="
                                                    bg-[#ff0000] 
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                "
                                            >
                                                <img 
                                                    src="{{ asset('images/icon/youtube.png') }}" 
                                                    alt="youtube logo" 
                                                    class="w-full"
                                                >
                                            </a>
                                        @endif
                
                                        @if ($student->instagram)    
                                            <a 
                                                href="https://www.instagram.com/{{ $student->instagram }}"
                                                target="_blank"
                                                class="
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                " 
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
                                        
                                        @if ($student->tiktok)
                                            <a 
                                                href="https://www.tiktok.com/@{{ $student->tiktok }}"
                                                target="_blank"
                                                class="
                                                    bg-[#010101] 
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                "
                                            >
                                                <img 
                                                    src="{{ asset('images/icon/tiktok.png') }}" 
                                                    alt="tiktok logo" 
                                                    class="w-full"
                                                >
                                            </a>
                                        @endif
                                        
                                        @if ($student->github)
                                            <a 
                                                href="https://github.com/{{ $student->github }}"
                                                target="_blank"
                                                class="
                                                    bg-[#201c1f] 
                                                    flex 
                                                    items-center 
                                                    rounded 
                                                    p-2 
                                                    mr-2 
                                                    w-[40px] 
                                                    h-[40px] 
                                                    justify-center
                                                "
                                            >
                                                <img 
                                                    src="{{ asset('images/icon/github.png') }}" 
                                                    alt="tiktok logo" 
                                                    class="w-full"
                                                >
                                            </a>
                                        @endif
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div 
            class="flex justify-end mt-5 w-full hidden" 
            id="buttonSubmitEdit" 
            onclick="
                document.querySelector('#editFrofileForm').submit()
            "
        >
            <button 
                type="reset"
                class="
                    flex 
                    items-center 
                    mt-3 
                    bg-red-500 
                    hover:bg-red-400 
                    px-4 
                    py-2 
                    rounded
                    mr-3
                    text-white
                "
            >
                Reset
            </button>
            <button 
                type="submit"
                class="
                    flex 
                    items-center 
                    mt-3 
                    bg-indigo-500 
                    hover:bg-indigo-400 
                    px-4 
                    py-2 
                    rounded
                    text-white
                "
            >
                Submit
            </button>
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

@section('script')
    <script>
        const changePhoto= document.querySelector('#changePhoto');
        const toggleEdit= ()=>{
            const showSection= document.querySelector('#show');
            const editSection= document.querySelector('#edit');
            const cardProfile= document.querySelector('#cardProfile');
            const showSocialMedia= document.querySelector('#showSocialMedia');
            const editSocialMedia= document.querySelector('#editSocialMedia');
            const toEditButton= document.querySelector('#toEditButton');
            
            document.querySelector('#closeEditButton').classList.toggle('hidden');
            document.querySelector('#classroom').classList.toggle('hidden');
            document.querySelector('#buttonSubmitEdit').classList.toggle('hidden');


            showSection.classList.toggle('hidden');
            editSection.classList.toggle('hidden');
            cardProfile.classList.toggle('items-end');
            cardProfile.classList.toggle('items-center');
            showSocialMedia.classList.toggle('hidden');

            editSocialMedia.classList.toggle('hidden');
            editSocialMedia.classList.toggle('md:grid');
            editSocialMedia.classList.toggle('lg:block');
            toEditButton.classList.toggle('hidden');
            changePhoto.classList.toggle('hidden');
        }

        document.querySelector('#profile').addEventListener('change', function () {
            changePhoto.submit()
        })

        const hideNoty= ()=>{
            const noty = document.getElementById('noty')
            noty.classList.toggle('flex');
            noty.classList.toggle('hidden');
        }

    </script>
@endsection