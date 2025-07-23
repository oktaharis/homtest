@props(['name', 'value' => '', 'placeholder' => '', 'required' => false, 'rows' => 4])

<textarea 
    name="{{ $name }}" 
    id="{{ $name }}" 
    rows="{{ $rows }}"
    placeholder="{{ $placeholder }}"
    {{ $required ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors duration-200 sm:text-sm resize-vertical']) }}
>{{ old($name, $value) }}</textarea>
