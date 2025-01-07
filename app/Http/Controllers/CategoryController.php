<?php
namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('category.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        $category = new Category();
        $category->category = $request->input('title');
        $category->save();
        return redirect()->route('categories.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $catagory)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $catagory)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $catagory)
    {
        //
    }
}
