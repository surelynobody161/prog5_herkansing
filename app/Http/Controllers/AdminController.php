<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Art;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view this page.');
        }

        if (auth()->user()->role != 'admin') {
            return redirect('/');

        }
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

        return view('admin.dashboard',compact('arts'));


    }

}
