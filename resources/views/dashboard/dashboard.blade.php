<!doctype html>
<html>
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
    input:focus ~ label {
      background-color: white;
    }
  </style>
</head>
<body class="bg-gray-100">
    
    <nav class="py-3 bg-white shadow">
        <section class="container mx-auto flex justify-between">
            <div class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo ALOPE" class="w-[40px] mr-5">
                <span>
                    <h2 class="text-xl font-bold">IL-Learning</h2>
                    <small class="block -mt-2">ALOPE University</small>
                </span>
            </div>
            <div>
                <section class="relaitive">
                    <button onclick="showProfileDropdown()" class="flex items-center">
                        <img 
                            src="{{ asset('images/profile/profile.jpg') }}" 
                            alt="profile photo"
                            class="w-[50px] h-[50px] object-cover rounded-full mr-4 border-2 p-[2px] border-black"
                        >
                        <span class="text-left">
                            <p class="font-semibold">{{ Auth::user()->name }}</p>
                            <small class="text-gray-600 block -mt-2">{{ Auth::user()->email }}</small>
                        </span>
                    </button>
                    <div 
                        id="dropdownContainer" 
                        class="
                            mt-3 
                            min-w-[200px] 
                            absolute 
                            right-[50px] 
                            hidden 
                            rounded 
                            border 
                            shadow 
                            bg-white
                        "
                    >
                        <ul>
                            <li class="hover:bg-gray-200 px-3 py-2">
                                <a 
                                    href=""
                                    class="w-full block text-gray-700 text-sm font-[400]"
                                >
                                    Profile
                                </a>
                            </li>
                            <li class="hover:bg-gray-200 px-3 py-2">
                                <a 
                                    href=""
                                    class="w-full block text-gray-700 text-sm font-[400]"
                                >
                                    Setting
                                </a>
                            </li>
                            <hr>
                            <li class="hover:bg-gray-200 px-3 py-2">
                                <a 
                                    href="{{ route('logout') }}"
                                    class="w-full block text-gray-700 text-sm font-[400]"
                                    onclick="
                                            event.preventDefault();
                                            document.getElementById('logout-form').submit();
                                        "
                                >
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
    </nav>


    <script>
        function showProfileDropdown(){
            const dropdownContainer= document.getElementById('dropdownContainer');
            dropdownContainer.classList.toggle('hidden')
        }
    </script>
</body>
</html>