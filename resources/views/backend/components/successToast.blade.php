<section 
    id="noty"
    class="
        fixed 
        bottom-0 
        right-0 
        z-20 
        bg-white 
        dark:bg-slate-800 
        shadow 
        text-gray-800  
        dark:text-gray-100  
        m-5 
        p-5 
        rounded 
        border
        dark:border-slate-500
        w-[400px]
        justify-between
        items-center
        @if (Session::has('success') ||Session::has('error'))
            flex
        @else
            hidden
        @endif
    "
>
    @if (Session::has('success'))
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor" 
            class="w-20 h-20 mr-3 text-emerald-500"
        >
            <path 
                fill-rule="evenodd" 
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" 
                clip-rule="evenodd" 
            />
        </svg>
    @else
    <svg 
        xmlns="http://www.w3.org/2000/svg" 
        viewBox="0 0 24 24" 
        fill="currentColor" 
        class="w-20 h-20 mr-3 text-red-500"
    >
        <path 
            fill-rule="evenodd" 
            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" 
            clip-rule="evenodd" 
        />
    </svg>

    @endif

    <div class="w-[250px]">
        <h4 class="font-semibold mb-3 text-[18px]">{{ Session::get('title'); }}</h4>
        <p class="text-sm">
            {{ Session::get('message'); }}
        </p>
    </div>
    <button class="absolute right-0 top-0 m-2" onclick="hideNoty()">
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor" 
            class="w-5 h-5 text-gray-600"
        >
            <path 
                fill-rule="evenodd" 
                d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" 
                clip-rule="evenodd" 
            />
        </svg>
    </button>
</section>