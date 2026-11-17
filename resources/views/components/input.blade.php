@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#006937] focus:ring-[#006937] rounded-md shadow-sm']) !!}>
