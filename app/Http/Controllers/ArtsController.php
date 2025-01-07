<?php
namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;

class ArtsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start with an empty query builder for the Art model
        $query = Art::query();

        // Retrieve search and category filter values
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $arts = $query->get();

        return view('art.index', compact('arts'));

    }

    public function create()
    {
        return view('art.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $art = Art::all()->findOrFail($id); // Find the art by its ID
        return view('art.show', compact('art')); // Return the show view with the art data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
