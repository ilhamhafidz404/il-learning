@extends('backend.admin.master')
@section('title')
    Dashboard
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
            relative
            grid
            grid-cols-6
            gap-5
        "
    >
        <div class="col-span-2 bg-white dark:bg-slate-800 rounded p-5 text-gray-200">
            <h3 class="text-xl font-semibold dark:text-gray-100 text-gray-800 mb-5">Setting deadline SKS</h3>
            @if ($setting->sks_countdown == null)
                <div 
                    class="
                        bg-red-500/40 
                        p-5 
                        rounded 
                        text-center 
                        text-red-500 
                        font-semibold 
                        border-2 
                        border-red-500
                        text-sm
                    "
                >
                    The countdown for the new school year has not yet been set
                </div>
            @else
                <div 
                    class="
                        bg-emerald-500/40 
                        p-5 
                        rounded 
                        text-center 
                        text-emerald-500 
                        font-semibold 
                        border-2 
                        border-emerald-500
                        text-sm
                    "
                >
                    The countdown has been saved on {{ $setting->sks_countdown }}
                </div>
            @endif

            <form action="{{ route('admin.setting.sksCountdown') }}" method="POST" class="mt-5 text-gray-800">
                @csrf
                <div class="mb-3">
                    <label 
                        for="date" 
                        class="mr-2 font-semibold @error('date') text-red-500 @enderror"
                    >Date : </label>
                    <input 
                        type="date" 
                        id="date" 
                        name="date" 
                        class="text-gray-800 @error('date') text-red-500 @enderror"
                        @if ($setting->sks_countdown)
                            value="{{Str::limit($setting->sks_countdown, 10, '')}}"
                        @else
                            value="{{ old('date') }}"
                        @endif
                    >
                    @error('date')
                        <small class="text-red-500 block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-5">
                    <label 
                        for="time" 
                        class="mr-2 font-semibold @error('time') text-red-500 @enderror"
                    >Time : </label>
                    <input 
                        type="time" 
                        id="time" 
                        name="time" 
                        class="text-gray-800 @error('time') text-red-500 @enderror"
                        @if ($setting->sks_countdown)
                            value="{{ substr($setting->sks_countdown, 11, 19) }}"
                        @else
                            value="{{ old('time') }}"
                        @endif
                    >
                    @error('time')
                        <small class="text-red-500 block">{{ $message }}</small>
                    @enderror
                </div>
                <div class="flex gap-5">
                    <button 
                        name="reset"
                        value="1"
                        class="
                            w-1/2 
                            bg-red-500 
                            hover:bg-red-400 
                            px-5 py-2 
                            rounded 
                            text-white 
                            mt-3
                            @if (!$setting->sks_countdown)
                                cursor-not-allowed
                            @endif
                        "
                        @if (!$setting->sks_countdown)
                            disabled
                        @endif
                    >
                        Reset
                    </button>
                    <button 
                        name="submit"
                        value="1"
                        class="
                            w-1/2 
                            bg-indigo-500 
                            hover:bg-indigo-400 
                            px-5 
                            py-2 
                            rounded 
                            text-white 
                            mt-3
                            @if ($setting->sks_countdown)
                                cursor-not-allowed
                            @endif
                        "
                        @if ($setting->sks_countdown)
                            disabled
                        @endif
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('script')
<script>
    const hideNoty= ()=>{
        const noty = document.getElementById('noty')
        noty.classList.toggle('flex');
        noty.classList.toggle('hidden');
    }

    const toggleConfirm = () =>{
        const cofirmModal= document.getElementById('confirmModal');
        cofirmModal.classList.toggle('hidden');
    }
</script>