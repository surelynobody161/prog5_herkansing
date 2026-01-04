<x-layout>
    @auth
        <a href="{{ route('arts.create') }}"
           class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
            Maak een nieuwe aan
        </a>
    @endauth

    <div class="container mx-auto mt-8 mb-6">
        <form method="GET" action="{{ route('arts.index') }}" class="flex space-x-4">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search for paintings..."
                   class="px-4 py-2 rounded bg-gray-800 text-gray-100 w-full">

            <select name="category_id" class="px-4 py-2 rounded bg-gray-800 text-gray-100">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Filter
            </button>
        </form>
    </div>

    <div class="container mx-auto mt-8">
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($arts as $art)
                <div class="bg-gray-800 shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-white mb-4">{{ $art->title }}</h2>
                    <p class="text-gray-400 mb-4 truncate-text">{{ Str::limit($art->description, 100) }}</p>

                    <img src="{{ asset('storage/' . $art->image) }}" alt="{{ $art->title }}"
                         class="w-full h-auto rounded-lg mb-4">

                    <a href="{{ route('arts.show', $art->id) }}"
                       class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                        Details
                    </a>
                    <a href="{{ route('arts.edit', $art->id) }}"
                       class="bg-black text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">
                        Pas aan
                    </a>

                    @if(auth()->check() && (auth()->user()->role === 'admin' || $art->user_id === auth()->id()))
                        <form action="{{ route('arts.destroy', $art) }}" method="POST" class="inline-block mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-700 hover:bg-red-800 rounded transition duration-300"
                                    onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?');">
                                Delete
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </ul>
    </div>
</x-layout>
