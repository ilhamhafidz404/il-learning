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
        <svg 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            fill="currentColor" 
            class="w-52 h-52 absolute left-[-50px] top-[-40px] text-cyan-500"
        >
            <path 
                fill-rule="evenodd" 
                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" 
                clip-rule="evenodd" 
            />
        </svg>

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