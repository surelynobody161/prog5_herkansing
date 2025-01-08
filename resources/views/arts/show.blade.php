<x-layout>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold">{{ $art->title }}</h1>
    <img src="{{ asset($art->art) }}" alt="{{ $art->title }}" class="mt-4 w-full">
    <p class="mt-4">{{ $art->description }}</p>
    <a href="{{ route('arts.index') }}" class="mt-4 text-blue-500">Back to Gallery</a>
</div>
</x-layout>
