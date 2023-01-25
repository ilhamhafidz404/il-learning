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
<body class="bg-slate-800 dark">
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
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10']
                    )
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Github</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Update untuk versi kedepannya di github ilhamhafidz404.
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10']
                    )
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Tooling</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2"> 
                        Project ini dikerjangan dengan laravel, tailwind.
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10']
                    )
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Report Bug dan saran</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Jika punya saran untuk project IL-Learning ini, bisa hubungi di instagram atau twitter. Atau jitka ingin ikut mengembangkan, bisa fork.
                    </p>
                </div>
            </div>

            <div class="flex items-center mb-16">
                <div>
                    @include(
                        'components.icons.userGroup-regular-icon',
                        ['class' => 'w-10']
                    )
                </div>
                <div class="ml-8">
                    <h4 class="text-xl font-semibold">Support Alope</h4>
                    <p class="text-sm text-gray-500 dark:text-gray-300 mt-2">
                        Jika suka dengan project ini, bisa bantu love di guthub.
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