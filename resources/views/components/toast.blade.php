<section 
    id="noty"
    class="
        fixed 
        bottom-0 
        right-0 
        z-50 
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
        @if (Session::has('success') || Session::has('error'))
            flex
        @else
            hidden
        @endif
    "
>
    @if (Session::has('success'))
        @include(
            'components.icons.success-solid-icon',
            ['class' => 'w-20 h-20 mr-3 text-emerald-500']
        )
    @else
        @include(
            'components.icons.error-solid-icon',
            ['class' => 'w-20 h-20 mr-3 text-red-500']
        )
    @endif

    <div class="w-[250px]">
        <h4 class="font-semibold mb-3 text-[18px]">{{ Session::get('title'); }}</h4>
        <p class="text-sm">
            {{ Session::get('message'); }}
        </p>
    </div>
    <button class="absolute right-0 top-0 m-2" onclick="hideNoty()">
        @include(
            'components.icons.close-icon',
            ['class' => 'w-5 h-5 text-gray-600 dark:text-gray-200']
        )
    </button>
</section>