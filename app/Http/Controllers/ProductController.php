<?php
namespace App\Http\Controllers;
use App\Models\art;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $art = new art();
        $art->title = 'scream';
        $art->description = 'nice piece of art';
        $art-> category_id = 'id';
        $art-> created_by = 'the goat';
        $art-> art = 'https://art.jpg';
        return view('art.index', compact('art'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        $arts = art::all();
        return view('products', compact('arts'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
