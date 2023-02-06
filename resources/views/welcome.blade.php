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
        header{
            background-image: url({{ asset('images/auth/slide1.jpg') }})
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <nav class="bg-transparent fixed py-5 text-white z-50 w-full px-5 duration-300">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="alope logo" class="w-[40px] mr-3">
                <h3 class="font-semibold tracking-wider">IL-Learning</h3>
            </div>
            <div>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </nav>
    <header 
        class="
            w-full 
            h-[600px] 
            bg-cover 
            bg-center 
            relative
            flex
            items-center
            justify-center
            after:content-[''] 
            after:absolute 
            after:inset-0 
            after:bg-black/40
        "
    >
        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-bold text-gray-100 tracking-wider">ALOPE UNIVERSITY</h1>
            <h3 class="text-xl text-gray-300">The Best University in The World!</h3>
        </div>
    </header>
    <footer class="bg-gray-800 text-gray-100">
        <div class="container mx-auto px-3">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 py-10 lg:gap-5 gap-10">
                <div>
                    <h3 class="font-semibold text-xl">Company</h3>
                    <p class="mt-5 text-sm">
                        UNIVERSITAS KUNINGAN Jl. Cut Nyak Dhien No.36A, Cijoho, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45513 
                    </p>
                </div>
                <div>
                    <h3 class="font-semibold text-xl">Support</h3>
                    <ul class="mt-5 text-sm">
                        <li class="mb-3">
                            <a href="{{ route('demo') }}" class="hover:font-semibold">
                                Guide Il-Learning for Student
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('demo') }}" class="hover:font-semibold">
                                Guide Il-Learning for Lecturer
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-xl">Contact</h3>
                    <ul class="mt-5 text-sm lg:block flex">
                        <li class="mb-5 lg:mr-0 mr-5">
                            <a href="" class="flex items-center hover:text-[#bc1888] hover:font-semibold">
                                <span 
                                    class="instagramColor mr-3 p-2 rounded-full" 
                                    style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);"
                                >
                                    <img 
                                        src="{{ asset('images/icon/instagram.png') }}"
                                        class="w-[20px]"
                                    >
                                </span>
                                Instagram
                            </a>
                        </li>
                        <li class="mb-5 lg:mr-0 mr-5">
                            <a href="" class="flex items-center hover:text-[#4867aa] hover:font-semibold">
                                <span  class="bg-[#4867aa] mr-3 p-2 rounded-full">
                                    <img 
                                        src="{{ asset('images/icon/facebook.png') }}"
                                        class="w-[20px]"
                                    >
                                </span>
                                Facebook
                            </a>
                        </li>
                        <li class="lg:mr-0">
                            <a href="" class="flex items-center hover:text-[#43bdf0] hover:font-semibold">
                                <span class="bg-[#43bdf0] mr-3 p-2 rounded-full">
                                    <img 
                                        src="{{ asset('images/icon/twitter.png') }}"
                                        class="w-[20px]"
                                    >
                                </span>
                                Twitter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-5 border-slate-600">

            <div class="md:flex items-center text-center md:text-left py-5">
                <div class="pb-5 flex items-center w-1/2 mx-auto md:m-0">
                    <img src="{{ asset('images/logo.png') }}" alt="alope logo" class="w-[80px] mr-3">
                    <span>
                        <h4 class="font-bold text-2xl whitespace-nowrap">IL-Learning</h4>
                        <small class="block -mt-1">Alope University</small>
                    </span>
                </div>
                <h5 class="lg:-translate-x-1/2 font-semibold tracking-wider md:text-xl">
                    The Best University in The World!
                </h5>
            </div>
        </div>
        <div class="py-5 text-center bg-gray-900 text-sm">
            Copyright &copy; by ALOPE
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function(){
		    const nav= document.querySelector('nav');
            nav.classList.toggle('bg-slate-800', scrollY > 0);
            nav.classList.toggle('bg-transparent', scrollY == 0);
            nav.classList.toggle('py-5', scrollY == 0);
            nav.classList.toggle('py-3', scrollY > 0);
            nav.classList.toggle('shadow', scrollY > 0);
            nav.classList.toggle('px-5', scrollY == 0);
            nav.classList.toggle('px-3', scrollY > 0);
		});
    </script>
</body>
</html>