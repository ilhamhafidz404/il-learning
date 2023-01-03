<section id="confirmModal" class="fixed inset-0 bg-black/70 z-30 hidden">
    <div 
        class="
            bg-white 
            dark:bg-slate-800 
            w-[450px] 
            absolute 
            left-1/2 
            top-1/2 
            -translate-x-1/2 
            -translate-y-1/2
            p-5
            rounded-md
            text-right
            overflow-hidden
        "
    >
        @include(
            'components.icons.info-solid-icon',
            ['class' => 'w-52 h-52 absolute left-[-50px] top-[-40px] text-cyan-500']
        )
        <div class="w-[70%] ml-auto">
            <h3 class="text-xl text-cyan-500 font-bold mb-5 uppercase">Apakah anda yakin?</h3>
            <p class="text-sm text-gray-700 dark:text-gray-100">
                Data yang sudah terpilih tidak bisa di batalkan lagi.
            </p>
            <div class="mt-5">
                <button 
                    class="
                        bg-gray-400 
                        dark:bg-slate-500 
                        hover:bg-gray-300
                        dark:hover:bg-slate-400 
                        text-white 
                        px-5 
                        py-2 
                        rounded
                    "
                    onclick="toggleConfirm()"
                >
                    Batalkan
                </button>
                <button 
                    class="
                        bg-cyan-500 
                        hover:bg-cyan-400 
                        text-white 
                        px-5 
                        py-2 
                        rounded
                    "
                    onclick="
                        event.preventDefault();
                        document.getElementById('confirmSKS').submit();
                    "
                >
                    Yakin
                </button>
            </div>
        </div>
    </div>
</section>