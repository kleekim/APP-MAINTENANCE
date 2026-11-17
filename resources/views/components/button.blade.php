<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest disabled:opacity-50 transition ease-in-out duration-150 focus:outline-none focus:ring-2 focus:ring-[#006937] focus:ring-offset-2']) }} 
    style="background-color: #006937;"
    onmouseover="this.style.backgroundColor='#006937'"
    onmouseout="this.style.backgroundColor='#006937'">
    {{ $slot }}
</button>