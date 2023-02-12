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
    <div class="bg-white dark:bg-slate-800 dark:text-gray-100 p-5 rounded shadow relative">
        <h1 class="text-3xl text-indigo-500 font-bold mb-3">REQUEST RESET PASSWORD</h1>
        
        <form method="POST" action="{{ route('password.email') }}">
            @if (session('status'))
                <div 
                    class="
                        bg-emerald-500/20 
                        text-emerald-500 
                        inline-block 
                        py-3 
                        px-10 
                        rounded 
                        border-2 
                        border-emerald-500
                        font-semibold
                        mb-5
                    " 
                    role="alert"
                >
                    {{ session('status') }}
                </div>
            @endif 

            @csrf

            <p class="text-sm">
                Masukkan alamat email akun anda untuk menerima link reset password
            </p>

            <div class="mt-5">
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
                    name="email" value="{{ old('email') }}" 
                    required 
                    autocomplete="email" 
                    autofocus
                >
                @error('email')
                    <span class="text-red-500 block" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror

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
                        Send Password Reset Link
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
