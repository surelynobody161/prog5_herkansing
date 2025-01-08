<?php
namespace App\Http\Controllers;

use App\Models\Art;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start with an empty query builder for the Art model
        $query = Art::where('active', 1);  // Zorg ervoor dat 'active' altijd is ingesteld op 1

        // Retrieve search and category filter values
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Execute the query and get the results
        $arts = $query->get();

        return view('arts.index', compact('arts'));
    }


    public function create()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in to access this page.');
        }
        $categories = Category::all();
        return view('arts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to log in to access this page.');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }
        $art = new Art();
        $art->title = $request->input('title');
        $art->description = $request->input('description');
        $art->category_id = 1;
        $art->art = 'images/mona.jpg';
        $art->active = 1;


        $art->user_id = auth() ->id();

        $art->save();

        return redirect()->route('arts.index')->with('success', 'Art created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Art $art)
    {
        return view('arts.show', compact('art')); // Return the show view with the art data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Art $art)
    {

        if (Auth::id()!==$art->user_id) {
            return redirect()->route('login')->with('error', 'You need to log in to access this page.');
        }
        return view('arts.edit', compact('art'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Art $art)
    {

        if (Auth::id()!==$art->user_id) {
            return redirect()->route('login')->with('error', 'You need to log in to access this page.');
        }
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        // Check if an image is uploaded and update it
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $art->user_id = auth() ->id();

        $art->update($validated);


        return redirect()->route('arts.index')->with('success', 'Art updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Art $art)
    {
        if ($art->user_id !== Auth::id()) {
            return redirect()->route('arts.index');
        }
        $art->delete();

        return redirect()->route('arts.index')->with('success', 'Art deleted successfully!');
    }
    public function toggleActive(Request $request, Art $art)
    {
        // Validate the incoming request
        $request->validate([
            'active' => 'required|boolean',
        ]);

        // Update the active status
        $art->active = $request->input('active');
        $art->save();

        return redirect()->route('admin.index');
    }
}
