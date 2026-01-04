<x-layout>
    <form action="{{ route('arts.store') }}" method="POST"
          class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg"
          enctype="multipart/form-data">
        @csrf

        <div>
            <label for="title" class="block text-lg font-medium text-gray-300 mb-1">Titel:</label>
            <input type="text" id="title" name="title"
                   class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300
                          focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer de titel in"
                   required>
        </div>

        <div>
            <label for="description" class="block text-lg font-medium text-gray-300 mb-1">Omschrijving:</label>
            <input type="text" id="description" name="description"
                   class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300
                          focus:ring-2 focus:ring-blue-500 focus:outline-none"
                   placeholder="Voer een omschrijving in"
                   required>
        </div>

        <div>
            <label for="image" class="block text-lg font-medium text-gray-300 mb-1">Foto:</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300
                          focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <div>
            <label for="category_id" class="block text-lg font-medium text-gray-300 mb-1">Categorie:</label>
            <select name="category_id" id="category_id"
                    class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300
                           focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
                <option value="">-- Kies een categorie --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit"
                    class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg
                           hover:bg-blue-700 transition duration-300">
                Opslaan
            </button>
        </div>
    </form>
</x-layout>
