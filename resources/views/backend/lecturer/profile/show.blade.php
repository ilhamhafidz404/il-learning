@extends('backend.layouts.master')
@section('title')
    {{ $user->user->name }}
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
            <div class="mr-10 lg:mb-0 mb-10">
                <div class="flex items-center">
                    <div>
                        <img 
                            src="{{ asset('storage/'.$user->profile) }}" 
                            alt=""
                            class="w-[250px] h-[250px] object-cover rounded"
                        >
                        <form
                            id="changePhoto" 
                            action="{{ route('profile.update', $user->id) }}" 
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

                    <div class="ml-5">
                        <h2 class="uppercase text-2xl font-semibold">{{ $user->user->name }}</h2>
                        <small class="text-gray-800 dark:text-gray-300 text-base">{{ $user->nip }}</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section 
        id="myCourse"
        class="p-5 mt-10 bg-white dark:bg-slate-800 shadow-md rounded text-right"
    >
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
            Courses
        </h3>
        <div class="overflow-auto pb-5 md:pb-0">
            <table class="w-[800px] md:w-full text-left">
                <tr class="text-white bg-emerald-500">
                    <th class="py-4 pl-5">Course</th>
                    <th class="py-4 pl-5">SKS</th>
                </tr>
                @foreach ($user->course as $index => $course)
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
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
</section>
@endsection

@section('script')
    <script>
        const changePhoto= document.querySelector('#changePhoto');

        document.querySelector('#profile').addEventListener('change', function () {
            changePhoto.submit()
        })
    </script>
@endsection