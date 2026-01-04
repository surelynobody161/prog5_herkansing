<x-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold text-white mb-6">Edit Art</h1>

        <form action="{{ route('arts.update', $art->id) }}" method="POST"
              class="space-y-6 bg-gray-800 p-8 rounded-lg shadow-lg"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-lg font-medium text-gray-300 mb-1">Title:</label>
                <input type="text" id="title" name="title"
                       class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       value="{{ old('title', $art->title) }}" required>
            </div>

            <div>
                <label for="description" class="block text-lg font-medium text-gray-300 mb-1">Description:</label>
                <textarea id="description" name="description"
                          class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                          rows="5">{{ old('description', $art->description) }}</textarea>
            </div>

            <div>
                <label for="category_id" class="block text-lg font-medium text-gray-300 mb-1">Category:</label>
                <select id="category_id" name="category_id"
                        class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', $art->category_id) ? 'selected' : '' }}>
                            {{ $category->category }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if($art->image)
                <div>
                    <label class="block text-lg font-medium text-gray-300 mb-1">Current Image:</label>
                    <img src="{{ asset('storage/' . $art->image) }}" alt="Current Art Image" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif

            <div>
                <label for="image" class="block text-lg font-medium text-gray-300 mb-1">Upload New Image (Optional):</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-700 text-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <button type="submit"
                        class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Save Changes
                </button>
            </div>
        </form>
    </div>
</x-layout>
