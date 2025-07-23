@props(['headers', 'id' => 'dataTable'])

<div class="bg-white/70 backdrop-blur-sm shadow-sm rounded-lg border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200" id="{{ $id }}">
            <thead class="bg-gray-50/80 backdrop-blur-sm sticky top-0 z-10">
                <tr>
                    @foreach($headers as $header)
                        <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white/50 backdrop-blur-sm divide-y divide-gray-200" id="tableBody">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
