<?php

namespace App\Http\Controllers;

use App\Models\Spotify;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index() {
        $local_episodes = Spotify::all();
        $local_ids = $local_episodes->pluck('link')->toArray();
        $local_ids = implode(',', $local_ids);

        // $episodes = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . env('SPOTIFY_TOKEN')
        // ])->get('https://api.spotify.com/v1/episodes', [
        //     'ids' => $local_ids,
        //     'limit' => 50
        // ])->json();

        // dd($episodes);
        return view('home2', [
            'episodes' => $local_episodes
        ]);
    }
}
