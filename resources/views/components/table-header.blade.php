@props(['title', 'description' => null, 'addRoute' => null, 'addText' => 'Tambah Data'])

<div class="mb-8">
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
            @if($description)
                <p class="mt-2 text-sm text-gray-600">{{ $description }}</p>
            @endif
        </div>
        @if($addRoute)
            <div class="mt-4 sm:mt-0">
                <a href="{{ $addRoute }}" 
                   class="inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    {{ $addText }}
                </a>
            </div>
        @endif
    </div>
</div>
