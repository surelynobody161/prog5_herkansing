<?php

namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Category;
use Illuminate\Http\Request;

class ArtsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $query = Art::where('active', 1);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $arts = $query->get();
        $categories = Category::all();

        return view('arts.index', compact('arts', 'categories'));
    }

    public function show(Art $art)
    {
        return view('arts.show', compact('art'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('arts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $validated['user_id'] = auth()->id();
        $validated['active'] = true;

        Art::create($validated);

        return redirect()->route('arts.index')->with('success', 'Art created!');
    }

    public function edit(Art $art)
    {
        if ($art->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $categories = Category::all();
        return view('arts.edit', compact('art', 'categories'));
    }

    public function update(Request $request, Art $art)
    {
        if ($art->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $art->update($validated);

        return redirect()->route('arts.index')->with('success', 'Art updated!');
    }

    public function destroy(Art $art)
    {
        if (auth()->user()->role !== 'admin' && $art->user_id !== auth()->id()) {
            abort(403, 'Je hebt geen permissie om dit te verwijderen.');
        }

        if ($art->image && \Storage::disk('public')->exists($art->image)) {
            \Storage::disk('public')->delete($art->image);
        }

        $art->delete();

        return redirect()->route('arts.index')->with('success', 'Art succesvol verwijderd!');
    }

    public function toggleActive(Request $request, Art $art)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $request->validate([
            'active' => 'required|boolean',
        ]);

        $art->active = $request->boolean('active');
        $art->save();

        return back()->with('success', 'Status updated');
    }
}
