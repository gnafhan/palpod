<?php

namespace App\Http\Controllers;

use App\Models\Spotify;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminSpotifyController extends Controller
{
    public function index()
    {
        return Inertia::render('Spotify/Index', [
            'spotifies' => Spotify::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return Inertia::render('Spotify/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required',
            'published_at' => 'required|date'
        ]);

        Spotify::create($validated);

        return redirect()->route('admin.spotify.index')
            ->with('message', 'Spotify link created successfully');
    }

    public function edit(Spotify $spotify)
    {
        return Inertia::render('Spotify/Edit', [
            'spotify' => $spotify
        ]);
    }

    public function update(Request $request, Spotify $spotify)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required',
            'published_at' => 'required|date'
        ]);

        $spotify->update($validated);

        return redirect()->route('admin.spotify.index')
            ->with('message', 'Spotify link updated successfully');
    }

    public function destroy(Spotify $spotify)
    {
        $spotify->delete();

        return redirect()->route('admin.spotify.index')
            ->with('message', 'Spotify link deleted successfully');
    }
}