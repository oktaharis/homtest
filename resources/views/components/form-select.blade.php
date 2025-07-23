@props(['name', 'required' => false, 'placeholder' => 'Pilih opsi'])

<select 
    name="{{ $name }}" 
    id="{{ $name }}" 
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors duration-200 sm:text-sm']) }}
>
    <option value="">{{ $placeholder }}</option>
    {{ $slot }}
</select>
