@props(['title', 'description' => null, 'backRoute' => null, 'backText' => 'Kembali'])

<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $title }}</h1>
                @if($description)
                    <p class="mt-2 text-sm text-gray-600">{{ $description }}</p>
                @endif
            </div>
            @if($backRoute)
                <a href="{{ $backRoute }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ $backText }}
                </a>
            @endif
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white shadow-sm rounded-lg border border-gray-200">
        <div class="px-6 py-8">
            {{ $slot }}
        </div>
    </div>
</div>
