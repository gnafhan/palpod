<?php

namespace App\Http\Controllers;

use App\Models\Spotify;

class HomeController extends Controller
{
    public function index() {
        $episodes = Spotify::all();
        return view('home2', [
            'episodes' => $episodes
        ]);
    }
}
