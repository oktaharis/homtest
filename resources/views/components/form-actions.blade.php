@props(['submitText' => 'Simpan', 'cancelRoute' => null, 'cancelText' => 'Batal'])

<div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
    @if($cancelRoute)
        <a href="{{ $cancelRoute }}" 
           class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
            {{ $cancelText }}
        </a>
    @endif
    
    <button type="submit" 
            class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-sm transition-colors duration-200">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        {{ $submitText }}
    </button>
</div>
