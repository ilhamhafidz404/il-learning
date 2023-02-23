@extends('backend.layouts.master')
@section('title')
    {{ $lecturer->user->name }}
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
                        src="{{ asset('storage/'.$lecturer->profile) }}" 
                        alt=""
                        class="w-[250px] h-[250px] object-cover rounded"
                    >

                    <div class="ml-5">
                        <h2 class="uppercase text-2xl font-semibold">{{ $user->name }}</h2>
                        <small class="text-gray-800 dark:text-gray-300 text-base">20220810052</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
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