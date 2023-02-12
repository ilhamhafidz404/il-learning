@extends('backend.layouts.master')
@section('title')
    Reset Password
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
    "
>
    <div class="bg-white dark:bg-slate-800 dark:text-gray-100 p-5 rounded shadow">

        <h1 class="text-3xl text-indigo-500 font-bold mb-7">RESET PASSWORD</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-5">
                <label for="email" class="font-semibold block">Email Address:</label>
                <input 
                    id="email" 
                    type="email" 
                    class="
                        bg-gray-100
                        dark:bg-slate-600
                        dark:border-slate-500
                        py-2
                        px-5
                        rounded
                        border
                        md:w-auto
                        w-full
                        @error('email') 
                            border-red-500 
                            bg-red-100 
                            dark:border-red-500 
                            dark:bg-red-100 
                            text-gray-800
                        @enderror
                    " 
                    name="email" 
                    value="{{ $email ?? old('email') }}"
                    required 
                    autocomplete="email" 
                    autofocus
                >
                @error('email')
                    <span class="text-red-500 block" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </div>
            
            <div class="mb-5">
                <label for="password" class="font-semibold block">Password:</label>
                <input 
                    id="password" 
                    type="password" 
                    class="
                        bg-gray-100
                        dark:bg-slate-600
                        dark:border-slate-500
                        py-2
                        px-5
                        rounded
                        border
                        md:w-auto
                        w-full
                        @error('password') 
                            border-red-500 
                            bg-red-100 
                            dark:border-red-500 
                            dark:bg-red-100 
                            text-gray-800
                        @enderror
                    " 
                    name="password" 
                    required 
                    autofocus
                >
            </div>
            
            <div class="mb-5">
                <label for="password-confirm" class="font-semibold block">Confirm Password:</label>
                <input 
                    id="password-confirm" 
                    type="password" 
                    class="
                        bg-gray-100
                        dark:bg-slate-600
                        dark:border-slate-500
                        py-2
                        px-5
                        rounded
                        border
                        md:w-auto
                        w-full
                        @error('password') 
                            border-red-500 
                            bg-red-100 
                            dark:border-red-500 
                            dark:bg-red-100 
                            text-gray-800
                        @enderror
                    " 
                    name="password_confirmation" 
                    required 
                    autofocus
                >
                @error('password')
                    <span class="text-red-500 block" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </div>

            <div class="flex md:flex-row flex-col-reverse md:mt-7 mt-10 md:gap-5 gap-2">
                <a 
                    href="{{ route('myaccount') }}" 
                    class="
                        bg-red-500 
                        px-5 
                        py-2 
                        rounded 
                        hover:bg-red-400 
                        text-white
                        inline-block
                        text-center
                    "
                >

                    Kembali
                </a>
                <button 
                    type="submit" 
                    class="
                        bg-indigo-500
                        hover:bg-indigo-400
                        px-4 py-2
                        rounded
                        text-white
                    "
                >
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
