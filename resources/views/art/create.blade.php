<x-layout>
    {{-- Form for adding a game --}}
    <form action="{{ url(route('art.store')) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

        {{-- Title input --}}
        <div>
            <label for="title" class="block text-lg font-medium text-gray-700 mb-1">Titel:</label>
            <input type="text" id="title" name="title"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer de titel van het spel in">
        </div>

        {{-- Genre input --}}
        <div>
            <label for="genre" class="block text-lg font-medium text-gray-700 mb-1">Genre:</label>
            <input type="text" id="genre" name="genre"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer het genre in">
        </div>

        {{-- Number of players input --}}
        <div>
            <label for="number_of_players" class="block text-lg font-medium text-gray-700 mb-1">Aantal spelers:</label>
            <input type="number" id="number_of_players" name="number_of_players"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer het aantal spelers in">
        </div>

        {{-- Play time input --}}
        <div>
            <label for="play_time" class="block text-lg font-medium text-gray-700 mb-1">Speeltijd (in minuten):</label>
            <input type="number" id="play_time" name="play_time"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer de speeltijd in">
        </div>
        <div>
            <label for="image" class="block text-lg font-medium text-gray-700 mb-1">Foto:</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        {{-- Categories select --}}
        <div>
            <label for="categories[]" class="block text-lg font-medium text-gray-700 mb-1">Categorieën:</label>
            <select name="categories[]" id="categories[]" multiple
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Submit button --}}
        <div>
            <button type="submit"
                    class="w-full py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition">
                Opslaan
            </button>
        </div>
    </form>
</x-layout>
