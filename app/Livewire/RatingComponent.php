<?php

namespace App\Livewire;

use App\Models\Rating;
use App\Models\Spotify;
use Livewire\Component;
use Livewire\WithPagination;

class RatingComponent extends Component
{
    use WithPagination;

    public $spotifyId;
    public $Id;
    public $name;
    public $rating;
    public $comment = "";
    private function getrating() {
        $ratings = Rating::all();
        $length = count($ratings);
        $rate = 0;
        foreach ($ratings as $rating) {
            $rate += $rating->rating;
        }
        return round($rate/$length,1);
    }
    public function store()
    {
        Rating::create([
            'spotify_id' => $this->spotifyId,
            'name' => $this->name,
            'rating' => $this->rating,
            'comment' => $this->comment
        ]);
        session()->flash('success', 'Berhasil');
        $this->reset('Id','name','rating','comment');
    }
    public function mount($spotifyId)
    {
        $this->spotifyId = $spotifyId;
    }
    public function render()
    {
        return view('livewire.rating-component',[
            'spotify' => Spotify::find($this->spotifyId),
            // 'ratings' => Rating::paginate(10),
            'ratings' => Rating::all(),
            'rate' => $this->getrating()
        ]);
    }
}
