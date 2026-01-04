<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $topUsers = User::withCount('arts')
            ->where('arts_count', '>=', 5)
            ->orderByDesc('arts_count')
            ->get();

        return view('home', compact('topUsers'));
    }
}
