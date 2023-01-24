@extends('backend.admin.master')

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
        @include('components.widgets') 
        <div class="mt-10 bg-slate-800 p-5 rounded">
            <form action="">
                <input 
                    type="text" 
                    placeholder="search" 
                    name="search" 
                    class="py-2 rounded px-3 w-[300px] bg-slate-700 text-white"
                    @isset($_GET['search'])
                        value="{{ $_GET['search'] }}"
                    @endisset
                >
                <button class="bg-indigo-500 hover:bg-indigo-400 text-white py-2 px-3 rounded">Search</button>
                @isset($_GET['search'])
                    <a 
                        href="{{ route('admin.student.index') }}" 
                        class="bg-red-500 hover:bg-red-400 text-white py-3 px-3 rounded"
                    >
                        cancel
                    </a>
                @endisset
            </form>
        </div>
        <div class="bg-white dark:bg-slate-800 col-span-6 md:col-span-4 shadow-md rounded mt-5 overflow-hidden">
            <table class="w-full dark:text-gray-300">
                <tr class=" bg-indigo-500">
                    <th class="py-6">NIM</th>
                    <th>Name</th>
                    <th>Classroom</th>
                    <th>Action</th>
                </tr>
                @forelse ($students as $index => $student)
                    <tr
                        class="
                            @if ($index%2 > 0)
                                bg-slate-700
                            @endif
                        "
                    >
                        <td class="py-5 pl-7">{{ $student->nim }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->classroom->name }}</td>
                        <td>
                            <button class="bg-red-500 hover:bg-red-400 text-white px-3 py-2 rounded">
                                delete
                            </button>
                            <button 
                                class="bg-emerald-500 hover:bg-emerald-400 text-white px-3 py-2 rounded"
                                onclick="showModal({{$student}})"
                            >
                                show
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10">
                            <h4 class="text-6xl text-center">☹️</h4>
                            <h3 class="text-center mt-3 text-xl">
                                Tidak ada mahasiswa dengan NIM 
                                <span class="text-indigo-500">{{ $_GET['search'] }}</span>
                            </h3>
                        </td>
                    </tr>
                @endforelse
            </table>
        </div>
        <div class="mt-5 w-full">
            {{$students->links()}}
        </div>
    </section>

    <section id="modal" class="hidden bg-black/70 fixed inset-0 z-50 items-center justify-center">
        <div class="bg-white dark:bg-slate-700 w-[700px] p-5 rounded dark:text-white">
            <button onclick="hideModal()">close</button>
            <div class="flex gap-5">
                <img 
                    src="{{ asset('images/profile/profile.jpg') }}" 
                    alt="profile" 
                    class="w-[200px] rounded"
                >
                <div>
                    <h2 id="name" class="text-3xl font-semibold tracking-wider">Ilham Hafidz</h2>
                    <small id="nim" class="text-slate-300">20220810052</small>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        const modal = document.getElementById('modal');
        const showModal= (student) => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            document.getElementById('name').textContent = student.user.name
            document.getElementById('nim').textContent = student.nim
        }    
        const hideModal= () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }    
    </script> 
@endsection