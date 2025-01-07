<x-layout>
<!-- Search and Filter Form -->
<div class="container mx-auto mt-8 mb-6">
    <form method="GET" action="{{ route('arts.index') }}" class="flex space-x-4">
        <label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for paintings..." class="px-4 py-2 rounded bg-gray-800 text-gray-100 w-full">
        </label>
        <label>
            <select name="category_id" class="px-4 py-2 rounded bg-gray-800 text-gray-100">
                <option value="">All Categories</option>
                <option value="1" {{ request('category_id') == '1' ? 'selected' : '' }}>Classical Art</option>
                <option value="2" {{ request('category_id') == '2' ? 'selected' : '' }}>Surrealism</option>
                <option value="3" {{ request('category_id') == '3' ? 'selected' : '' }}>Modern Art</option>
            </select>
        </label>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Filter</button>
    </form>
</div>

<!-- Art Section -->
<div class="container mx-auto mt-8">
    <ul class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($arts as $art)
            <div class="bg-gray-800 shadow-lg rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-white mb-4">{{ $art->title }}</h2>
                <!-- Truncate Description -->
                <p class="text-gray-400 mb-4 truncate-text">
                    {{ Str::limit($art->description, 100) }}
                </p>
                <!-- Image -->
                <img src="{{ asset($art->art) }}" alt="{{ $art->title }}" class="w-full h-auto rounded-lg mb-4">
                <!-- Details Button -->
                <a href="{{ route('arts.show', $art->id) }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Details</a>
            </div>
        @endforeach
    </ul>
</div>
</x-layout>
