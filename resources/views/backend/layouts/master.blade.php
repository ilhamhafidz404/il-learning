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
<body 
    class="
    @if (Auth::user()->mode == 'dark')
        dark bg-slate-600
    @else
        bg-gray-100
    @endif
    "
>    
    <section id="overlay" class="fixed inset-0 hidden z-10" onclick="showProfileDropdown()"></section>

    @include('backend.layouts.navbar')

    <main class="grid grid-cols-5 gap-10">
        @include('backend.layouts.sidebar')
        @yield('content')
    </main>


    <script>
        function showProfileDropdown(){
            const dropdownContainer= document.getElementById('dropdownContainer');
            const overlay= document.getElementById('overlay');
            dropdownContainer.classList.toggle('hidden')
            overlay.classList.toggle('hidden')
        }

        function toggleSideBar(){
            const sidebar= document.getElementById("sidebar");
            sidebar.classList.toggle("left-0")
            sidebar.classList.toggle("-left-full")
        }

    </script>
    @yield('script')
</body>
</html>