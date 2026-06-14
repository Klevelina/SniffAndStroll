@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge([
    'class' => 'border-[#E8DFC8] bg-[#F6F3E8] text-[#2F4730] focus:border-[#95B85A] focus:ring-[#95B85A] rounded-md shadow-sm'
]) }}>