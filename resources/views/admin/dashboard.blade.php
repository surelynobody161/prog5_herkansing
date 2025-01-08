<x-layout>
<h1>Admin Dashboard</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Action</th>
    </tr>
    @foreach($arts as $art)
        <tr>
            <td>{{ $art->title }}</td>
            <td>
{{--                <form action="{{ route('admin.art.delete', $art->id) }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit">Delete</button>--}}
{{--                </form>--}}
                <form action="{{ route('art.toggleActive', $art) }}" method="POST" class="">
                    @csrf
                    <!-- Hidden input to determine the action (toggle active status) -->
                    <input type="hidden" name="active" value="{{ $art->active ? 0 : 1 }}">

                    <!-- Active Checkbox -->
                    <label for="active" class="flex items-center space-x-2 text-gray-700">
                        <input type="checkbox" id="active" name="active" value="1"
                               class="form-checkbox" {{ $art->active ? 'checked' : '' }}
                               onchange="this.form.submit()"> <!-- Auto-submit when toggled -->
                        <span class="text-lg">Make this active</span>
                    </label>
                </form>
            </td>
        </tr>
    @endforeach
</table>
</x-layout>
