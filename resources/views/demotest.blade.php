<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    @vite('resources/css/app.css')
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        span{
            background: radial-gradient(atcenter red, blue);

        } 
    </style>
</head>
<body 
    class="
        @auth
            @if (Auth::user()->mode == 'dark')
                dark bg-slate-800
            @endif
        @endauth
    "
>
    <main class="grid grid-cols-2 gap-16 container mx-auto h-screen items-center">
        <section>
            <img 
                src="{{ asset('images/logo.png') }}" 
                alt="alope logo"
                class="w-[100px] mb-5"
            >
            <h1 class="text-4xl tracking-wider uppercase dark:text-white"> 
                On Development!
            </h1>
            <p class="text-gray-500 dark:text-gray-300 mt-5 mb-10 w-[75%]">
                Project IL-Learning masih dalam tahap development, sejauh ini bagaimana IL-Learningnya? apakah mengesankan?
            </p>
            
            <div class="flex items-center">
                <button 
                    onclick="history.back()" 
                    class="bg-red-500 hover:bg-red-400 text-white py-2 px-5 rounded mr-5"
                >
                    kembali
                </button>
                <span class="flex items-center">
                    <button class="dark:bg-white bg-slate-800 rounded p-2 mr-2" onclick="toggleDarkMode()">
                        @include(
                            'components.icons.sun-regular-icon', 
                            ['class' => 'w-6 h-6 dark:block hidden']
                        )
                        @include(
                            'components.icons.moon-regular-icon', 
                            ['class' => 'w-6 h-6 block dark:hidden text-white']
                        )
                    </button>   
                    <label class="dark:text-white">Change Mode</label>
                </span>
            </div>

        </section>
        <section class="dark:text-white text-gray-800">
            <div class="flex items-center mb-16">
                <div>
                    <svg 
                        viewBox="0 0 24 24" 
                        aria-hidden="true" 
                        class="w-10 dark:fill-white"
                    >
                        <path 
                            fill-rule="evenodd" 
                            clip-rule="evenodd" 
                            d="M12 2C6.477 2 2 6.463 2 11.97c0 4.404 2.865 8.14 6.839 9.458.5.092.682-.216.682-.48 0-.236-.008-.864-.013-1.695-2.782.602-3.369-1.337-3.369-1.337-.454-1.151-1.11-1.458-1.11-1.458-.908-.618.069-.606.069-.606 1.003.07 1.531 1.027 1.531 1.027.892 1.524 2.341 1.084 2.91.828.092-.643.35-1.083.636-1.332-2.22-.251-4.555-1.107-4.555-4.927 0-1.088.39-1.979 1.029-2.675-.103-.252-.446-1.266.098-2.638 0 0 .84-.268 2.75 1.022A9.607 9.607 0 0 1 12 6.82c.85.004 1.705.114 2.504.336 1.909-1.29 2.747-1.022 2.747-1.022.546 1.372.202 2.386.1 2.638.64.696 1.028 1.587 1.028 2.675 0 3.83-2.339 4.673-4.566 4.92.359.307.678.915.678 1.846 0 1.332-.012 2.407-.012 2.734 0 .267.18.577.688.48 3.97-1.32 6.833-5.054 6.833-9.458C22 6.463 17.522 2 12 2Z">
                        </path>
                    </svg>
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Github</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Update untuk versi kedepannya di github ilhamhafidz404. 
                        <a 
                            href="https://github.com/ilhamhafidz404/il-learning" 
                            class="text-indigo-500" 
                            target="_blank"
                        >
                            https://github.com/ilhamhafidz404/il-learning
                        </a>
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-10"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" 
                        />
                    </svg>
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Tooling</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2"> 
                        Project ini dikerjakan dengan 
                        <span class="text-[#ff2d20] font-semibold">laravel</span>, 
                        <span class="text-[#06b6d4] font-semibold">tailwind</span>. 
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-10"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" 
                        />
                    </svg>

                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Report bug and Suggestion</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Jika punya saran untuk project IL-Learning ini, bisa hubungi di instagram atau twitter. Atau jika ingin ikut mengembangkan, bisa fork.
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    <svg 
                        xmlns="http://www.w3.org/2000/svg" 
                        fill="none" 
                        viewBox="0 0 24 24" 
                        stroke-width="1.5" 
                        stroke="currentColor" 
                        class="w-10"
                    >
                        <path 
                            stroke-linecap="round" 
                            stroke-linejoin="round" 
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" 
                        />
                    </svg>

                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Support Alope</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Jika suka dengan project ini, bisa bantu love di github.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <script>
        function toggleDarkMode(){
            const body= document.getElementsByTagName('body');
            body[0].classList.toggle('dark')
            body[0].classList.toggle('bg-slate-800')
        }
    </script>
</body>
</html>