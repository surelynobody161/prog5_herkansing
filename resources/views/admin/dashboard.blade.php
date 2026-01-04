<x-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-white mb-6">Admin Dashboard</h1>

        <table class="min-w-full bg-gray-800 text-white rounded-lg overflow-hidden shadow-lg">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arts as $art)
                    <tr class="border-b border-gray-600">
                        <td class="px-6 py-4">{{ $art->title }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('art.toggleActive', $art) }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="active" value="{{ $art->active ? 0 : 1 }}">
                                <button type="submit"
                                        class="px-4 py-2 rounded {{ $art->active ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }} transition duration-300">
                                    {{ $art->active ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('arts.edit', $art->id) }}"
                               class="px-4 py-2 bg-blue-500 hover:bg-blue-600 rounded transition duration-300">Edit</a>

                            @if(auth()->check() && (auth()->user()->role === 'admin' || $art->user_id === auth()->id()))
                                <form action="{{ route('arts.destroy', $art) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-4 py-2 bg-red-700 hover:bg-red-800 rounded transition duration-300"
                                            onclick="return confirm('Weet je zeker dat je dit wilt verwijderen?');">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
