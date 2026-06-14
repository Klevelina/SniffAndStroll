<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-4 py-2 bg-[#2F4730] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#538338] focus:bg-[#538338] active:bg-[#2F4730] focus:outline-none focus:ring-2 focus:ring-[#538338] focus:ring-offset-2 transition ease-in-out duration-150'
]) }}>
    {{ $slot }}
</button>