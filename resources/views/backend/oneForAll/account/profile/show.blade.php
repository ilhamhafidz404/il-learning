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
</section>
@endsection